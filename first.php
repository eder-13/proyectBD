<?php
    session_start();
    if (!isset($_SESSION["username"])) {
        header("Location: signin.php");
    }

    $conexion = mysqli_connect("localhost",$_SESSION['username'],$_SESSION['password'],"project6");

    $sql = "SET @fechaI =DATE_FORMAT(
        (
                SELECT date.weekstart FROM date WHERE date.date = DATE_FORMAT(
                NOW(),'%y-%m-%d')
        ),'%y-%m-%d'
        );";
    $query = mysqli_query($conexion,$sql);

    $sql = "SET @fechaF = DATE_ADD(@fechaI, INTERVAL 6 DAY );";
    $query = mysqli_query($conexion,$sql);

    $sql = "SET @fechaI = DATE_FORMAT(@fechaI, '%m-%d');";
    $query = mysqli_query($conexion,$sql);

    $sql = "SET @fechaF = DATE_FORMAT(@fechaF, '%m-%d');";
    $query = mysqli_query($conexion,$sql);

    $sql = "SELECT obrero.CodO,obrero.nameO,obrero.lastnameO,obrero.birth,area.nameA 
            FROM obrero,area 
            WHERE (DATE_FORMAT(obrero.birth,'%m-%d') BETWEEN @fechaI AND @fechaF) AND obrero.CodA = area.CodA
            ORDER BY area.CodA ASC, obrero.birth ASC";
    $query = mysqli_query($conexion,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project6 | First Query</title>
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
      <th scope="col" class='justify-content-center text-center'>Cumpleaños del Obrero</th>
      <th scope="col" class='justify-content-center text-center'>Nombre del Area</th>
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