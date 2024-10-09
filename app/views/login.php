<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="public/Assets/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="public/Assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }
        .form-container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="container form-container">
        <div class="row ">
        <?php flash_alert();?>
            <div class="col-md-12 border-1 border-black">
                <form action="<?= site_url('/verify')?>" method="POST" class="w-100">
                    <div class="form-group ">
                        <label for="email">Email: </label>
                        <input class="form-control" type="email" name="email" required><br>
                        <label for="password">Password: </label>
                        <input class="form-control" type="password" name="password" required><br>
                        <button class="form-control btn btn-primary" type="submit">Login</button><br>
                        <a href="/register" class="text-center d-block">Register</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</body>

</html>
