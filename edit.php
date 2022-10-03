<?php
session_start();
if ($_SESSION['logueado']) {
	$idUpt = $_GET['q'];
	include_once("config_products.php");
	include_once("db.php");
	$link = new Db();
	$sql = "select p.id_product as id_product,c.category_name as category_name,p.product_name as product_name,p.price as price from products p inner join categories c on p.id_category=c.id_category where p.id_product=" . $idUpt;
	$stmt = $link->prepare($sql);
	$stmt->execute();
	$data = $stmt->fetch();
	echo $data['category_name'];
}
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<title>Document</title>
	<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/all.css">
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3 class="text-center">ACTUALIZAR PRODUCTOS</h3>
			</div>
			<div class="col-md-12">
				<form class="form-group" accept-charset="utf-8" action="update_products.php" method="post">
					<div class="form-group">
						<input type="hidden" name="id" value="<?php echo $data['id_product'] ?>">
					</div>
					<div class="form-group">
						<label class="control-label">NOMBRE DEL PRODUCTO</label>
						<input id="nombre" name="nombre" class="form-control" type="text" value="<?php echo $data['product_name'] ?>">
					</div>
					<div class="form-group">
						<label class="control-label">PRECIO</label>
						<input id="precio" name="precio" class="form-control" type="text" value="<?php echo $data['price'] ?>">
					</div>
					<div class="form-group">
						<label class="control-label" for="categoria">CATEGORIA DEL PRODUCTO</label>
						<select id="categoria" name="categoria" class="form-control">
							<!-- Las categorias seran cargadas de la db -->
							<option><?php echo $data['category_name'] ?></option>
							<?php
							include_once("config_products.php");
							include_once("db.php");
							$link = new Db();
							$sql = "select id_category,category_name from categories order by category_name;";
							$stmt = $link->prepare($sql);
							$stmt->execute();
							$data = $stmt->fetchAll();

							foreach ($data as $row) {
								echo '<option value="' . $row['id_category'] . '">' . $row['category_name'] . "</option>";
								
							
							}
							?>
						</select>
					</div>

					<div class="text-center">
						<br>
						<input type="submit" class="btn btn-success" value="Guardar Producto">
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>