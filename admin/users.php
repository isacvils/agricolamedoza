<?php
// El personaje se mueve para llegar a un punto.
session_start();
if (!isset($_SESSION["admin_id"])) {
  header("Location: login.php");
  exit;
}
require_once("../config/db.php");

$op = $_GET["op"] ?? "read";
$msg = "";
$ok = true;

function h($s){ return htmlspecialchars($s ?? ""); }

// CREATE
if ($op === "create" && $_SERVER["REQUEST_METHOD"] === "POST") {
  $name = trim($_POST["name"] ?? "");
  $email = strtolower(trim($_POST["email"] ?? ""));
  $role = trim($_POST["role"] ?? "usuario");

  try {
    $stmt = $pdo->prepare("INSERT INTO users (name, email, role) VALUES (?,?,?)");
    $stmt->execute([$name, $email, $role]);
    $msg = "Usuario registrado correctamente.";
  } catch (Exception $e) {
    $ok = false;
    $msg = "Error: email duplicado o datos inválidos.";
  }
}

// UPDATE
if ($op === "update" && $_SERVER["REQUEST_METHOD"] === "POST") {
  $id = intval($_POST["id"] ?? 0);
  $name = trim($_POST["name"] ?? "");
  $email = strtolower(trim($_POST["email"] ?? ""));
  $role = trim($_POST["role"] ?? "usuario");

  try {
    $stmt = $pdo->prepare("UPDATE users SET name=?, email=?, role=? WHERE id=?");
    $stmt->execute([$name, $email, $role, $id]);
    $msg = "Usuario actualizado correctamente.";
  } catch (Exception $e) {
    $ok = false;
    $msg = "Error al actualizar (email duplicado o ID inválido).";
  }
}

// DELETE
if ($op === "delete" && $_SERVER["REQUEST_METHOD"] === "POST") {
  $id = intval($_POST["id"] ?? 0);
  $stmt = $pdo->prepare("DELETE FROM users WHERE id=?");
  $stmt->execute([$id]);
  $msg = ($stmt->rowCount() > 0) ? "Usuario eliminado." : "No existe ese ID.";
  $ok = ($stmt->rowCount() > 0);
}

// READ
$q = trim($_GET["q"] ?? "");
$users = [];
if ($op === "read") {
  if ($q !== "") {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE name LIKE ? OR email LIKE ? ORDER BY id DESC");
    $stmt->execute(["%$q%", "%$q%"]);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
  } else {
    $stmt = $pdo->query("SELECT * FROM users ORDER BY id DESC");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD Usuarios</title>
  <link rel="stylesheet" href="users.css">
</head>
<body>
  <header class="topbar">
    <h1>CRUD Usuarios</h1>
    <div class="right">
      <a class="btn-outline" href="panel.php">← Volver</a>
      <a class="btn-outline" href="logout.php">Cerrar sesión</a>
    </div>
  </header>

  <main class="wrap">
    <?php if ($msg): ?>
      <p class="msg <?php echo $ok ? "ok" : "bad"; ?>"><?php echo h($msg); ?></p>
    <?php endif; ?>

    <?php if ($op === "create"): ?>
      <h2>Registrar usuario</h2>
      <form method="POST" class="card">
        <input name="name" placeholder="Nombre" required>
        <input name="email" placeholder="Email" type="email" required>
        <input name="role" placeholder="Rol (usuario/admin)" value="usuario" required>
        <button type="submit">Guardar</button>
      </form>

    <?php elseif ($op === "read"): ?>
      <h2>Visualizar usuarios</h2>
      <form method="GET" class="search">
        <input type="hidden" name="op" value="read">
        <input name="q" value="<?php echo h($q); ?>" placeholder="Buscar por nombre o email">
        <button>Buscar</button>
      </form>

      <div class="table-wrap">
        <table>
          <thead>
            <tr><th>ID</th><th>Nombre</th><th>Email</th><th>Rol</th><th>Creado</th></tr>
          </thead>
          <tbody>
            <?php foreach($users as $u): ?>
              <tr>
                <td><?php echo h($u["id"]); ?></td>
                <td><?php echo h($u["name"]); ?></td>
                <td><?php echo h($u["email"]); ?></td>
                <td><?php echo h($u["role"]); ?></td>
                <td><?php echo h($u["created_at"]); ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

    <?php elseif ($op === "update"): ?>
      <h2>Editar usuario</h2>
      <form method="POST" class="card">
        <input name="id" type="number" placeholder="ID" required>
        <input name="name" placeholder="Nuevo nombre" required>
        <input name="email" type="email" placeholder="Nuevo email" required>
        <input name="role" placeholder="Nuevo rol" value="usuario" required>
        <button type="submit">Actualizar</button>
      </form>

    <?php elseif ($op === "delete"): ?>
      <h2>Eliminar usuario</h2>
      <form method="POST" class="card danger">
        <input name="id" type="number" placeholder="ID a eliminar" required>
        <button type="submit" class="dangerBtn">Eliminar</button>
      </form>
    <?php endif; ?>
  </main>
</body>
</html>
