<?php
function public_db_connect() {
      
    $host = "localhost";  
    $user = "root";
    $pw = "root";
    $database = "db_sami_proj";

    $db = mysql_connect($host,$user,$pw)
       or die("Cannot connect to mySQL.");

    mysql_select_db($database,$db)
       or die("Cannot connect to database.");
   
    return $db;
 }
 ?>