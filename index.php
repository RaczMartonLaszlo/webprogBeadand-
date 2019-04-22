<?php
include('./includes/config.inc.php');
$search = current($pages);
if (isset($_GET['page'])) {
    if(isset($pages[$_GET['page']]) && file_exists("./templates/pages/{$pages[$_GET['page']]['file']}.tpl.php")){
        $search=$pages[$_GET['page']];
    }
    else{
        $search=$err404;
        header("404 not found");
    }

}
include('./templates/index.tpl.php');
