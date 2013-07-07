<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */
 require_once "../phpuploader/include_phpuploader.php" ?>
<?php
session_start();
$userid = $_SESSION["uid"];
$uploader=new PhpUploader();
$mvcfile=$uploader->GetValidatingFile();

//USER CODE:
echo $userid.$files;
$targetfilepath= "../assign_submissions1/".  $userid ."_". $mvcfile->FileName;
if( is_file ($targetfilepath) )
	unlink($targetfilepath);
$mvcfile->MoveTo( $targetfilepath );

$uploader->WriteValidationOK("");

?>