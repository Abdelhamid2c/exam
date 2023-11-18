
<?php require "includes/header.php"; ?>
<?php require "config.php"; ?>

<?php 

  if(isset($_POST['submit'])){
    if(!$_POST['email'] || !$_POST['compte'] || !$_POST['montant'] || !$_POST['password'] || !$_POST['phone']){
      echo "all fields is required";
    }else{
      $email = $_POST['email'];
      $compte = $_POST['compte'];
      $montant= $_POST['montant'];
      $pass = $_POST['password'];
      $phone = $_POST['phone'];
      $adress = "adress";
      $username = "user";

      $insert = $conn->prepare("INSERT INTO users (email,username,phone,Adresse,password,compte,montant) 
                                VALUES (:email,:username,:phone,:Adresse,:password,:compte,:montant)
      ");

      $insert->execute([
        ':email' => $email,
        ':username' => $username ,
        ':phone' => $phone,
        ':Adresse' => $adress,
        ':password' => $pass,
        ':compte' => $compte,
        ':montant' => $montant 
      ]);
      header("location:clients.php");

    }
  }

?>


<main class="form-signin w-50 m-auto">
  <form method="POST" action="register.php">
   
    <h1 class="h3 mt-5 fw-normal text-center">New client</h1>

    <div class="form-floating " >
      <input name="email" type="email" class="form-control " id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>

    <div class="form-floating my-2 ">
      <input name="phone" type="text" class="form-control" id="floatingInput" placeholder="Phone number">
      <label for="floatingInput">Phone number</label>
    </div>
    <div class="form-floating my-2 ">
      <input name="compte" type="text" class="form-control" id="floatingInput" placeholder="compte">
      <label for="floatingInput">Compte</label>
    </div>
    <div class="form-floating my-2 ">
      <input name="montant" type="text" class="form-control" id="floatingInput" placeholder="montant">
      <label for="floatingInput">Montant</label>
    </div>
    <div class="form-floating my-2">
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <button name="submit" class="w-100 btn btn-lg btn-primary" type="submit">Ajouter</button>
    <a class="w-100 btn btn-lg btn-info my-3" href="clients.php" role ="button">Cancel</a>
  </form>
</main>

     <?php require "includes/footer.php"; ?>
