<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hero Image Slider con Video Modal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Slider Hero -->
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <!-- Imagen 1 -->
            <div class="carousel-item active">
                <img src="https://via.placeholder.com/1920x1080" class="d-block w-100" alt="Slide 1">
                <div class="carousel-caption d-flex flex-column justify-content-center h-100">
                    <h1 class="display-4">Bienvenido a Nuestro Proyecto</h1>
                    <div>
                        <a href="#" class="btn btn-primary btn-lg mx-2">Solicita Asesoría</a>
                        <a href="#" class="btn btn-outline-light btn-lg mx-2" data-bs-toggle="modal" data-bs-target="#videoModal">Más Información</a>
                    </div>
                </div>
            </div>
            <!-- Imagen 2 -->
            <div class="carousel-item">
                <img src="https://via.placeholder.com/1920x1080/ff7f7f" class="d-block w-100" alt="Slide 2">
                <div class="carousel-caption d-flex flex-column justify-content-center h-100">
                    <h1 class="display-4">Bienvenido a Nuestro Proyecto</h1>
                    <div>
                        <a href="#" class="btn btn-primary btn-lg mx-2">Solicita Asesoría</a>
                        <a href="#" class="btn btn-outline-light btn-lg mx-2" data-bs-toggle="modal" data-bs-target="#videoModal">Más Información</a>
                    </div>
                </div>
            </div>
            <!-- Imagen 3 -->
            <div class="carousel-item">
                <img src="https://via.placeholder.com/1920x1080/7f7fff" class="d-block w-100" alt="Slide 3">
                <div class="carousel-caption d-flex flex-column justify-content-center h-100">
                    <h1 class="display-4">Bienvenido a Nuestro Proyecto</h1>
                    <div>
                        <a href="#" class="btn btn-primary btn-lg mx-2">Solicita Asesoría</a>
                        <a href="#" class="btn btn-outline-light btn-lg mx-2" data-bs-toggle="modal" data-bs-target="#videoModal">Más Información</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Controles de navegación del Slider -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>

    <!-- Modal para el Video -->
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="videoModalLabel">Más Información</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="ratio ratio-16x9">
                        <iframe id="videoFrame" src="https://www.youtube.com/embed/VIDEO_ID" title="YouTube video" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Parar el video cuando se cierra el modal
        const videoModal = document.getElementById('videoModal');
        const videoFrame = document.getElementById('videoFrame');

        videoModal.addEventListener('hide.bs.modal', function () {
            videoFrame.src = videoFrame.src; // Reinicia el video al cerrar el modal
        });
    </script>
</body>
</html>
