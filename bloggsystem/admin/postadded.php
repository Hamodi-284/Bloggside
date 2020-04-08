<?php include '../includes/database.php'?>

<?php
    session_start();
    if(isset ($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

        $userId= $_SESSION["userid"];

}else {
    header('Location:index.php');
    exit();
   
}

$title = $_POST["title"];
$content = $_POST["content"];

insertBlogPost($title, $content, $userId);

header("location: index.php");
exit();

?>