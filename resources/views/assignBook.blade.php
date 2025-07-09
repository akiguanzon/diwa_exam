<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Assign Books to Students</title>
</head>
<body>
    <h2>Assign Books to Students</h2>

    @foreach($students as $student)

    <h3>{{$student->username}}</h3>

    <form action="/assign-book/{{$book->id}}/{{$student->id}}" method="POST">
        @csrf
        <button>Assign</button>
    </form>

    @endforeach
</body>
</html>