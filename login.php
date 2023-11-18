<?php require "includes/header.php"; ?>

<?php require "config.php"; ?>

<?php 

  if(isset($_SESSION['username']))
   { header("location:index.php");}

  if(isset($_POST['submit'])){
    if(!$_POST['email'] || !$_POST['password'] || !$_POST['user_type'] ){
      echo "all fields are required !!";
    }else if($_POST['user_type'] == 'C'){
      $email = $_POST['email'];
      $password = $_POST['password'];

      $login = $conn->query("SELECT * FROM users WHERE email='$email'");
      $login->execute();
      $data = $login->fetch(PDO::FETCH_ASSOC);
      
      if($login->rowCount() > 0){
        //password_verify($password,$data['mypassword'])
        if($data['password'] == $password ){
          $_SESSION['id'] = $data['id'];
          $_SESSION['phone'] = $data['phone'];
          $_SESSION['adress'] = $data['Adresse'];
          $_SESSION['password'] = $data['password'];
          $_SESSION['username'] = $data['username'];
          $_SESSION['email'] = $data['email'];
          $_SESSION['montant'] = $data['montant'];
          $_SESSION['compte'] = $data['compte'];
          $_SESSION['user_type'] = $_POST['user_type'];
          header("location:index.php");
        }else{
          echo "email or password is wrong";
        }
      }
    }else{
      $email = $_POST['email'];
      $password = $_POST['password'];

      if($email == 'admin.banque@g.ca' && $password == '12345')
        {$_SESSION['username'] = " CHEBEL";
        $_SESSION['user_type'] = $_POST['user_type'];
        header("location:index.php");
      }else{
        echo "email or password is wrong";
      }
    }
  }

?>

<main class="form-signin w-50 m-auto">
  <form method="post">
   
    <h1 class="h3 mt-5 fw-normal text-center">Login</h1>

    <div class="form-floating my-2">
      <input name = "email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating my-2">
      <input name = "password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <div class="form-floating my-2">
      <input type ='radio' name ="user_type" value='A'> Admin 
      <input type ='radio' name ="user_type" value='C'> Client 
    </div>
    <button name = "submit" class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <h6 class="mt-3 ">Don't have an account  <a href="register.php">Create your account</a></h6>
  </form>
</main>
<?php require "includes/footer.php"; ?>
