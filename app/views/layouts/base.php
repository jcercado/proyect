<?php
session_start();

function url($path) {
    return '/'.$path; // Retorna la URL relativa
}

// Obtener la URL actual
$currentUrl = isset($_GET['url']) ? $_GET['url'] : 'inicio'; // 'inicio' por defecto si no existe 'url'
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> | MCE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .nav-link.active {
            color: #fff; /* Color de texto cuando activo */
            background-color: #007bff; /* Fondo del enlace activo */
        }
    </style>
</head>
<body>
    <div class="container-fluid mt-5">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link <?= ($currentUrl == 'inicio') ? 'active' : '' ?>" href="<?= url('inicio') ?>">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($currentUrl == 'stock') ? 'active' : '' ?>" href="<?= url('stock') ?>">Stock</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($currentUrl == 'crud') ? 'active' : '' ?>" href="<?= url('crud') ?>">Crud</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($currentUrl == 'registro') ? 'active' : '' ?>" href="<?= url('registro') ?>">Registro</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($currentUrl == 'contacto') ? 'active' : '' ?>" href="<?= url('contacto') ?>">Contacto</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Contenido principal -->
            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <?= $content ?? '' ?>
            </main>
        </div>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
