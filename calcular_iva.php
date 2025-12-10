<?php
// calcular_iva.php

header('Content-Type: application/json');

// Obtener la IP pública si estás en localhost
function obtenerIPPublica() {
    $ip = $_SERVER['REMOTE_ADDR'];

    // Detectar si es localhost
    if ($ip === '127.0.0.1' || $ip === '::1') {
        $publicIp = @file_get_contents('https://api64.ipify.org');
        return $publicIp ?: $ip; // si falla, regresa IP local
    }

    return $ip;
}

// Obtener el país según IP
function obtenerCodigoPaisPorIP() {
    $ip = obtenerIPPublica();
    $response = @file_get_contents("http://ip-api.com/json/$ip");
    if (!$response) return 'US';
    $data = json_decode($response, true);
    return $data['countryCode'] ?? 'US';
}

// IVA por país
function obtenerTasaIVA($codigoPais) {
    $ivas = [
        'MX' => 0.16,
        'ES' => 0.21,
        'AR' => 0.21,
        'CO' => 0.19,
        'CL' => 0.19,
        'PE' => 0.18,
        'US' => 0.00,
        'DE' => 0.19,
        'FR' => 0.20
    ];
    return $ivas[$codigoPais] ?? 0.00;
}

// Precio recibido desde el frontend
$precio = isset($_GET['precio']) ? floatval($_GET['precio']) : 0.00;

// Procesar cálculo
$pais = obtenerCodigoPaisPorIP();
$tasaIVA = obtenerTasaIVA($pais);
$iva = round($precio * $tasaIVA, 2);
$total = round($precio + $iva, 2);

// Devolver JSON
echo json_encode([
    'pais' => $pais,
    'tasa_iva' => $tasaIVA,
    'iva' => $iva,
    'total' => $total
]);
