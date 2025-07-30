@include('vendor.layouts.header')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    .choices__inner {
        min-height: 0px !important;
        margin-top: 8px;
        background-color: transparent;
        border: none;
    }
    .choices__list[aria-expanded] .choices__item--selectable[data-select-text] {
        padding-right: 10px !important;
    }
    .choices__list {
        padding-left: 10px;
    }
    .card {
        background: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .label {
        font-size: 15px;
        color: #868585;
        font-weight: 400;
    }

    .value {
        font-size: 15px;
        color: #000;
        font-weight: 600;
    }

    .actions {
        display: flex;
        gap: 10px;
    }

    .btn.cancle,
    .btn.create {
        padding: 10px 20px;
        border-radius: 4px;
        border: none;
        cursor: pointer;
        font-weight: bold;
        font-size: 16px;
        font-weight: 700;
    }

    .btn.create {
        background-color: #299D91;
        color: white;
        font-size: 15px;
        font-weight: 500;
        padding: 5px 42px;
    }

    .btn.cancel {
        background-color: white;
        color: #299D91;
        border: 1px solid #299D91;
        font-size: 15px;
        font-weight: 500;
        padding: 5px 42px;
    }

    .coupons-container {
        position: relative;
        width: 440px;
    }

    .coupon-img {
        display: block;
        max-width: 73%;
        height: auto;
    }

    .coupon {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 310px;
        color: white;
        font-family: 'Inter', sans-serif;
        padding: 15px 20px;
        margin-left: -50px;
    }

    .coupon-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-right: 21px;
    }

    .discount {
        font-size: 19px;
        font-weight: 600;
    }

    .max {
        color: rgba(255, 255, 255, 0.3);
        font-size: 9px;
        font-weight: 600;
    }

    .code {
        font-size: 18px;
        color: #37CA77;
        font-weight: 600;
        text-align: right;
    }

    .expire {
        color: rgba(255, 255, 255, 0.3);
        font-size: 8px;
        text-align: right;
        font-weight: 600;
    }

    .desc {
        margin-top: 10px;
        font-size: 15px;
        font-weight: 600;
    }

    .coupon-close { 
        position: absolute !important;
        top: 9px;
        right: 9px;
        cursor: pointer;
    }

    @media(max-width:343px) {
        .coupon-close{
            top:9px;
            right:63px;
        }
        .code,.expire{
            text-align: left;
        }
        .code {
            font-size: 17px;
        }
        .discount {
            font-size: 17px;
            margin-left: 60px;
        }
        .max,.expire{
            font-size: 7px;
        }
        .desc{
            font-size: 15px;
            margin-top: 0px
        }
        .coupons-container, .coupon{
            width: 400px;
        }
    }

    @media (max-width:390px) {
        .actions{
            display: block;
        }
        .actions .btn{
            margin-bottom: 10px;
        }
        
    }
</style>

