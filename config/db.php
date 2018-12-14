<div class="sectie-main">
    <div class="sectie-inner">
        <div class="box-1">
            <?php include_once 'connection.php' ?>
        </div>
        <div class="box-2">
            <?php
            // select all users
            $db = new PDO("sqlsrv:Server=localhost;Database=FLETNIX", "sa", "joris123");

            $stmt = $db->query("SELECT * FROM Person");

            while ($row = $stmt->fetch()) {
                echo $row['person_id']."\n" . $row['firstname']."\n" . $row['lastname']."\n" . $row['gender']."<br />\n";
            }
            ?>
        </div>
    </div>
</div>