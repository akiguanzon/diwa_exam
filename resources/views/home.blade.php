<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>

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
        
    <h2>Create a new book</h2>
    <form action="/create-book" method="POST" id="createBook">
        @csrf
        <label for="title">Title</label><br>
        <input type="text" name="title" placeholder="name" id="title">
        <br><br>
        <label for="description">Description</label><br>
        <textarea name="description" id="description"></textarea>
        <br><br>
        <label for="image">Cover Image</label><br>
        <input type="text" name="image_link" placeholder="cover image url here" id="image">
        <br><br>
        <button>Submit</button>
    </form>


    <div>
        <h2>All books</h2>

        @foreach ($books as $book)

        <h3>{{$book['title']}}</h3>
        {{$book['description']}}
        <br>
        <br>
        <img src="{{$book['image_link']}}" alt="cover_image">

        <form action="/assign-book/{{$book->id}}" method="GET">
            @csrf
            <button>Assign Book</button>
        </form>

            
        @endforeach
    </div>
</body>


<script type="text/javascript">
    $(document).ready(function(){
        $("#createBook").validate({
                rules: {
                    title: {
                        required: true,
                        maxlength: 60,
                    },
                    description: {
                        required: true
                    },
                    image_link: {
                        required: true,
                    }
                },
                messages: {
                    title: {
                        required: "Name field is required",
                        maxlength: "Name field cannot be more than 60 characters"
                    },
                    description: {
                        required: "Description field is required"
                    },
                    image_link: {
                        required: "Image Link field is required"
                    }
                }
            });
    });
</script>

</html>