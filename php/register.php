<?php
  session_start();
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('config.php');  
    try {
        $stmt_check_email = $conn->prepare("SELECT Email FROM student WHERE Email = :Email");
        $stmt_check_email->bindParam(':Email', $Email);
        $stmt_check_email->execute();
        $row = $stmt_check_email->fetch(PDO::FETCH_ASSOC);
        if ($row) {
          echo "Email already exists in the database.";
        } else {
          $password = $_POST['password'];
          $_SESSION['student_id'] = $row['student_id'];
          $_SESSION['lastname'] =$_POST["lastname"];
          $_SESSION['firstName'] =$_POST["firstName"];
          $_SESSION['Email'] =$_POST["Email"];
          $Email = $_POST["Email"];
          $file_name = $_FILES['Photo']['name'];
          $file_path = "../picture/userPicture/".$file_name;
          move_uploaded_file($_FILES['Photo']['tmp_name'], $file_path);

          $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO student ( lastname, firstName, gender, Date_of_birth,phone, education_level, Photo, password, Email, address, created_at)
            VALUES ( :lastname, :firstName, :gender, :Date_of_birth, :phone, :education_level, :Photo, :password, :Email, :address, :created_at)");
            $stmt->bindParam(':lastname', $_POST["lastname"]);
            $stmt->bindParam(':firstName', $_POST["firstName"]);
            $stmt->bindParam(':gender', $_POST["gender"]);
            $stmt->bindParam(':Date_of_birth', $_POST["Date_of_birth"]);
            $stmt->bindParam(':phone', $_POST["phone"]);
            $stmt->bindParam(':education_level', $_POST["education_level"]);
            $stmt->bindParam(':Photo', $file_name);
            $stmt->bindParam(':password', $hashed_password);
            $stmt->bindParam(':Email', $_POST["Email"]);
            $stmt->bindParam(':address', $_POST["address"]);
            $stmt->bindParam(':created_at', $created_at);
            $created_at = date("Y-m-d H:i:s");
            $stmt->execute();
            echo "New student registered successfully.";
            header("Location:home.php");
        }    
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Login EVELVE</title>
      <script src="https://kit.fontawesome.com/ff3b6c3621.js" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="../style/index.css" />
      <script src="../js/jquery.min.js"></script>
  </head>
  <body>
    <section class="auth-container">          
        <div id="register-box">
            <div class="log2">
              <h1>Welcome Back!</h1>
              <hr/>
              <p class="p-white">To keep connected with us<br/> please login with your personal info.</p>
              <button class="myBtn2" id="login-link"><a href="login.php">Sign In</a></button>
            </div>
            <div class="log1">
              <h1>Create Account</h1>
              <hr/>
              <form method="post" id="register-form" class="register" enctype="multipart/form-data">
                <div>
                  <div class="gr-input">
                    <input type="text" id="lastname" name="lastname" placeholder="Last Name" required />
                  </div><!--lastName-->
                  <div class="gr-input">
                    <input type="text" id="firstName" name="firstName" placeholder="First Name" required />
                  </div><!--FirstName-->
                  <div class="gr-input">
                    <div class="genre">
                      <label for="gender">Gender:</label>
                      <div><input type="radio" name="gender" id="gender" value="Male">Male</div>
                      <div><input type="radio" name="gender" id="gender" value="Female">Female</div>
                    </div>
                  </div><!--gender-->
                  <div class="gr-input">
                    <div class="db">
                      <label for="Date_of_birth">Date of Birth</label>
                      <input type="date" id="Date_of_birth" name="Date_of_birth"  required />
                    </div>
                  </div><!--Date_of_birth-->
                  <div class="gr-input">
                  <div class="ed">
                    <label for="education_level">Education Level:</label>
                    <select name="education_level" id="education_level">
                      <option value="High School">High School</option>
                      <option value="College">College</option>
                      <option value="Graduate">Graduate</option>
                    </select>
                    </div>
                  </div><!--education_level-->
                  <div class="gr-input">
                    <label for="Photo">Photo:</label>
                    <input type="file" name="Photo" accept="image/*" id="Photo"><br>
                  </div><!--Photo-->
                </div>
                <div>
                  <div class="gr-input">
                    <input type="text" id="phone" name="phone" placeholder="phone" required />
                  </div><!--phone-->
                  <div class="gr-input">
                    <input type="text" id="address" name="address" placeholder="address" required />
                  </div><!--address-->    
                  <div class="gr-input">
                    <input type="email" id="email" name="Email" placeholder="E-Mail" required />
                  </div>
                  <div class="gr-input">
                    <input type="password" id="rpassword" name="password" minlength="5" placeholder="Password" required />
                  </div>
                  <div class="gr-input">
                    <input type="password" id="cpassword" name="cpassword" minlength="5" placeholder="Confirm Password" required />
                  </div>
                  <input type="submit" id="register-btn" value="Sign Up"  class="myBtn"/>
                </div>
              </form>
            </div>
        </div>
    </section>
  </body>
</html>