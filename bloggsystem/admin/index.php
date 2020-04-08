<?php 
 include '../includes/header.php';
 include '../includes/database.php';
if(isset ($_SESSION['loggedin']) == true && $_SESSION['role'] == 2){
}else {
header('Location:../admin/index.php');
exit();
}

$posts = getAllBlogPosts ();
$categories = getAllCategories ();

?>


<div class="container">
<h1>Poster</h1>
<p>Her kan du adminstrere poster som brukere har lagt inn i databasen</p>
</div>

<div class="container">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Authhor</th>
      <th scope="col">Categories</th>
      <th scope="col">Creation time</th>
      <th scope="col">Changed time</th>
      <th scope="col">Image</th>
      <th scope="col">Delete post</th>
    </tr>
  </thead>
  <tbody>
  <?php
   foreach ($posts as $post){
    foreach($categories as $category){
       echo "<tr>";
       echo"<td><a href=\"editpost.php?id=" . $post['id'] . "\">". $post['title'] . "</td>";
       echo"<td>" . $post['display_name'] . "</td>";
       echo"<td>" . $category['name'] . "</td>";
       echo"<td>" . $post['creation_time'] . "</td>";
       echo"<td>" . $post['change_time'] . "</td>";
       echo"<td>" . $post['image_path'] . "</td>";
       echo"<td><a href=\"deletepost.php?id=" . $post['id'] . "\">Delete</td>";
       echo "</tr>";
   }
  }
  ?>
  </tbody>
</table>
<a href="addpost.php" class="btn btn-primary">New post</a>
<a href="addcategory.php" class="btn btn-primary">Add category</a>
<a href="addimage.php" class="btn btn-primary">Add image</a>
</div>


<?php include '../includes/footer.php'?>