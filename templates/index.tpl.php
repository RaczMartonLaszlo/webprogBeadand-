<?php session_start(); ?>
<?php if (file_exists('./logicals/' . $search['file'] . '.php')) {
    include("./logicals/{$search['file']}.php");
} ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title><?= $title['title'] . ((isset($title['loggedin'])) ? ('|' . $title['loggedin']) : '') ?></title>
    <link rel="stylesheet" href="./styles/index.css" type="text/css">
    <?php if (file_exists('./styles/' . $search['file'] . '.css')) { ?>
        <link rel="stylesheet" href="./styles/<?= $search['file'] ?>.css" type="text/css"><?php } ?>
</head>

<body>
    <header>
        <?php if (isset($header['loggedin'])) { ?><h2><?= $header['loggedin'] ?></h2><?php } ?>
        <?php if (isset($_SESSION['login'])) { ?>Bejlentkezett: <strong><?= $_SESSION['firstName'] . " " . $_SESSION['lastName'] . " (" . $_SESSION['login'] . ")" ?></strong><?php } ?>
    </header>
    <div id="page">
        <div id="sidebar">
            <nav>
                <ul>
                    <li id=menuTop>&nbsp</li>
                    <?php foreach ($pages as $url => $page) { ?>
                        <?php if (!isset($_SESSION['login'])) { ?>

                            <li id="menuEntry" <?= (($page == $search) ? ' class="active"' : '') ?>>
                                <a href="<?= ($url == '/') ? '.' : ('?page=' . $url) ?>">
                                    <?= $page['text'] ?></a>
                            </li>
                        <?php } ?>
                    <?php } ?>
                    <li id=menuBottom>&nbsp</li>
                </ul>
            </nav>
        </div>
        <div id="content">
            <?php include("./templates/pages/{$search['file']}.tpl.php"); ?>
        </div>
    </div>
    <footer>
        <?php if (isset($footer['copyright'])) { ?>&copy;&nbsp;<?= $footer['copyright'] ?> <?php } ?>
        <a href="http://www.dmta.hu">Eredeti weboldal</a>
    </footer>
</body>

</html>