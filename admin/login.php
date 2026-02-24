<?php
// El personaje se mueve para llegar a un punto.
session_start();
require_once("../config/db.php");

$msg = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = trim($_POST["username"] ?? "");
  $password = $_POST["password"] ?? "";

  $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ?");
  $stmt->execute([$username]);
  $admin = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($admin && password_verify($password, $admin["password_hash"])) {
    $_SESSION["admin_id"] = $admin["id"];
    $_SESSION["admin_user"] = $admin["username"];
    header("Location: panel.php");
    exit;
  } else {
    $msg = "Usuario o contraseña incorrectos";
  }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <link rel="stylesheet" href="admin.css">
</head>
<body>
  <div class="login-card">
    <h2>Panel de Administración</h2>
    <form method="POST">
      <input type="text" name="username" placeholder="Usuario" required>
      <input type="password" name="password" placeholder="Contraseña" required>
      <button type="submit">Iniciar Sesión</button>
    </form>
    <p class="msg"><?php echo htmlspecialchars($msg); ?></p>
    <a href="../index.php">← Volver al inicio</a>
  </div>
</body>
</html>
