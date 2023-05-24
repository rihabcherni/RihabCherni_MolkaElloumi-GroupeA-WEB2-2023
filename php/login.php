<?php
session_start();
$_SESSION['conn'] =false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('config.php');
    $email = $_POST['Email'];
    $password = $_POST['password'];

    if (empty($email) && empty($password)) {
        $_SESSION['email-error'] = "Please enter your email.";
        $_SESSION['password-error'] = "Please enter your password.";
    } else if (empty($email)) {
        $_SESSION['email-error'] = "Please enter your email.";
    } else if (empty($password)) {
        $_SESSION['password-error'] = "Please enter your password.";
    } else {
        // Check if the user is a student
        $studentQuery = $conn->prepare("SELECT student_id, lastname, firstName,gender,Date_of_birth,phone,education_level,Photo, password	,address FROM student WHERE Email = :Email");
        $studentQuery->bindValue(':Email', $email);
        $studentQuery->execute();
        if ($studentQuery->rowCount() == 1) {
            $row = $studentQuery->fetch(PDO::FETCH_ASSOC);
            if ($password=== $row['password']) {
                $_SESSION['conn'] =true;
                $_SESSION['id'] = $row['student_id'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['firstName'] = $row['firstName'];
                $_SESSION['address'] = $row['address'];
                $_SESSION['gender'] = $row['gender'];
                $_SESSION['Date_of_birth'] = $row['Date_of_birth'];
                $_SESSION['phone'] = $row['phone'];
                $_SESSION['education_level'] = $row['education_level'];
                $_SESSION['Photo'] = $row['Photo'];
                $_SESSION['Email'] = $_POST["Email"];
                header("Location: student/home.php");
                exit();
            } else {
                $_SESSION['password-error'] = "Password incorrect.";
      }
        } else {
            $adminQuery = $conn->prepare("SELECT admin_id, firstName,lastName, photo, address,phone, password FROM admin WHERE Email = :Email");
            $adminQuery->bindValue(':Email', $email);
            $adminQuery->execute();
            if ($adminQuery->rowCount() == 1) {
                $row = $adminQuery->fetch(PDO::FETCH_ASSOC);
                if ($password=== $row['password']) {
                    $_SESSION['conn'] =true;
                    $_SESSION['id'] = $row['admin_id'];
                    $_SESSION['firstName'] = $row['firstName'];
                    $_SESSION['lastName'] = $row['lastName'];
                    $_SESSION['photo'] = $row['photo'];
                    $_SESSION['adress'] = $row['adress'];
                    $_SESSION['phone'] = $row['phone'];
                    $_SESSION['Email'] = $_POST["Email"];
                    header("Location: admin/AdminHome.php");
                    exit();
                } else {
                    $_SESSION['password-error'] = "Password incorrect.";
                }
            } else {
                $_SESSION['email-error'] = "Email incorrect.";
            }
        }
    }

    if (isset($_SESSION['email-error']) || isset($_SESSION['password-error'])) {
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
    <link rel="stylesheet" href="../style/index.css?v=1.1?v=2.1" />
    <link rel="stylesheet" href="./style/all.css?v=2.1" />
    <script src="../js/jquery.min.js"></script>
</head>
<body class="authBody">
    <section class="auth-container login">
      <div id="login-box">
            <div class="log1">
              <h1>Sign in</h1>
              <?php if (isset($_SESSION['error'])): ?>
                  <p><?php echo $_SESSION['error']; ?></p>
                  <?php unset($_SESSION['error'])?>
              <?php endif; ?>
              <form method="post" id="login-form">
                <div class="gr-input">
                  <input type="email" id="Email" name="Email" placeholder="E-Mail" />
                </div>
                <?php if (isset($_SESSION['email-error'])): ?>
                    <p  id="email-error" class="error-log"><?php echo $_SESSION['email-error']; ?></p>
                <?php endif; ?>
                <div class="gr-input">
                  <input type="password" id="password" name="password" placeholder="Password" autocomplete="off" />
                </div>
                <?php if (isset($_SESSION['password-error'])): ?>
                    <p  id="password-error" class="error-log"><?php echo $_SESSION['password-error']; ?></p>
                    <?php unset($_SESSION['password-error'])?>
                <?php endif; ?>
                <div class="grid-container">
                  <div class="forgot">
                    <a href="forgotpassword.php" id="forgot-link">Forgot Password?</a>
                    <a href="register.php">Sign Up: New member</a>  
                  </div>
                </div>
                <button type="submit" id="login-btn" class="myBtn">Sign In</button>
              </form>
            </div>
            <div class="log2">  
            <p class="title-log"> Welcome Back! To keep connected with us please login with your personal info.</p>    
             <img src="../assets/login.PNG" alt="login"/>          
            </div>
      </div>
    </section>
</body>
</html>
