
<?php
  session_start();
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      include('config.php');
      $email = $_POST['Email'];
      $password = $_POST['password'];
      if(empty($email) && empty($password)){
          $_SESSION['email-error'] = "Please enter your email.";
          $_SESSION['password-error'] = "Please enter your password.";
      } else if(empty($email)) {
          $_SESSION['email-error'] = "Please enter your email.";
      } else if(empty($password)) {
          $_SESSION['password-error'] = "Please enter your password.";
      } else {
          $req = $conn->prepare("SELECT student_id, lastname, firstName, password FROM student WHERE Email = :Email");
          $req->bindValue(':Email', $email);
          $req->execute();
          if ($req->rowCount() == 1) {
              $row = $req->fetch(PDO::FETCH_ASSOC);
              $hashed_password = $row['password'];
              if (password_verify($password, $hashed_password)) {
                  $_SESSION['student_id'] = $row['student_id'];
                  $_SESSION['lastname'] = $row['lastname'];
                  $_SESSION['firstName'] = $row['firstName'];
                  $_SESSION['Email'] =$_POST["Email"];
                  header("Location: home.php");
                  exit();
              } else {
                  $_SESSION['password-error'] = "Password incorrect.";
              }
          } else {
              $_SESSION['email-error'] = "Email incorrect.";
          }
      }
      if(isset($_SESSION['email-error']) || isset($_SESSION['password-error'])){
          header("Location: login.php");
          exit();
      }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login EVELVE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <link rel="stylesheet" href="../style/index.css" />
    <script src="../js/jquery.min.js"></script>
</head>
<body>
    <section class="auth-container">
      <div id="login-box">
            <div class="log1">
              <h1>Sign in to Account</h1>
              <?php if (isset($_SESSION['error'])): ?>
                  <p><?php echo $_SESSION['error']; ?></p>
                  <?php unset($_SESSION['error'])?>
              <?php endif; ?>
              <hr/>
              <form method="post" id="login-form">
                <div class="gr-input">
                  <input type="email" id="Email" name="Email" placeholder="E-Mail" />
                </div>
                <?php if (isset($_SESSION['email-error'])): ?>
                    <p  id="email-error" class="error"><?php echo $_SESSION['email-error']; ?></p>
                <?php endif; ?>
                <div class="gr-input">
                  <input type="password" id="password" name="password" placeholder="Password" autocomplete="off" />
                </div>
                <?php if (isset($_SESSION['password-error'])): ?>
                    <p  id="password-error" class="error"><?php echo $_SESSION['password-error']; ?></p>
                    <?php unset($_SESSION['password-error'])?>
                <?php endif; ?>
                <div class="grid-container">
                  <div class="forgot">
                    <a href="forgotpassword.php" id="forgot-link">Forgot Password?</a>
                  </div>
                </div>
                <button type="submit" id="login-btn" class="myBtn">Sign In</button>
              </form>
            </div>
            <div class="log2">
              <h1>Hello Friends!</h1>
              <hr/>
              <p class="p-white ">Enter your personal details and start your journey with us!</p>
              <button class="myBtn2" id="register-link"><a href="register.php">Sign Up</a></button>
              
            </div>
      </div>
    </section>
</body>
</html>