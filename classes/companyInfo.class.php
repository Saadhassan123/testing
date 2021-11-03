<?php
require_once (__DIR__."/../../global.php"); //connection setting db
class company_info extends object_class{
public $productF;
public $imageName;
public $script_js;
public function __construct(){
parent::__construct('3');

# saving script
$this->script_js = array();


/**
* MultiLanguage keys Use where echo;
* define this class words and where this class will call
* and define words of file where this class will called
**/
global $_e;
global $adminPanelLanguage;
$_w=array();
$_w['Delete Fail Please Try Again.'] = '' ;

//index.php
$_w['Companies Information'] = '' ;
//page.php
$_w['Companies Information'] = '' ;
$_w['View Entries'] = '' ;
$_w['Draft'] = '' ;
$_w['Add New Info'] = '' ;
$_w['UnPublish Entries'] = '' ;
$_w['Manage Company Information'] = '' ;
//pageEdit.php
$_w['Update'] = '' ;

//This class
$_w['SNO'] = '' ;
$_w['COMPANY'] = '' ;
$_w['SECTOR'] = '' ;
$_w['ADDRESS'] = '' ;
$_w['WEBSITE'] = '' ;
$_w['PHONE NO'] = '' ;
$_w['LOGO'] = '' ;
$_w['UPDATE'] = '' ;
$_w['ACTION'] = '' ;

$_w['Image File Error'] = '' ;
$_w['Company Info'] = '' ;
$_w['Company Info Save Successfully'] = '' ;
$_w['Company Info Add Successfully'] = '' ;
$_w['Company Info Save Failed,Please Enter Correct Values, And unique slug'] = '' ;
$_w['Added'] = '' ;
$_w['Update'] = '' ;
$_w['Detail'] = '' ;
$_w['Page Setting'] = '' ;
$_w['Page Detail'] = '' ;

$_w['Title'] = '' ;
$_w['Page Title'] = '' ;
$_w['Sub Title'] = '' ;
$_w['Short Description'] = '' ;
$_w['Enter Short Description'] = '' ;
$_w['Enter Full Detail'] = '' ;
$_w['use : {{contactForm}} FOR CONTACT FORM'] = '' ;
$_w['use : {{careerForm}}  FOR CAREER FORM'] = '' ;
$_w['use : {{inquiryForm}}  FOR INQUIRY FORM'] = '' ;

$_w['use : {{news}} FOR Latest News'] = '' ;
$_w['use : {{event}} FOR Latest Events'] = '' ;


$_w['use : {{inquiryForm}}  FOR INQUIRY FORM'] = '' ;
$_w['use : {{inquiryForm}}  FOR INQUIRY FORM'] = '' ;
$_w['use : {{inquiryForm}}  FOR INQUIRY FORM'] = '' ;




$_w['PageLink'] = '' ;
$_w['Custom Page Slug'] = '' ;
$_w['You Can write Your Custom Page Link,Leave Blank For Default'] = '' ;
$_w['Redirect Link'] = '' ;
$_w['Allow Comment'] = '' ;
$_w['Publish'] = '' ;
$_w['Old Banner Image'] = '' ;
$_w['Page Image <br> Recommened Image Size: 1420 X 400 px'] = '' ;
$_w['SAVE'] = '' ;
$_w['BOX NAME'] = '' ;

$_w['Page Not Found For Update'] = '' ;
$_w['Image'] = '' ;
$_w['Old Image'] = '' ;
$_w['Link'] = '' ;
$_w['Link Text'] = '' ;
$_w['Update Detail'] = '' ;
$_w['Update Box'] = '' ;
$_w['Home Page Box Save Successfully'] = '' ;
$_w['Home Page Box Save Failed'] = '' ;
$_w['Home Page Box'] = '' ;
$_w['Login Required'] = '' ;
$_w['Yes'] = '' ;
$_w['No'] = '' ;
$_w['use : {{employee}} FOR EMPLOYEE PAGE'] = '' ;
$_w['use : {{files-Manager}} FOR FILES MANAGER PAGE'] = '' ;
$_w['use : {{testimonial}} FOR TESTIMONIAL PAGE'] = '' ;

$_w['use : {{albumSingle(AlbumName)}} FOR SINGLE ALBUM (Enter your album name inside ())'] = '' ;
$_w['use : {{albumAll}} FOR ALL ALBUMS'] = '' ;
$_w["use : {{albumPictures(AlbumName)}} FOR ALBUM's ALL IMAGES (Enter your album name inside ())"] = '' ;
$_w['Use Widget In Your Page'] = '' ;
$_w['Close'] = '' ;
$_w['Use Widgets'] = '' ;
$_w['Use Box Widget'] = '' ;

$_w['Description'] = '' ;
$_w['Company Detail'] = '' ;
$_w['Select Company'] = '' ;
$_w['Address'] = '' ;
$_w['Enter Address'] = '' ;
$_w['Website'] = '' ;
$_w['Enter URL'] = '' ;
$_w['Phone Number'] = '' ;
$_w['Enter Phone Number'] = '' ;
$_w['Enter Full Description'] = '' ;
$_w['Select Sector'] = '' ;
$_w['Outstanding Share Value'] = '' ;
$_w['Outstanding Share'] = '' ;
$_w['Company Name'] = '' ;
$_w['Company Symbol'] = '' ;
$_w['Symbol'] = '' ;
$_w['Name'] = '' ;
$_w['Year Ended'] = '' ;
$_w['Enter Company Symbol'] = '' ;
$_w['Enter Company Name'] = '' ;
$_w['YEAR END'] = '' ;
$_w['OUTSTANDING SHARE'] = '' ;
$_w['NAME'] = '' ;
$_w['SYMBOL'] = '' ;
$_w['Face Value'] = '' ;



$_e    =   $this->dbF->hardWordsMulti($_w,$adminPanelLanguage,'Admin Page Management');

}


public function companyInfoView(){
$sql  = "SELECT * FROM `company_info` WHERE publish = '1' ORDER BY id DESC ";
$data =  $this->dbF->getRows($sql);
$this->printViewTable($data);
}

public function companyInfoDraft(){
$sql  = "SELECT * FROM `company_info` WHERE publish = '0' ORDER BY id DESC ";
$data =  $this->dbF->getRows($sql);
$this->printViewTable($data);
}

private function printViewTable($data){
global $_e;
echo '<div class="table-responsive">
<table class="table table-hover dTable tableIBMS">
<thead>
<th>'. _u($_e['SNO']) .'</th>
<th>'. _u($_e['SYMBOL']) .'</th>
<th>'. _u($_e['NAME']) .'</th>
<th>'. _u($_e['SECTOR']) .'</th>
<th>'. _u($_e['OUTSTANDING SHARE']) .'</th>
<th>'. _u($_e['YEAR END']) .'</th>
<th>'. _u($_e['ADDRESS']) .'</th>
<th>'. _u($_e['WEBSITE']) .'</th>
<th>'. _u($_e['PHONE NO']) .'</th>
<th>'. _u($_e['LOGO']) .'</th>
<th>'. _u($_e['UPDATE']) .'</th>
<th>'. _u($_e['ACTION']) .'</th>
</thead>
<tbody>';
$i = 0;
$defaultLang = $this->functions->AdminDefaultLanguage();
foreach($data as $val){
$i++;
$id = $val['id'];
$company = $val['symbol'];
$full_name = $val['full_name'];
$otstdg_share = $val['otstdg_share'];
$year_end = $val['year_end'];
$sector = $val['sector'];
$website = $val['website'];
$phNo = $val['phNo'];
$logo = WEB_URL.'/images/'.$val['logo'];
$date_timestamp = $val['date_timestamp'];



$data = @unserialize($val['address']);
if ($data !== false) {
$address = unserialize($val['address']);


$address = $address[$defaultLang];
} else {
$address = ($val['address']);


}








echo "<tr>
<td>$i</td>
<td>$company</td>
<td>$full_name</td>
<td>$sector</td>
<td>$otstdg_share</td>
<td>$year_end</td>
<td>$address</td>
<td>$website</td>
<td>$phNo</td>
<td><img src='$logo'></td>
<td>$date_timestamp</td>
<td>
<div class='btn-group btn-group-sm'>
<a data-id='$id' href='-".$this->functions->getLinkFolder()."?page=edit&infoId=$id' class='btn'>
<i class='glyphicon glyphicon-edit'></i>
</a>
<a data-id='$id' onclick='deleteInfo(this);' class='btn'>
<i class='glyphicon glyphicon-trash trash'></i>
<i class='fa fa-refresh waiting fa-spin' style='display: none'></i>
</a>
</div>
</td>
</tr>";
}
echo '</tbody>
</table>
</div> <!-- .table-responsive End -->';
}


public function newCompanyInfoAdd(){
global $_e;
if(isset($_POST['symbol']) && isset($_POST['submit'])){
if(!$this->functions->getFormToken('newCompanyInfo')){return false;}

$this->dbF->prnt($_POST);
exit;


// if comapny change from name to ID then change file upload slug also

$symbol     = empty($_POST['symbol'])       ? ""    : $_POST['symbol'];
$name    	= empty($_POST['company_name']) ? ""    : $_POST['name'];
$otstdg_val = empty($_POST['otstdg_val'])   ? ""    : $_POST['otstdg_val'];
$face_val 	= empty($_POST['face_val'])   	? ""    : $_POST['face_val'];
$year_end   = empty($_POST['year_end'])     ? ""    : $_POST['year_end'];

$sector    	= empty($_POST['sector']) 		? ""    : $_POST['sector'];
$dsc     	= empty($_POST['dsc'])  		? ""    : serialize($_POST['dsc']);
$address    = empty($_POST['address'])      ? ""    : (serialize($_POST['address']));
$website    = empty($_POST['website'])      ? ""    : $_POST['website'];
$phNo       = empty($_POST['phNo'])    		? ""    : $_POST['phNo'];
$publish    = empty($_POST['publish'])     	? "0"   : $_POST['publish'];
$file       = empty($_FILES['logo']['name'][0])? false : true;

$returnImage    = "";

try{
$this->db->beginTransaction();
if($file){
$returnImage =  $this->functions->uploadSingleImage($_FILES['logo'],'company_logo',$symbol);
if($returnImage==false){
throw new Exception($_e['Image File Error']);
}
}
$sql      =   "INSERT INTO `company_info`(`symbol`,`full_name`,`sector`, `dsc`, `address`, `website`, `phNo`, `otstdg_share`, `year_end`, `face_val`, `logo`, `publish`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";

$array   = array($symbol,$name,$sector,
$dsc,$address,$website,
$phNo,$otstdg_val,$year_end,$face_val,$returnImage,$publish);

$this->dbF->setRow($sql,$array,false);
$lastId  =   $this->dbF->rowLastId;

$this->db->commit();
if($this->dbF->rowCount>0){
$this->functions->notificationError(_js(_uc($_e['Company Info'])),_js(_uc($_e['Company Info Save Successfully'])),'btn-success');
$this->functions->setlog(_js(_uc($_e['Added'])),_js(_uc($_e['Company Info'])),$lastId,_js(_uc($_e['Company Info Save Successfully'])));
}else{
$this->functions->notificationError(_js(_uc($_e['Company Info'])),_js(_uc($_e['Company Info Save Failed,Please Enter Correct Values, And unique slug'])),'btn-danger');
}
}catch (Exception $e){
if($returnImage!==false){
$this->functions->deleteOldSingleImage($returnImage);
}
$this->db->rollBack();
$this->dbF->error_submit($e);
$this->functions->notificationError(_js(_uc($_e['Company Info'])),_js(_uc($_e['Company Info Save Failed,Please Enter Correct Values, And unique slug'])),'btn-danger');
}
} //If end
}




public function CompanyInfoEditSubmit(){
global $_e;
if(isset($_POST['symbol']) && isset($_POST['submit'])){
if(!$this->functions->getFormToken('editPage')){return false;}

$symbol     = empty($_POST['symbol'])       ? ""    : $_POST['symbol'];
$name    	= empty($_POST['name']) 	    ? ""    : $_POST['name'];
$otstdg_val = empty($_POST['otstdg_val'])   ? ""    : $_POST['otstdg_val'];
$face_val 	= empty($_POST['face_val'])   	? ""    : $_POST['face_val'];
$year_end   = empty($_POST['year_end'])     ? ""    : $_POST['year_end'];

$sector    	= empty($_POST['sector']) 		? ""    : $_POST['sector'];
$dsc     	= empty($_POST['dsc'])  		? ""    : serialize($_POST['dsc']);
$address    = empty($_POST['address'])      ? ""    : (serialize($_POST['address']));
$website    = empty($_POST['website'])      ? ""    : $_POST['website'];
$phNo       = empty($_POST['phNo'])    		? ""    : $_POST['phNo'];
$publish    = empty($_POST['publish'])     	? "0"   : $_POST['publish'];
$file       = empty($_FILES['logo']['name'][0])? false : true;

$oldImg         = empty($_POST['oldImg'])     ? ""   : $_POST['oldImg'];
$returnImage    = $oldImg;

try{
$this->db->beginTransaction();

$lastId   =   $_POST['editId'];
if($file){
$this->functions->deleteOldSingleImage($oldImg);
$returnImage =  $this->functions->uploadSingleImage($_FILES['logo'],'company_logo',$symbol);
}

$sql      =   "UPDATE `company_info` SET
`symbol`=?,
`full_name`=?,
`sector`=?,
`dsc`=?,
`address`=?,
`website`=?,
`phNo`=?,
`otstdg_share`=?,
`year_end`=?,
`face_val`=?,
`logo`=?,
`publish`=?
WHERE id = '$lastId'
";

$array   = array($symbol,$name,$sector,
$dsc,$address,$website,
$phNo,$otstdg_val,$year_end,$face_val,$returnImage,$publish);
$this->dbF->setRow($sql,$array,false);

$this->db->commit();
if($this->dbF->rowCount>0){
$this->functions->notificationError(_js(_uc($_e['Company Info'])),_js(_uc($_e['Company Info Save Successfully'])),'btn-success');
$this->functions->setlog(_js(_uc($_e['Update'])),_js(_uc($_e['Company Info'])),$lastId,_js(_uc($_e['Company Info Save Successfully'])));
}else{
$this->functions->notificationError(_js(_uc($_e['Company Info'])),_js(_uc($_e['Company Info Save Failed,Please Enter Correct Values, And unique slug'])),'btn-danger');
}

}catch (Exception $e) {
if ($file && $returnImage !== false) {
$this->functions->deleteOldSingleImage($returnImage);
}
$this->db->rollBack();
$this->dbF->error_submit($e);
$this->functions->notificationError(_js(_uc($_e['Company Info'])), _js(_uc($_e['Company Info Save Failed,Please Enter Correct Values, And unique slug'])), 'btn-danger');
}
}
}



public function companyInfoNew(){
$this->companyInfoEdit(true);
return '';
}

public function companyInfoEdit($new = false){
global $_e;
$isEdit = false;

$companies = $this->getCompanyDetails();
$sectors = $this->getSectors();
if($new ===true){
$token       = $this->functions->setFormToken('newCompanyInfo',false);
}else {
//For Edit Page.
$isEdit = true;
$token = $this->functions->setFormToken('editPage', false);
$id = $_GET['infoId'];
$sql = "SELECT * FROM company_info where id = '$id' ";
$data = $this->dbF->getRow($sql);

if($this->dbF->rowCount==0){
echo  _uc($_e["Page Not Found For Update"]);
return false;
}

}
//No need to remove any thing,, go in developer setting table and set 0
echo '<form method="post" action="-company_info?page=company_info" class="form-horizontal" enctype="multipart/form-data">
<input type="hidden" name="editId" value="'.@$id.'"/>'.
$token.
'<div class="form-horizontal">
<!-- Nav tabs -->
<ul class="nav nav-tabs tabs_arrow" role="tablist">
<li class="active"><a href="#homeDetail" role="tab" data-toggle="tab">'. _uc($_e['Description']) .'</a></li>
<li class=""><a href="#setting" role="tab" data-toggle="tab">'. _uc($_e['Setting']) .'</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
<div class="tab-pane fade in active container-fluid" id="homeDetail">
<h2  class="tab_heading">'. _uc($_e['Company Detail']) .'</h2>
';

$lang = $this->functions->IbmsLanguages();
if($lang != false){
$lang_nonArray = implode(',', $lang);
}
echo '<input type="hidden" name="lang" value="'.$lang_nonArray.'" />';

echo '<div class="panel-group" id="accordion">';
//For Edit
if($isEdit) {

$id = $data['id'];
$sector = $data['sector'];
$website = $data['website'];
$phNo = $data['phNo'];
$logo = $data['logo'];
$date_timestamp = $data['date_timestamp'];
// $address = unserialize($data['address']);



$dataaddr = @unserialize($data['address']);
if ($dataaddr !== false) {
 $address = unserialize($data['address']);
} else {
$address = ($data['address']);
}



$datadsc = @unserialize($data['dsc']);
if ($datadsc !== false) {
 $address = unserialize($data['dsc']);
} else {
$address = ($data['dsc']);
}




// $dsc = unserialize(($data['dsc']));

$symbol = $data['symbol'];
$full_name = $data['full_name'];
$otstdg_share = $data['otstdg_share'];
$face_val = $data['face_val'];
$year_end = $data['year_end'];

}
//For Edit End



for ($i = 0; $i < sizeof($lang); $i++) {
if($i==0){
$collapseIn = ' in ';
}else{
$collapseIn = '';
}
echo '<div class="panel panel-default">
<div class="panel-heading">
<a data-toggle="collapse" data-parent="#accordion" href="#'.$lang[$i].'">
<h4 class="panel-title">
'.$lang[$i].'
</h4>
</a>
</div>
<div id="'.$lang[$i].'" class="panel-collapse collapse '.$collapseIn.'">
<div class="panel-body">';

//Symbol  
echo '  <div class="form-group">
	        <label class="col-sm-2 col-md-3  control-label">'. _uc($_e['Symbol']) .'</label>
	        <div class="col-sm-10  col-md-9">
	            <input type="text" name="symbol" value="'.@$symbol.'" class="form-control" placeholder="'. _uc($_e['Company Symbol']) .'">
	        </div>
	    </div>';

//Comapny Name
echo '  <div class="form-group">
	        <label class="col-sm-2 col-md-3  control-label">'. _uc($_e['Company Name']) .'</label>
	        <div class="col-sm-10  col-md-9">
	            <input type="text" value="'.@$full_name.'" name="name" class="form-control" placeholder="'. _uc($_e['Company Name']) .'">
	        </div>
	    </div>';

$comp_sector = $this->functions->ibms_setting('company_sector');
$comp_s = explode(',', $comp_sector);

//select Sector
echo '<div class="form-group">
<label class="col-sm-2 col-md-3  control-label">'. _uc($_e['Select Sector']) .'</label>
<div class="col-sm-10  col-md-9">
<select class="form-control selectpicker" name="sector" data-live-search="true">
<option selected disabled>Select Sector</option>
';
foreach ($sectors as $row) {
	$row_val = str_replace(' ', '-', $row['sector']);
	$selected = ($row_val == @$sector) ? 'selected' : '';
	echo '<option value="'.$row_val.'" '.$selected.'>'.$row['sector'].'</option>';
}
echo '</select>
</div></div>';

//Desc
echo ' <div class="form-group">
<label class="col-sm-2 col-md-3  control-label">'. _uc($_e['Description']) .'</label>
<div class="col-sm-10  col-md-9">
<textarea name="dsc['.$lang[$i].']" id="dsc_'.$lang[$i].'" placeholder="'. _uc($_e['Enter Full Description']) .'" class="ckeditor">'.@$dsc[$lang[$i]].'</textarea>


</div>
</div>'; 

//Address
echo ' <div class="form-group">
<label class="col-sm-2 col-md-3  control-label">'. _uc($_e['Address']) .'</label>
<div class="col-sm-10  col-md-9">
<textarea name="address['.$lang[$i].']" id="address_'.$lang[$i].'" placeholder="'. _uc($_e['Enter Address']) .'" class="form-control" >'.@$address[$lang[$i]].'</textarea>


</div>
</div>';

echo '       </div> <!-- panel-body end -->
</div> <!-- collapse end-->
</div>
';

echo '<br>';

}

echo '</div>';

echo '</div> <!-- home Tab End -->
<div class="tab-pane fade in container-fluid" id="setting">
<h2  class="tab_heading">'. _uc($_e['Page Setting']) .'</h2>
';

//Website
echo '  <div class="form-group">
	        <label class="col-sm-2 col-md-3  control-label">'. _uc($_e['Website']) .'</label>
	        <div class="col-sm-10  col-md-9">
	            <input type="url" name="website" value="'.@$website.'" class="form-control" placeholder="'. _uc($_e['Enter URL']) .'">
	        </div>
	    </div>';

//Phone Number
echo '  <div class="form-group">
	        <label class="col-sm-2 col-md-3  control-label">'. _uc($_e['Phone Number']) .'</label>
	        <div class="col-sm-10  col-md-9">
	            <input type="text" name="phNo" value="'.@$phNo.'" class="form-control" placeholder="'. _uc($_e['Enter Phone Number']) .'" pattern="[0-9]+">
	        </div>
	    </div>';

//Outstanding Share
echo '  <div class="form-group">
	        <label class="col-sm-2 col-md-3  control-label">'. _uc($_e['Outstanding Share']) .'</label>
	        <div class="col-sm-10  col-md-9">
	            <input type="text" value="'.@$otstdg_share.'" name="otstdg_val" class="form-control" placeholder="'. _uc($_e['Outstanding Share Value']) .'">
	        </div>
	    </div>';

//Face Value
echo '  <div class="form-group">
	        <label class="col-sm-2 col-md-3  control-label">'. _uc($_e['Face Value']) .'</label>
	        <div class="col-sm-10  col-md-9">
	            <input type="text" value="'.@$face_val.'" name="face_val" class="form-control" placeholder="'. _uc($_e['Face Value']) .'">
	        </div>
	    </div>';

//Year End
echo '  <div class="form-group">
	        <label class="col-sm-2 col-md-3  control-label">'. _uc($_e['Year Ended']) .'</label>
	        <div class="col-sm-10  col-md-9">
	            <input type="text" value="'.@$year_end.'" name="year_end" class="form-control" placeholder="'. _uc($_e['Year Ended']) .'">
	        </div>
	    </div>';

$img = "";
if(@$data['page_banner']!=''  && $isEdit){
$img=$data['page_banner'];
echo "<input type='hidden' name='oldImg' value='$img' />";
echo '<div class="form-group">
<label  class="col-sm-2 col-md-3  control-label">'. _uc($_e['Old Banner Image']) .'</label>
<div class="col-sm-10  col-md-9">
<img src="../images/'.$img.'" style="max-height:250px;" >
</div>
</div>';
}


if($isEdit){
	echo "<input type='hidden' name='oldImg' value='$logo' />";
	echo '<div class="form-group">
	<label  class="col-sm-2 col-md-3  control-label">'. _uc($_e['Old Banner Image']) .'</label>
	<div class="col-sm-10  col-md-9">
	<img src="../images/'.$logo.'" style="max-height:250px;" >
	</div>
	</div>';
}	    

//Logo Upload
echo '<div class="form-group">
<label  class="col-sm-2 col-md-3  control-label">'. _uc($this->dbF->hardWords('Company Logo', false)) .' </label><br>
<div class="col-sm-10  col-md-9">
<input type="file" name="logo" class="btn-file btn btn-primary">
</div>
</div>';

//Publish
$checked = "";
if(@$data['publish']=='1'){$checked='checked';}
echo '<div class="form-group">
<label  class="col-sm-2 col-md-3  control-label">'. _uc($_e['Publish']) .'</label>
<div class="col-sm-10  col-md-9">
<div class="make-switch" data-off="danger" data-on="success" data-on-label="'. _uc($_e['Publish']) .'" data-off-label="'. _uc($_e['Draft']) .'">
<input type="checkbox" name="publish" value="1" '.$checked.'>
</div>
</div>
</div>';

echo '<button type="submit" name="submit" value="SAVE" class="btn btn-lg btn-primary">'. _u($_e['SAVE']) .'</button>';

echo "</div><!-- setting tabs end -->
</div> <!-- tab-content end -->
</div> <!-- container end -->
</form>";

$this->functions->includeOnceCustom(ADMIN_FOLDER."/menu/classes/menu.class.php");
$menuC  =   new webMenu();
$menuC->menuWidgetLinks();


$employeePage = $this->functions->developer_setting('employeePage');
$filesManagerPage = $this->functions->developer_setting('filesManagerPage');
$testimonialPage = $this->functions->developer_setting('testimonialPage');
$galleryPage = $this->functions->developer_setting('hasGalleryPage');


$packages = explode(',' , $this->functions->ibms_setting('financial_positions'));

// print_r(count($packages));

$packagess = '';

for ($i=0; $i < count($packages); $i++) { 

$packagess .= "<tr><td>"._n('use : {{financial::'.$packages[$i].'}} FOR '.$packages[$i].' REPORTS PRINT') ."</td></tr>";

    # code...
}




$briefingfile = explode(',' , $this->functions->ibms_setting('briefingfile'));

// print_r(count($packages));

$packagessz = '';

for ($i=0; $i < count($briefingfile); $i++) { 

$packagessz .= "<tr><td>"._n('use : {{files::'.$briefingfile[$i].'}} FOR '.$briefingfile[$i].' FILES PRINT') ."</td></tr>";

    # code...
}




$employeeFormat = '';
if($employeePage == '1'){
$employeeFormat = "<tr><td>"._n($_e['use : {{employee}} FOR EMPLOYEE PAGE']) ."</td></tr>";
}

$filesManagerFormat = '';
if($filesManagerPage == '1'){
$filesManagerFormat = "<tr><td>"._n($_e['use : {{feedbackForm}} FOR Feedback Form']) ."</td></tr>";
}
$testimonialFormat = '';
if($testimonialPage == '1'){
$testimonialFormat = "<tr><td>". _n($_e['use : {{testimonial}} FOR TESTIMONIAL PAGE']) ."</td></tr>";
}
$galleryPageFormat = '';
if($galleryPage == '1'){
$galleryPageFormat .= "<tr><td>"._n($_e['use : {{albumAll}} FOR ALL ALBUMS']) ."</td></tr>";
// $galleryPageFormat .= "<tr><td>"._n($_e['use : {{albumSingle(AlbumName)}} FOR SINGLE ALBUM (Enter your album name inside ())']) ."</td></tr>";
// $galleryPageFormat .= "<tr><td>"._n($_e["use : {{albumPictures(AlbumName)}} FOR ALBUM's ALL IMAGES (Enter your album name inside ())"]) ."</td></tr>";

// <tr><td>'. _n($_e['use : {{inquiryForm}}  FOR INQUIRY FORM']) .'</td></tr>

// <tr><td>'. _n('use : {{news}} FOR Latest News') .'</td></tr>


// <tr><td>'. _n('use : {{event}} FOR Latest Events') .'</td></tr>
}
$useWidget = '<table class="table table-striped table-hover">

'.$packagess.'

<tr><td>'. _n($_e['use : {{contactForm}} FOR CONTACT FORM']) .'</td></tr>

<tr><td>'. _n('use : {{feedbackForm}} FOR FEEDBACK Form') .'</td></tr>


'. $employeeFormat .'
'. $testimonialFormat .'
'. $galleryPageFormat .'

'.$packagessz.'
</table>
';

echo $this->functions->blankModal($_e["Use Widget In Your Page"],"useWidgets",$useWidget,$_e['Close']);

} //function end


public function homePageBoxView(){
global $_e;
echo '<div class="table-responsive">
<script>$(document).ready(function(){dTableT()});</script>
<table class="table table-hover dTableT tableIBMS">
<thead>
<th>'. _u($_e['SNO']) .'</th>
<th>'. _u($_e['BOX NAME']) .'</th>
<th>'. _u($_e['TITLE']) .'</th>
<th>'. _u($_e['ACTION']) .'</th>
</thead>
<tbody>';

$sql  = "SELECT box,id,heading FROM box WHERE publish='1' ORDER BY id ASC ";
$data =  $this->dbF->getRows($sql);
$i = 0;
$defaultLang = $this->functions->AdminDefaultLanguage();
foreach($data as $val){
$i++;
$id = $val['id'];
@$heading = unserialize($val['heading']);
if($heading===false){
$heading = $val['heading'];
}else{
@$heading = $heading[$defaultLang];
}

echo "<tr>
<td>$i</td>";
echo "  <td>$val[box]</td>";
echo "  <td>$heading</td>
<td>
<div class='btn-group btn-group-sm'>
<a data-id='$id' href='-".$this->functions->getLinkFolder()."?page=homePageEdit&pageId=$id' class='btn'>
<i class='glyphicon glyphicon-edit'></i>
</a>
</div>
</td>
</tr>";
}


echo '</tbody>
</table>
</div> <!-- .table-responsive End -->';
}

public function getCompanyDetails(){
	$sql = "SELECT * FROM `company_info`";
	$res = $this->dbF->getRows($sql);

	return $res;
}

public function getSectors(){
	$sql = "SELECT DISTINCT(`sector`) FROM `company_info`";
	$res = $this->dbF->getRows($sql);

	return $res;
}

}
?>