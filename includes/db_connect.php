<?php

try{
  $db = new PDO('mysql:host=localhost;dbname=blog', 'forteroche', 'J.ForterocheBlog');
}catch(PDOException $e){
  echo $e;
}
