$(document).ready(inicio) 
function inicio(){
  
    $(".botoncompra").click(anade)
    $("#carrito").load("agregar.php")
}
function anade(){
    $("#carrito").load("agregar.php?p="+$(this).val())
}