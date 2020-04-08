<?php include '../includes/database.php'?>

<?php
    session_start();
    if(isset ($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

        $userId= $_SESSION["id"];

}else {
    header('Location:index.php');
    exit();
   
}

$id = $_GET["id"];
$blogpostid = $_GET["id"];
deleteCategoriesForBlogPost($blogpostid);
DeleteBlogPost($id);

header("location: index.php");
exit();

?>