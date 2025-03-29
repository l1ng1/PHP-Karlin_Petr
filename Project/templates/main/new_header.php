<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Страница приветствия</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body>
<header>
<nav style='background-image: linear-gradient( #75188f,  #410a47); border-radius: 50px; padding: 15px; background-color: none;' class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul style='width: 300px; display: flex; justify-content: space-between;' class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a style='color: white; font-weight: 500; font-size: 18px;' class="nav-link active" aria-current="page" href="<?= $_SERVER['SCRIPT_NAME']; ?>">Главная</a>
        </li>
        <li class="nav-item">
          <a style='color: white; font-weight: 500; font-size: 18px;' class="nav-link" href="<?= dirname($_SERVER['SCRIPT_NAME']); ?>/hello/Astolfo">Привет</a>
        </li>
        <li class="nav-item">
          <a style='color: white; font-weight: 500; font-size: 18px;' class="nav-link" href="<?= dirname($_SERVER['SCRIPT_NAME']); ?>/bye/Felix_Argyle">Пока</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</header>
<main>
    <div class="container mt-3">