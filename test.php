<?php

include 'includes/app.php';



// for ($id_videojuego = 1; $id_videojuego <= 31; $id_videojuego++) {
//     for ($id_plataforma = 1; $id_plataforma <= 4; $id_plataforma++) {
//         $sql = "UPDATE inventario
//                 SET precio = CASE
//                     WHEN id_videojuego = $id_videojuego AND id_plataforma = $id_plataforma THEN ROUND(RAND() * (80 - 30) + 30, 2)
//                     ELSE precio
//                 END";

//         if ($db->query($sql) === TRUE) {
//             echo "Actualización exitosa para id_videojuego = $id_videojuego, id_plataforma = $id_plataforma<br>";
//         } else {
//             echo "Error al actualizar: " . $conn->error;
//         }
//     }
// }

?>
