<?php
    session_start();
    if (isset($_SESSION["username"])) {
      header("Location: main.php");
    }
    if (isset($_POST["submit"])) {
      $conexion = mysqli_connect("localhost","project6","project6","mysql");
      if (!$conexion) {
        die("Error: ".mysqli_connect_error($conexion));
      }

      $user = $_POST["username"];
      $pass = $_POST["password"];
    
      $query = "SELECT * from user where Password = PASSWORD('$pass') AND User = '$user'";
   
      $res = mysqli_query($conexion,$query);
      if (mysqli_affected_rows($conexion)>0) {
        
        $_SESSION["username"] = $user;
        $_SESSION["password"] = $pass;
        header("Location: main.php");
      }
      else {
        die("Error: ".mysqli_connect_error($conexion));
      }

    }
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Proyect6 | Signin</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="styles/bootstrap.css">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="styles/signin.css" rel="stylesheet">
</head>

<body class="text-center">
  <form class="form-signin" method="POST" action="signin.php">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="inputEmail" class="sr-only">Username</label>
    <input type="text" id="inputText" class="form-control" placeholder="User" name="username" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>

    <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Sign in</button>
    <p class="text-secondary">*If you don't have an user yet contact with the manager.</p>
    <p class="mt-5 mb-3 text-muted">&copy; Proyect6 - 2020</p>
  </form>
  <?php include("footer.php");
    if (isset($conexion)) {
      mysqli_close($conexion);
    }
?>
</body>

</html>