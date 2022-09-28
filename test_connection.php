<?php

include_once "config_login.php";

function openCon()
{
    $dsn = "mysql:dbname=" . DATABASE_NAME . ";host=" . SERVER_NAME;
    $link = new PDO($dsn, USER_NAME, PASSWORD);
    return $link;
}

function closeCon($a){
  $a=null;
}

// Invocacion

$con=openCon(); 
//Operaciones CRUD
$sql="select username,email from users";
$row=$con->query($sql);
echo "<h1> Listado </h1>";
foreach($row as $col){
    echo "<br>";
    echo $col['username'];
    echo "<br>";
    echo $col['email'];
    echo "<br>";
    echo "--------";

}


closeCon($con);


