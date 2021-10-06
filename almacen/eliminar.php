<?php
     require 'config/database.php';
     $db = new Database();
     $con = $db -> conectar();

    $id = $_GET['id'];

     $query = $con -> prepare("DELETE FROM productos WHERE id=?");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardar</title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <script src="public/js/bootstrap.bundle.min.js"></script>
</head>
<body class="py-3">
    <main class="container"> 
        <div class="row">
            <div class="col">
            <?php
                if($query->execute([$id])){
                    echo "<h3>Registro eliminado</h3>";
                }
                else{
                    echo '<h3>RError al eliminar el registro/h3>';
                }
            ?>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a href="index.php" class="btn btn-primary">Regresar</a>
            </div>
        </div>
    </main>
</body>
</html>
