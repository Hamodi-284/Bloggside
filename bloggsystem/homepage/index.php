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
                    // Vi tar spørring mot databasen av tabellen category
                    $sql = "SELECT * FROM category";
                    // Vi henter spørringer fra databasen
                    $resultat = mysqli_query($db_connect, $sql);     
                    // Returnerer assosiativ tabell            
                    while($row = mysqli_fetch_assoc($resultat)) {
                        // Vi henter kolonnen fra spørringen av tabellen
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
                // isset() sjekker om det er true/false. Her sjekker vi om "submit" knappen eksisterer
                // isåfall, så returnerer den true
                if(isset($_POST['submit'])) {
                    // Vi tar enda en ny spørring etter vi har submitet 
                   $sql = "SELECT * 
                           FROM category 
                           INNER JOIN postcategory ON category.id = postcategory.id 
                           INNER JOIN blogpost ON  postcategory.blogpostid = blogpost.id";

                    $resultat = mysqli_query($db_connect, $sql);
                    while($row = mysqli_fetch_assoc($resultat)) {
                        $blog_name = $row['name'];
                        $blog_title = $row['title'];
                        
                        if ($_POST['kategori'] == $blog_name) {
                           echo '<p>' . $blog_title . '</p>';
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


   


