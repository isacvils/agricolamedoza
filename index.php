<?php
// El personaje se mueve para llegar a un punto.
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Agrícola Mendoza</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header class="header-verde">
    <img class="logo-header" src="Agricola Mendoza.png" alt="Logo Agrícola Mendoza">
    <h1 class="titulo">Agrícola Mendoza</h1>

    <!-- MENÚ -->
    <div class="menu-icon" onclick="toggleMenu()">☰</div>

    <div id="menu" class="menu">
        <a href="admin/login.php">Inicio de sesión</a>
        <a href="#servicios">Servicios</a>
        <a href="#contacto">Contacto</a>
    </div>
</header>

<h3 class="subtitulo">Quiénes somos</h3>

<p class="parrafo">
Somos una pequeña empresa dedicada a la agricultura la cual tiene origen
en el poblado de Laguna de Canachi. Nuestra empresa está conformada por el
trabajo y dedicación de las familias agricultoras de la región.
</p>

<p class="parrafo">
Desde nuestros inicios, hemos trabajado con el firme compromiso de cultivar
la tierra de manera responsable, combinando tradición y tecnología.
</p>

<!-- IMÁGENES -->
<div class="Imagenes">
    <img class="tractor" src="tactor.jpg" alt="Tractor">
    <img class="Sembradora" src="siembra-maiz.jpg" alt="Siembra">
</div>

<h3 class="subtitulo">Misión</h3>

<p class="parrafo">
Producir y comercializar productos agrícolas de alta calidad,
integrando tecnología moderna con respeto por la tierra.
</p>

<h3 class="subtitulo">Visión</h3>

<p class="parrafo">
Ser una empresa agrícola líder en la región, reconocida por innovación,
sostenibilidad y excelencia.
</p>

<!-- SERVICIOS -->
<section id="servicios" class="Servicios">

<h2 class="titulo-servicios">Servicios que ofrecemos</h2>

<div class="contenedor-servicios">

    <a href="maquinaria.html" class="link-servicio">
        <div class="servicio">
            <img src="cultivo-maiz.jpg" class="img-servicio">
            <h3>Renta de maquinaria</h3>
            <p>Maquinaria agrícola moderna y confiable.</p>
        </div>
    </a>

    <a href="granos.html" class="link-servicio">
        <div class="servicio">
            <img src="granos.jpg" class="img-servicio">
            <h3>Venta de granos</h3>
            <p>Granos de excelente calidad.</p>
        </div>
    </a>

    <a href="dron.html" class="link-servicio">
        <div class="servicio">
            <img src="DRON.JPG" class="img-servicio">
            <h3>Fumigación con dron</h3>
            <p>Servicio moderno, preciso y eficiente.</p>
        </div>
    </a>

</div>
</section>

<!-- FORMULARIO -->
<h2 id="contacto" class="subtitulo">Resolvemos tus dudas</h2>

<form id="formulario-contacto">
    <input type="text" placeholder="Nombre" required>
    <input type="email" placeholder="Email" required>
    <input type="tel" placeholder="Teléfono" required>
    <button class="contacto-btn">Enviar</button>
</form>

<footer class="pie-pagina">
    <div class="pie-contenido">
        <p class="copyright">© 2026 Agrícola Mendoza</p>
    </div>
</footer>

<script src="app.js"></script>

</body>
</html>
