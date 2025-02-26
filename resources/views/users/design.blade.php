<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPI Input Design</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fc;
            font-family: Arial, sans-serif;
        }
        .container {
            display: flex;
            align-items: center;
            background: white;
            padding: 10px 15px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .radio {
            width: 18px;
            height: 18px;
            border-radius: 50%;
            border: 2px solid #1e3a8a;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 10px;
            cursor: pointer;
        }
        .radio::before {
            content: "";
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #1e3a8a;
        }
        label {
            font-size: 16px;
            color: #1e293b;
            margin-right: 10px;
        }
        .input-container {
            display: flex;
            align-items: center;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            padding: 5px 10px;
            background: #f1f5f9;
        }
        input {
            border: none;
            outline: none;
            background: transparent;
            font-size: 14px;
            width: 120px;
        }
        .suffix {
            color: #64748b;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="radio"></div>
        <label>UPI</label>
        <div class="input-container">
            <input type="text" placeholder="" />
            <span class="suffix">.@upi</span>
        </div>
    </div>
</body>
</html>
