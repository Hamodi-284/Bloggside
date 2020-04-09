<?php 
    include '../includes/database.php';
    include '../includes/help_functions.php';
    $db_connect = db_connect();
?>

<?php 

    
?>

<?php topHTML()?>

<?php include '../includes/navbar.php'?>

<div class="container">
    <div class="row">
        <div class="col-xl-12">
            
        </div>
    </div> <!-- END row -->
</div> <!-- END Container -->




<?php 
    bottomHTML();
    db_close($db_connect);
?>


   


