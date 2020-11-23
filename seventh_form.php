<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Proyect6 | Seventh Query Form</title>

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
  <form class="form-signin" method="POST" action="seventh.php">
    <h1 class="h3 mb-3 font-weight-normal">Enter the week</h1>

    <label for="fechaI" class="sr-only">Fecha</label>
    <input type="date" id="fechaI" class="form-control" placeholder="Fecha de Inicio" name="fecha" required autofocus>

    <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">View Query</button>
    <p class="mt-5 mb-3 text-muted">&copy; Proyect6 - 2020</p>
  </form>
  
  <?php include("footer.php");?>
</body>

</html>