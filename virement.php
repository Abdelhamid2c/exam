<?php require "includes/header.php"; ?>
<?php require "config.php";?>


<?php 


  if(isset($_POST['submit'])){      
    if(!$_POST['compte_dest'] || !$_POST['montant_dist'] ){
      echo "all fields are required !!";
    }else if($_POST['compte_dest'] == $_SESSION['compte']){
        echo "impossible d'envoyer pour le meme compte";
    }else{
        if($_SESSION['montant'] < $_POST['montant_dist']){
            echo "
             <div class='alert alert-danger' role='alert'>
                solde insuffisant!
             </div>
            " ;
            
        }else{
    
        $compte_dest= $_POST['compte_dest'];
        $montant_dist = $_POST['montant_dist'];
        $mid = $_SESSION['compte'];

        $sql = $conn->query("UPDATE users SET montant = montant + $montant_dist/2   WHERE compte = '$compte_dest'");
        $sql->execute();
        
        $sql = $conn->query("UPDATE users SET montant = montant - $montant_dist/2   WHERE compte = '$mid'");
        $sql->execute();    


        $insert = $conn->prepare("INSERT INTO historique (compte_user,emetteur,destinataire,money) 
                                  VALUES (:compte_user,:emetteur,:destinataire,:money)
        ");
  
        $insert->execute([
          ':compte_user' => $_SESSION['compte'],
          ':emetteur' => $_SESSION['username'],
          ':destinataire' => $compte_dest,
          ':money' => $montant_dist         
        ]);


            echo "
            <div class='alert alert-success' role='alert'>
             Votre virement a été transféré avec succès. Merci pour votre transaction !
            </div>
           " ;
       

      }
    }}

?>

<div class="container mt-5">
    <h2>Transférer de l'argent</h2>
    <!-- <?php echo $_SESSION['username']." ".$_SESSION['montant']." ".$_SESSION['compte'];?> -->
    <form method="post">
        <div class="form-group my-3">
            <label for="numeroCompte">Numéro de compte du destinataire :</label>
            <input name="compte_dest" type="text" class="form-control" id="numeroCompte" placeholder="Entrez le numéro de compte">
        </div>
        <div class="form-group my-3">
            <label for="montant">Montant à transférer :</label>
            <input name = "montant_dist" type="text" class="form-control " id="montant" placeholder="Entrez le montant">
        </div>
        <button name = 'submit' type="submit" class="btn btn-primary my-3">Transférer</button>
        <a class = "btn btn-success my-5" href="index.php" role = "button">Back</a>
    </form>
</div>



<?php require "includes/footer.php"; ?>
