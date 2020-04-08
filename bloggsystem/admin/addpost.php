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

<form action="postadded.php" method="post">
<div class="form-group">
    <label for="tittel">Tittel</label>
    <input type="text" class="form-control" id="Title" placeholder="Add title here" name="title">
  </div>
  <div class="form-group">
    <label for="post">Tekst</label>
    <textarea class="form-control" id="Post" name="content" rows="10"></textarea>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Add a post</button>
  </div>
</form>
</div>

<?php include '../includes/footer.php'?>