<?php include '../includes/header.php'?>
<?php include '../includes/database.php'?>

<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $form_username = $_POST["username"];
        $form_password = $_POST["password"];

        $hashed_password = password_hash($form_password, PASSWORD_BCRYPT);

        $success = createUser($form_username, $hashed_password);

     if ($success) {
         header('location:login.php');
     } if (!$success) {
        echo '<div class="alert alert-danger m-2" role="alert">Bruker kunne ikke registeres inn!</div>';
    }
    }
?>


<div class="container w-75 justify-content-center mt-5">

<h2 class="mb-3">Registrer</h2>

<form action = "registrer.php" method="post">
<div class="form-group">
<label>Username</label>
<input type="text" name="username" class="form-control" required="true"/>
</div>
<div class="form-group">
<label>Password</label>
<input type="password" name="password" class="form-control" required="true"/>
</div>

<input type="submit" class="btn btn-primary" value="Registrer"/>

</form>

</div>



<?php include '../includes/footer.php'?>

