<?php

namespace App\Http\Controllers\API\customer;

use DateTime;
use App\Models\Turf;
use App\Models\Images;
use App\Models\Sports;
use App\Models\Amenity;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController;

class TurfController extends BaseController
{
    public function index(Request $request)
    {
        $filterParams = $request->input('filter_param');

        $validator = Validator::make($request->all(), [
            'filter_param.id' => 'nullable|exists:turf,id',
            'order.column' => 'nullable|string|in:name,id',
            'order.dir' => 'nullable|string|in:asc,desc',
            'filter_param.date' => 'nullable|date|after_or_equal:today',
            'filter_param.time' => 'nullable|date_format:H:i|after:' . now()->format('H:i'),
        ])->validate();

        // if ($validator->fails()) {
        //     return $this->senderror(['errors' => $validator->errors()->all()]);
        // }

        $turfQuery = Turf::query()->with('featureImage');

        $staticLocationName = $request->input('location_text');
        $date = $filterParams['date'] ?? null;
        $time = $filterParams['time'] ?? null;

        if (!empty($staticLocationName)) {
            $turfQuery->where('location_text', 'like', '%' . $staticLocationName . '%');
        }

        if (isset($filterParams['id']) && !empty($filterParams['id'])) {
            $turfQuery->where('turf.id', $filterParams['id']);
        }

        if ($date && $time) {
            $now = now();
            $isToday = $date === $now->toDateString();
            $requestedTime = Carbon::createFromFormat('H:i', $time);

            if ($isToday && $requestedTime->lessThanOrEqualTo($now)) {
                return $this->sendresponse([], 'Cannot search for past time.');
            }

            $turfQuery->whereNotIn('turf.id', function ($query) use ($date, $time) {
                $query->select('venues_id')
                    ->from('booking')
                    ->whereDate('booking_on', $date)
                    ->where(function ($q) use ($time) {
                        $q->where(function ($inner) use ($time) {
                            $inner->whereRaw("TIME(time_in) <= ?", [$time])
                                ->whereRaw("TIME(time_out) > TIME(time_in)")
                                ->whereRaw("TIME(time_out) > ?", [$time]);
                        })->orWhere(function ($inner) use ($time) {
                            $inner->whereRaw("TIME(time_in) <= ?", [$time])
                                ->whereRaw("TIME(time_out) < TIME(time_in)")
                                ->whereRaw("(? < '24:00:00' OR ? < '04:00:00')", [$time, $time]);
                        });
                    })
                    ->whereIn('status', ['1', '2']);
            });

            $turfQuery->whereExists(function ($query) use ($time, $isToday, $now) {
                $query->select(DB::raw(1))
                    ->from('turf_timing')
                    ->whereRaw('turf_timing.turf_id = turf.id')
                    ->whereRaw('? BETWEEN turf_timing.from AND turf_timing.to', [$time]);

                if ($isToday) {
                    $query->whereRaw('? > TIME(NOW())', [$time]);
                }
            });
        }

        if (!empty($request->input('search.value'))) {
            $searchValue = $request->input('search.value');
            $turfQuery->where(function ($q) use ($searchValue) {
                $q->where('name', 'LIKE', "%{$searchValue}%")
                    ->orWhere('location_text', 'LIKE', "%{$searchValue}%")
                    ->orWhere('booking_price', 'LIKE', "%{$searchValue}%");
            });
        }

        $sortColumn = $request->input('order.column', 'turf.id');
        $sortDirection = $request->input('order.dir', 'asc');
        $turfQuery->orderBy($sortColumn, $sortDirection);

        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $turfs = $turfQuery->offset($start)->limit($length)->get();

        $formatted = $turfs->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'location_text' => $item->location_text,
                'location_link' => $item->location_link,
                'booking_price' => $item->booking_price,
                'unit' => $item->unit,
                'feature_image' => $item->featureImage ? [
                    'image_name' => $item->featureImage->image_name,
                    'image_url' => asset(Storage::url($item->featureImage->image_path)),
                ] : null,
            ];
        });

        return $this->sendresponse($formatted, 'Turf list');
    }
    public function details(Request $request)
    {
        $staticLocationName = $request->input('location_text');

        $validator = Validator::make($request->all(), [
            'filter_param.id' => 'required|numeric|exists:turf,id',
            'order.column' => 'nullable|string|in:name,id',
            'order.dir' => 'nullable|string|in:asc,desc',
            'date' => 'nullable|date|after_or_equal:today',
            'time' => 'nullable|date_format:H:i'
        ], [
            'filter_param.id.required' => 'Turf ID is required.',
            'filter_param.id.exists' => 'Selected Turf ID is invalid.',
        ])->validate();


        $turfQuery = Turf::query()->with([
            'timings',
            'coupons',
            'images' => function ($query) {
                $query->where('reference_name', 'turf');
            }
        ]);

        if (!empty($staticLocationName)) {
            $turfQuery->where('location_text', 'like', '%' . $staticLocationName . '%');
        }

        if ($request->has('filter_param.id') && !empty($request->input('filter_param.id'))) {
            $turfQuery->where('turf.id', $request->input('filter_param.id'));
        }

        if (!empty($request->input('search.value'))) {
            $searchValue = $request->input('search.value');
            $turfQuery->where(function ($q) use ($searchValue) {
                $q->where('name', 'LIKE', "%{$searchValue}%")
                    ->orWhere('location_text', 'LIKE', "%{$searchValue}%")
                    ->orWhere('booking_price', 'LIKE', "%{$searchValue}%");
            });
        }

        $sortColumn = $request->input('order.column', 'turf.id');
        $sortDirection = $request->input('order.dir', 'asc');
        $turfQuery->orderBy($sortColumn, $sortDirection);

        $start = $request->input('start');
        $length = $request->input('length');
        $data = $turfQuery->offset($start)->limit($length)->get();

        if ($data->isNotEmpty()) {
            $data->map(function ($item) {
                $timing = $item->timings->first();
                $item->timing = (new DateTime($timing->from))->format('h:i A') . ' - ' . (new DateTime($timing->to))->format('h:i A');

                $sportsIds = json_decode($item->sports_ids, true);
                $amenityIds = json_decode($item->amenities_ids, true);

                $sportsIds = is_array($sportsIds) ? $sportsIds : (is_numeric($sportsIds) ? [$sportsIds] : []);
                $amenityIds = is_array($amenityIds) ? $amenityIds : (is_numeric($amenityIds) ? [$amenityIds] : []);

                $item->sports = Sports::whereIn('id', $sportsIds)->pluck('name')->toArray();
                $item->amenities = Amenity::whereIn('id', $amenityIds)->pluck('name')->toArray();
                unset($item->sports_ids, $item->amenities_ids);


                $turfImageIds = json_decode($item->turf_image, true);
                $turfImageIds = is_array($turfImageIds) ? $turfImageIds : [];

                $item->turf_images = Images::whereIn('id', $turfImageIds)->get()->map(function ($img) {
                    return [
                        'image_name' => $img->image_name,
                        'image_url' => asset(Storage::url($img->image_path)),
                    ];
                });
                if ($item->feature_image) {
                    $featureImg = Images::find($item->feature_image);
                    $item->feature_image = $featureImg ? [
                        'image_name' => $featureImg->image_name,
                        'image_url' => asset(Storage::url($featureImg->image_path)),
                    ] : null;
                } else {
                    $item->feature_image = null;
                }

                unset($item->images, $item->turf_image);

                $item->coupons = $item->coupons->map(function ($coupon) {
                    return [
                        'coupon_code' => $coupon->coupon_code,
                        'discount' => $coupon->discount,
                        'valid_until' => $coupon->valid_until,
                    ];
                });

                $item->time_slots = collect($item->timings)->flatMap(function ($timing) {
                    $slots = [];
                    $start = Carbon::parse($timing->from);
                    $end = Carbon::parse($timing->to);

                    while ($start->lt($end)) {
                        $slots[] = $start->format('ga');
                        $start->addHour();
                    }

                    return $slots;
                })->unique()->values();

                unset($item->timings);

                return $item;
            });
        } else {
            return $this->senderror('No turfs found.');
        }

        $dates = collect();
        $today = now();

        for ($i = 0; $i <= 30; $i++) {
            $date = $today->copy()->addDays($i);
            $dates->push([
                'date' => $date->toDateString(),
                'day' => $date->format('D'),
                // 'day_num' => $date->format('d'),
                'month' => $date->format('M'),
            ]);
        }
        return $this->sendresponse([
            'turfs' => $data,
            'dates' => $dates,
        ], 'Turf list');
    }

}
