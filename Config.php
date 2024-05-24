<?php
define("DB_SERVER","localhost");
define("DB_USERNAME","root");
define("DB_PASSWORD","");
define("DB_NAME","project_dashbord1");

  $con = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
if(!$con){
    die("Connect Error !".mysqli_connect());
}
?>