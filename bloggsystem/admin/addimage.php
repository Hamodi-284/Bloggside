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

<h1>Add image to existing post</h1>

<form action="imageadded.php" method="POST">
  <div class=" form-group custom-file">
  <label class="custom-file-label" for="customFile">Insert file</label>
  <input type="file" class="form-control custom-file-input" id="customFile" placeholder="Insert file" name="file">
</div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Add new image</button>
  </div>
</form>
</div>



<?php include '../includes/footer.php'?>