<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container mt-3">
        <h2>student edit form id = {{ $data['id'] }}</h2>
        <form action="{{ route('students.update', ['student' => $data['id']]) }}" method="post">

            {{-- _hidden --}}
            @csrf
            {{-- _method --}}
            @method('put')
            
            {{-- csrf input hidden _token --}}
            <div class="mb-3 mt-3">
                <label for="name">Name:</label>
                <input type="name" class="form-control" id="name" placeholder="Enter name" name="name"
                    value="{{ $data['name'] }}">
            </div>
            <div class="mb-3 mt-3">
                <label for="mobile">Mobile:</label>
                <input type="mobile" class="form-control" id="mobile" placeholder="Enter mobile" name="mobile"
                    value="{{ $data['mobile'] }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>

</html>
