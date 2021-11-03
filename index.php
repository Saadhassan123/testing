<?php

require_once("../global.php");

@$page = $_GET['page'];

global $menu;
global $subMenu;
$menu="add_company"; // ul menu active

switch($page):
    case ("company_info"):
        $subMenu='company_info';
        $content = include "companyInfo.php";
        break;
    case ("edit"):
        $subMenu='company_info';
        $content = include "companyInfoEdit.php";
        break;
    default:
        $content = "Page Not Found.";
        break;
    endswitch;


include("../header.php");
echo '<h3 class="main_heading">'. _uc($_e['Companies Information']) .'</h3>';
echo $content;

include("../footer.php");

?>