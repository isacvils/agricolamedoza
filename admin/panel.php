<?php
// El personaje se mueve para llegar a un punto.
session_start();
if (!isset($_SESSION["admin_id"])) {
  header("Location: login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD Usuarios</title>
  <link rel="stylesheet" href="panel.css">
</head>
<body>
  <header class="topbar">
    <h1>AGRÍCOLA MENDOZA</h1>
    <div class="right">
      <span>Admin: <?php echo htmlspecialchars($_SESSION["admin_user"]); ?></span>
      <a class="btn-outline" href="logout.php">Cerrar sesión</a>
    </div>
  </header>

  <div class="layout">
    <aside class="sidebar">
      <h2>Menú Lateral</h2>
      <a href="../index.php" class="side-link">Inicio</a>
      <a href="panel.php" class="side-link active">Operaciones CRUD</a>
    </aside>

    <main class="content">
      <h2>Operaciones CRUD (Usuarios)</h2>
      <p>Selecciona una operación.</p>

      <div class="cards">
        <a class="card" href="users.php?op=create">
          <h3>Registrar</h3>
          <p>Agrega un nuevo usuario a la base de datos.</p>
          <span class="go">Ir</span>
        </a>

        <a class="card" href="users.php?op=read">
          <h3>Visualizar</h3>
          <p>Busca usuarios por ID o nombre.</p>
          <span class="go">Ir</span>
        </a>

        <a class="card" href="users.php?op=update">
          <h3>Editar</h3>
          <p>Actualiza datos de un usuario existente.</p>
          <span class="go">Ir</span>
        </a>

        <a class="card danger" href="users.php?op=delete">
          <h3>Eliminar</h3>
          <p>Elimina un usuario de forma permanente.</p>
          <span class="go dangerBtn">Ir</span>
        </a>
      </div>
    </main>
  </div>
</body>
</html>
