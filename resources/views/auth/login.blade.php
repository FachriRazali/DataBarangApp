<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <div class="left-section">
            <div class="logo">
                <img src="{{ asset('img/list.png') }}" alt="Icon">
                <h2>DATA BARANG JATELINDO</h2>
            </div>
        </div>
        <div class="right-section">
            <h1>Login</h1>
            <p>Silahkan Klik Tombol Untuk Masuk</p>
            <div class="button-group">
            <a href="{{ route('google.redirect') }}" class="btn-login" onclick="console.log('Redirecting to Google...');">Login with Google</a>



            </div>
        </div>
    </div>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body, html {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f5f5f5;
        }
        .container {
            display: flex;
            width: 100vw;
            height: 100vh;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .left-section {
            background-color: #3d6e94;
            color: #d2e4f3;
            width: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 20px;
        }
        .left-section .logo h2 {
            margin-top: 20px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }
        .right-section {
            width: 50%;
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: center;
        }
        .right-section h1 {
            font-size: 36px;
            color: #3d6e94;
            margin-bottom: 10px;
        }
        .right-section p {
            font-size: 16px;
            color: #3d6e94;
            margin-bottom: 20px;
        }
        .button-group {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .btn-login {
            width: 100%;
            padding: 10px;
            background-color: #3d6e94;
            color: #fff;
            font-size: 18px;
            border: none;
            font-weight: bold;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            display: inline-block;
        }
        .btn-login:hover {
            background-color: #345776;
        }
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                height: auto;
            }
            .left-section, .right-section {
                width: 100%;
                padding: 20px;
            }
            .right-section {
                align-items: center;
            }
            .right-section h1 {
                font-size: 28px;
                text-align: center;
            }
            .right-section p {
                font-size: 14px;
                text-align: center;
            }
        }
        @media (max-width: 480px) {
            .left-section .logo h2 {
                font-size: 20px;
            }
            .right-section h1 {
                font-size: 24px;
            }
            .right-section p {
                font-size: 13px;
            }
            .btn-login {
                font-size: 14px;
                padding: 8px;
            }
        }
    </style>
</body>
</html>
