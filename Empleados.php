<a href="index.php">Volver</a>
<?php
$empleados = [
    ["nombre" => "Sofía",  "depto" => "Ventas",    "salario" => 2500000],
    ["nombre" => "Pedro",  "depto" => "Sistemas",  "salario" => 4000000],
    ["nombre" => "Laura",  "depto" => "Ventas",    "salario" => 2800000],
    ["nombre" => "Andrés", "depto" => "Sistemas",  "salario" => 4500000],
    ["nombre" => "Julia",  "depto" => "Recursos",  "salario" => 3000000],
];
// Departamenos por empleados
$porDepto = [];

foreach ($empleados as $empleado) {

    $departamento = $empleado["depto"];

    if (!isset($porDepto[$departamento])) {
        $porDepto[$departamento] = [];
    }

    $porDepto[$departamento][] = $empleado["nombre"];
}
//Calcula el salario promedio por departamento
$salariosDepto = [];
$promediosDepto = [];

foreach ($empleados as $empleado) {

    $departamento = $empleado["depto"];
    $salario = $empleado["salario"];

    if (!isset($salariosDepto[$departamento])) {
        $salariosDepto[$departamento] = 0;
    }

    $salariosDepto[$departamento] += $salario;
}
foreach ($salariosDepto as $departamento => $totalSalarios) {

    $cantidadEmpleados = count($porDepto[$departamento]);

    $promediosDepto[$departamento] =
        $totalSalarios / $cantidadEmpleados;
}
//Nomina mas alta
$nominaMasAlta = max($salariosDepto);

$departamentoMayorNomina = array_search(
    $nominaMasAlta,
    $salariosDepto
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>
</head>
<body>
    <h1>Empleados</h1>
    <h2>Empleados por departamento</h2>

    <?php foreach ($porDepto as $departamento => $nombres): ?>

        <h3><?= $departamento ?></h3>

        <?php foreach ($nombres as $nombre): ?>

            <p><?= $nombre ?></p>

        <?php endforeach; ?>

    <?php endforeach; ?>
    <h2>Promedio salarial por departamento</h2>

    <?php foreach ($promediosDepto as $departamento => $promedio): ?>

        <p>
            <?= $departamento ?>:
            $<?= number_format($promedio, 0, ',', '.') ?>
        </p>

    <?php endforeach; ?>
    <h2>Departamento con mayor nómina</h2>

    <p>
        Departamento: <?= $departamentoMayorNomina ?>
    </p>

    <p>
        Nómina total:
        $<?= number_format($nominaMasAlta, 0, ',', '.') ?>
    </p>
</body>
</html>