<div class="page-title-box">
    <div class="d-flex align-items-sm-center flex-sm-row flex-column gap-2">
        <div class="flex-grow-1">
            <h6 class="ml-3 mb-4">Coupons & Offers</h6>
        </div>
    </div>
    <div class="card mb-5 pb-5 pl-0" style="background-color: #F5F5F5; box-shadow: none; padding-top :0px !important;;">
        <div class="row">
            @forelse  ($coupons as $value)
                <div class="col-md-6 col-lg-4 col-sm-12 mb-2">
                    <div class="container coupons-container">
                        <img src="{{asset('assets/image/client/Rectangle 2802.svg')}}" alt="Coupon Background"
                            class="coupon-img">
                        <div class="coupon">
                            <span class="coupon-close">
                                <img src="{{asset('assets/image/client/close-circle.svg')}}" alt="Close" height="25px">
                            </span>
                            <div class="coupon-content">
                                <div>
                                    <div class="discount">{{$value->discount}}
                                        @if ($value->discount_type == 'Flat')
                                            ₹
                                        @else
                                            %
                                        @endif OFF
                                    </div>
                                    <div class="max">MAX ₹{{$value->min_order}}</div>
                                </div>
                                <div>
                                    <div class="code">{{$value->coupons_code}}</div>
                                    <div class="expire">Coupon Expires {{$value->end_date}}</div>
                                </div>
                            </div>
                            <div class="desc">{{$value->coupons_name}}</div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12 col-lg-6 col-sm-12 mb-2">
                    <div class="container coupons-container">
                        <img src="{{asset('assets/image/client/Rectangle 2802.svg')}}" alt="Coupon Background"
                            class="coupon-img">
                        <div class="coupon">
                            <span class="coupon-close">
                                <img src="{{asset('assets/image/client/close-circle.svg')}}" alt="Close">
                            </span>
                            <div class="coupon-content">
                                <div>
                                    <div class="discount">20% OFF</div>
                                    <div class="max">MAX ₹500</div>
                                </div>
                                <div>
                                    <div class="code">END02</div>
                                    <div class="expire">Coupon Expires 01/03</div>
                                </div>
                            </div>
                            <div class="desc">End Of New Year</div>
                        </div>
                    </div>
                </div>
            @endforelse 
        </div>
    </div>
    <div class="d-flex align-items-sm-center flex-sm-row flex-column gap-2">
        <div class="flex-grow-1">
            <h6 class="ml-3">Create Coupons</h6>
        </div>
    </div>
    <form action="{{ route('offers.store') }}" method="POST">
        @csrf
        <div class="card">
            @if ($errors->any())
                <div class="alert alert-danger" style="font-size: 13px; background-color: rgb(246, 193, 193); border: none; opacity: 0.9; color: rgb(83, 9, 9);">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row ">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                    <div class="label">Coupons Name</div>
                    <input class="form-control" placeholder="Coupons Name" style="font-size: 13px; border: none; background-color: transparent; border-radius: 5px;" name="coupons_name" value="{{ old('coupons_name') }}">
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-3">
                    <div class="label">Valid Date</div>
                    <input type="text" id="valid-datepicker" name="valid_date" class="form-control mt-2" style="font-size: 13px; border: none; background-color: transparent; border-radius: 5px;"
                                placeholder="Select Valid date" value="{{ old('valid_date') }}">
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-3">
                    <div class="label">Expire Date</div>
                    <input type="text" id="expire-datepicker" name="expire_date" style="font-size: 13px; border: none; background-color: transparent; border-radius: 5px;"
                                class="form-control mt-2" placeholder="Pick Expire date" value="{{ old('expire_date') }}">
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-3">
                    <div class="label">Discount *(%)</div>
                    <input class="form-control mt-2" style="font-size: 13px; border: none; background-color: transparent; border-radius: 5px;" name="discount" placeholder="50" value="{{ old('discount') }}">
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-3">
                    <div class="label">Discount type</div>
                        <select class="form-control typeselect" name="discount_type" id="discount_type" 
                            placeholder="Select discount Type" style="height: 15px;">
                            <option value="">Select discount Type</option>
                            <option value="Flat" {{ old('discount_type') == 'Flat' ? 'selected' : '' }}>Flat</option>
                            <option value="Percentage" {{ old('discount_type') == 'Percentage' ? 'selected' : '' }}>Percentage</option>
                        </select>
                    </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-3">
                    <div class="label">Min. Order</div>
                    <input class="form-control mt-2" style="font-size: 13px; border: none; background-color: transparent; border-radius: 5px;" name="min_order" placeholder="1000" value="{{ old('min_order') }}">
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-3" style="margin-bottom: 12px;">
                    <div class="label">User Limit</div>
                    <input class="form-control mt-2" type="text" name="user_limit" oninput="this.value = this.value.replace(/[^0-9]/g, '')" 
                                    style="font-size: 13px; border: none; background-color: transparent; border-radius: 5px;" placeholder="3" value="{{ old('user_limit') }}">
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-3">
                    <div class="label">Turf</div>
                    <select class="form-control turf turfselect" data-choices name="turf"
                        id="choices-single-default" style="height: 30px;">
                        <option value="">Select Turf</option>
                        @if (isset($turf))
                            @foreach ($turf as $t)
                                <option value="{{ $t->id }}" {{ old('turf') == $t->id ? 'selected' : '' }}>
                                    {{ $t->name }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-3">
                    <div class="label">City</div>
                    <select class="form-control turf cityselect" data-choices name="city"
                        id="choices-single-default" style="height: 30px;">
                        <option value="">Select City</option>
                        @if (isset($city))
                            @foreach ($city as $c)
                                <option value="{{ $c->id }}" {{ old('city') == $c->id ? 'selected' : '' }}>
                                    {{ $c->city_name }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="actions mt-2">
                    <button class="btn create">Create</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#valid-datepicker", {
        dateFormat: "d-m-Y",
        allowInput: true,
        disableMobile: true
    });
    flatpickr("#expire-datepicker", {
        dateFormat: "d-m-Y",
        allowInput: true,
        disableMobile: true
    });

    function generateCouponCode() {
        const randomNum = Math.floor(Math.random() * 100)
            .toString()
            .padStart(2, '0');
        return 'END' + randomNum;
    }
</script>
<script>
    function initChoices(selector) {
        const element = document.querySelector(selector);
        if (!element.classList.contains('choices__input')) {
            return new Choices(selector, {
                placeholder: true,
                shouldSort: false,
                allowHTML: false,
            });
        }
        return Choices.instances.find(
            (instance) => instance.passedElement.element === element
        );
    }

    let roleChoices = initChoices('.turfselect');
    let typeChoices = initChoices('.typeselect');
    let cityChoices = initChoices('.cityselect');
</script>

@include('vendor.layouts.footer')