<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title> </title>
  <meta name="description" content="" />
  <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Work+Sans&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Kalam&display=swap" rel="stylesheet" />
  <link href="css/all.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/styles.css" />
</head>

<body>
  <header>
    <div id="header-container">
      <h1>
        PIZZE <span class="green">IL </span><span class="red"> NAPOLITANO</span>
      </h1>
      <nav>
        <ul>
          <li><a href="#">HOME</a></li>
          <li><a href="html/nosotros.html">NOSOTROS</a></li>
          <li><a href="html/sucursales.html">SUCURSALES & DELIVERY</a></li>
          <li><a href="html/contacto.html">CONTACTO</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <div class="main-content">
    <h2>NUESTRAS PIZZAS</h2>
    <ul class="gallery">
      <?php
      include_once("config_products.php");
      include_once("db.php");
      $link = new Db();
      $sql = "select c.category_name,p.image,p.product_name,p.price, date_format(p.start_date,'%d/%m/%Y') as date from products p inner join categories c on p.id_category=c.id_category order by p.price";
      $stmt = $link->prepare($sql);
      $stmt->execute();
      $data = $stmt->fetchAll();
      foreach ($data as $row) {
      ?>
        <li>
          <div class="box">
            <figure>
              <img src="<?php echo $row['image'] ?>">
              <figcaption>
                <h3><?php echo $row['category_name']." ".$row['product_name'] ?> </h3>
                <p><?php echo "$" . " " . $row['price'] ?></p>
                <time><?php echo $row['date'] ?></time>
              </figcaption>
            </figure>
            <button class="button" value="3">
              Añadir al Carrito <i class="fa-solid fa-cart-shopping"></i>
            </button>
          </div>
        </li>
      <?php
      }
      ?>

    </ul>
  </div>
  <footer>
    <div id="link">
      <a href="login.html">Acceso Privado</a>
      <p>&copy;2022</p>
    </div>
  </footer>
  <script src="js/script.js"></script>
</body>

</html>