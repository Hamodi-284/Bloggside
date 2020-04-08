<?php

    session_start();

    if(isset ($_SESSION['loggedin']) == true && $_SESSION['role'] != 2){
    $bloglink = '<a class="navbar-brand" href="../homepage/index.php">Blogg</a>';
    $link ='<a class="nav-link" href="logout.php">Log out ' . $_SESSION['username'] . '</a>';
    $adminlink ='<a class="nav-link" href="../admin/user.php">User</a>';
    $searchlink ='<a class="nav-link" href="../admin/index.php">Search</a>';

    }elseif(isset ($_SESSION['loggedin']) == true && $_SESSION['role'] = 2){
      $bloglink = '<a class="navbar-brand" href="../homepage/index.php">Blogg</a>';
      $link ='<a class="nav-link" href="logout.php">Log out ' . $_SESSION['username'] . '</a>';
      $adminlink ='<a class="nav-link" href="../admin/index.php">Admin</a>';
      $searchlink ='<a class="nav-link" href="../admin/index.php">Search</a>';
  
 
}else{
    $bloglink = '<a class="navbar-brand" href="../homepage/index.php">Blogg</a>';
    $link = '<a class="nav-link" href="../admin/login.php">Login <span class="sr-only">(current)</span></a>';
    $adminlink = "";
    $searchlink = "";
}

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogg</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
      <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
    <?php echo $bloglink?>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
          <?php echo $adminlink?></li>
          <li class="nav-item">
          <?php echo $searchlink?></li>
          <li class="nav-item active">
          <?php echo $link?></li>
        </ul>
      </div>
    </div>
  </nav>

</body>
</html>