<?php require "includes/header.php"; ?>

<?php require "config.php"; ?>

<?php 

  if(isset($_SESSION['username']))
    {header("location:index.php");}

  if(isset($_POST['submit'])){
    if(!$_POST['email'] || !$_POST['username'] || !$_POST['password'] || !$_POST['compte']  || !$_POST['phone'] || !$_POST['adress'] ){
      echo "all fields is required";
    }else{
      $email = $_POST['email'];
      $user = $_POST['username'];
      $passw = $_POST['password'];
      $compte = $_POST['compte'];
      $phone = $_POST['phone'];
      $adress = $_POST['adress'];
      $mt = $_POST['montant'];

      $insert = $conn->prepare("INSERT INTO users (email,username,phone,Adresse,password,compte,montant) 
                                VALUES (:email,:username,:phone,:Adresse,:password,:compte,:montant)
      ");

      $insert->execute([
        ':email' => $email,
        ':username' => $user,
        ':phone' => $phone,
        ':Adresse' => $adress,
        ':password' => $passw,
        ':compte' => $compte,
        ':montant' => $mt           
      ]);
      header("location:index.php");
    }
  }

?>

<main class="form-signin w-50 m-auto">
  <form method="POST" action="register.php">
   
    <h1 class="h3 mt-5 fw-normal text-center">Please Register</h1>

    <div class="form-floating " >
      <input name="email" type="email" class="form-control " id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>

    <div class="form-floating my-2 ">
      <input name="username" type="text" class="form-control" id="floatingInput" placeholder="username">
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating my-2 ">
      <input name="phone" type="text" class="form-control" id="floatingInput" placeholder="Phone number">
      <label for="floatingInput">Phone number</label>
    </div>
    <div class="form-floating my-2 ">
      <input name="adress" type="text" class="form-control" id="floatingInput" placeholder="Adress">
      <label for="floatingInput">Adress</label>
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

    <button name="submit" class="w-100 btn btn-lg btn-primary" type="submit">register</button>
    <h6 class="mt-3">Aleardy have an account?  <a href="login.php">Login</a></h6>

  </form>
</main>
<?php require "includes/footer.php"; ?>
