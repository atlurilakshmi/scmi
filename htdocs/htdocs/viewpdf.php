<?php
require_once("config.php");
if(!isset($_SESSION['user']))
{
	if($resulttype == 'Quarterly')
	$_SESSION['lastvisitpage'] = 'quarterly.php';
	elseif($resulttype == 'Annual')
	$_SESSION['lastvisitpage'] = 'annual.php';
	elseif($project == 'goldlip')
	$_SESSION['lastvisitpage'] = 'goldlip.php';
	elseif($doc == 'MOA')
	$_SESSION['lastvisitpage'] = 'memorandum-asso.php';
	elseif($doc == 'AOA')
	$_SESSION['lastvisitpage'] = 'article-asso.php';
	elseif($doc == 'CCB')
	$_SESSION['lastvisitpage'] = 'news.php';
	elseif($doc == 'CI')
	$_SESSION['lastvisitpage'] = 'news.php';
	
	$_SESSION['lastclickedlink'] = "viewpdf.php?".$_SERVER['QUERY_STRING'];
	header('Location: login.php'); exit;
}

if($resulttype == 'Quarterly')
$filename='FY '.$year.' Q'.$quarternum.'.pdf';
elseif($resulttype == 'Annual')
$filename='A'.'-'.$year.'.pdf';
elseif($project == 'goldlip')
$filename='HFC Business Plan.pdf';
elseif($doc == 'MOA')
$filename='Scimores MOA.pdf';
elseif($doc == 'AOA')
$filename='Scimores AOA.pdf';
elseif($doc == 'CCB')
$filename='Certificate_for_Commencement_of_Buisness.pdf';
elseif($doc == 'CI')
$filename='Certificate_of_Incorporation.pdf';

$file='pdf82e3c4A/'.$filename;

header('Cache-Control: public'); // needed for i.e.
header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename='.$filename);
readfile($file);
die();
?>