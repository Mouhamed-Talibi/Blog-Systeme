<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Add New Student</h2>

        {{-- Form --}}
        <form action="{{ route('students.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" name="firstName" class="form-control" id="firstName" value="{{ old('firstName') }}">
                {{-- error --}}
                @error('firstName')
                    <p class="text-danger"> {{ $message }} </p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" name="lastName" class="form-control" id="lastName" value="{{ old('lastName') }}">
                {{-- error --}}
                @error('lastName')
                    <p class="text-danger"> {{ $message }} </p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}">
                {{-- error --}}
                @error('email')
                    <p class="text-danger"> {{ $message }} </p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password">
                {{-- error --}}
                @error('password')
                    <p class="text-danger"> {{ $message }} </p>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Create Student</button>
            <a href="{{ route('students.students') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
