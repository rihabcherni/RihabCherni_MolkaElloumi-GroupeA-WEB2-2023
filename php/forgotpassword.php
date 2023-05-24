<?php
  session_start();
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('config.php');
    $email = $_POST['Email'];
    $query = 'SELECT * FROM student WHERE Email = :Email';
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':Email', $email);
    $stmt->execute();
    $student = $stmt->fetch(PDO::FETCH_ASSOC);  
    if (!$student) {
      $error = 'This email is not registered.';
      echo json_encode(['error' => $error]);
      exit();
    }
    $newPassword = generatePassword();
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    $query = 'UPDATE student SET password = :password WHERE student_id = :student_id';
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':password', $hashedPassword);
    $stmt->bindValue(':student_id', $student['student_id']);
    $stmt->execute();
      $subject = 'Your new password';
    $message = "Your new password is: $newPassword";
               $headers = "From: rihabcherni000@gmail.com\r\n";
               $headers .= "Reply-To: rihabcherni000@gmail.com\r\n";
               $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
               $headers .= "MIME-Version: 1.0\r\n";
               $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    if (mail($email, $subject, $message, $headers)) {
      $success = 'Your new password has been sent to your email.';
      echo json_encode(['success' => $success]);
  } else {
      $error = 'There was an error sending the email.';
      echo json_encode(['error' => $error]);
  }
  exit();
  }
  
  function generatePassword() {
    $length = 8;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $password = '';
    for ($i = 0; $i < $length; $i++) {
      $password .= $characters[rand(0, $charactersLength - 1)];
    }
  
    return $password;
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
    <link rel="stylesheet" href="../style/index.css?v=2.1" />
    <link rel="stylesheet" href="./style/all.css?v=2.1" />
    <script src="../js/jquery.min.js"></script>
</head>
<body class="authBody">
<section class="auth-container">
        <div id="forgot-box">
            <div class="log1">
              <h1>Forgot Your Password?</h1>
              <hr/>
              <p class="p-grey">To reset your password, enter the registered e-mail adddress and we will send you password reset instructions on your e-mail!</p>
              <form method="post" id="forgot-form">
                <div id="forgotAlert"></div>
                <div class="gr-input">
                  <input type="email" id="Email" name="Email" placeholder="E-Mail" required />
                </div>
                <div>
                  <input type="submit" id="forgot-btn" value="Reset Password"  class="myBtn"/>
                </div>
              </form>
              <div class="forg-lin">
                <a href="login.php">Back</a>
              </div>
            </div>
            <div class="log2">
              <img src="../assets/forgot.avif" alt="login"/> 
            </div>
        </div>
    </section>
</body>
</html>
          