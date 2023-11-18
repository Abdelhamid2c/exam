<?php require "includes/header.php"; ?>

<?php 

    if(isset($_SESSION['username'])){
        if($_SESSION['user_type']=='A'){
            echo "Bonjour Mr " . $_SESSION['username'];
?>
    <div id="card" style="display: flex;justify-content: space-around;align-items: center;">

<div style="height: 30px; padding-top: 10%; padding-left: 10px;">
    <div class="card" style="width: 17rem;">
        <div class="card-body">
            <a style="cursor: auto; display: flex; justify-content: center; align-items: center;" class="btn btn-success" href="clients.php">
                <i class="bi bi-person"></i> <!-- Icône Bootstrap (utilisez la classe de l'icône souhaitée) -->
                <div style="font-size: 20px; margin-left: 10px;">
                    Afficher tous les clients
                </div>
            </a>
        </div>
    </div>
</div>


<div style="height: 30px;padding-top: 10%;padding-left: 10px;">
    <div class="card" style="width: 20rem;">
        
        <div class="card-body">
          <a style="cursor:auto; display: flex;justify-content: center;align-items: center;" class="btn btn-warning " href="bon_clients.php">
            <div  style="font-size: 20px;">
                Afficher tous les bons clients
            </div>
          </a>
        </div>
    </div>
</div> 

<div style="height: 30px;padding-top: 10%;padding-left: 10px;">
    <div class="card" style="width: 17rem;">
        
        <div class="card-body">
          <a style="cursor:auto; display: flex;justify-content: center;align-items: center;" class="btn btn-info " href="ajouter.php">
            <div  style="font-size: 20px;">
                Ajouter un client
            </div>
          </a>
        </div>
    </div>
</div>

<div style="height: 30px;padding-top: 10%;padding-left: 10px;">
    <div class="card" style="width: 17rem;">
        
        <div class="card-body">
          <a style="cursor:auto; display: flex;justify-content: center;align-items: center;" class="btn btn-danger" href="supprimer.php">
          <i class="bi bi-trash"></i>
            <div  style="font-size: 20px;">
                Supprimer un client
            </div>
          </a>
        </div>
    </div>
</div>
</div>
<?php
        }else{
            echo "Bonjour Mr " . $_SESSION['username']."<br>";
            //echo "Votre Solde est le "."<strong id='my-5'>".$_SESSION['montant']."</strong>";
?>
    <div id="card" style="display: flex;justify-content: space-around;align-items: center;">

<div style="height: 30px;padding-top: 10%;padding-left: 10px;">
    <div class="card" style="width: 17rem;">
    <!-- <img src="..." class="card-img-top" alt="..."> -->
        <div class="card-body">
          <a style="cursor:auto; display: flex;justify-content: center;align-items: center;" class="btn btn-success" href="virement.php">
            <div  style="font-size: 20px;" >
                virement
            </div>
          </a>
        </div>
    </div>
</div> 

<div style="height: 30px;padding-top: 10%;padding-left: 10px;">
    <div class="card" style="width: 20rem;">
        
        <div class="card-body">
          <a style="cursor:auto; display: flex;justify-content: center;align-items: center;" class="btn btn-warning " href="infos.php">
            <div  style="font-size: 20px;">
                Information personnelles
            </div>
          </a>
        </div>
    </div>
</div> 

<div style="height: 30px;padding-top: 10%;padding-left: 10px;">
    <div class="card" style="width: 17rem;">
        
        <div class="card-body">
          <a style="cursor:auto; display: flex;justify-content: center;align-items: center;" class="btn btn-info " href="historique.php">
            <div  style="font-size: 20px;">
                Historique
            </div>
          </a>
        </div>
    </div>
</div>
</div>

<?php

        }
       
    }else{
        echo "hello";
        
    }

?>


<?php require "includes/footer.php"; ?>
