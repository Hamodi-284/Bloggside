<?php include '../includes/header.php'?>
<?php include '../includes/database.php'?>

<?php
    if(isset ($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
}else {
    header('Location:login.php');
    exit();
}

$id = $_GET["id"];

$row = getBlogPost($id);
$categories = getAllCategories();

$title = $row['title'];
$content = $row['content'];

?>


<div class="container">

<h1>Edit post</h1>

<form action="postedited.php" method="post">
<div class="form-group">
    <label for="tittel">Title</label>
    <input type="text" class="form-control" id="title" name="title" value="<?php echo $title?>">
  </div>
  <div class="form-group">
    <label for="post">Post</label>
    <textarea class="form-control" id="post" name="content" rows="8"><?php echo $content?></textarea>
  </div>
  <input type="hidden" name="id" value="<?php echo $id ?>">

  <div class="form-group form-check">
  <?php
  foreach($categories as $category){

    $categoryid = $category['id'];
    $categoryname = $category['name'];

    echo "<input class=\"m-auto\" name=\"categoryids[]\" value=\"$categoryid\" type=\"checkbox\" class=\"form-check-input\" id=\"$categoryid\">";
    echo "<label class=\"form-check-label\" for=\"$categoryid\">$categoryname</label> "; 
  }
  ?>
  </div>


  <div class="form-group">
    <button type="submit" class="btn btn-primary">Save</button>
  </div>
</form>
</div>

<?php include '../includes/footer.php'?>