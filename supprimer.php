<?php require "includes/header.php"; 
?>
    <p>Voulez vous vraiment supprimer le client ?</p>
    <?php if(isset($_GET['id'])){
    ?>
        <a class="btn btn-danger" href="destroy.php?id=<?php echo $_GET['id'] ; ?>">Valider la suppression</a>
    <?php 
    }else{
        ?>
        <a class="btn btn-danger" href="clients.php">supprimer un client</a>
        
    <?php 
    } ?>
    
    <a class="btn btn-warning" href="clients.php">Annuler la suppression</a>

    <?php require "includes/footer.php"; ?>
