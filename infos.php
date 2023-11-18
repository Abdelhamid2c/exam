<?php require "includes/header.php"; ?>
<?php require "config.php"; ?>

<?php
        $id =  $_SESSION['id'];
        $login = $conn->query("SELECT * FROM users WHERE id = $id");
        $login->execute();
        $data = $login->fetch(PDO::FETCH_ASSOC);

    if(isset($_POST['save'])){
        $username = $_POST["username"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $address= $_POST["address"];
        $password = $_POST["password"];
        


        $update = $conn->prepare( "UPDATE users 
        SET username = :username,
            email = :email,
            phone = :phone,
            Adresse = :Adresse,
            password = :password 
        WHERE id = $id");

        $update->execute([
            ':username' => $username,
            ':email' => $email,
            ':phone' => $phone,
            ':Adresse' => $address,
            ':password' => $password         
        ]);




        
    header("Location: ".$_SERVER['PHP_SELF']);
}
?>


<div class="container mt-5">
    <h2>User Information</h2>
    <form method="post" >
        <div class="form-group">
            <label for="username">Username:</label>
            <input  type="text" class="form-control" id="username" name="username" value="<?php echo $data['username']; ?>">
        </div>
        <div class="form-group my-2">
            <label for="email">Email:</label>
            <input  type="email" class="form-control" id="email" name="email" value="<?php echo $data['email']; ?>">
        </div>
        <div class="form-group my-2">
            <label for="phone">Phone:</label>
            <input  type="text" class="form-control" id="phone" name="phone" value="<?php echo $data['phone']; ?>">
        </div>
        <div class="form-group my-2">
            <label for="address">Address:</label>
            <input type="text" class="form-control" id="address" name="address" value="<?php echo $data['Adresse']; ?>">
        </div>
        <div class="form-group my-2">
            <label for="password">Password:</label>
            <input type="text" class="form-control" id="password" name="password" value="<?php echo  $data['password']; ?>">
        </div>
        <div class="form-group my-2">
            <label for="montant">Montant:</label>
            <input type="text" class="form-control" id="montant" name="montant" value="<?php echo $data['montant']; ?>" disabled>
        </div>
        <button name ="save" type="submit" class="btn btn-primary my-3">Save Changes</button>
        <a class = "btn btn-success my-5" href="index.php" role = "button">Back</a>
    </form>
</div>

</body>
</html>


<?php require "includes/footer.php"; ?>

