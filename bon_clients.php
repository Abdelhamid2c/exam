<?php require "config.php"; ?>
<?php require "includes/header.php"; ?>

<?php
         
        $sql = $conn->query("SELECT * FROM users where montant > 10000");
        $sql->execute();
        $data = $sql->fetchAll(PDO::FETCH_ASSOC);

        if(!$data){
            die("no result : " . $conn>connect_error);
        }
?>



<a class = "btn btn-success my-5" href="index.php" role = "button">Back</a>
        <br>
        <table class = "table">
        <thead>
                <tr>
                    <th>username</th>
                    <th>email</th>
                    <th>Phone</th>
                    <th>compte</th>
                    <th>montant</th>
                    <th>created At</th>
                    
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                        foreach ($data as $client) {
                            $tableClass = ($client['montant'] < 10000) ? 'table-danger' : 'table-info';
                            echo " 
                            <tr class='$tableClass'>
                                <td>{$client['username']}</td>
                                <td>{$client['email']}</td>
                                <td>{$client['phone']}</td>
                                <td>{$client['compte']}</td>
                                <td>{$client['montant']}</td>
                                <td>{$client['created_at']}</td>
                                <td>
                                    <a class='btn btn-danger btn-sm' href='supprimer.php?id={$client['id']}'>Delete</a>
                                </td>
                            </tr>
                            ";
                        }
                        
                    

                ?>

            </tbody>

        </table>

        <?php require "includes/footer.php"; ?>
