<?php
ob_start();

require_once("classes/companyInfo.class.php");
global $dbF;

$company_info  =   new company_info();

//$dbF->prnt($_POST);
//$dbF->prnt($_FILES);
//exit;
$company_info->CompanyInfoEditSubmit();
?>
<h2 class="sub_heading"><?php echo _uc($_e['Update']); ?></h2>

<?php $company_info->companyInfoEdit(); ?>

<?php return ob_get_clean(); ?>