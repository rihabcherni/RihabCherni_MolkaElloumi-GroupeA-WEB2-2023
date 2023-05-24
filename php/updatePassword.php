<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <script src="https://kit.fontawesome.com/ff3b6c3621.js" crossorigin="anonymous"></script>
  <script src="../js/jquery.min.js"></script>
  <link rel="stylesheet" href="../style/index.css?v=1.1" />
  <link rel="stylesheet" href="../style/all.css?v=1.1" />
    <link rel="stylesheet" href="../style/Nav2.css?v=1.1" />
    <link rel="stylesheet" href="../style/home.css?v=1.1" />
    <link rel="stylesheet" href="../style/modal.css?v=1.1" />
    <script src="../js/modal.js"></script>
</head>
<body>
    <?php 
      session_start();
      $user=$_SESSION['user'];
      if ($_SESSION['conn'] == false) {
        header("Location: ../login.php");
        exit();
      } 
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include('config.php');
        $oldPassword = $_POST['oldPassword'];
        $newPassword = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmPassword'];
        $Email = $_SESSION['Email'];
        $query = 'SELECT * FROM '.$user.' WHERE Email = :Email';
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':Email', $Email);
        $stmt->execute();
        $student = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$student || $oldPassword=== $student['password']) {
          $error = 'Incorrect old password.';
          echo '<p>' . $error . '</p>';
        } else if ($newPassword != $confirmPassword) {
          $error = 'New password and confirm password do not match.';
          echo '<p>' . $error . '</p>';
        } else {
          $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
          $query = 'UPDATE student SET password = :password WHERE Email = :Email';
          $stmt = $conn->prepare($query);
          $stmt->bindValue(':password', $hashedPassword);
          $stmt->bindValue(':Email', $Email);
          $stmt->execute();
          $success = 'Password updated successfully.';
          echo '<p>' . $success . '</p>';
        }
      }
      if($user==="admin") {
        include 'adminNavbar.php';  
      }else{
        include 'navbar.php';   
      }
    ?>
     <main id="main"> 
        <div  class="auth-container">
          <div id="uppass-box">
              <div>
                <h1>Update password</h1>
                <hr/>
                <form method="post" id="uppass" class="uppass" enctype="multipart/form-data">
                    <div class="gr-input">
                      <input type="text" id="oldPassword" name="oldPassword" placeholder="oldPassword" required />
                    </div><!--oldPassword-->
                    <div class="gr-input">
                      <input type="password" id="password" name="password" placeholder="Password" required />
                    </div>
                    <div class="gr-input">
                      <input type="password" id="confirmPassword" name="confirmPassword"  placeholder="Confirm Password" required />
                    </div>
                    <input type="submit" id="up-btn" value="Update Password"  class="myBtn"/>
                </form>
              </div>
          </div>
        </div>
     </main>
  </body>
</html>