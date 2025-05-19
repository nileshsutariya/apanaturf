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


        $turfQuery = Turf::query()->with('featureImage');

        // $staticLocationName = $request->input('location_text');
        $date = $filterParams['date'] ?? null;
        $time = $filterParams['time'] ?? null;

        // if (!empty($staticLocationName)) {
        //     $turfQuery->where('location_text', 'like', '%' . $staticLocationName . '%');
        // }

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
        $this->validateRequest($request);

        $data = $this->getTurfData($request);

        if (!$data) {
            return $this->senderror('No turfs found.');
        }

        $this->formatTurfData($data);
        $data->dates = $this->generateDateRange();

        return $this->sendresponse($data, 'Turf Details');
    }

    private function validateRequest(Request $request)
    {
        Validator::make($request->all(), [
            'filter_param.id' => 'required|numeric|exists:turf,id',
        ], [
            'filter_param.id.required' => 'Turf ID is required.',
            'filter_param.id.exists' => 'Selected Turf ID is invalid.',
        ])->validate();
    }

    private function getTurfData(Request $request)
    {
        return Turf::with([
            'timings',
            'coupons' => function ($query) {
                $today = now();
                $query->where('status', 1)
                    ->whereDate('start_date', '<=', $today)
                    ->whereDate('end_date', '>=', $today);
            }
        ])->when($request->filled('location_text'), fn($q) =>
                $q->where('location_text', 'like', '%' . $request->input('location_text') . '%'))
            ->when($request->filled('filter_param.id'), fn($q) =>
                $q->where('turf.id', $request->input('filter_param.id')))
            ->first();
    }

    private function formatTurfData($data)
    {
        $timing = $data->timings->first();
        $data->timing = (new DateTime($timing->from))->format('h:i A') . ' - ' . (new DateTime($timing->to))->format('h:i A');

        $data->sports = $this->getNamesFromIds(Sports::class, $data->sports_ids);
        $data->amenities = $this->getNamesFromIds(Amenity::class, $data->amenities_ids);

        $data->turf_images = $this->getImageDetails($data->turf_image);
        $data->feature_image = $this->getFeatureImage($data->feature_image);

        unset($data->sports_ids, $data->amenities_ids, $data->images, $data->turf_image);

        $data->coupons = $data->coupons->map(fn($coupon) => [
            'coupon_code' => $coupon->coupon_code,
            'discount' => $coupon->discount,
            'valid_until' => $coupon->valid_until,
        ]);

        $data->time_slots = collect($data->timings)->flatMap(function ($timing) {
            $slots = [];
            $start = Carbon::parse($timing->from);
            $end = Carbon::parse($timing->to);
            while ($start->lt($end)) {
                $slots[] = $start->format('ga');
                $start->addHour();
            }
            return $slots;
        })->unique()->values();

        unset($data->timings);
    }

    private function getNamesFromIds($model, $ids)
    {
        $ids = json_decode($ids, true);
        $ids = is_array($ids) ? $ids : (is_numeric($ids) ? [$ids] : []);
        return $model::whereIn('id', $ids)->pluck('name')->toArray();
    }

    private function getImageDetails($imageIds)
    {
        $ids = json_decode($imageIds, true) ?? [];
        return Images::whereIn('id', $ids)->get()->map(fn($img) => [
            'image_name' => $img->image_name,
            'image_url' => asset(Storage::url($img->image_path)),
        ]);
    }

    private function getFeatureImage($id)
    {
        if (!$id)
            return null;
        $img = Images::find($id);
        return $img ? [
            'image_name' => $img->image_name,
            'image_url' => asset(Storage::url($img->image_path)),
        ] : null;
    }

    private function generateDateRange()
    {
        $dates = collect();
        $today = now();
        for ($i = 0; $i <= 30; $i++) {
            $date = $today->copy()->addDays($i);
            $dates->push([
                'date' => $date->toDateString(),
                'day' => $date->format('D'),
                'month' => $date->format('M'),
            ]);
        }
        return $dates;
    }

}

