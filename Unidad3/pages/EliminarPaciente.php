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

    $IdPaciente = $_GET['IdPaciente'];
    $sql = "select * from Paciente where idPaciente=" . $IdPaciente;
    $resultado = $cn->query($sql);
    $paciente = $resultado->fetch(PDO::FETCH_OBJ);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Paciente</title>
    <?php
    include('../layout/disenio.php');
    ?>
    <link rel="stylesheet" href="../styles/eliminar.css">
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
    <form action="../Database/eliminarPaciente.php" method="post">
        <h2 class="text-center text-danger" id="txtPregunta">¿Esta seguro que desea eliminar <?php echo $paciente->NombrePaciente; ?>?</h2>
        <div class="container">
        <?php
         echo "<img src='../Database/" . $paciente->urlImagen . "'class='card-img-top' alt='...'>";
        ?>
        </div>
        <input type="hidden" name="Id" value="<?php echo $IdPaciente; ?>" />
        <div class="text-center">
            <button type="submit" class="btn btn-lg btn-danger" id="btnBaja">
                <span class="fa fa-remove"></span><i class="fas fa-user-minus" id="icons"></i> Dar de baja</button>
            <a href="verPacientes.php?Consulta=0" class="btn btn-lg btn-info" id="btnReturn"><i class="fas fa-undo-alt" id="icons"></i>Regresar</a>
        </div>
    </form>

</body>

</html>