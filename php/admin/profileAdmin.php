<?php
  $activePage = 'profile-admin';
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
    $photo = $_FILES['photo']['name'];
    $tempname = $_FILES['photo']['tmp_name'];
    $folder = '../picture/userPicture/'.$photo;
    move_uploaded_file($tempname, $folder);
    try {
      $stmt = $conn->prepare("UPDATE admin SET firstName = :firstName, lastName = :lastName, Email = :email, address = :address, phone = :phone, photo = :photo WHERE admin_id = :admin_id");
      $stmt->bindParam(':firstName', $firstName);
      $stmt->bindParam(':lastName', $lastName);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':address', $address);
      $stmt->bindParam(':phone', $phone);
      $stmt->bindParam(':admin_id', $_SESSION['id']);
      $stmt->bindParam(':photo', $photo);
      $stmt->execute();
      $_SESSION['photo']= $photo;
      $_SESSION['firstName']= $firstName;
      $_SESSION['lastName']= $lastName;
      header("Location: profileAdmin.php");
      exit();
    } catch (PDOException $e) {
      echo "Database Error: " . $e->getMessage();
      exit();
    }
  }else{
    $querySelect = "SELECT * FROM admin";
    $statement = $conn->query($querySelect);
    $adminData = $statement->fetch(PDO::FETCH_ASSOC);
    
    $firstNameP = $adminData['firstName'];
    $lastNameP = $adminData['lastName'];
    $addressP = $adminData['address'];
    $photoP = $adminData['photo'];
    $phoneP = $adminData['phone'];
    $EmailP = $adminData['Email'];
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Admin Profile</title>
    <script src="https://kit.fontawesome.com/ff3b6c3621.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style/index.css?v=1.1" />
    <script src="../js/jquery.min.js"></script>
    <link rel="stylesheet" href="../../style/all.css?v=3.1" />
      <link rel="stylesheet" href="../../style/Nav.css?v=3.1" />
      <link rel="stylesheet" href="../../style/home.css?v=2.1" />
      <link rel="stylesheet" href="../../style/index.css?v=2.1" />
  </head>
  <body>
  <?php include 'adminNavbar.php';  ?>
    <main id="main">
      <section id="profile">
          <div class="section-title">
            <h2>Profile</h2>
            <div id="update-profile"> 
            <div id="preview-container">
                        <img id="preview-image" class="profile-image" src="../../picture/userPicture/<?php echo $photoP?>" alt="Preview Image">
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
                    <label for="photo">Photo:</label>
                    <input type="file" name="photo" accept="image/*" id="photo" onchange="showPreview(this)">
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