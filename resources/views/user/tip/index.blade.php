<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tip Sistem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    <div class="card shadow-sm">
        <div class="card-body">

            <h3 class="mb-3">Tip Untuk Sistem</h3>

            <p class="text-muted">
                Tip ini digunakan untuk membantu pengembangan sistem dan mendukung admin.
            </p>

            <a href="{{ route('user.tip.create') }}" class="btn btn-primary px-4">
                Kasih Tip
            </a>

        </div>
    </div>

</div>

</body>
</html>
