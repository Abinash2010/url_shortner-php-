<?php
include 'db.php';
include 'func.php';
$url="http://facebook.com";
$dbh=new db();
$db=$dbh->getDB();
$a=new url();
echo $exist=$a->isExisturl($url);
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
