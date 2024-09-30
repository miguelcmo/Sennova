<?php

/** @var yii\web\View $this */
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Serviser'; ?>

<main>
  <!-- 
  =================================================================================================================================
  Sección: 1
  Título: Slider principal
  Descripción: Slider de imagenes tipo hero (3 imagenes) alusivas a procesos de servitizacion, contiene dos botones uno para el
               formulario de asesoría y el otro para el video de servitización que se muestra en un modal.
  =================================================================================================================================
  -->
  <!-- Slider principal -->
  <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
          <!-- Imagen 1 -->
          <div class="carousel-item active">
              <!-- <img src="https://via.placeholder.com/1920x900" class="d-block w-100" alt="Slide 1"> -->
              <img src="images/landing/producto-cafe.jpg" class="d-block w-100" alt="Slide 1">
              <div class="overlay bg-secondary bg-opacity-25 position-absolute top-0 start-0 w-100 h-100"></div>
              <div class="carousel-caption d-flex flex-column justify-content-end h-100" style="padding-bottom: 70px;">
                  <h1 class="display-5 fw-bold">¿Buscas transformar y hacer crecer tu empresa?</h1>
                  <p class="fw-bold fs-4">La servitización es la estrategia clave. ¡Conoce aquí cómo hacerlo!</p>
                  <div>
                      <?= Html::a('Solicita Asesoría', ['site/contact'], ['class' => 'btn btn-success btn-lg mx-2 text-white']); ?>
                      <a href="#" class="btn btn-light btn-lg mx-2" data-bs-toggle="modal" data-bs-target="#videoModal">Más Información</a>
                  </div>
              </div>
          </div>
          <!-- Imagen 2 -->
          <div class="carousel-item">
              <!-- <img src="https://via.placeholder.com/1920x900/ff7f7f" class="d-block w-100" alt="Slide 2"> -->
              <img src="images/landing/producto-cuero.jpg" class="d-block w-100" alt="Slide 1">
              <div class="overlay bg-secondary bg-opacity-25 position-absolute top-0 start-0 w-100 h-100"></div>
              <div class="carousel-caption d-flex flex-column justify-content-end h-100" style="padding-bottom: 70px;">
                  <h1 class="display-5 fw-bold">¿Buscas transformar y hacer crecer tu empresa?</h1>
                  <p class="fw-bold fs-4">La servitización es la estrategia clave. ¡Conoce aquí cómo hacerlo!</p>
                  <div>
                      <?= Html::a('Solicita Asesoría', ['site/contact'], ['class' => 'btn btn-success btn-lg mx-2 text-white']); ?>
                      <a href="#" class="btn btn-light btn-lg mx-2" data-bs-toggle="modal" data-bs-target="#videoModal">Más Información</a>
                  </div>
              </div>
          </div>
          <!-- Imagen 3 -->
          <div class="carousel-item">
              <!-- <img src="https://via.placeholder.com/1920x900/7f7fff" class="d-block w-100" alt="Slide 3"> -->
              <img src="images/landing/producto-textil.jpg" class="d-block w-100" alt="Slide 1">
              <div class="overlay bg-dark bg-opacity-25 position-absolute top-0 start-0 w-100 h-100"></div>
              <div class="carousel-caption d-flex flex-column justify-content-end h-100" style="padding-bottom: 70px;">
                  <h1 class="display-5 fw-bold">¿Buscas transformar y hacer crecer tu empresa?</h1>
                  <p class="fw-bold fs-4">La servitización es la estrategia clave. ¡Conoce aquí cómo hacerlo!</p>
                  <div>
                      <?= Html::a('Solicita Asesoría', ['site/contact'], ['class' => 'btn btn-success btn-lg mx-2 text-white']); ?>
                      <a href="#" class="btn btn-light btn-lg mx-2" data-bs-toggle="modal" data-bs-target="#videoModal">Más Información</a>
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
      <div class="modal-dialog modal-xl modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title text-center" id="videoModalLabel">Más Información</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class="ratio ratio-16x9">
                      <iframe id="videoFrame" src="" title="Serviser video" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <!-- Antigua seccion video servitizacion DEPRECATED -->
  <!-- <div class="container col-xl-12 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-lg-6">
        <video
          class="d-block mx-lg-auto img-fluid"
          style="border-radius: 5px"
          width="100%"
          autoplay
          controls
          loading="lazy"
        >
          <source
            src="https://firebasestorage.googleapis.com/v0/b/labserviser.appspot.com/o/serviser-onboarding.mp4?alt=media&token=25c87181-88ba-4d38-8250-b71d8f79b9bd"
            type="video/mp4"
          >
          Your browser does not support the video tag.
        </video>
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">
          Transforma tu Negocio con Servitización
        </h1>
        <p class="lead">
          Descubre cómo el SENA puede ayudarte a innovar y crecer. Agenda una
          cita para conocer nuestros servicios personalizados para empresarios y
          mipymes.
        </p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
          <button type="button" class="btn btn-dark btn-lg px-4 me-md-2">
            Solicita tu Asesoría
          </button>
          <a href="#proceso" class="d-block"><button type="button" class="btn btn-outline-secondary btn-lg px-4 w-100">
            Más Información
          </button></a>
        </div>
      </div>
    </div>
  </div> -->

  <!-- 
  =================================================================================================================================
  Sección: 2
  Título: Galeria Serviser + Descripción general servicio
  Descripción: Sección de contenido dos columnas, en la clumna de la izquierda se muestra galeria fotografica de diferentes eventos 
              del proyectos en modo carrusel automatico y en la columna de la derecha se muestra una descripcion del proceso de 
              servitización.
  =================================================================================================================================
  -->
  <!-- Segunda sección diseño aprobado images al lado izq y texto explicativo del proceso de servitizacion -->
  <div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-row align-items-center g-5 py-5 h-100">
      <div class="col-lg-6 h-100">
        <div id="carouselFadeSlidesOnly" class="carousel slide carousel-fade" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="images/carousel/carousel1.jpg" class="d-block w-100 rounded" alt="..." loading="lazy">
            </div>
            <div class="carousel-item">
              <img src="images/carousel/carousel2.jpg" class="d-block w-100 rounded" alt="..." loading="lazy">
            </div>
            <div class="carousel-item">
              <img src="images/carousel/carousel3.jpg" class="d-block w-100 rounded" alt="..." loading="lazy">
            </div>
            <div class="carousel-item">
              <img src="images/carousel/carousel4.jpg" class="d-block w-100 rounded" alt="..." loading="lazy">
            </div>
            <div class="carousel-item">
              <img src="images/carousel/carousel5.jpg" class="d-block w-100 rounded" alt="..." loading="lazy">
            </div>
            <div class="carousel-item">
              <img src="images/carousel/carousel6.jpg" class="d-block w-100 rounded" alt="..." loading="lazy">
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <h1 class="fs-3 fw-semibold text-body-emphasis lh-1 mb-3 text-dark">Descubre la Servitización: Tu Clave para el Crecimiento Sostenible</h1>
        <p class="lead">Conoce cómo la servitización puede impulsar <b>la innovación y el desarrollo de tu negocio</b>. Explora las múltiples oportunidades que te ofrece el SENA  y <b>aprende a optimizar tus procesos, adquiere nuevas habilidades y accede a tecnologías avanzadas</b>.</p>
        <p class="lead">Agenda una cita con nuestros expertos y descubre cómo podemos trabajar juntos para transformar tu empresa.</p>
        <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-start">
          <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Primary</button>
          <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button>
        </div> -->
      </div>
    </div>
  </div>


  <!-- 
  =================================================================================================================================
  Sección: 3
  Título: Roadmap del proceso de servitización
  Descripción: Sección de contenido una sola columna donde se inserta imagen del roadmap de servitizacion indicando los pasos a 
               seguir por las MiPymes y UPs para acceder al programa de Servitización.
  =================================================================================================================================
  -->
  <!-- Identificador de la tercera sección -->
  <div id="proceso"></div>
  <!-- Features section to show the servitization proccess -->
  <section class="bg-light py-5 py-xl-8" style="width: 100vw; margin-left: calc(-50vw + 50%);">
    <div class="py-5 py-8" id="proceso">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <h2 class="mb-3 display-5 fw-bold text-center">
              Sigue la Ruta de la Servitización y transforma tu negocio
            </h2>
            <p class="fs-5 text-muted text-center">
              Descubre el camino hacia la servitización para el éxito de tu empresa. Te acompañamos en cada etapa para asegurar el cumplimiento de tus objetivos: Asesoría inicial, caracterización de necesidades, implementación y seguimiento de las actividades claves.
            </p>
          </div>
          <?php /*
          <div class="col-lg-12 col-md-12 col-12">
            <!-- row 1 -->
            <div class="row mt-2" >
              <!-- col 1 -->
              <div class="col-md-6 col-12 pe-lg-6 mb-lg-6 mb-4">
                <i class="bi bi-1-square" style="font-size: 3rem;"></i>
                <h2 class="fw-bold">Solicita tu cita y conócenos</h2>
                <p class="fs-5">
                  Después de ver el video, el cliente solicita una cita a través de un formulario en línea para obtener más detalles y comenzar el proceso.
                </p>
              </div>
              <!-- col 2 -->
              <div class="col-md-6 col-12 pe-lg-6 mb-lg-6 mb-4">
                <i class="bi bi-2-square" style="font-size: 3rem;"></i>
                <h2 class="fw-bold">Explicación del Proceso y Servicios</h2>
                <p class="fs-5">
                  En la cita, un asesor del SENA explica el proceso completo y los servicios a los cuales el empresario o la mipyme tendrá acceso.
                </p>
              </div>
              <!-- col 3 -->
              <div class="col-md-6 col-12 pe-lg-6 mb-lg-6 mb-4">
                <i class="bi bi-3-square" style="font-size: 3rem;"></i>
                <h2 class="fw-bold">Realización de la Caracterización</h2>
                <p class="fs-5">
                  Se solicita al usuario que complete una caracterización para entender mejor sus necesidades y definir la ruta de apoyo más adecuada.
                </p>
              </div>
              <!-- col 4 -->
              <div class="col-md-6 col-12 pe-lg-6 mb-lg-6 mb-4">
                <i class="bi bi-4-square" style="font-size: 3rem;"></i>
                <h2 class="fw-bold">Definición de la Ruta de Apoyo</h2>
                <p class="fs-5">
                  Basado en la caracterización, se define una ruta de apoyo que incluye módulos de refuerzo en áreas como mercadeo, ventas, logística y comercio internacional.
                </p>
              </div>
              <!-- col 5 -->
              <div class="col-md-6 col-12 pe-lg-6 mb-lg-6 mb-4">
                <i class="bi bi-5-square" style="font-size: 3rem;"></i>
                <h2 class="fw-bold">Asignación de Tutor Líder y Aprendiz</h2>
                <p class="fs-5">
                  Se asigna un tutor líder y un aprendiz al cliente para ayudarlo a implementar las actividades propuestas y fortalecer sus operaciones.
                </p>
              </div>
              <!-- col 6 -->
              <div class="col-md-6 col-12 pe-lg-6 mb-lg-6 mb-4">
                <i class="bi bi-6-square" style="font-size: 3rem;"></i>
                <h2 class="fw-bold">Ejecución de Actividades</h2>
                <p class="fs-5">
                  Con la guía del tutor y el apoyo del aprendiz, el cliente realiza las actividades definidas en la ruta de apoyo para mejorar y crecer su negocio.
                </p>
              </div>
              <!-- col 7 -->
              <div class="col-md-6 col-12 pe-lg-6 mb-lg-6 mb-4">
                <i class="bi bi-7-square" style="font-size: 3rem;"></i>
                <h2 class="fw-bold">Seguimiento y Evaluación</h2>
                <p class="fs-5">
                  Se lleva a cabo un seguimiento continuo y una evaluación del progreso para asegurar que se están cumpliendo los objetivos establecidos.
                </p>
              </div>
              <!-- end of process list -->
            </div>
          </div>
          */ ?>
        </div>
      </div>
      <div class="container-fluid p-0">
        <div class="row">
          <!-- Imagen para pantallas grandes (PC) -->
          <div class="col d-none d-md-block">
            <img src="images/landing/roadmap-serviser-xl.png" class="w-100" alt="Roadmap proceso de servitización para PC" loading="lazy" />
          </div>
          <!-- Imagen para pantallas pequeñas (móvil) -->
          <div class="col d-block d-md-none">
            <img src="images/landing/roadmap-serviser-md.png" class="w-100" alt="Roadmap proceso de servitización para móvil" loading="lazy" />
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 
  =================================================================================================================================
  Sección: 4
  Título: Modulos del proceso de servitización
  Descripción: Galeria de tarejetas donde se muestran los modulos de servitizacion cada modulo lanza un modal con una descripcion
               breve del contenido del modulo.
  =================================================================================================================================
  -->
  <!-- Cuarta sección Modulos de Servitización -->
  <section>
    <div class="container-fluid" style="padding: 60px 40px;">
      <header>
        <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
          <h1 class="fs-2 fw-normal text-body-emphasis text-dark">Catálogo de Soluciones Personalizadas e <br>innovadoras para Impulsar tu Empresa con <br>servitización.</h1>
          <p class="lead text-decoration-underline">APRENDE, APLICA Y TRANSFORMA</p>
        </div>
      </header>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 text-center">
          <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
              <div class="card-header py-3">
                <h4 class="my-0 fw-normal">Diagnóstico</h4>
              </div>
              <div class="card-body">
                <img src="images/modules/module5.jpg" class="w-100 rounded" />
                <p class="py-3">Realiza nuestro diagnóstico e identifica oportunidades para impulsar la servitización empresarial.</p>
                <!-- <button type="button" class="w-100 btn btn-lg btn-primary">Contact us</button> -->
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
              <div class="card-header py-3">
                <h4 class="my-0 fw-normal">Mercadeo</h4>
              </div>
              <div class="card-body">
                <img src="images/modules/module1.jpg" class="w-100 rounded" />
                <p class="py-3">Impulsa la visibilidad de tu negocio con estrategias de marketing innovadoras y orientadas a resultados.</p>
                <!-- <button type="button" class="w-100 btn btn-lg btn-outline-primary">Sign up for free</button> -->
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
              <div class="card-header py-3">
                <h4 class="my-0 fw-normal">Logística</h4>
              </div>
              <div class="card-body">
                <img src="images/modules/module2.jpg" class="w-100 rounded" />
                <p class="py-3">Optimiza tu cadena de suministro para garantizar la eficiencia en cada etapa del proceso.</p>
                <!-- <button type="button" class="w-100 btn btn-lg btn-primary">Get started</button> -->
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
              <div class="card-header py-3">
                <h4 class="my-0 fw-normal">Ventas</h4>
              </div>
              <div class="card-body">
                <img src="images/modules/module3.jpg" class="w-100 rounded" />
                <p class="py-3">Mejora tus técnicas de ventas y maximiza la conversión de clientes con herramientas efectivas.</p>
                <!-- <button type="button" class="w-100 btn btn-lg btn-primary">Contact us</button> -->
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
              <div class="card-header py-3">
                <h4 class="my-0 fw-normal">Comercio Internacional</h4>
              </div>
              <div class="card-body">
                <img src="images/modules/module4.jpg" class="w-100 rounded" />
                <p class="py-3">Expande tu negocio a nivel global con estrategias que facilitan el acceso a nuevos mercados internacionales.</p>
                <!-- <button type="button" class="w-100 btn btn-lg btn-primary">Contact us</button> -->
              </div>
            </div>
          </div>
        </div>
        <div class="pricing-header pb-md-4 mx-auto text-center">
          <p class="lead fw-normal text-body-emphasis">¿Te gustaría acceder a nuestros módulos de servitización?</p>
          <?= Html::a('Solicita tu asesoría aquí', ['site/contact'], ['class' => 'btn btn-success btn-lg mx-2']); ?>
        </div>
    </div>  
  </section>
  
  <!-- 
  =================================================================================================================================
  Sección: 5
  Título: Sección testimonios
  Descripción: Galeria de tarjetas 3 por fila con testimonios de las presonas que han accedido al proceso de servitización
  =================================================================================================================================
  -->
  <!-- Identificador de la quinta sección Testimonios -->
  <div id="testimonio"></div>
  <!-- Testimonial 3 - Bootstrap Brain Component -->
  <section class="bg-light py-5 py-xl-8">
    <!-- Titular sección testimonios-->
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-12 col-md-10 col-lg-9 col-xl-8 col-xxl-8">
          <h2 class="fs-2 text-dark mb-2 text-center">
            Descubre cómo nuestro programa de servitización ha transformado negocios y ha capacitado a futuros líderes.
          </h2>
          <br>
          <p class="fs-4 mb-4 mb-md-5 text-center">
            TESTIMONIOS DE ÉXITO
          </p>
          <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle" />
        </div>
      </div>
    </div>
    <!-- tarjetas de testimonios-->
    <div class="container overflow-hidden">
      <div class="row gy-4 gy-md-0 gx-xxl-5">
        <!-- Testimonio 1 -->
        <div class="col-12 col-md-4 mb-5">
          <div class="card border-0 border-bottom border-primary shadow-sm">
            <div class="card-body p-4 p-xxl-5">
              <figure>
                <img
                  class="img-fluid rounded mb-4 border border-5"
                  loading="lazy"
                  src="images/testimonial-img-1.jpg"
                  alt="Carlos Pérez"
                />
                <figcaption>
                  <div
                    class="bsb-ratings text-warning mb-3"
                    data-bsb-star="5"
                    data-bsb-star-off="0"
                  ></div>
                  <blockquote class="bsb-blockquote-icon mb-4">
                    El proceso de servitización que implementamos con la ayuda
                    del SENA ha sido transformador para Tech Innovadores S.A.S.
                    Pasamos de ser una empresa enfocada únicamente en productos
                    a ofrecer soluciones integrales que han aumentado
                    significativamente nuestra base de clientes y nuestros
                    ingresos. La asesoría fue excelente y personalizada,
                    adaptada a nuestras necesidades específicas. ¡Recomiendo
                    este servicio a todas las empresas que buscan innovar y
                    crecer!
                  </blockquote>
                  <h4 class="mb-2">Carlos Pérez</h4>
                  <h5 class="fs-6 text-secondary">Gerente General</h5>
                  <h5 class="fs-6 text-secondary mb-0">
                    Tech Innovadores S.A.S.
                  </h5>
                </figcaption>
              </figure>
            </div>
          </div>
        </div>
        <!-- Testimonio 2 -->
        <div class="col-12 col-md-4 mb-5">
          <div class="card border-0 border-bottom border-primary shadow-sm">
            <div class="card-body p-4 p-xxl-5">
              <figure>
                <img
                  class="img-fluid rounded mb-4 border border-5"
                  loading="lazy"
                  src="images/testimonial-img-2.jpg"
                  alt="Laura Gómez"
                />
                <figcaption>
                  <div
                    class="bsb-ratings text-warning mb-3"
                    data-bsb-star="5"
                    data-bsb-star-off="0"
                  ></div>
                  <blockquote class="bsb-blockquote-icon mb-4">
                    Gracias al SENA y su programa de servitización, en
                    AgroSolutions Ltda. hemos logrado integrar servicios
                    adicionales que han mejorado la satisfacción de nuestros
                    clientes y nos han diferenciado en el mercado. El apoyo
                    recibido fue profesional y muy completo, abarcando desde la
                    planificación hasta la implementación. Sin duda, este ha
                    sido un paso crucial para nuestra evolución como empresa.
                  </blockquote>
                  <h4 class="mb-2">Laura Gómez</h4>
                  <h5 class="fs-6 text-secondary">Directora de Operaciones</h5>
                  <h5 class="fs-6 text-secondary mb-0">AgroSolutions Ltda.</h5>
                </figcaption>
              </figure>
            </div>
          </div>
        </div>
        <!-- Testimonio 3 -->
        <div class="col-12 col-md-4 mb-5">
          <div class="card border-0 border-bottom border-primary shadow-sm">
            <div class="card-body p-4 p-xxl-5">
              <figure>
                <img
                  class="img-fluid rounded mb-4 border border-5"
                  loading="lazy"
                  src="images/testimonial-img-3.jpg"
                  alt="Andrés Ramírez"
                />
                <figcaption>
                  <div
                    class="bsb-ratings text-warning mb-3"
                    data-bsb-star="5"
                    data-bsb-star-off="0"
                  ></div>
                  <blockquote class="bsb-blockquote-icon mb-4">
                    Participar como asesor en el proceso de servitización de una
                    mipyme ha sido una experiencia increíblemente enriquecedora.
                    Trabajé directamente con AgroSolutions Ltda. y pude aplicar
                    mis conocimientos teóricos en un entorno real, viendo de
                    primera mano el impacto positivo de nuestras
                    recomendaciones. Esta experiencia no solo me ha preparado
                    mejor para mi carrera profesional, sino que también me ha
                    dado la satisfacción de contribuir al crecimiento de una
                    empresa local.
                  </blockquote>
                  <h4 class="mb-2">Andrés Ramírez</h4>
                  <h5 class="fs-6 text-secondary">
                    Aprendiz de Gestión Empresarial
                  </h5>
                  <h5 class="fs-6 text-secondary mb-0">
                    Gestión Empresarial SENA
                  </h5>
                </figcaption>
              </figure>
            </div>
          </div>
        </div>
        <!-- Testimonio 4 -->
        <div class="col-12 col-md-4 mb-5">
          <div class="card border-0 border-bottom border-primary shadow-sm">
            <div class="card-body p-4 p-xxl-5">
              <figure>
                <img
                  class="img-fluid rounded mb-4 border border-5"
                  loading="lazy"
                  src="images/testimonial-img-4.jpg"
                  alt="Juan Martínez"
                />
                <figcaption>
                  <div
                    class="bsb-ratings text-warning mb-3"
                    data-bsb-star="5"
                    data-bsb-star-off="0"
                  ></div>
                  <blockquote class="bsb-blockquote-icon mb-4">
                    El SENA nos ha ayudado a dar un giro significativo en
                    nuestra empresa. Con la servitización, ahora ofrecemos
                    mantenimiento y asesoría postventa, lo que ha incrementado
                    la lealtad de nuestros clientes y ha abierto nuevas fuentes
                    de ingresos. La guía y el apoyo del SENA fueron invaluables
                    para alcanzar este éxito.
                  </blockquote>
                  <h4 class="mb-2">Juan Martínez</h4>
                  <h5 class="fs-6 text-secondary">Director General</h5>
                  <h5 class="fs-6 text-secondary mb-0">
                    Soluciones Energéticas S.A.
                  </h5>
                </figcaption>
              </figure>
            </div>
          </div>
        </div>
        <!-- Testimonio 5 -->
        <div class="col-12 col-md-4 mb-5">
          <div class="card border-0 border-bottom border-primary shadow-sm">
            <div class="card-body p-4 p-xxl-5">
              <figure>
                <img
                  class="img-fluid rounded mb-4 border border-5"
                  loading="lazy"
                  src="images/testimonial-img-5.jpg"
                  alt="María Fernanda Ruiz"
                />
                <figcaption>
                  <div
                    class="bsb-ratings text-warning mb-3"
                    data-bsb-star="5"
                    data-bsb-star-off="0"
                  ></div>
                  <blockquote class="bsb-blockquote-icon mb-4">
                    En BioTech Colombia, la servitización nos permitió
                    diversificar nuestros servicios y crear valor agregado para
                    nuestros clientes. La colaboración con el SENA fue
                    excepcional, proporcionándonos las herramientas y
                    estrategias necesarias para llevar nuestra empresa al
                    siguiente nivel. ¡Estamos muy agradecidos por este apoyo!
                  </blockquote>
                  <h4 class="mb-2">María Fernanda Ruiz</h4>
                  <h5 class="fs-6 text-secondary">CEO</h5>
                  <h5 class="fs-6 text-secondary mb-0">BioTech Colombia</h5>
                </figcaption>
              </figure>
            </div>
          </div>
        </div>
        <!-- Testimonio 6 -->
        <div class="col-12 col-md-4 mb-5">
          <div class="card border-0 border-bottom border-primary shadow-sm">
            <div class="card-body p-4 p-xxl-5">
              <figure>
                <img
                  class="img-fluid rounded mb-4 border border-5"
                  loading="lazy"
                  src="images/testimonial-img-6.jpg"
                  alt="Daniela López"
                />
                <figcaption>
                  <div
                    class="bsb-ratings text-warning mb-3"
                    data-bsb-star="5"
                    data-bsb-star-off="0"
                  ></div>
                  <blockquote class="bsb-blockquote-icon mb-4">
                    Trabajar como asesora en el proceso de servitización de Tech
                    Innovadores S.A.S. fue una experiencia transformadora. Pude
                    ver cómo mis aportes ayudaban a la empresa a innovar y
                    crecer. El aprendizaje práctico que obtuve supera con creces
                    cualquier teoría, y me siento orgullosa de haber contribuido
                    al éxito de una empresa colombiana.
                  </blockquote>
                  <h4 class="mb-2">Daniela López</h4>
                  <h5 class="fs-6 text-secondary">
                    Aprendiz de Innovación Empresarial
                  </h5>
                  <h5 class="fs-6 text-secondary mb-0">SENA</h5>
                </figcaption>
              </figure>
            </div>
          </div>
        </div>
        <!-- Fin testimonios -->
      </div>
    </div>
  </section>
</main>

  <!-- 
  =================================================================================================================================
  Sección: N/A
  Título: Control de la reproducción del video de servitización
  Descripción: Controla la reproducción y pausa del video de servitización cuando el modal se abre o se cierra
  =================================================================================================================================
  -->
<script>
    // Captura el modal y el iframe del video
    const videoModal = document.getElementById('videoModal');
    const videoFrame = document.getElementById('videoFrame');
    const videoSrc = "https://firebasestorage.googleapis.com/v0/b/labserviser.appspot.com/o/serviser-onboarding.mp4?alt=media&token=25c87181-88ba-4d38-8250-b71d8f79b9bd";

    // Escucha el evento de cerrar el modal
    videoModal.addEventListener('hidden.bs.modal', function () {
        // Elimina el src para detener el video
        videoFrame.src = '';
    });

    // Escucha el evento de abrir el modal
    videoModal.addEventListener('shown.bs.modal', function () {
        // Restaura el src del video solo cuando se abre el modal
        videoFrame.src = videoSrc;
    });
</script>
