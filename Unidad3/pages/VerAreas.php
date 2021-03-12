<?php
session_start();
if (!isset($_SESSION['NombreUsuario'])) {
    header("location: login.php?Error=401");
} else {
    include "../Database/conexion.php";
    $IdUsuario = $_SESSION['IdUsuario'];
    $sql = "select * from Usuario where idUsuario=" . $IdUsuario;
    $resultado = $cn->query($sql);
    $imagenUsuario = $resultado->fetch(PDO::FETCH_OBJ);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Areas</title>
    <?php
    include('../layout/disenio.php');
    ?>
    <link rel="stylesheet" href="../styles/verarea.css">
    <link rel="stylesheet" href="../styles/navbar.css">
    <style type="text/css">
        body {
            background-color: rgb(3, 21, 48);
        }
    </style>
</head>

<body>
    <?php
    include("../layout/navbar.php");
    ?>
    <br>
    
    <a href="control.php" class="regresar" id="btnRegresar"> <i class="fas fa-undo-alt" id="iconAdd"></i> Regresar </a>

    <div class="container" id="cards">
        <div class="row row-cols-1 row-cols-md-3">
                <?php
                
                $sql="select count(idArea) as noarea from area";
                $cantidad=$cn->query($sql);
                $Noareas = $cantidad->fetch(PDO::FETCH_OBJ);
               // echo "".$Noareas->noarea;
                
                for($i=1;$i<=$Noareas->noarea;$i++){
                    $sql = "select a.NombreArea, a.urlImagen, a.Especialista, a.Piso, a.Habitacion, count(p.idArea) as actCount from area as a inner join paciente as p on p.idArea=a.idArea where P.idArea=".$i;
                    $resultado = $cn->query($sql);
                    $areas = $resultado->fetchAll(PDO::FETCH_OBJ);
                foreach ($areas as $area) {
                    echo "<div class='col mb-4'>";
                    echo "<div class='card'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>" . $area->NombreArea . "</h5>";
                    echo "<img src='../Database/" . $area->urlImagen . "'class='card-img-top' alt='...'>";
                    echo "<div class='agrupacion'>";
                    echo "<div class='d-flex flex-nowrap'>";
                    echo "<p id='propiedades'>Doctor encargado:</p><p class='card-text'>" . $area->Especialista ."</p>";
                    echo "</div>";
                    echo "<div class='d-flex flex-nowrap'>";
                    echo "<p id='propiedades'>Número de pacientes: </p><p class='card-text'>" . $area->actCount . "</p>";
                    echo "</div>";
                    echo "<div class='d-flex flex-nowrap'>";
                    echo "<p id='propiedades'>Número de piso: </p><p class='card-text'>" . $area->Piso . "</p>";
                    echo "</div>";
                    echo "<div class='d-flex flex-nowrap'>";
                    echo "<p id='propiedades'>Número Habitación: </p><p class='card-text'>" . $area->Habitacion . "</p>";
                    echo "</div>";
                    echo "<a href='verPacientes.php?Consulta=".$i."' class='btn' id='btnAlta'><i class='far fa-eye'></i>Ver Pacientes</a>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            }
                ?>
            </div>
        </div>
    </div>

</body>

</html>