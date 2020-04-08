<?php include '../includes/header.php'?>
<?php include '../includes/database.php'?>

<?php
    if(isset ($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
}else {
    header('Location:login.php');
    exit();
}

?>

<div class="container">

<h1>Add new category</h1>

<form action="categoryadded.php" method="GET">
<div class="form-group">
    <label for="tittel">Category name</label>
    <input type="text" class="form-control" id="Title" placeholder="Name a category here" name="category">
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Add new category</button>
  </div>
</form>
</div>

<?php include '../includes/footer.php'?>