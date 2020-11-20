<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Project6 | Main Page  </title>

    <!-- Bootstrap core CSS -->
<link href="styles/bootstrap.css" rel="stylesheet">

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
    <link href="jumbotron.css" rel="stylesheet">
  </head>
  <body>


<main role="main">
 
    <div class="container">
      <h1 class="display-3">Administration</h1>
      <p>This page is the directory of the queries about the company.</p>
      <p><a class="btn btn-primary btn-lg" href="new_user.php" role="button">Create new user &raquo;</a></p>
    </div>
  

  <div class="container">
    <!-- Example row of columns -->
    <div class="row">
      <div class="col-md-4">
        <h2>Query #1</h2>
        <p> This query returns all the workers that have a birthday in the week. </p>
        <p><a class="btn btn-secondary" href="#" role="button">Make Query &raquo;</a></p>
      </div>
      <div class="col-md-4">
        <h2>Query #2</h2>
        <p>This query returns the workers with delays in a given date range.</p>
        <p><a class="btn btn-secondary" href="#" role="button">Make Query &raquo;</a></p>
      </div>
      <div class="col-md-4">
        <h2>Query #3</h2>
        <p>This query returns the workers with accumulated minutes by area.</p>
        <p><a class="btn btn-secondary" href="#" role="button">Make Query &raquo;</a></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <h2>Query #4</h2>
        <p> This query returns all the workers that doesn't have any delay or miss. </p>
        <p><a class="btn btn-secondary" href="#" role="button">Make Query &raquo;</a></p>
      </div>
      <div class="col-md-4">
        <h2>Query #5</h2>
        <p>This query returns all the sundays and hollydays of the year.</p>
        <p><a class="btn btn-secondary" href="#" role="button">Make Query &raquo;</a></p>
      </div>
      <div class="col-md-4">
        <h2>Query #6</h2>
        <p>This query returns the payment to the workers' bank.</p>
        <p><a class="btn btn-secondary" href="#" role="button">Make Query &raquo;</a></p>
      </div>
      <div class="col-md-4">
        <h2>Query #7</h2>
        <p>This query returns the historical payments to the workers in a given date range.</p>
        <p><a class="btn btn-secondary" href="#" role="button">Make Query &raquo;</a></p>
      </div>
      <div class="col-md-4">
        <h2>Query #8</h2>
        <p>This query returns the payment made for every cost center.</p>
        <p><a class="btn btn-secondary" href="#" role="button">Make Query &raquo;</a></p>
      </div>
    </div>

    <hr>

  </div> <!-- /container -->

</main>

<footer class="container">
  <p>&copy; Proyect6 - 2020</p>
  <?php include("footer.php");
    if (isset($conexion)) {
      mysqli_close($conexion);
    }
?>
</footer>
</html>
