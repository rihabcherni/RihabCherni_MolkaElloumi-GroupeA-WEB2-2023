<?php 
      session_start();
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
        $query = 'SELECT * FROM student WHERE Email = :Email';
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
          $query = 'UPDATE student SET password = :password WHERE Email = :Email';
          $stmt = $conn->prepare($query);
          $stmt->bindValue(':password', $newPassword);
          $stmt->bindValue(':Email', $Email);
          $stmt->execute();
          $success = 'Password updated successfully.';
          echo '<p>' . $success . '</p>';
        }
      }
?>
<!DOCTYPE html>
<html>
<head>
  <title>update password</title>
  <script src="https://kit.fontawesome.com/ff3b6c3621.js" crossorigin="anonymous"></script>
  <script src="../js/jquery.min.js"></script>
  <link rel="stylesheet" href="../style/index.css?v=1.1" />
    <link rel="stylesheet" href="../style/modal.css?v=1.1" />
    <link rel="stylesheet" href="../style/all.css?v=2.1" />
    <link rel="stylesheet" href="../style/Nav.css?v=3.1" />
    <link rel="stylesheet" href="../style/home.css?v=2.1" />
    <script src="../js/modal.js"></script>
</head>
<body>
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
                      <input type="password" id="newPassword" name="newPassword" placeholder="Password" required />
                    </div>
                    <div class="gr-input">
                      <input type="password" id="confirmPassword" name="confirmPassword"  placeholder="Confirm Password" required />
                    </div>
                    <input type="submit" id="up-btn" value="Update Password"  class="myBtn"/>
                    <?php 
                    echo '<a href="./login.php">back</a>';  
                ?>
                  </form>
              </div>
          </div>
        </div>
      </main>
  </body>
</html>