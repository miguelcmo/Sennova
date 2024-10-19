<?php

/** @var yii\web\View $this */
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'SennovaLab';
?>

<!-- provisional styles for multiple slider wirh bootstrap  -->
<?php /*
<style>
.carousel-inner .carousel-item.active,
.carousel-inner .carousel-item-next,
.carousel-inner .carousel-item-prev {
    display: flex;
}
@media(min-width:768px) {
    .carousel-inner .carousel-item.active,
|   .carousel-inner .carousel-item-next {
        transform: translateX(25%);
    }
    .carousel-inner .carousel-item.active,
    .carousel-inner .carousel-item.prev {
        transform: translateX(-25%);
    }
}
.carousel-inner .carousel-item-end,
.carousel-inner .carousel-item-start {
    transform: translateX(0);
}

@media(max-width:767px) {
    .carousel-inner .carousel-item>div {
        display: none;
    }
    .carousel-inner .carousel-item>div:first-child {
        display: block;
    }
}
</style>
*/ ?>

<style>
/* Estilos para las flechas */
.glide__arrow {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background-color: white;
  border: none;
  border-radius: 50%;
  width: 40px;
  height: 40px;
  font-size: 24px;
  color: black;
  cursor: pointer;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
  transition: background-color 0.3s ease, box-shadow 0.3s ease;
  display: flex;
  align-items: center;
  justify-content: center;
}

/* Posición de la flecha izquierda */
.glide__arrow--left {
  left: 10px;
}

/* Posición de la flecha derecha */
.glide__arrow--right {
  right: 10px;
}

/* Efecto hover para las flechas */
.glide__arrow:hover {
  background-color: #f0f0f0;
  box-shadow: 0 6px 8px rgba(0, 0, 0, 0.3);
}
</style>

