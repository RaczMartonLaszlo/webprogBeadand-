<?php if(isset($row)) { ?>
    <?php if($row) { ?>
        <h1>Bejelentkezett:</h1>
        Azonosító: <strong><?= $row['username'] ?></strong><br><br>
        Név: <strong><?= $row['firstName']." ".$row['lastName'] ?></strong>
    <?php } else { ?>
        <h1>A bejelentkezés nem sikerült!</h1>
        <a href="?page=belépés" >Próbálja újra!</a>
    <?php } ?>
<?php } ?>
<?php if(isset($errormessage)) { ?>
    <h2><?= $errormessage ?></h2>
<?php } ?>
