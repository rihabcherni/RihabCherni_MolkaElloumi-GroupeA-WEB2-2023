<?php
$activePage = 'profile';
session_start();
if ($_SESSION['conn'] == false) {
  header("Location: ../login.php");
  exit();
} 
  include('../config.php');
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $Photo = $_FILES['Photo']['name'];
    $tempname = $_FILES['Photo']['tmp_name'];
    $folder = '../picture/userPicture/'.$Photo;
    move_uploaded_file($tempname, $folder);
    try {
      $stmt = $conn->prepare("UPDATE student SET firstName = :firstName, lastName = :lastName, Email = :email, address = :address, phone = :phone, Photo = :Photo WHERE student_id = :student_id");
      $stmt->bindParam(':firstName', $firstName);
      $stmt->bindParam(':lastName', $lastName);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':address', $address);
      $stmt->bindParam(':phone', $phone);
      $stmt->bindParam(':Email', $_SESSION['Email']);
      $stmt->bindParam(':Photo', $Photo);
      $stmt->execute();
      $_SESSION['Photo']= $Photo;
      $_SESSION['firstName']= $firstName;
      $_SESSION['lastName']= $lastName;
      header("Location: profile.php");
      exit();
    } catch (PDOException $e) {
      echo "Database Error: " . $e->getMessage();
      exit();
    }
  }else{
    $email = $_SESSION['Email'];
    $querySelect = "SELECT * FROM student WHERE Email='$email'";
    $statement = $conn->query($querySelect);
    $studentData = $statement->fetch(PDO::FETCH_ASSOC);
    $firstNameP = $studentData['firstName'];
    $lastNameP = $studentData['lastName'];
    $addressP = $studentData['address'];
    $PhotoP = $studentData['Photo'];
    $phoneP = $studentData['phone'];
    $EmailP = $studentData['Email'];
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Student Profile</title>
    <script src="https://kit.fontawesome.com/ff3b6c3621.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style/index.css?v=1.1" />
    <script src="../js/jquery.min.js"></script>
    <link rel="stylesheet" href="../../style/all.css?v=3.1" />
      <link rel="stylesheet" href="../../style/Nav.css?v=3.1" />
      <link rel="stylesheet" href="../../style/home.css?v=2.1" />
      <link rel="stylesheet" href="../../style/index.css?v=2.1" />
  </head>
  <body>
  <?php include 'navbar.php'; ?>
    <main id="main">
      <section id="profile">
          <div class="section-title">
            <h2>Profile</h2>
            <div id="update-profile"> 
            <div id="preview-container">
                        <img id="preview-image" class="profile-image" src="../../picture/userPicture/<?php echo $PhotoP?>" alt="Preview Image">
                      </div>
                      <form action="" method="POST" enctype="multipart/form-data">
                  <div class="gr-input">
                    <label for="firstName">First Name:</label>
                    <input type="text" name="firstName" value="<?php echo $firstNameP?>">
                  </div>

                  <div class="gr-input">
                    <label for="lastName">Last Name:</label>
                    <input type="text" name="lastName" value="<?php echo $lastNameP?>">
                  </div>                
                  <div class="gr-input">  
                    <label for="email">Email:</label>
                    <input type="email" name="email" value="<?php echo $EmailP?>">
                  </div>
                  <div class="gr-input">
                    <label for="address">Address:</label>
                    <input type="text" name="address" value="<?php echo $addressP?>">
                  </div>  
                  <div class="gr-input">                
                    <label for="phone">Phone:</label>
                    <input type="text" name="phone" value="<?php echo $phoneP?>">
                  </div>
                  <div class="gr-input">      
                    <label for="Photo">Photo:</label>
                    <input type="file" name="Photo" accept="image/*" id="Photo" onchange="showPreview(this)">
                  </div>
                    <button type="submit" class="myBtn">Update Profile</button>
                </form>
            </div>
        </div>
      </section>
    </main>
    <script>
    function showPreview(input) {
      var file = input.files[0];
      var reader = new FileReader(); 
      reader.onload = function(e) {
        var previewImage = document.getElementById('preview-image');
        previewImage.setAttribute('src', e.target.result);
        previewImage.style.display = 'block';
      }   
      reader.readAsDataURL(file);
    }
  </script>
  </body>
</html>