<?php require "includes/header.php"; ?>
<?php require "config.php";?>

<?php
         $id = $_SESSION['compte'];
        $sql = $conn->query("SELECT * FROM historique where compte_user=$id");
        $sql->execute();
        $data = $sql->fetchAll(PDO::FETCH_ASSOC);

        
?>


<a class = "btn btn-success my-5" href="index.php" role = "button">Back</a>
        <br>
        <table class = "table">
        <thead>
                <tr>
                    <th>compte user</th>
                    <th>username</th>
                    <th>destinataire</th>
                    <th>money</th>
                    <th>delivre le</th>
                    
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                        foreach ($data as $client) {
                            $tableClass = ($client['money'] < 100) ? 'table-danger' : 'table-info';
                            echo " 
                            <tr class='$tableClass'>
                                <td>{$client['compte_user']}</td>
                                <td>{$client['emetteur']}</td>
                                <td>{$client['destinataire']}</td>
                                <td>{$client['money']}</td>
                                <td>{$client['delivre_at']}</td>
                                
                            </tr>
                            ";
                        }
                        
                    

                ?>

            </tbody>

        </table>

<?php require "includes/footer.php"; ?>