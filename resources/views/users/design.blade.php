<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coupon Design</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #FFFFFF;
            margin: 0;
            position: relative;
        }

        .coupons-container {
            position: relative;
        }

        .coupon-img {
            display: block;
            max-width: 100%;
            height: auto;
        }

        .coupon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 430px;
            color: white;
            font-family: Arial, sans-serif;
            padding: 15px 20px;
            margin-left:10px;
        }
        .coupon-content{
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-right: 35px;
        }

        .discount {
            font-size: 32px;
            font-weight: bold;
        }

        .max {
            color: rgba(255, 255, 255, 0.3);
            font-size: 13px;
        }

        .code {
            font-size: 32px;
            color: #35b34a;
            font-weight: bold;
            text-align: right;
        }

        .expire {
            color: rgba(255, 255, 255, 0.3);
            font-size: 13px;
            text-align: right;
        }

        .desc {
            margin-top: 10px;
            font-size: 19px;
        }

        .close {
            position: absolute !important;
            top: -6px;
            right: 20px;
            cursor: pointer;
        }

    </style>
</head>
<body>

    <div class="container coupons-container">
        <img src="{{asset('assets/image/client/Rectangle 2802.svg')}}" alt="Coupon Background" class="coupon-img">
        <div class="coupon">
            <span class="close">
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

</body>
</html>
