<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
</head>
<body>

    <h1>Login to view posts</h1>

    <form action="/login" method="POST">
        @csrf
        <input type="text" name="username" placeholder="username">
        <input type="password" name="password" placeholder="password">
        <button>submit</button>
    </form>

    <h2>or, register if you have no account</h2>

    <form action="/register" method="POST" id="register">
        @csrf
        <input type="text" name="username" placeholder="username">
        <input type="password" name="password" placeholder="password">
        <br>
        <br>
        Choose your role:
        <br>
        <label for="teacher_role">Teacher</label>
        <input type="radio" id="teacher_role" name="role" value="teacher">

        <br>
        <label for="student_role">Student</label>
        <input type="radio" name="role" value="student">

        <br>
        <br>
        <button>submit</button>
    </form>

    
</body>

<script type="text/javascript">
    $(document).ready(function(){
        $("#register").validate({
                rules: {
                    username: {
                        required: true,
                        maxlength: 60,
                    },
                    password: {
                        required: true
                    },
                    role: {
                        required: true,
                    }
                },
                messages: {
                    username: {
                        required: "username field is required",
                        maxlength: "Name field cannot be more than 60 characters"
                    },
                    password: {
                        required: "password field is required"
                    },
                    role: {
                        required: "role field is required"
                    }
                }
            });
    });
</script>
</html>