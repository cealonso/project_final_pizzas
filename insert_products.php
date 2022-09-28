<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Document</title>
<link
	href="https://fonts.googleapis.com/css?family=Raleway&display=swap"
	rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Lato:300,400,700'
	rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="css/form.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3 class="text-center">INGRESO DE PRODUCTOS</h3>
			</div>
			<div class="col-md-12">
				<form class="form-group" accept-charset="utf-8"
					action="save_products.php" enctype="multipart/form-data"
					method="post">
					<div class="form-group">
						<br> <label class="control-label" for="producto">PRODUCTO</label> 
						<input id="producto" name="producto" placeholder="PRODUCTO"
							class="form-control" required="" type="text">
					</div>
					<div class="form-group">
						<label class="control-label" for="precio">PRECIO</label> <input
							id="precio" name="precio" placeholder="PRECIO"
							class="form-control" required="" type="text">
					</div>
					<div class="form-group">
						<label class="control-label" for="categoria">CATEGORIA DEL PRODUCTO</label>
						<select id="categoria" name="categoria" class="form-control">
						<!-- Las categorias seran cargadas de la db -->
						<?php
						include_once("config_products.php");
						include_once("db.php");
						$link = new Db();
						$sql="select id_category,category_name from categories order by category_name;";
						$stmt = $link->prepare($sql);
						$stmt->execute();
						$data = $stmt->fetchAll();
						foreach ($data as $row) {
						    echo '<option value="'.$row['id_category']. '">' .$row['category_name']. "</option>";
						}
						?>
						</select>
					</div>
					<div class="form-group">
						<label class="control-label" for="file">Seleccione la imagen a subir</label> 
						<input type="file" id="imagen" class="form-control" name="imagen" size="30"/>
					</div>
					<br>
					<div class="text-center">
						<input type="submit" class="btn btn-success" value="Añadir Producto" />
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- /container -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>

