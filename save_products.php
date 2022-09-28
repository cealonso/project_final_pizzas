<?php
session_start(); 
if ($_SESSION ['logueado']) 
{  
include_once 'upload_image.php'; 
$product=$_POST['producto'];
$price=$_POST['precio'];
$category=$_POST['categoria'];
include_once("config_products.php");
include_once("db.php");
$link = new Db();
$path_img=$directorio.$nombre_img;
$sql="insert into products (product_name,price,id_category,image) values (:product,:price,:category,:path_img)";
$stmt = $link->prepare($sql);
$stmt->bindValue(':product', $product);
$stmt->bindValue(':price', $price);
$stmt->bindValue(':category', $category);
$stmt->bindValue(':path_img', $path_img);
if ( $stmt->execute()) { 
?> 
<script> 
alert("Producto Ingresado!"); 
window.location="insert_products.php"; 
</script> 
<?php  
}
}
?> 
