<?php

class url{
  function get_http_response_code($url) {
      $headers = get_headers($url);
      return substr($headers[0], 9, 3);
  }

  function isExisturl($url,$code)
  {
   
    if($code == 200 || $code == 302 || $code == 301)
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
