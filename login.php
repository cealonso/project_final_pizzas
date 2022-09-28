<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/all.css">
  <link rel="stylesheet" href="css/main.css">

</head>

<body>
  <?php
  include_once("config_login.php");
  include_once("db.php");
  $link = new Db();
  $usr = $_POST['username'];
  $pass = $_POST['password'];
  $hashed_pass = hash('sha256', $pass);
  //Check if username exists
  $sql = "select * from users where (username=:usr or email=:usr) and (password=:hashed_pass) and (active='SI')";
  $stmt = $link->prepare($sql);
  $stmt->bindValue(':usr', $usr);
  $stmt->bindValue(':hashed_pass', $hashed_pass);
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($row == 0) {
  ?>
    <div class="alert alert-danger">
      <a href="login.html" class="close" data-dismiss="alert">×</a>
      <div class="text-center">
        <h5><strong>¡Error!</strong> Login Invalido.</h5>
      </div>
    </div>
  <?php
  } else {
    session_start();
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $_SESSION['time'] = date('H:i:s');
    $_SESSION['username'] = $usr;
    $_SESSION['logueado'] = true;
    header("location:welcome.php");
  }
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>