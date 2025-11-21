<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            overflow: hidden;
            height: 100vh;
            background: #6A0DAD;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            color: white;
        }

        /* BACKGROUND ANIMASI ICON */
        .floating-icon {
            position: absolute;
            font-size: 45px;
            opacity: 0.22;
            animation: floatUp 12s linear infinite;
        }

        .icon-1 { left: 15%; animation-delay: 0s; }
        .icon-2 { left: 40%; animation-delay: 3s; }
        .icon-3 { left: 70%; animation-delay: 6s; }
        .icon-4 { left: 85%; animation-delay: 1s; }
        .icon-5 { left: 55%; animation-delay: 8s; }

        @keyframes floatUp {
            0% { transform: translateY(100vh); }
            100% { transform: translateY(-120px); }
        }

        /* CARD (Glass Style) */
        .login-card {
            width: 350px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(12px);
            border-radius: 18px;
            padding: 30px;
            box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.25);
            color: white;
            z-index: 10;
            animation: fadeIn 0.7s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .login-title {
            font-weight: 600;
        }

        /* BUTTON PUTIH */
        .btn-white {
            background: white;
            color: #6A0DAD;
            font-weight: 600;
            border-radius: 8px;
            transition: 0.3s ease-in-out;
        }

        .btn-white:hover {
            background: #eaeaea;
        }

        /* FORM LABEL */
        label {
            font-weight: 500;
        }

        a {
            color: #FFD8FF;
        }

        a:hover {
            color: #ffffff;
        }
    </style>
</head>

<body>

    <div class="login-card">
        <h3 class="login-title text-center mb-3">Login</h3>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" action="/login">
            @csrf

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button class="btn btn-white w-100 mb-2">Login</button>
        </form>

        <hr>

        <p class="text-center">
            Belum punya akun? <a href="/register">Daftar</a>
        </p>
    </div>

</body>
</html>