<main>
    <!-- 
    =================================================================================================================================
    Sección: 1
    Título: Slider principal
    Descripción: Slider de imagenes tipo hero (3 imagenes) para ilustar el contenido del sitio web de SennovaLab del centro de
                 Comercio del SENA reginal Antioquia, definidas por la diseñadora y aprobadas por el grupo primario.
    =================================================================================================================================
    -->
    <!-- Slider principal -->
    <section>
        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <!-- Imagen 1 -->
                <div class="carousel-item active" style="background-image: url('images/main-slider/sennovalab-01.jpg'); height: 890px;">
                    <!-- <img src="https://via.placeholder.com/1920x900" class="d-block w-100" alt="Slide 1"> -->
                    <!-- <img src="images/main-slider/sennovalab-01.jpg" class="img-fluid" alt="Slide 1"> -->
                    <div class="overlay bg-secondary bg-opacity-25 position-absolute top-0 start-0 w-100 h-100"></div>
                    <div class="carousel-caption d-flex flex-column justify-content-center h-100" style="padding-bottom: 70px;">
                        <div class="row justify-content-start">
                            <div class="col-lg-7 d-flex flex-column align-items-start">
                                <div class="my-2 d-none d-md-block"><img src="images/logo(971x170).png" class="img-fluid" alt="Logo serviser"></div>
                                <h1 class="display-6 fw-bold text-start">Bienvenidos al portal de investigación, innovación y desarrollo del Centro de Comercio del SENA, Regional Antioquia.</h1>
                                <p class="fs-4 text-start">Este hace parte integral del <strong>Sistema de Investigación, Desarrollo Tecnológico e Innovación (SENNOVA)</strong>, el cual es un espacio dinámico para la promoción de la innovación y los procesos de investigación en nuestro centro formativo.</p>
                                <div class="d-flex align-items-start">
                                    <?php // Html::a('Solicita Asesoría', ['site/contact'], ['class' => 'btn btn-success btn-lg text-white']); ?>
                                    <!-- <a href="#" class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#videoModal">Más Información</a> -->
                                    <?= Html::a('Más Información', ['site/contact'], ['class' => 'btn btn-dark btn-lg']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Imagen 2 -->
                <div class="carousel-item" style="background-image: url('images/main-slider/sennovalab-02.jpg'); height: 890px;">
                    <!-- <img src="https://via.placeholder.com/1920x900/ff7f7f" class="d-block w-100" alt="Slide 2"> -->
                    <!-- <img src="images/main-slider/sennovalab-02.jpg" class="d-block w-100" alt="Slide 1"> -->
                    <div class="overlay bg-secondary bg-opacity-25 position-absolute top-0 start-0 w-100 h-100"></div>
                    <div class="carousel-caption d-flex flex-column justify-content-center h-100" style="padding-bottom: 70px;">
                        <div class="row justify-content-start">
                            <div class="col-lg-7 d-flex flex-column align-items-start">
                                <div class="my-2 d-none d-md-block"><img src="images/logo(971x170).png" class="img-fluid" alt="Logo serviser"></div>
                                <h1 class="display-6 fw-bold text-start">Bienvenidos al portal de investigación, innovación y desarrollo del Centro de Comercio del SENA, Regional Antioquia.</h1>
                                <p class="fs-4 text-start">Este hace parte integral del <strong>Sistema de Investigación, Desarrollo Tecnológico e Innovación (SENNOVA)</strong>, el cual es un espacio dinámico para la promoción de la innovación y los procesos de investigación en nuestro centro formativo.</p>
                                <div class="d-flex align-items-start">
                                    <?php // Html::a('Solicita Asesoría', ['site/contact'], ['class' => 'btn btn-success btn-lg text-white']); ?>
                                    <!-- <a href="#" class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#videoModal">Más Información</a> -->
                                    <?= Html::a('Más Información', ['site/contact'], ['class' => 'btn btn-dark btn-lg']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Imagen 3 -->
                <div class="carousel-item" style="background-image: url('images/main-slider/sennovalab-03.jpg'); height: 890px;">
                    <!-- <img src="https://via.placeholder.com/1920x900/7f7fff" class="d-block w-100" alt="Slide 3"> -->
                    <!-- <img src="images/main-slider/sennovalab-03.jpg" class="d-block w-100" alt="Slide 1"> -->
                    <div class="overlay bg-dark bg-opacity-25 position-absolute top-0 start-0 w-100 h-100"></div>
                    <div class="carousel-caption d-flex flex-column justify-content-center h-100" style="padding-bottom: 70px;">
                        <div class="row justify-content-start">
                            <div class="col-lg-7 d-flex flex-column align-items-start">
                                <div class="my-2 d-none d-md-block"><img src="images/logo(971x170).png" class="img-fluid" alt="Logo serviser"></div>
                                <h1 class="display-6 fw-bold text-start">Bienvenidos al portal de investigación, innovación y desarrollo del Centro de Comercio del SENA, Regional Antioquia.</h1>
                                <p class="fs-4 text-start">Este hace parte integral del <strong>Sistema de Investigación, Desarrollo Tecnológico e Innovación (SENNOVA)</strong>, el cual es un espacio dinámico para la promoción de la innovación y los procesos de investigación en nuestro centro formativo.</p>
                                <div class="d-flex align-items-start">
                                    <?php // Html::a('Solicita Asesoría', ['site/contact'], ['class' => 'btn btn-success btn-lg text-white']); ?>
                                    <!-- <a href="#" class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#videoModal">Más Información</a> -->
                                    <?= Html::a('Más Información', ['site/contact'], ['class' => 'btn btn-dark btn-lg']) ?>
                                </div>
                            </div>
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
    </section>
    <!-- End of Slider principal -->

    <!-- 
    =================================================================================================================================
    Sección: 2
    Título: Información general
    Descripción: En esta sección se invita al usuario a conocer los diferentes proyectos a traves de un texto introductorio y un call
                 to action button para que se ponga en contacto con el equipo de Sennovalab y solicite una asesoria.
    =================================================================================================================================
    -->
    <!-- Información general -->
    <section>
        <div class="container col-xxl-8 px-4 py-5">
            <div class="row flex-row align-items-center g-5 py-5 h-100">
            <div class="col-lg-6 h-100">
                <div id="carouselFadeSlidesOnly" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                       <img src="images/info-section/info-section.jpg" class="d-block w-100 rounded" alt="Campesino tomando tinto disfrutando de la servitización" loading="lazy">
                    </div>
                </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h1 class="fs-3 fw-semibold lh-1 mb-3 text-dark">Conoce los proyectos detrás de SENNOVA.</h1>
                <p class="fs-4 fw-semibold text-dark">¡Sembrando juntos un futuro mejor!</p>
                <p>Estamos trabajando codo a codo contigo para llevar <span class="fw-bold">nuevas ideas y prácticas</span> que mejoren nuestras tierras y nuestras vidas. </p>
                <p>Con innovaciones que respetan la tradición y proyectos que buscan el desarrollo de nuestras comunidades, juntos podemos hacer que la agricultura sea más fuerte y sostenible.</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <!-- <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Primary</button> -->
                <button type="button" class="btn btn-success btn-lg px-4 text-white">Solicita asesoría</button>
                </div>
            </div>
            </div>
        </div>
    </section>

    <!-- 
    =================================================================================================================================
    Sección: 3
    Título: Proyectos destacados
    Descripción: En esta sección se muestran un carousel de tarjetas que llevan a los diferentes proyectos que componen el ecosistema
                 de Sennova del centro de comercio regional antioquia.
    =================================================================================================================================
    -->
    <!-- Proyectos destacados -->
    <section>
        <div class="container px-5" style="margin-bottom: 50px;">
            <!-- title section  -->
            <div class="row" style="margin-bottom: 40px;">
                <div class="col">
                    <h1 class="display-5 fw-semibold text-center">Proyectos Destacados</h1>
                </div>
            </div>
            <!-- carousel  -->
            <?php /*
            <!-- deprecated projects card section  -->
            <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg mb-5">
                <div class="row">
                    <!-- Primera tarjeta -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card">
                            <img src="images/project/project-01.jpg" class="card-img-top" alt="Imagen 1">
                            <div class="card-body rounded-bottom-1" style="background-color: #2CB0E4;">
                            <a href="#" class="text-decoration-none"><h4 class="card-title text-center text-light fw-semibold">FEI</h4></a>
                            <!-- <p class="card-text">Descripción breve del proyecto 1.</p> -->
                            <!-- <a href="#" class="btn btn-primary">Ver más</a> -->
                            </div>
                        </div>
                    </div>
                    <!-- Segunda tarjeta -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card">
                            <img src="images/project/project-02.jpg" class="card-img-top" alt="Imagen 2">
                            <div class="card-body rounded-bottom-1" style="background-color: #74B848;">
                            <a href="https://serviser.datasena.com/labserviser/" class="text-decoration-none"><h4 class="card-title text-center text-light fw-semibold">ServiSER</h4></a>
                            <!-- <p class="card-text">Descripción breve del proyecto 2.</p> -->
                            <!-- <a href="#" class="btn btn-primary">Ver más</a> -->
                            </div>
                        </div>
                    </div>
                    <!-- Tercera tarjeta -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card">
                            <img src="images/project/project-03.jpg" class="card-img-top" alt="Imagen 3">
                            <div class="card-body rounded-bottom-1" style="background-color: #F1914B;">
                            <a href="#" class="text-decoration-none"><h4 class="card-title text-center text-light fw-semibold">Congreso/Simposio</h4></a>
                            <!-- <p class="card-text">Descripción breve del proyecto 3.</p> -->
                            <!-- <a href="#" class="btn btn-primary">Ver más</a> -->
                            </div>
                        </div>
                    </div>
                    <!-- Cuarta tarjeta -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card">
                            <img src="images/project/project-03.jpg" class="card-img-top" alt="Imagen 3">
                            <div class="card-body rounded-bottom-1" style="background-color: #335B71;">
                            <h4 class="card-title text-center text-light fw-semibold">Cienciometrik</h4>
                            </div>
                        </div>
                    </div>
                    <!-- ... -->
                </div>
            </div>
            */ ?>
            <div class="p-4 pb-0 pt-lg-5 align-items-center rounded-3 border shadow-lg mb-5">
                <div class="glide projectSlider mb-4">
                    <div class="glide__track" data-glide-el="track">
                        <ul class="glide__slides" id="options-type-select">
                        <li class="glide__slide">
                            <div class="card">
                                <img src="images/project/project-01.jpg" class="card-img-top" alt="Imagen 1">
                                <div class="card-body rounded-bottom-1" style="background-color: #2CB0E4;">
                                <a href="#" class="text-decoration-none"><h4 class="card-title text-center text-light fw-semibold">FEI</h4></a>
                                <!-- <p class="card-text">Descripción breve del proyecto 1.</p> -->
                                <!-- <a href="#" class="btn btn-primary">Ver más</a> -->
                                </div>
                            </div>
                        </li>
                        <li class="glide__slide">
                            <div class="card">
                                <img src="images/project/project-02.jpg" class="card-img-top" alt="Imagen 2">
                                <div class="card-body rounded-bottom-1" style="background-color: #74B848;">
                                <a href="https://serviser.datasena.com/labserviser/" class="text-decoration-none"><h4 class="card-title text-center text-light fw-semibold">ServiSER</h4></a>
                                <!-- <p class="card-text">Descripción breve del proyecto 2.</p> -->
                                <!-- <a href="#" class="btn btn-primary">Ver más</a> -->
                                </div>
                            </div>
                        </li>
                        <li class="glide__slide">
                            <div class="card">
                                <img src="images/project/project-03.jpg" class="card-img-top" alt="Imagen 3">
                                <div class="card-body rounded-bottom-1" style="background-color: #F1914B;">
                                <a href="#" class="text-decoration-none"><h4 class="card-title text-center text-light fw-semibold">Congreso/Simposio</h4></a>
                                <!-- <p class="card-text">Descripción breve del proyecto 3.</p> -->
                                <!-- <a href="#" class="btn btn-primary">Ver más</a> -->
                                </div>
                            </div>    
                        </li>
                        <li class="glide__slide">
                            <div class="card">
                                <img src="images/project/project-03.jpg" class="card-img-top" alt="Imagen 3">
                                <div class="card-body rounded-bottom-1" style="background-color: #335B71;">
                                <h4 class="card-title text-center text-light fw-semibold">Cienciometrik</h4>
                                </div>
                            </div>
                        </li>
                        </ul>
                    </div>
                    <div class="glide__arrows" data-glide-el="controls">
                        <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><</button>
                        <button class="glide__arrow glide__arrow--right" data-glide-dir=">">></button>
                    </div>
                    <!-- <div class="glide__bullets" data-glide-el="controls[nav]">
                        <button class="glide__bullet" data-glide-dir="=0"></button>
                        <button class="glide__bullet" data-glide-dir="=1"></button>
                        <button class="glide__bullet" data-glide-dir="=2"></button>
                    </div>
                    <div data-glide-el="controls">
                        <button data-glide-dir="<<">Start</button>
                        <button data-glide-dir=">>">End</button>
                    </div> -->
                </div> 
            </div>
            <!-- CTA Button  -->
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <?= Html::a('Ver todos nuestros proyectos', ['site/portfolio'], ['class' => 'btn btn-success btn-lg text-light']) ?>
                </div>
            </div>
        </div>
    </section>

    <!-- 
    =================================================================================================================================
    Sección: 4
    Título: Galeria fotográfica
    Descripción: En esta sección se muestran fotos de los diferentes eventos en los que el grupo de Sennovalab participa, asi como
                 participaciones en ferias, foros y otras actividades relacionadas
    =================================================================================================================================
    -->
    <!-- Galeria fotográfica -->
     <section>
        <div style="background-image: url('images/backgrounds/fondo-labrado-gris.png'); background-size: cover; background-position: center; background-repeat: no-repeat;">
            <div class="container py-5">
                <h1 class="fw-semibold">Galeria fotográfica</h1>
                <p class="fw-semibold fs-4">Cada imagen captura un instante, un esfuerzo compartido, una semilla de transformación.</p>
                <p class="lead">Recorre nuestra galería y descubre cómo las manos y el corazón de nuestras comunidades están renovando la agricultura y fortaleciendo el desarrollo rural. Cada proyecto es un testimonio de innovación, esperanza y trabajo en conjunto.</p>
                <div class="p-4 rounded-3 border shadow-lg mb-5 bg-white">
                    <div class="glide pictureGallery">
                        <div class="glide__track" data-glide-el="track">
                            <ul class="glide__slides" id="options-type-select">
                                <li class="glide__slide">
                                    <img src="images/gallery/gallery-01.jpeg" class="w-100" alt="Imagen 1" loading="lazy">
                                </li>
                                <li class="glide__slide">
                                    <img src="images/gallery/gallery-02.jpeg" class="w-100" alt="Imagen 1" loading="lazy">
                                </li>
                                <li class="glide__slide">
                                    <img src="images/gallery/gallery-03.jpeg" class="w-100" alt="Imagen 1" loading="lazy">
                                </li>
                                <li class="glide__slide">
                                    <img src="images/gallery/gallery-04.jpeg" class="w-100" alt="Imagen 1" loading="lazy">
                                </li>
                                <li class="glide__slide">
                                    <img src="images/gallery/gallery-05.jpeg" class="w-100" alt="Imagen 1" loading="lazy">
                                </li>
                                <li class="glide__slide">
                                    <img src="images/gallery/gallery-06.jpeg" class="w-100" alt="Imagen 1" loading="lazy">
                                </li>
                                <li class="glide__slide">
                                    <img src="images/gallery/gallery-07.jpeg" class="w-100" alt="Imagen 1" loading="lazy">
                                </li>
                                <li class="glide__slide">
                                    <img src="images/gallery/gallery-08.jpeg" class="w-100" alt="Imagen 1" loading="lazy">
                                </li>
                                <li class="glide__slide">
                                    <img src="images/gallery/gallery-09.jpeg" class="w-100" alt="Imagen 1" loading="lazy">
                                </li>
                                <li class="glide__slide">
                                    <img src="images/gallery/gallery-10.jpeg" class="w-100" alt="Imagen 1" loading="lazy">
                                </li>
                                <li class="glide__slide">
                                    <img src="images/gallery/gallery-11.jpeg" class="w-100" alt="Imagen 1" loading="lazy">
                                </li>
                                <li class="glide__slide">
                                    <img src="images/gallery/gallery-12.jpeg" class="w-100" alt="Imagen 1" loading="lazy">
                                </li>
                            </ul>
                        </div>
                        <div class="glide__arrows" data-glide-el="controls">
                            <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><</button>
                            <button class="glide__arrow glide__arrow--right" data-glide-dir=">">></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </section>

    <!-- deprecated section using bootstrap to create a slider with multiple cards  -->
    <section>
        <?php /*
        <div class="container px-5" style="margin-bottom: 50px;">
            <!-- Section title -->
            <div class="row" style="margin-bottom: 40px;">
                <div class="col">
                    <h1 class="display-5 fw-semibold text-center">Proyectos Destacados</h1>
                </div>
            </div>
            <!-- Carousel multiple cards -->
            <div class="carousel projectsCarousel" id="projectsCarousel" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <img src="https://placehold.co/600x400?text=Project+1" alt="one" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <img src="https://placehold.co/600x400?text=Project+2" alt="one" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <img src="https://placehold.co/600x400?text=Project+3" alt="one" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <img src="https://placehold.co/600x400?text=Project+4" alt="one" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <img src="https://placehold.co/600x400?text=Project+5" alt="one" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <img src="https://placehold.co/600x400?text=Project+6" alt="one" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <img src="https://placehold.co/600x400?text=Project+7" alt="one" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <img src="https://placehold.co/600x400?text=Project+8" alt="one" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <img src="https://placehold.co/600x400?text=Project+9" alt="one" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Create next/prev buttons  -->
                <button class="carousel-control-prev" type="button" data-bs-target="#projectsCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#projectsCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        */ ?>
    </section>
</main>

<!-- Initialize glide  -->
<script src="https://cdn.jsdelivr.net/npm/@glidejs/glide@3.5.2/dist/glide.min.js"></script>
<script>
var glide = new Glide(".projectSlider", {
  type: "carousel",
  focusAt: "center",
  perView: 3,
  breakpoints: {
    998: {
      perView: 2 
    },
    768: { 
      perView: 1
    }
  }
});
glide.mount();

var glidePictureGallery = new Glide(".pictureGallery", {
  type: "carousel",
  perView: 2,
  breakpoints: {
    998: {
      perView: 1
    }
  },
  controls: true
});
glidePictureGallery.mount();
</script>

<!-- show 4 image at a time using bootstrap 5 -->
<!-- <script>
    var items = document.querySelectorAll('.projectsCarousel .carousel-item');
    items.forEach((e) => {
        const slide = 4;
        let next = e.nextElementSibling;
        for(var i = 0; i < slide; i++) {
            if(!next) {
                next = items[0]
            }
            let clonechild = next.cloneNode(true);
            e.appendChild(clonechild.children[0]);
            next = next.nextElementSibling;
        }
    })
</script> -->

<!-- <button id="scrollToTopBtn" class="btn btn-dark">
    ↑ Top
</button> -->
