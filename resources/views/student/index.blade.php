<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Student</h3>
                            </div>
                            <div class="col-md-6 text-end">
                                <a href="{{ route('student.create') }}" class="btn btn-outline-primary">Add Student</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @elseif (Session::has('failure'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ Session::get('failure') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        @if (count($students) > 0)
                        <table class="table table-bordered m-0">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Name</th>
                                    <th>Email</th>

                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($students as $Student)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $Student->name }}</td>
                                    <td>{{ $Student->email }}</td>
                                    <td>
                                        <a href="{{ route('student.edit', $Student) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('student.delete', $Student)}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <div class="alert alert-danger m-0">No record found!</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
