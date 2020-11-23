<?php
    session_start();
    if (!isset($_SESSION["username"])) {
      header("Location: signin.php");
    }
    if (isset($_POST["submit"])) {
      $conexion = mysqli_connect("localhost",$_SESSION['username'],$_SESSION['password'],"mysql");
      if (!$conexion) {
        die("Error: ".mysqli_connect_error($conexion));
      }

      $user = $_POST["username"];
      $pass = $_POST["password"];
      $rol = "SELECT, INSERT";
      if ($_POST["rol"]=="Admin") {
          $rol = "ALL PRIVILEGES";
      }
    
      $query = "CREATE USER '$user'@'localhost' IDENTIFIED BY '$pass'";
      
      $res = mysqli_query($conexion,$query);
      
      $query = "GRANT $rol ON project6.* TO '$user'@'localhost'";

      $res = mysqli_query($conexion,$query); 
      if ($res) {
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
  <title>Proyect6 | New User</title>

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

    .check {
      padding-right: 20px;
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
  <form class="form-signin" method="POST" action="new_user.php">
    <h1 class="h3 mb-3 font-weight-normal">Create a new user</h1>
    <label for="inputEmail" class="sr-only">Username</label>
    <input type="text" id="inputText" class="form-control" placeholder="User" name="username" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
    <p class="text-dark-gray">Select Rol: </p>
    <input type="checkbox" name="rol" id="inputRol" value="Admin">
    <label for="inputRol" class="check">Admin</label>
    <input type="checkbox" name="rol" id="inputRol2" value="Supervisor">
    <label for="inputRol2">Supervisor</label>
    <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Create User</button>

    <p class="mt-5 mb-3 text-muted">&copy; Proyect6 - 2020</p>
  </form>
  <?php include("footer.php");
    if (isset($conexion)) {
      mysqli_close($conexion);
    }
?>
</body>

</html>