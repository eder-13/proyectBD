<?php
    session_start();
    if (!isset($_SESSION["username"])) {
        header("Location: signin.php");
    }

    if (!isset($_POST['fechaI'])) {
        header("Location: third_form.php");
    } else {
        $fechaI = $_POST['fechaI'];
        $fechaF = $_POST['fechaF'];
        
    }

    $conexion = mysqli_connect("localhost",$_SESSION['username'],$_SESSION['password'],"project6");

    $sql = "SET @fechaI = '$fechaI';";
    $query = mysqli_query($conexion,$sql);

    $sql = "SET @fechaF = '$fechaF';";
    $query = mysqli_query($conexion,$sql);

    $sql = "SELECT area.CodA,area.nameA,obrero.CodO,obrero.nameO,obrero.lastnameO,SUM(trabajo.min) 
            FROM obrero,trabajo, area 
            WHERE (trabajo.date BETWEEN @fechaI AND @fechaF ) 
                    AND trabajo.CodO=obrero.CodO
                    AND obrero.CodA=area.CodA
                    AND trabajo.min>0
            GROUP BY trabajo.CodO
            ORDER BY area.CodA ASC, SUM(trabajo.min) DESC ";
    $query = mysqli_query($conexion,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project6 | Third Query</title>
      <!-- Bootstrap core CSS -->
  <link href="styles/bootstrap.css" rel="stylesheet">
</head>
<body>
    
<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col"  class='justify-content-center text-center'>#</th>
      <th scope="col" class='justify-content-center text-center'>Codigo del Area</th>
      <th scope="col" class='justify-content-center text-center'>Nombre del Area</th>
      <th scope="col" class='justify-content-center text-center'>Codigo del Obrero</th>
      <th scope="col" class='justify-content-center text-center'>Nombre del Obrero</th>
      <th scope="col" class='justify-content-center text-center'>Apellido del Obrero</th>
      <th scope="col" class='justify-content-center text-center'>Minutos Acumulados</th>
    </tr>
  </thead>
  <tbody>
    <?php
        if ($query) {
            for($i = 1; $fila = mysqli_fetch_array($query); $i++){
    ?>
                <tr>
                    <th scope="row" class='justify-content-center text-center'><?php echo $i;?></th>
                    <?php for ($j=0; $j < 6; $j++) { 
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