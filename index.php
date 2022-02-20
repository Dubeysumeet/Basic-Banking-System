<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Bootstrap CDN -->
  <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">

  <!-- AOS  -->
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />

  <title>Basic Banking System</title>
</head>

<body onload="loader()">
  <!-- loader for splash screen -->
  <div id="loading"></div>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Basic Bank</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="allusers.php">Customers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="transfermoney.php">Transfer Money</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="transactionhistory.php">Transaction History</a>
        </li>
    </div>
  </nav>

  <div class="container-fluid">
    <!-- Introduction section -->
    <!-- here content starts here -->
    <div class="container-fluid hero-content">
      <div class="row align-items-center">
        <div class="col-md-6 col-sm-12 text-center" data-aos="fade-up">
          <h1>Money transaction</h1>
          <p class="lead muted">Easy way to transfer money from any where</p>
          <p>Welcome</p>
          <br>
          <br>
          <a class="get-started" href="transfermoney.php">Transfer Now</a>
        </div>
        <div class="col-md-6 col-sm-12 text-center" data-aos="fade-left">
          <div class="hero-img-div">
            <img class="hero-img" src="img/hero-img.svg" alt="img-showing-money-transfer">
          </div>
        </div>
      </div>
    </div>
    <!-- here content ends here -->
  </div>

  <!-- footer starts here -->
  <footer>
    <hr>
    <div class="row text-center">
      <div class="col-md-6">
        <p> &copy This project is made by Sumeet Dubey.</p>

      </div>
      <div class="col-md-6 text-center">
        <ul class="social-icons">
          Contact Me:
          <li><a target="_blank" class="github" href="https://github.com/Dubeysumeet"><i class="fab fa-github fa-2x"></i></a></li>
          <li><a target="_blank" class="linkedin" href="https://www.linkedin.com/in/dsumeet/"><i class="fab fa-linkedin fa-2x"></i></a></li>
        </ul>
      </div>
    </div>
  </footer>
  <!-- footer ends here -->

  <!-- spalsh screen js -->
  <script>
    var preloader = document.getElementById("loading");

    function loader() {
      preloader.style.display = "none";
    }
  </script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"></script>
  <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <!-- aos data  -->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 700,
    });
  </script>
</body>

</html>