<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="./public/login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="icon" type="image/png" sizes="16x16" href="./public/images/logo.png">
</head>

<body>
  <main>
    <?php if(isset($_GET['msg'])){?>
      <script>
        alert('<?= $_GET['msg']?>');
      </script>
    <?php }?>
    <div class="login-form-container">
      <form action="action_login.php" method="POST">
        <div class="login-head">
          <div class="login-icon">
            <i class="fa-solid fa-right-to-bracket"></i>
          </div>
          <h1>WELCOME</h1>
          <span>Sign in to your account</span>
        </div>
        <div class="login-body">
          <div class="form-control">
            <label for="username">Name</label>
            <input type="text" name="username" id="username" required>
            <i class="fa-solid fa-user"></i>
          </div>
          <div class="form-control">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
            <i class="fa-solid fa-lock"></i>
          </div>
          <?php if (isset($_SESSION['error_login'])) { ?>
            <div class="error-login" style="color: red; font-size: 14px; margin-bottom: 10px;">
              Tài khẩu hoặc mật khoản không chính xác!
            </div>
          <?php } ?>
        </div>
        <div class="login-foot">
          <div class="craete-acc" style="font-size: 15px;">
            Don't have account?
            <a href="./register.php" style="text-decoration: none; color: #6c5ce7;">Register here</a>
          </div>
          <div class="forgot">
            <a href="../?act=forgot-password">forgot password?</a>
          </div>
          <button type="submit" name="login">Login <i class="fa-solid fa-arrow-right"></i></button>
          <div class="back-index">
            <a href="../index.php">Back to website</a>
          </div>
        </div>
      </form>
      <?php unset($_SESSION['error_login'])?>
    </div>
  </main>
</body>

</html>