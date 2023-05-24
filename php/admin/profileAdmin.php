<?php
$activePage = 'profile-admin';
 session_start();
 if ($_SESSION['conn'] == false) {
  header("Location: ../login.php");
  exit();
} 
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Admin Profile</title>
    <script src="https://kit.fontawesome.com/ff3b6c3621.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style/index.css?v=1.1" />
    <script src="../js/jquery.min.js"></script>
    <link rel="stylesheet" href="../../style/all.css?v=2.1" />
      <link rel="stylesheet" href="../../style/Nav2.css?v=2.1" />
      <link rel="stylesheet" href="../../style/home.css?v=2.1" />
  </head>
  <body>
  <?php include 'adminNavbar.php';  ?>
    <main id="main">
      <section id="profile">
          <div class="section-title">
            <h2>Profile</h2>
            <div>
                <form action="update_profile.php" method="POST">                    
                    <label for="firstName">First Name:</label>
                    <input type="text" name="firstName" placeholder="<?php echo $_SESSION['firstName']?>">
                    
                    <label for="lastName">Last Name:</label>
                    <input type="text" name="lastName" placeholder="<?php echo $_SESSION['lastName']?>">
                    
                    <label for="email">Email:</label>
                    <input type="email" name="email" placeholder="<?php echo $_SESSION['Email']?>">
                    
                    <label for="photo">Photo:</label>
                    <input type="file" name="photo">

                    <label for="address">Address:</label>
                    <input type="text" name="address" placeholder="<?php echo $_SESSION['address']?>">
                    
                    <label for="phone">Phone:</label>
                    <input type="text" name="phone" placeholder="<?php echo $_SESSION['phone']?>">
                    
                    <button type="submit">Update Profile</button>
                </form>
            </div>
        </div>
      </section>
    </main>
  </body>
</html>