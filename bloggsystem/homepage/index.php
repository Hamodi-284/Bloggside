<?php 
    include '../includes/database.php';
    include '../includes/help_functions.php';
    $db_connect = db_connect();
?>

<?php topHTML()?>


<?php include '../includes/navbar.php'?>

<div class="container">
    <div class="row">
        <div class="col-xl-6">
            <label for="kategori">Kategori</label>
            <form action="" method="post">
            <select name="kategori" id="kategori">';
                <?php 
                    $sql = "SELECT * FROM category";
                    $resultat = mysqli_query($db_connect, $sql);                                    
                    while($row = mysqli_fetch_assoc($resultat)) {
                        // Generer Nedtrekk Liste
                        $cat_name = $row['name'];
                        echo "<option value=$cat_name>" . $cat_name ."</option>";
                    }
                    ?>
                    </select>
                <input type="submit" name="submit" class="btn btn-primary btn-sm">
            </form>
        </div>
        <div class="col-xl-6">
            <?php 
                if(isset($_POST['submit'])) {
                   $sql = "SELECT * 
                           FROM category 
                           INNER JOIN postcategory ON category.id = postcategory.id 
                           INNER JOIN blogpost ON  postcategory.blogpostid = blogpost.id";

                    $resultat = mysqli_query($db_connect, $sql);

                    while($row = mysqli_fetch_assoc($resultat)) {
                        $blog_name = $row['name'];
                        $blog_title = $row['title'];
                        switch ($_POST['kategori'] == $blog_name) {
                        case $blog_name:
                           echo '<p>' . $blog_title . '</p>';
                           break;
                        default:
                           # code...
                           break;
                        }
                    } 
                } 
            ?>
        
        </div>
    </div> <!-- END row -->
</div> <!-- END Container -->




<?php 
    bottomHTML();
    db_close($db_connect);
?>


   


