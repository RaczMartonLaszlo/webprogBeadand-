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
        <?php if (isset($_SESSION['loginName'])) { ?>Bejlentkezett: <strong><?= $_SESSION['firstName'] . " " . $_SESSION['lastName'] . " (" . $_SESSION['loginName'] . ")" ?></strong><?php } ?>
        <div id="search">
            <script>
                (function() {
                    var cx = '009986907123990620210:non66d-ckxm';
                    var gcse = document.createElement('script');
                    gcse.type = 'text/javascript';
                    gcse.async = true;
                    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
                    var s = document.getElementsByTagName('script')[0];
                    s.parentNode.insertBefore(gcse, s);
                })();
            </script>
            <gcse:search></gcse:search>
        </div>
    </header>
    <div id="pagestyle">
        <div id="page">
            <div id="sidebar">
                <nav>
                    <ul>
                        <li id=menuTop>&nbsp</li>
                        <?php foreach ($pages as $url => $page) { ?>
                            <?php if (($url != 'kilépés') && ($url != 'belépés') && ($url != 'regisztráció') && ($url != 'belép') && ($url != 'email')) { ?>

                                <li id="menuEntry">
                                    <a href="<?= ($url == '/') ? '.' : ('?page=' . $url) ?>">
                                        <?= $page['text'] ?></a>
                                </li>
                            <?php } else if (isset($_SESSION['loginName']) && ($url == 'kilépés')) { ?>

                                <li id="menuEntry">
                                    <a href="<?= ($url == '/') ? '.' : ('?page=' . $url) ?>">
                                        <?= $page['text'] ?></a>
                                </li>
                            <?php } else if (!isset($_SESSION['loginName']) && ($url == 'belépés')) { ?>
                                <li id="menuEntry">
                                    <a href="<?= ($url == '/') ? '.' : ('?page=' . $url) ?>">
                                        <?= $page['text'] ?></a>
                                </li>
                            <?php
                        }
                    } ?>
                        <li id=menuBottom>&nbsp</li>
                    </ul>
                </nav>
            </div>
            <div id="content">
                <?php include("./templates/pages/{$search['file']}.tpl.php"); ?>
            </div>
        </div>
    </div>
    <footer>
        <?php if (isset($footer['copyright'])) { ?>&copy;&nbsp;<?= $footer['copyright'] ?> <?php } ?>
        <a href="http://www.dmta.hu">Eredeti weboldal</a>
    </footer>
</body>

</html>