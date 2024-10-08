<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/x-icon" href="/assets/logo-vt.svg" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin - Login</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
</head>

<body class="bg-grey-900 d-flex justify-content-center align-items-center vh-100">
    <form action="" method="POST">

    <?php
     if(isset($errorLogin)){
         echo $errorLogin;
     }

    ?>
    <div class="bg-white p-5 rounded-5 text-secondary shadow" style="width: 25rem">
        <div class="d-flex justify-content-center">
            <i class='fas fa-code' style='font-size:48px;'></i>

        </div>
        <div class="text-center fs-1 fw-bold">Login</div>
        <div class="input-group mt-4">
            <div class="input-group-text bg-info">
                <i class='fas fa-user-alt'></i>

            </div>
            <input class="form-control bg-light" type="text" placeholder="Username" name="username"/>
        </div>
        <div class="input-group mt-1">
            <div class="input-group-text bg-info">
                <i class='fas fa-lock'></i>
            </div>
            <input class="form-control bg-light" type="password" placeholder="Password" name="password"/>
        </div>
        <div class="d-flex justify-content-around mt-1">
            <div class="d-flex align-items-center gap-1">

                <button type="submit" class="btn btn-primary">
                    Iniciar
                </button>

            </div>
            </form>


</body>

</html>