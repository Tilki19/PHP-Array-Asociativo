<a href="index.php">Volver</a>
<?php
$estudiantes = [
    "Ana" => ["matematicas"=> 4.5,"ciencias" => 3.8, "ingles" => 4.2],
    "Luis" => ["matematicas"=> 3.0,"ciencias" => 2.8, "ingles" => 3.5],
    "Marta" => ["matematicas"=> 5.0,"ciencias" => 4.7, "ingles" => 4.9],
    "Carlos" => ["matematicas"=> 2.5,"ciencias" => 3.2, "ingles" => 2.9],
];
// Promedio de cada estudiante
$promedios = [];
foreach ($estudiantes as $nombre => $notas) {
    $suma = array_sum($notas);
    $cantidadMaterias = count($notas);

    $promedio = $suma / $cantidadMaterias;
    $promedios[$nombre] = $promedio;
}
// Mejor promedio
$mejorPormedio = max($promedios);
$peorPormedio = min($promedios);

$mejorEstudiante = array_search($mejorPormedio, $promedios);
$peorEstudiante = array_search($peorPormedio, $promedios);
// Clasificacion de estudiantes
$resultados = [];

foreach ($promedios as $nombre => $promedio) {

    if ($promedio >= 3.0) {
        $resultados[$nombre] = "Aprobado";
    } else {
        $resultados[$nombre] = "Reprobado";
    }
}
//Promedio de cada materia
$promediosMaterias = [];

foreach ($estudiantes as $nombre => $notas) {

    foreach ($notas as $materia => $nota) {

        if (!isset($promediosMaterias[$materia])) {
            $promediosMaterias[$materia] = 0;
        }

        $promediosMaterias[$materia] += $nota;
    }
}

foreach ($promediosMaterias as $materia => $suma) {

    $promediosMaterias[$materia] = $suma / count($estudiantes);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>estudiante</title>
</head>
<body>
    <h1>Resultados</h1>
    <h2>Promedios por estudiante</h2>
     <?php foreach ($promedios as $nombre => $promedio): ?>

        <p>
            <?= $nombre ?>:
            <?= number_format($promedio, 2) ?>
        </p>

    <?php endforeach; ?>
    <h2>Mejor y peor estudiante</h2>

    <p>
        Mejor estudiante:
        <?= $mejorEstudiante ?>
        (<?= number_format($mejorPormedio, 2) ?>)
    </p>

    <p>
        Peor estudiante:
        <?= $peorEstudiante ?>
        (<?= number_format($peorPormedio, 2) ?>)
    </p>
    <h2>Estado académico</h2>

    <?php foreach ($resultados as $nombre => $estado): ?>

        <p>
            <?= $nombre ?>:
            <?= $estado ?>
        </p>

    <?php endforeach; ?>
    <h2>Promedios por materia</h2>

    <?php foreach ($promediosMaterias as $materia => $promedio): ?>

        <p>
            <?= $materia ?>:
            <?= number_format($promedio, 2) ?>
        </p>

    <?php endforeach; ?>

</body>
</html>