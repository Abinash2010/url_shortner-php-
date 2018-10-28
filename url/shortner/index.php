<?php
include 'db.php';
include 'func.php';
$url="http://facebook.com";
$dbh=new db();
$db=$dbh->getDB();
$a=new url();
$code=$a->get_http_response_code($url);
$exist=$a->isExisturl($url,$code);
if($exist)
{
  $a->isalreadyshort($db,$url);
}
else {
  {
    echo 'Your url doesnot exist';
  }
}
 ?>
