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

    $sql = "#general SELECT 
            SELECT CodB,nroCuenta,nameO,lastnameO,SUM(MONTO) 
            FROM (

            #regular day
            SELECT obrero.CodB,obrero.nroCuenta,obrero.nameO,obrero.lastnameO, SUM(
                    8 * turno.costoT + trabajo.horasExtras*(turno.costoT*horasextras.costoHExtra)/100 - (trabajo.min*(turno.costoT/20))) AS MONTO
            FROM banco,obrero,trabajo,turno,horasextras,date
            WHERE   trabajo.CodO = obrero.CodO
                    AND trabajo.CodT = turno.CodT
                    AND trabajo.horasExtras = horasextras.cantHExtra
                    AND trabajo.date = date.date
                    AND date.ind = 'X'
                    AND trabajo.date BETWEEN @fechaI AND @fechaF
                    AND trabajo.date <> obrero.birth
                    AND trabajo.min < 480
            GROUP BY obrero.nroCuenta

            UNION 

            #hollidays and sundays
            SELECT obrero.CodB,obrero.nroCuenta,obrero.nameO,obrero.lastnameO, 8*(turno.costoT + (0.5 * turno.costoT) ) - (trabajo.min * (turno.costoT + 0.5 * turno.costoT)/20) AS MONTO2
            FROM obrero,trabajo,date,turno
            WHERE trabajo.CodO = obrero.CodO
                    AND trabajo.date = date.date
                    AND trabajo.CodT = turno.CodT
                    AND trabajo.date BETWEEN @fechaI AND @fechaF
                    AND date.ind <> 'X'
                    AND trabajo.min < 480
            GROUP BY obrero.nroCuenta

            UNION 

            #birthday
            SELECT obrero.CodB, obrero.nroCuenta,obrero.nameO,obrero.lastnameO, 80 AS MONTO3  
            FROM obrero
            WHERE (DATE_FORMAT(obrero.birth,'%m-%d') BETWEEN DATE_FORMAT(@fechaI , '%m-%d') AND DATE_FORMAT(@fechaF , '%m-%d') )
            GROUP BY obrero.nroCuenta

            ) TOTAL

            GROUP BY nroCuenta
            ORDER BY CodB,nroCuenta";
    $query = mysqli_query($conexion,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project6 | Sixth Query</title>
      <!-- Bootstrap core CSS -->
  <link href="styles/bootstrap.css" rel="stylesheet">
</head>
<body>
    
<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col"  class='justify-content-center text-center'>#</th>
      <th scope="col" class='justify-content-center text-center'>Codigo del Banco</th>
      <th scope="col" class='justify-content-center text-center'>Numero de Cuenta</th>
      <th scope="col" class='justify-content-center text-center'>Nombre del Obrero</th>
      <th scope="col" class='justify-content-center text-center'>Apellido del Obrero</th>
      <th scope="col" class='justify-content-center text-center'>Monto</th>
    </tr>
  </thead>
  <tbody>
    <?php
        if ($query) {
            for($i = 1; $fila = mysqli_fetch_array($query); $i++){
    ?>
                <tr>
                    <th scope="row" class='justify-content-center text-center'><?php echo $i;?></th>
                    <?php for ($j = 0; $j < 5; $j++) { 
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