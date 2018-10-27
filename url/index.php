<?php
include 'shortner/db.php';
$dbh=new db();
$db=$dbh->getDB();
$link=$_GET['id'];
 echo $url='http://localhost/url?id='.$link;
  function isalreadyshort($db,$urls)
  {

    $stmt=$db->prepare('SELECT * FROM `urls` where short=:url');
    $stmt->bindParam(':url',$urls);
    $stmt->execute();
    $result=$stmt->fetch(PDO::FETCH_OBJ);

    if($stmt->rowCount()>0)
    {
      header('location:'.$result->url);
    }
    else {
      echo '<b><h1><center>'.'404....SITE IS NOT FOUND'.'</center></h1></b>';
    }


  }
     isalreadyshort($db,$url);
?>
