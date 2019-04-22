<br>
<div id="képgaléria">
    <h2>Kép feltöltése:</h2>
    <form action="./logicals/upload.php" method="post" enctype="multipart/form-data">
        <label for="file">Fájlnév:</label>
        <input type="file" name="file" id="file">
        <br>
        <input type="submit" name="submit" value="Feltölt">
    </form>
    <h2>Galéria:</h2>
    <?php
    define('IMAGEPATH', 'images/gallery/');

    if (is_dir(IMAGEPATH)) {
        $handle = opendir(IMAGEPATH);
    } else {
        echo 'No image directory';
    }

    $directoryfiles = array();
    while (($file = readdir($handle)) !== false) {
        $directoryfiles[] = $file;
    }

    foreach ($directoryfiles as $directoryfile) {
        if (strlen($directoryfile) > 3) {
            echo '<img src="' . IMAGEPATH . $directoryfile . '" alt="' . $directoryfile . '" /> <br>';
        }
    }

    closedir($handle); ?>
</div>