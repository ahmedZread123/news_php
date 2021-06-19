<?php

session_start();
define("servername" , "localhost") ;
define("username" , "root");
define("pass" , "");
define("dbname" , "news");

$coon = mysqli_connect(servername , username ,pass ,dbname  );

?>
