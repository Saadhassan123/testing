<?php

if(isset($_GET['page'])){
    require_once(__DIR__ . "/classes/companyInfo_ajax.class.php");
    $page=$_GET['page'];

    $ajax=new companyInfo_ajax();
    switch($page){
        case 'deleteInfo':
            $ajax->deleteInfo();
        break;

    }
}

?>