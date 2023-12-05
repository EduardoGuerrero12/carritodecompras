<?php
session_start();

if(!isset($_SESSION['contador'])){
    $_SESSION['contador'] =0;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./jquery.js"></script>
    <script src="./codigo.js"></script>
</head>
<body>
    <div id="carrito" style="background:black; color:white;">
        Este es el carrito
    </div>
    <?php 
    $conexion = mysqli_connect("localhost", "root", "", "spacecompu");
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    $peticion = "SELECT * FROM productos";
    $resultado = mysqli_query($conexion, $peticion);

    while ($fila = mysqli_fetch_array($resultado)){
        ?>
        <article>
            <h2><?php echo $fila['nombre']?></h2>
            <h3>$<?php echo $fila['precio']?></h3>
            <button class="botoncompra" value ="<?php echo $fila['id'] ?>">Agregar al carrito </button>
        </article>
        <?php 
    }

    
    mysqli_close($conexion);
    ?>
</body>
</html>
