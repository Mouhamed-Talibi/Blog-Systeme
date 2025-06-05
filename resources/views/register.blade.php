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
    <div class="container py-5">
        <div class="row justify-content-center align-itels-center">
            <div class="col-md-6 col-lg-8">
                <form action="{{ route('submitRegistration')}}" method="POST" class="mt-5 shadow p-4 border border-primay">
                    {{-- csrf --}}
                    @csrf

                    {{-- Show validation errors --}}
                    @if ($errors->any())
                        <div class="alert alert-danger mt-2">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <h1 class="text-center mb-4 text-primary">Registration Form</h1>
                    <div class="form-group mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" id="" value="{{ old('name')}}" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Email</label>
                        <input type="email" name="email" id="" value="{{ old('email')}}" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Password</label>
                        <input type="password" name="password" id="" class="form-control">
                    </div>
                    <div class="submit text-center">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- bootstrap js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>