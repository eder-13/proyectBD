<?php
    session_start();
    if (!isset($_SESSION["username"])) {
        header("Location: signin.php");
    }

    if (!isset($_POST['fechaI'])) {
        header("Location: second_form.php");
    } else {
        $fechaI = $_POST['fechaI'];
        $fechaF = $_POST['fechaF'];
        
    }

    $conexion = mysqli_connect("localhost",$_SESSION['username'],$_SESSION['password'],"project6");

    $sql = "SET @fechaI = '$fechaI';";
    $query = mysqli_query($conexion,$sql);

    $sql = "SET @fechaF = '$fechaF';";
    $query = mysqli_query($conexion,$sql);

    $sql = "SELECT obrero.CodO,obrero.nameO,obrero.lastnameO,trabajo.date,trabajo.min 
            FROM obrero,trabajo 
            WHERE (trabajo.date BETWEEN @fechaI AND @fechaF ) 
                    AND trabajo.CodO=obrero.CodO
                    AND trabajo.min>0";
    $query = mysqli_query($conexion,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project6 | Second Query</title>
      <!-- Bootstrap core CSS -->
  <link href="styles/bootstrap.css" rel="stylesheet">
</head>
<body>
    
<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col"  class='justify-content-center text-center'>#</th>
      <th scope="col" class='justify-content-center text-center'>Codigo del Obrero</th>
      <th scope="col" class='justify-content-center text-center'>Nombre del Obrero</th>
      <th scope="col" class='justify-content-center text-center'>Apellido del Obrero</th>
      <th scope="col" class='justify-content-center text-center'>Fecha de Tardanza</th>
      <th scope="col" class='justify-content-center text-center'>Minutos de Retraso</th>
    </tr>
  </thead>
  <tbody>
    <?php
        if ($query) {
            for($i = 1; $fila = mysqli_fetch_array($query); $i++){
    ?>
                <tr>
                    <th scope="row" class='justify-content-center text-center'><?php echo $i;?></th>
                    <?php for ($j=0; $j < 5; $j++) { 
                        echo "<td class='justify-content-center text-center'>$fila[$j]</td>";
                    }?>
                </tr>
    <?php
            }
        }
        
    ?>


  </tbody>
</table>

    <?php
        include("footer.php");
        if (isset($conexion)) {
            mysqli_close($conexion);
        }
    ?>
</body>
</html>