<?php include '../includes/header.php'?>
<?php include '../includes/database.php'?>

<?php
    $error= false;

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $form_username = $_POST["username"];
        $form_password = $_POST["password"];

        $user = getUser ($form_username);

        $db_username = $user['username'];
        $db_hash = $user['password'];
        $db_id = $user['id'];
        $db_role = $user['role'];

        //sjekk om bruker kan logge inn
        if ($db_hash && password_verify($form_password, $db_hash)) {

            //session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION["userid"] = $db_id;
            $_SESSION["username"] = $db_username;
            $_SESSION['role']= $db_role;

            if($db_role==2){header("location:index.php?=id''");}
            elseif($db_role != 2){header("location:user.php?=id");}


   

        }else{
            $error = true;
        }
  
    }
?>

<div class="container w-75 justify-content-center mt-5">
<?php
if ($error){

    echo '<div class="alert alert-danger m-2 role="alert">Bruker kunne ikke logge inn!</div>';
}
?>


<h2 class="mb-3">Sign in</h2>

<form action = "login.php" method="post">
<div class="form-group">
<label>Username</label>
<input type="text" name="username" class="form-control"/>
</div>
<div class="form-group">
<label>Password</label>
<input type="password" name="password" class="form-control"/>
</div>

<input type="submit" class="btn btn-primary" value="Login">
Don't have an account - <a href="../admin/registrer.php"> Register Here!

</form>
</div>
<?php include '../includes/footer.php'?>