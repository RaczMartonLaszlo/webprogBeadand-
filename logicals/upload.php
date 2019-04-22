<!DOCTYPE html>
<html>

<body>
    <?php
    if (($_FILES['file']['type'] == 'image/gif') || ($_FILES['file']['type'] == 'image/jpeg')) {
        if ($_FILES['file']['error'] > 0) {
            echo 'Return Code: ' . $_FILES['file']['error'] . '<br>';
        } else {
            if (file_exists('../images/gallery/' . $_FILES['file']['name'])) {
                echo $_FILES['file']['name'] . ' már létezik. ';
            } else {
                move_uploaded_file($_FILES['file']['tmp_name'], '../images/gallery/' . $_FILES['file']['name']);
                echo 'Kép feltöltve';
            }
        }
    } else {
        echo 'Invalid file';
    } ?>
    <a href="../?page=képgaléria">Vissza a galériára</a>
</body>

</html>