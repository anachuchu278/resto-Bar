<!DOCTYPE html>
<html><head>
<title>ByTender</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>

<body>
    <div class="bg-transparent">
    <header class="bg-dark text-white py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <img src="<?php echo base_url("/assets/images/logo.jpg"); ?>" alt=""
                class="img-fluid rounded-square" style="width: 100px; height: 100px;">
            <h1 class="mb-0">ByTender</h1>
        </div>
    </header>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?php echo base_url(); ?>">INICIO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?php if (!empty($tiposBebida)) : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Filtrar por tipo
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php foreach ($tiposBebida as $tipo) : ?>
                            <li><a class="dropdown-item"
                                    href="<?php echo base_url('barControlador/filtrarPorTipo/' . $tipo['id']); ?>"><?php echo $tipo['nombre']; ?></a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-4">
    <?php if (isset($bebidaEncontrada)) : ?>
        <section class="mt-4">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Información de la bebida:</h2>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($bebidaEncontrada as $bebida) : ?>
                            <li class="list-group-item"><strong>Nombre:</strong> <?php echo $bebida['nombre']; ?></li>
                            <li class="list-group-item"><strong>Tipo:</strong> <?php echo $bebida['tipo_id']; ?></li>
                            <li class="list-group-item"><strong>Precio:</strong> <?php echo $bebida['precio']; ?></li>
                            <li class="list-group-item"><strong>Descripción:</strong> <?php echo $bebida['descripcion']; ?></li>
                            <li class="list-group-item">
                                <img src="<?php echo base_url(); ?>assets/images/<?php echo $bebida['imagen_ruta']; ?>" alt="Imagen de la bebida" style="max-width: 100%; height: auto;">
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </section>
    <?php elseif (isset($bebidas) && is_array($bebidas)) : ?>
        <section class="mt-4">
            <h2 class="mb-3">Bebidas Disponibles:</h2>
            <div class="row">
                <?php foreach ($bebidas as $bebida) : ?>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img src="<?php echo base_url(); ?>assets/images/<?php echo $bebida['imagen_ruta']; ?>" alt="Imagen de la bebida" class="card-img-top" style="max-height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $bebida['nombre']; ?></h5>
                                <p class="card-text"><strong>Tipo:</strong> <?php echo $bebida['tipo_id']; ?></p>
                                <p class="card-text"><strong>Precio:</strong> <?php echo $bebida['precio']; ?></p>
                                <p class="card-text"><strong>Descripción:</strong> <?php echo $bebida['descripcion']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>
</div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.2/dist/umd/popper.min.js"
        integrity="sha384-q9CRHqZndzlxGLOj+xrdLDJa9ittGte1NksRmgJKeCV9DrM7Kz868XYqsKWPpAmn"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
</body>

</html>