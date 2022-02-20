<?php
include 'config.php';

if (isset($_POST['submit'])) {
  $from = $_GET['id'];
  $to = $_POST['to'];
  $amount = $_POST['amount'];

  $sql = "SELECT * from users where uid=$from";
  $query = mysqli_query($conn, $sql);
  $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

  $sql = "SELECT * from users where uid=$to";
  $query = mysqli_query($conn, $sql);
  $sql2 = mysqli_fetch_array($query);



  // constraint to check input of negative value by user
  if (($amount) < 0) {
    echo '<script type="text/javascript">';
    echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
    echo '</script>';
  }



  // constraint to check insufficient balance.
  else if ($amount > $sql1['balance']) {

    echo '<script type="text/javascript">';
    echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
    echo '</script>';
  }



  // constraint to check zero values
  else if ($amount == 0) {

    echo "<script type='text/javascript'>";
    echo "alert('Oops! Zero value cannot be transferred')";
    echo "</script>";
  } else {

    // deducting amount from sender's account
    $newbalance = $sql1['balance'] - $amount;
    $sql = "UPDATE users set balance=$newbalance where uid=$from";
    mysqli_query($conn, $sql);


    // adding amount to reciever's account
    $newbalance = $sql2['balance'] + $amount;
    $sql = "UPDATE users set balance=$newbalance where uid=$to";
    mysqli_query($conn, $sql);

    $sender = $sql1['name'];
    $receiver = $sql2['name'];
    $sql = "INSERT INTO transaction (`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
    $query = mysqli_query($conn, $sql);

    if ($query) {
      echo "<script> alert('Transaction Successful');
                                     window.location='transactionhistory.php';
                           </script>";
    }

    $newbalance = 0;
    $amount = 0;
  }
}
?>

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
  <link rel="stylesheet" type="text/css" href="css/table.css" />
  <title>Transaction</title>


  <style type="text/css">
    button {
      border: none;
      background: #d9d9d9;

    }

    button:hover {
      background-color: #777E8B;
      transform: scale(1.1);
      color: white;
    }
    #footer1{
    background-color: #c2aecf;
    width: 100%;
    position: sticky;
    bottom: 0;
    left: 0;
    
}

.social-icons li{
    list-style: none;
    display: inline;
    padding: 0.5rem;
}

.github{
    color: #24292e;
}

.linkedin{
    color: #0077b5;
}

.google{
    color: #D44638;
}
  </style>
</head>

<body>



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

  <div class="container">
    <h2 class="text-center pt-4">Transaction</h2>
    <?php
    include 'config.php';
    $sid = $_GET['id'];
    $sql = "SELECT * FROM  users where uid=$sid";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
      echo "Error : " . $sql . "<br>" . mysqli_error($conn);
    }
    $rows = mysqli_fetch_assoc($result);
    ?>
    <form method="post" name="tcredit" class="tabletext"><br>
      <div>
        <table class="table table-striped table-condensed table-bordered">
          <tr>
            <th class="text-center">Id</th>
            <th class="text-center">Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Balance</th>
          </tr>
          <tr>
            <td class="py-2"><?php echo $rows['uid'] ?></td>
            <td class="py-2"><?php echo $rows['name'] ?></td>
            <td class="py-2"><?php echo $rows['email'] ?></td>
            <td class="py-2"><?php echo $rows['balance'] ?></td>
          </tr>
        </table>
      </div>
      <br><br><br>
      <label>Transfer To:</label>
      <select name="to" class="form-control" required>
        <option value="" disabled selected>Choose</option>
        <?php
        include 'config.php';
        $sid = $_GET['id'];
        $sql = "SELECT * FROM users where uid!=$sid";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
          echo "Error " . $sql . "<br>" . mysqli_error($conn);
        }
        while ($rows = mysqli_fetch_assoc($result)) {
        ?>
          <option class="table" value="<?php echo $rows['uid']; ?>">

            <?php echo $rows['name']; ?> (Balance:
            <?php echo $rows['balance']; ?> )

          </option>
        <?php
        }
        ?>
        <div>
      </select>
      <br>
      <br>
      <label>Amount:</label>
      <input type="number" class="form-control" name="amount" required>
      <br><br>
      <div class="text-center">
        <button class="get-started1" name="submit" type="submit" id="myBtn">Transfer</button>
      </div>
    </form>
  </div>
  <!-- footer starts here -->
  <footer1>
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
  </footer1>
  <!-- footer ends here -->
</body>
  <!-- spalsh screen js -->

</html>