<?php

class url{

  function isExisturl($url)
  {
    $ch = curl_init();
    curl_setopt_array($ch, array(
          CURLOPT_RETURNTRANSFER => 1,
          CURLOPT_URL => $url,
          CURLOPT_CONNECTTIMEOUT=>10
        ));
    $http_respond = curl_exec($ch);
    $http_respond = trim( strip_tags( $http_respond ) );
    $http_code = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
    if($http_code == 200 || $http_code == 302 || $http_code == 301)
      {
        return 1;
      }
      else {
        return 0;
      }
  }
  function isalreadyshort($db,$url)
  {
    $stmt=$db->prepare('SELECT * FROM `urls` where url=:url');
    $stmt->bindParam(':url',$url);
    $stmt->execute();
    $result=$stmt->fetch(PDO::FETCH_OBJ);
    if($stmt->rowCount()>0)
    {
      echo '<p><b>'.'This url is already shortened'.'</b></p>';
      echo 'Your link is:'.$result->short;
    }
    else {
      $short='http://localhost/url?id='.rand(111,999);
      $stmt=$db->prepare('Insert into `urls` values(:url,:short)');
      $stmt->bindParam(':url',$url);
      $stmt->bindParam(':short',$short);
      $stmt->execute();
      echo 'your short url is: '.$short;
    }
  }

}




 ?>
