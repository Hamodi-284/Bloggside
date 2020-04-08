<?php include '../includes/database.php'?>

<?php
    session_start();
    if(isset ($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

}else {
    header('Location:login.php');
    exit();
}

$title = $_POST["title"];
$content = $_POST["content"];
$blogpostid = $_POST["id"];
$categoryids = $_POST["categoryids"];


deleteCategoriesForBlogPost($blogpostid);
foreach($categoryids as $categoryid){
    insertPostCategory($blogpostid, $categoryid);

}

updateBlogPost($blogpostid, $title, $content);

header("location: index.php");
exit();


?>