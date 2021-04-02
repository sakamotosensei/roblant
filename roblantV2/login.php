<?php
// Initialize the session
session_start();

include_once(__DIR__ . "/classes/User.php");

if (!empty($_POST)) {
    //try log in
    try {
        $user = new User();
        $user->login();
        //vergelijk input met database

    } catch (\Throwable $th) {
        //fail? -> error message
        $error = $th->getMessage();
        //succes?-> redirect to homepage

    }
}





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="icon"
  href="https://scontent.xx.fbcdn.net/v/t1.15752-9/cp0/157413601_185207036407103_4296700930398236376_n.png?_nc_cat=103&ccb=1-3&_nc_sid=aee45a&_nc_ohc=ywzys6Bm3GYAX8PcwBm&_nc_ad=z-m&_nc_cid=0&_nc_ht=scontent.xx&_nc_tp=30&oh=1a4b32ba3856484beb1a2a023bc92775&oe=606868AF"
  type="image/gif" sizes="16x16">

</head>

<body>
    <div class="container w-50">
        <?php if (isset($error)) : ?>
            <div class="alert alert-danger" role="alert">
                <p>
                    <?php echo $error ?>
                </p>
            </div>
        <?php endif; ?>
    </div>

    <div class="container w-25 mt-5 mx-auto">
        <h4><a class="nav-link" href="index.html"> <img class="mb-4" src="Images/roblant.png" alt="" width="200" height="35"> </a></h4>
        <h2 class="mb-4">Log in</h2>
        <form method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">E-mailadres</label>
                <input name="email" class="form-control" placeholder="E-mailadres">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Wachtwoord</label>
                <input name="password" type="password" class="form-control" placeholder="Wachtwoord">
            </div>

            <input type="submit" class="btn btn-primary mt-3" value="Log in">
        </form>
    </div>

    <div class="container w-25 mt-2 mx-auto">
        <a class="btn btn-outline-secondary" href="signup.php" role="button">Maak een account</a>

    </div>

</body>

</html>