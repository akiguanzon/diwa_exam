<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home - Student</title>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
</head>
<body>
    <h1>You are logged in as a {{auth()->user()->role}}</h1>

    <form action="/logout" method="POST">
        @csrf
        @method('DELETE')
        <button>Log out</button>
    </form>

    

    <div>
        <h2>All assigned books</h2>

        @foreach ($books as $book)

        <h3>{{$book['title']}}</h3>
        {{$book['description']}}
        <br>
        <br>
        <img src="{{$book['image_link']}}" alt="cover_image">
            
        @endforeach
    </div>
</body>


</html>