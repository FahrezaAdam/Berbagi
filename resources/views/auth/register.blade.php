<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #6A0DAD, #9A4DFF);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Poppins', sans-serif;
            overflow: hidden;
        }

        /* BACKGROUND ANIMATION */
        .bubble {
            position: absolute;
            border-radius: 50%;
            background: rgba(255,255,255,0.15);
            animation: floatUp 10s infinite ease-in;
            pointer-events: none;
        }

        @keyframes floatUp {
            0% { transform: translateY(100vh) scale(0.7); opacity: 0; }
            50% { opacity: 1; }
            100% { transform: translateY(-20vh) scale(1.3); opacity: 0; }
        }

        .card-register {
            width: 28rem;
            border-radius: 18px;
            background: #ffffffee;
            backdrop-filter: blur(10px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
            animation: fadeIn 0.7s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(25px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .title {
            color: #6A0DAD;
            font-weight: 700;
        }

        .btn-purple-soft {
            background: #fff;
            color: #6A0DAD;
            border: 2px solid #6A0DAD;
            font-weight: 600;
            transition: 0.3s ease;
        }

        .btn-purple-soft:hover {
            background: #6A0DAD;
            color: #fff;
        }

        label {
            font-weight: 600;
            color: #5a0080;
        }

        select, input {
            border-radius: 10px !important;
        }
    </style>
</head>
<body>

    <!-- ANIMATED BACKGROUND BUBBLES -->
    <div class="bubble" style="width:90px; height:90px; left:10%; animation-duration:13s;"></div>
    <div class="bubble" style="width:60px; height:60px; left:40%; animation-duration:10s;"></div>
    <div class="bubble" style="width:120px; height:120px; left:70%; animation-duration:15s;"></div>
    <div class="bubble" style="width:75px; height:75px; left:85%; animation-duration:11s;"></div>
    <div class="bubble" style="width:50px; height:50px; left:25%; animation-duration:9s;"></div>

    <div class="card card-register p-4">
        <h3 class="text-center title mb-4">Register</h3>

        <form action="/register" method="POST">
            @csrf

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="name" required class="form-control">
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" required class="form-control">
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" required class="form-control">
            </div>

            <div class="mb-3">
                <label>Role</label>
                <select name="role" class="form-control">
                    <option value="admin">Admin</option>
                    <option value="donator">Donator</option>
                    <option value="penerima">Penerima</option>
                </select>
            </div>

            <button class="btn btn-purple-soft w-100">Register</button>
        </form>
    </div>

</body>
</html>
