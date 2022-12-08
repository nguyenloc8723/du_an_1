<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="./public/register.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <main>
    <div class="register-form-container">
      <form action="action_register.php" method="post">
        <div class="register-head">
          <div class="register-icon">
            <i class="fa-solid fa-circle-user"></i>
          </div>
          <h1>Create Account!</h1>
        </div>
        <div class="register-body">
          <div class="form-control">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" required>
            <i class="fa-solid fa-signature"></i>
          </div>
          <div class="form-control">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" required>
            <i class="fa-solid fa-envelope"></i>
          </div>
          <?php if (isset($_SESSION['err_email'])) { ?>
            <div style="color: red; margin-top: -1.5rem; margin-bottom: 1rem;">
              <span><?= $_SESSION['err_email'] ?></span>
            </div>
          <?php } ?>

          <div class="form-control">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
            <i class="fa-solid fa-user"></i>
          </div>
          <?php if (isset($_SESSION['err_username'])) { ?>
            <div style="color: red; margin-top: -1.5rem; margin-bottom: 1rem;">
              <span><?= $_SESSION['err_username'] ?></span>
            </div>
          <?php } ?>
          <div class="form-control">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
            <i class="fa-solid fa-lock"></i>
          </div>

          <div class="form-control">
            <label for="password">Confirm Password</label>
            <input type="password" name="confirm-password" id="password" required>
            <i class="fa-solid fa-lock"></i>
          </div>
          <?php if (isset($_SESSION['err_confirm_pass'])) { ?>
            <div style="color: red; margin-top: -1.5rem; margin-bottom: 1rem;">
              <span><?= $_SESSION['err_confirm_pass'] ?></span>
            </div>
          <?php } ?>
        </div>
        <!-- <?php if (isset($_POST['create'])) { ?>
          <div style="color: green;">
            Đăng kí thành công! <a href="login.php">Login ngay?</a>
          </div>
          <?php } ?> -->
          <?php 
          unset($_SESSION['err_email']);
          unset($_SESSION['err_username']);
          unset($_SESSION['err_confirm_pass']);
          ?>
        <div class="register-foot">
          <a href="login.php" style="display: block; text-align: right; text-decoration: none; color: #6C5CE7; font-weight: 600; margin-bottom: 10px;">Login now</a>
          <button type="submit" name="create">Create <i class="fa-solid fa-arrow-right"></i></button>
        </div>
      </form>
    </div>
  </main>
</body>

</html>