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
        <h2>Bordered Table</h2>
        <p>The .table-bordered class adds borders on all sides of the table and the cells:</p>
        <div class="text-end">
            <a class="btn btn-success mb-3" href="{{ route('students.create') }}">add</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>mobile</th>
                    <th>phone</th>
                    <th>rank</th>
                    <th>
                        oprate
                    </th>

                </tr>
            </thead>

            @php
                // dd($data);
            @endphp
            {{-- id > 2 紅色的字  --}}
            <tbody>
                @foreach ($data as $key => $value)
                    <tr>
                        <td>{{ $value['id'] }}</td>
                        <td>{{ $value['name'] }}</td>
                        <td>{{ $value['mobile'] }}</td>
                        <td>{{ $value->phoneRelation->phone }}</td>
                        <td class="my-rank">{{ $value['rank'] }}</td>
                        <td>
                            {{-- 方法一 --}}
                            {{-- href="http://localhost/students/1/edit"  --}}
                            {{-- <a href="http://localhost/students/{{ $value['id'] }}/edit" class="btn btn-warning">
                                edit
                            </a> --}}

                            {{-- 方法二 --}}
                            {{-- route('route.name', ['id' => 1]); --}}

                            <form action="{{ route('students.destroy', ['student' => $value['id']]) }}" method="post">
                                {{-- edit --}}
                                <a href="{{ route('students.edit', ['student' => $value['id']]) }}"
                                    class="btn btn-warning">
                                    edit
                                </a>
                                @csrf
                                @method('DELETE')
                                {{-- del --}}
                                <button type="submit" class="btn btn-danger">Del</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            const myRank = $('.my-rank');
            $.each(myRank, function(key, value) {
                console.log('key', key);
                console.log('value', value);
                let tmpRank = Number($(this).text());
                console.log('tmpRank', tmpRank);
                if (tmpRank == 2) {
                    let tmpTr = $(this).parent();
                    console.log('tmpTr', tmpTr);
                    tmpTr.find('td').attr('class', 'text-danger');
                }
            });

            // const tr = $('tr');
            // tr.find('td').attr('class', 'text-danger');
            // console.log(tr.find('td'));



        });
    </script>
</body>

</html>
