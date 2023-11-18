<?php require "config.php";
    $id = $_GET['id'];
    $sql = $conn->query("DELETE from users where id = $id");
    $sql->execute();
    header("location:clients.php");

?>

