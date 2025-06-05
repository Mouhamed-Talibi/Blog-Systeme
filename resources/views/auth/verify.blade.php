<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog System</title>

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h3>Please verify your email address</h3>

        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <p class="mt-3">A verification link has been sent to your email address.</p>

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn btn-primary mt-3">Resend Verification Email</button>
        </form>
    </div>
    {{-- bootstrap js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>