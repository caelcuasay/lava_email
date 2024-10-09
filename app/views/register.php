<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="public/Assets/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="public/Assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
        }

        .form-container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container form-container">
        <div class="row ">
            <form action="/signup" method="POST">
            <?php flash_alert(); ?>
                <div class="form-group ">
             
                    <div class="from-row">
                        <div class="col">
                            <label for="first_name">First Name: </label>
                            <input class="form-control" type="text" name="first_name" required>
                        </div>
                        <div class="col">
                            <label for="last_name">Last Name: </label>
                            <input class="form-control" type="text" name="last_name" required>
                        </div>
                    </div>
                </div>
                <label for="email">Email: </label>
                <input class="form-control" type="email" name="email" required><br>
                <label for="password">Password: </label>
                <input class="form-control" type="password" name="password" required><br>
                <label for="con_password">Confirm Password: </label>
                <input class="form-control" type="password" name="con_password" required><br>
                <button class="form-control btn btn-primary" type="submit">Sign Up</button><br>

                <a href="/" class="text-center d-block">Go to login</a>

            </form>
        </div>
    </div>
    </div>
</body>

</html>