<?php
session_start();
if ($_SESSION['logueado']) {
    include_once("config_products.php");
    include_once("db.php");
    $link = new Db();
    $id = $_POST['id'];
    $name = $_POST['nombre'];
    $price = $_POST['precio'];
    $category = $_POST['categoria'];
    $id = $_POST['id'];
    //update products set product_name="pacho2", price=3,id_category=2 where id_product=19
    $sql = "update products set product_name='$name', price='$price', id_category='$category' where id_product=" . $id;
    $stmt = $link->prepare($sql);
    $stmt->execute();
    header('Location:welcome.php');
}
