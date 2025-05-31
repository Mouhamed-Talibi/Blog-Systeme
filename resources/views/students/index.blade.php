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
    <div class="container">
        <div class="main-text mt-5">
            <h1 class="text-center bg-dark text-info w-50 mx-auto py-2 px-2">Students List</h1>
            <a href="{{ route('students.create') }}" class="btn btn-primary">Create Student</a>
        </div>

        {{-- messages --}}
        @if (!empty(session('success')))
            <div class="alert alert-success mt-4 text-center" role="alert">
                {{ session('success') }}
            </div>
        @endif

        {{-- student list --}}
        <div class="row py-5 pb-5 justify-content-center align-items-cent">
            {{-- loop students --}}
            @foreach ($students as $student)
                <div class="col-md-6 col-lg-4 mt-3">
                    <div class="infos rounded-5 p-3 shadow border border-2 border-success">
                        <h3 class="text-center text-success">{{ $student->firstName }} {{ $student->lastName }}</h3>
                        <p class="mt-3">
                            <span class="fw-bold">
                                Email :
                            </span>
                            {{ $student->email }}
                        </p>
                        <small>
                            <span class="fw-bold">
                                Created at :
                            </span>
                            {{ $student->created_at->diffForHumans() }}
                        </small>
                        <br>
                        <small>
                            <span class="fw-bold">
                                Updated at :
                            </span>
                            {{ $student->updated_at }}
                        </small>

                        {{-- links --}}
                        <div class="links text-center mt-3">
                            <a href="{{ route('students.edit', $student->id )}}" class="btn btn-sm btn-primary mx-2">Edit</a>
                            <form action="{{ route('students.destroy', $student->id )}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this student ?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- bootstrap js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>