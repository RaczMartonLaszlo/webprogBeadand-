<div id="email">
    <?php if (isset($_POST['nev']) && isset($_POST['email']) && isset($_POST['text'])) {
        echo ('Az üzenet adatai: <br><br>');
        echo ('Név: ' . $_POST['nev'] . '<br>');
        echo ('E-mail cím: ' . $_POST['email'] . '<br>');
        echo ('Üzenet: ' . $_POST['text']) . '<br>';
    } else {
        echo ('Az üzenet sikertelen');
    }
    ?>
</div>