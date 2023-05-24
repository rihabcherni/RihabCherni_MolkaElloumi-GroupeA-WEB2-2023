<?php
$activePage = 'student-admin';
 session_start();
 if ($_SESSION['conn'] == false) {
  header("Location: ../login.php");
  exit();
} 
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Students</title>
    <script src="https://kit.fontawesome.com/ff3b6c3621.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style/index.css?v=1.1" />
    <script src="../js/jquery.min.js"></script>
    <link rel="stylesheet" href="../../style/all.css?v=2.1" />
      <link rel="stylesheet" href="../../style/Nav2.css?v=2.1" />
      <link rel="stylesheet" href="../../style/home.css?v=2.1" />
  </head>
  <body>
    <?php include 'adminNavbar.php'; ?>
    <main id="main">
      <section id="Students">
      <div class="section-title">
          <h2>Students</h2>
      </div>
        <div>
            
        </div>
      </section>
    </main>
  </body>
</html>