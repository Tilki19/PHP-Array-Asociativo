<a href="index.php">Volver</a>
<?php 
echo "<h3>Inventario</h3>";
$inventario =[
    "manzanas" => 50,
    "peras" => 30,
    "naranjas" => 0,
    "uvas" => 15,    
];
//Recorrido del Array 

foreach ($inventario as $producto => $stock) {
    echo $producto.": ".$stock. " uni"."<br>";
}
// Agregar nuevo producto
$inventario["mangos"] = 20;
// Actualizara stock
$inventario["peras"] += 10;
// Verificacions de producto
echo "<h3>Verificación de productos</h3>";
if (isset($inventario["kiwis"])) {
    echo "El producto kiwis existe";
}else{
    echo "El producto kiwis no existe";
}
echo "<br>";
echo "<h3>Inventario</h3>";
// Calcular total
foreach ($inventario as $producto => $stock) {
    echo $producto.": ".$stock. " uni"."<br>";
}
$total = 0;
foreach ($inventario as $cantidad) {
    $total += $cantidad;
}
echo "<h3>Total de unidades</h3>";
echo "El inventario tiene ".$total." unidades";
?>
