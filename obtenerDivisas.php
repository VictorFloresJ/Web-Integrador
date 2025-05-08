<?php
// URL de la API
$apiUrl = "https://cdn.dinero.today/api/latest.json";

// Obtener los datos de la API
$respuesta = file_get_contents($apiUrl);

// Verifica si se recibió una respuesta válida
if ($respuesta === FALSE) {
    die('Error al obtener los datos de la API');
}

// Decodifica el JSON
$datos = json_decode($respuesta, true);

// Asegúrate de que la estructura de datos sea válida
if (isset($datos['rates'])) {
    $tasas = $datos['rates'];
} else {
    die('Error: Datos de tasas no disponibles.');
}

// Crear un array con las opciones de divisas
$opcionesDivisas = "";
foreach ($tasas as $codigoDivisa => $tasa) {
    // Agregar solo las divisas relevantes (por ejemplo, USD, EUR, MXN)
    if (in_array($codigoDivisa, ['USD', 'EUR', 'MXN'])) {
        $opcionesDivisas .= "<option value=\"$codigoDivisa\">$codigoDivisa</option>";
    }
}

// Crear un div oculto con las tasas de cambio
$tasaJSON = json_encode($tasas); // Convertir las tasas a JSON para usarlas en JavaScript

// Retornar las opciones de divisas generadas y el div oculto
echo $opcionesDivisas;
echo "<div id='tasas-de-cambio' style='display:none;' data-tasas='$tasaJSON'></div>";
?>
