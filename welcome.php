<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/welcome.css">
    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/bootbox.min.js"></script>
    <script>
        function deleteProduct(cod) {

            //bootbox.alert("Your message here…");
        
             bootbox.confirm("Desea ud. eliminar realmente el id " + cod, function(result) {
                if (result) {
                    window.location = "delete.php?q=" + cod;
                }
            });
           
        }

        function updateProduct(cod_zapatilla) {
            window.location = "edit.php?q=" + cod_zapatilla;

        }
    </script>


</head>

<body>
    <nav class="navtop">
        <div>
            <h1>Area Privada</h1>
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
        </div>
       
    </nav>
    <div class="content">
        <?php
        session_start();
        if ($_SESSION['logueado']) {
            echo "Bienvenido/a, " . $_SESSION['username'];
            echo "<br>";
            echo "Horario de Conexión: " . $_SESSION['time'];
            echo "<br>";
            echo "<br>";
            echo "<a href='insert_products.php' class='btn btn-primary' role='button'>Ingresar Producto</a>";
            echo "<br><br>";
            $table = "<table class='table table-bordered table-striped'>
            <thead class='thead-dark'>
                <tr>
                    <th>Id</th>
                    <th>Producto</th>
                    <th>Categoria</th>
                    <th>Precio</th>
                    <th>Fecha de Alta</th>
                    <th>Eliminar</th>
                    <th>Actualizar</th>
                </tr>
            </thead>
            <tbody>";
            include_once("config_products.php");
            include_once("db.php");
            $link = new Db();
            $sql = "select p.id_product,c.category_name,p.image,p.product_name,p.price, date_format(p.start_date,'%d/%m/%Y') as date from products p inner join categories c on p.id_category=c.id_category";
            $stmt = $link->prepare($sql);
            $stmt->execute();
            $data = $stmt->fetchAll();
            echo $table;
            foreach ($data as $row) {
        ?>
                <tr>
                    <td>
                        <?php echo $row['id_product']; ?>
                    </td>
                    <td>
                        <?php echo $row['product_name']; ?>
                    </td>
                    <td>
                        <?php echo $row['category_name']; ?>
                    </td>
                    <td>
                        <?php echo $row['price']; ?>
                    </td>
                    <td>
                        <?php echo $row['date']; ?>
                    </td>
                    <td>
                        <a href="#" onclick="deleteProduct(<?php echo $row['id_product'] ?>)"> Eliminar Producto</a>
                    </td>
                    <td>
                        <a href="#" onclick="updateProduct(<?php echo $row['id_product'] ?>)"> Actualizar Producto</a>
                    </td>
                </tr>
        <?php
            } // foreach

            $table = " </tbody>
                </table>";
            echo $table;
        } else {
        }

        ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    
</body>

</html>