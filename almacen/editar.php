<?php
        require 'config/database.php';

        $db = new Database();
        $con = $db -> conectar();
        $id = $_GET['id'];
        $query = $con->prepare("SELECT codigo, descripcion, inventariable, stock FROM productos WHERE id = :id");
        $query->execute(['id' => $id]);
        $resultado = $query->fetch(PDO::FETCH_ASSOC);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar registro</title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <script src="public/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<main class="container"> 
        <div class="row">
            <div class="col">
                <h4>Editar registro</h4>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form class="row g-3" method="POST" action="guarda.php" autocomplete="off">
                    <input type="hidden" id="id" name="id" value="<?php echo $id;?>">
                    <div class="col-md-4">
                        <label for="codigo" class="form-label">Código</label>
                        <input type="text" id="codigo" name="codigo" class="form-control" value="<?php echo $resultado['codigo'];?>" required autofocus>
                    </div>
                    <div class="col-md-8">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input type="text" id="descripcion" name="descripcion" value="<?php echo $resultado['descripcion'];?>" class="form-control" required>
                    </div>

                    <h5>Inventario</h5>
                    <div class="col-md-12">
                        <div class="form-check"> 
                            <input type="checkbox" class="form-check-input" id="inventariable" name="inventariable" value="1"
                            <?php
                                if($resultado['inventariable'])
                                {
                                    echo 'checked';
                                }
                            ?>
                            >
                            <label for="inventariable" class="form-check-label">Usa inventario</label>

                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="stock" class="form-label">Existencia</label>
                        <input type="number" id="stock" name="stock" value="<?php echo $resultado['stock'];?>" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <a href="index.php" class="btn btn-secondary">Regresar</a>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
</main>
</body>
</html>