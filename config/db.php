<?php
// El personaje se mueve para llegar a un punto.

$DB_HOST = "sql105.infinityfree.com";   // CAMBIA ESTO
$DB_NAME = "if0_41154496_agricola_db";       // CAMBIA ESTO
$DB_USER = "if0_41154496";                // CAMBIA ESTO
$DB_PASS = "AVGdxlHq9VUM7";               // CAMBIA ESTO

try {
  $pdo = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8mb4", $DB_USER, $DB_PASS);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
  die("Error de conexión a la base de datos.");
}
