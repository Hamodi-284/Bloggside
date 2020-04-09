<?php 
    include '../includes/database.php';
    include '../includes/help_functions.php';
    $db_connect = db_connect();
?>

<?php topHTML()?>


<?php include '../includes/navbar.php'?>

<div class="container">
    <div class="row">
        <div class="col-xl-12">
            
            <label for="kategori">Kategori</label>
            <form action="">
            <select name="katnr">
                <?php 
                    $sql = "SELECT * FROM category";
                    $resultat = mysqli_query($db_connect, $sql);                                    
                    while($row = mysqli_fetch_assoc($resultat)) {
                        // Generer Nedtrekk Liste
                        $cat_id = $row['id'];
                        $cat_name = $row['name'];
                        echo "<option value=$cat_id>" . $cat_name ."</option>";
                    }
                    ?>
                </select>
            </form>

        </div>
    </div> <!-- END row -->
</div> <!-- END Container -->




<?php 
    bottomHTML();
    db_close($db_connect);
?>


   


