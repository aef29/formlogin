<?php
     session_start();
     include "config.php";
?>
<!DOCTYPE html>
<html>
<head>
	<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">

    <title>Hello, world!</title>
  </head>
  <body>

    <div class="container">
      <h4 class="text-center">Sign In</h4>
          
          <form method="post">
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="fusername" class="form-control" placeholder="Masukan Username Anda">
             </div>

            <div class="form-group">
              <label>Password</label>
              <input type="password" name="fpassword" class="form-control" placeholder="Masukan Password Anda">
            </div>

            <button type="submit" name="fsubmit" class="btn btn-primary">Sign In</button>
          </form>

          <?php
               if (isset($_POST['fsubmit'])) {
                  $username = $_POST['fusername'];
                  $password = $_POST['fpassword'];
                  $qry = mysqli_query($koneksi,"SELECT * FROM user WHERE username ='$username' AND password = md5('$password')");
                  $cek = mysqli_num_rows($mysqli_query);
                  if ($cek==1) {
                    $_SESSION['userweb']=$username;
                    header ("location:admin.php");
                    exit;
                  }
                  else {
                    echo " Maaf Username dan Password Anda Salah!";
                  }

               }
          ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>