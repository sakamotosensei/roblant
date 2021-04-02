<?php
include_once(__DIR__ . "/classes/User.php");
session_start();

//nieuwe gebruiker aanmaken
// als $_POST niet leeg is
if (!empty($_POST)) {
    try {
        //nieuwe user via class User()
        $user = new User();
        //set alle variabelen 
        $user->setFirstname($_POST['firstname']);
        $user->setLastname($_POST['lastname']);
        $user->setEmail($_POST['email']);
        $user->setPassword($_POST['password']);

        //save nieuwe gebruiker
        $user->save();

    } catch (\Throwable $th) {
        //loopt er iets fout -> error message
        $error = $th->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon"
href="Images\favicon-16x16.png"  type="image/gif" sizes="16x16">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>
    <div class="containerw-50">
        <?php if (isset($error)) : ?>
            <div class="alert alert-danger" role="alert">
                <p>
                    <?php echo $error ?>
                </p>
            </div>
        <?php endif; ?>
    </div>

    <div class="containerw-50">
        <?php if (isset($success)) : ?>
            <div class="alert alert-success" role="alert">
                <p>
                    <?php echo $success ?>
                </p>
            </div>
        <?php endif; ?>
    </div>

    <div class="container w-25 mt-5">
        <h6>        <a class="nav-link" href="index.html"> <img class="mb-4" src="Images/roblant.png" alt="" width="200" height="35"> </a>
</h6>
        <h4 class="mb-4">Maak een nieuw account aan</h4>
        <form method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Voornaam</label>
                <input name="firstname" class="form-control" placeholder="Voornaam">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Achternaam</label>
                <input name="lastname" class="form-control" placeholder="Achternaam">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">E-mailadres</label>
                <input name="email" class="form-control" placeholder="E-mailadres">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Wachtwoord</label>
                <input name="password" type="password" class="form-control" placeholder="Wachtwoord">
            </div>

            <input type="submit" class="btn btn-primary" value="Aanmelden">
        </form>
    </div>

</body>

</html>