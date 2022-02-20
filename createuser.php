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
  <link rel="stylesheet" type="text/css" href="css/table.css">
  <link rel="stylesheet" type="text/css" href="css/createuser.css">
  <title>Create User</title>

</head>

<body>


  <?php
  include 'config.php';
  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $balance = $_POST['balance'];
    $sql = "insert into users(name,email,balance) values('{$name}','{$email}','{$balance}')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      echo "<script> alert('Hurray! User created');
                               window.location='transfermoney.php';
                     </script>";
    }
  }
  ?>
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


  <h2 class="text-center pt-4">Create a User</h2>
  <br>

  <div class="background">
    <div class="container">
      <div class="screen">
        <div class="screen-header">
          <div class="screen-header-right">
            <div class="screen-header-ellipsis"></div>
            <div class="screen-header-ellipsis"></div>
            <div class="screen-header-ellipsis"></div>
          </div>
        </div>
        <div class="screen-body">
          <div class="screen-body-item left">
            <img class="img-fluid" src="img/user3.jpg" style="border: none; border-radius: 50%;">
          </div>
          <div class="screen-body-item">
            <form class="app-form" method="post">
              <div class="app-form-group">
                <input class="app-form-control" placeholder="NAME" type="text" name="name" required>
              </div>
              <div class="app-form-group">
                <input class="app-form-control" placeholder="EMAIL" type="email" name="email" required>
              </div>
              <div class="app-form-group">
                <input class="app-form-control" placeholder="BALANCE" type="number" name="balance" required>
              </div>
              <br>
              <div class="app-form-group button">
                <input class="app-form-button" type="submit" value="CREATE" name="submit"></input>
                <input class="app-form-button" type="reset" value="RESET" name="reset"></input>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
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


</body>

</html>