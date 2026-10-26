<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
    <style>
    .img-carrusel {
        height: fit-content;         /* Ajusta la altura a los pixeles que prefieras */
        object-fit: fill;    /* Evita que la imagen se aplaste o deforme */
    }
</style>
</head>
<body>
    <h1>Sistema Medico</h1>
    <x-navegacion/>
    <div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRC36a-2jKXZBgZEpj5Xya7dpbPxSirUFLuqN3q1m9kNxrzFd5V2holG5A&s=10" class="d-block w-100 img-carrusel"  alt="dr-pibble">
    </div>
    <div class="carousel-item">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSb7ZNYmJgyVAAjUqAkbQ8BUBgLllRoXsBeveZjZv9D7A&s=10" class="d-block w-100 img-carrusel" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSLqGexUsHQDEexWF5cYdSVyzNxgjD2xk6K2Q4Itva8og&s=10" class="d-block w-100 img-carrusel" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>