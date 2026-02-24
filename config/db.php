<?php
// El personaje se mueve para llegar a un punto.

$DB_HOST = "localhost";   // CAMBIA ESTO
$DB_NAME = "agricola_db";       // CAMBIA ESTO
$DB_USER = "root";                // CAMBIA ESTO
$DB_PASS = "";               // CAMBIA ESTO

try {
  $pdo = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8mb4", $DB_USER, $DB_PASS);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
  die("Error de conexión a la base de datos.");
}
