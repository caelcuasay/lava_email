<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm</title>
    <link rel="stylesheet" href="public\Assets\node_modules\bootstrap\dist\css\bootstrap.min.css">
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
            <form action="<?= site_url('/activate')?>" method="POST">
            <?php flash_alert(); ?>
                <div class="form-group ">
             
                    <div class="from-row">
                            <label for="code">Code </label>
                            <input class="form-control" type="text" name="code" placeholder="Enter Code" required>
                <button class="form-control btn btn-primary my-2" type="submit">Confirm</button><br>

            </form>
            <button class="btn btn-primary px-5"><a href="/resend" class="text-light text-decoration-none">Resend Confirmation</a></button><br>
            <a href="/" class="text-center d-block">Go to login</a>
        </div>
    </div>
    </div>
</body>

</html>