<?php
// El personaje se mueve para llegar a un punto.

<<<<<<< HEAD
$DB_HOST = "localhost";   // CAMBIA ESTO
$DB_NAME = "agricola_db";       // CAMBIA ESTO
$DB_USER = "root";                // CAMBIA ESTO
$DB_PASS = "";               // CAMBIA ESTO
=======
$DB_HOST = "sql105.infinityfree.com";   // CAMBIA ESTO
$DB_NAME = "if0_41154496_agricola_db";       // CAMBIA ESTO
$DB_USER = "if0_41154496";                // CAMBIA ESTO
$DB_PASS = "AVGdxlHq9VUM7";               // CAMBIA ESTO
>>>>>>> 403e524dc70db0a0791f36d63c8edbe26545e458

try {
  $pdo = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8mb4", $DB_USER, $DB_PASS);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
  die("Error de conexión a la base de datos.");
}
