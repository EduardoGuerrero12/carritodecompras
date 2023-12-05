<?php
session_start();
$suma = 0;


if(isset($_GET['p'])){
    $_SESSION['productos'][$_SESSION ['contador']] = $_GET['p'];
    $_SESSION['contador']++;   
}
$conexion = mysqli_connect("localhost", "root", "", "spacecompu");
echo "<table>";
for ($i=0; $i< $_SESSION['contador']; $i++)
{
    $peticion = "SELECT * FROM productos WHERE id = ".$_SESSION['productos'][$i]."";
    $resultado = mysqli_query($conexion, $peticion);

    while ($fila = mysqli_fetch_array($resultado)){
        echo "<tr><td>" .$fila['nombre']."</td><td>$ ".$fila['precio']."</td></tr>";
        $suma += $fila['precio'];

    }
}
echo "<tr><td>Subtotal</td><td>$".number_format($suma, 2)."</td></tr> ";
echo "</table>";
echo "<a href='destruir.php'><button>Vacia carrito</button></a>"

?>