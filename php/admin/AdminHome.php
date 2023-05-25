<?php
  $activePage = 'home-admin';
  session_start();
  if ($_SESSION['conn'] == false) {
    header("Location: ../login.php");
    exit();
  } 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Admin Home</title>
    <script src="https://kit.fontawesome.com/ff3b6c3621.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style/index.css?v=1.1" />
    <script src="../js/jquery.min.js"></script>
    <link rel="stylesheet" href="../../style/all.css?v=3.1" />
      <link rel="stylesheet" href="../../style/Nav.css?v=2.1" />
      <link rel="stylesheet" href="../../style/index.css?v=3.1" />
      <link rel="stylesheet" href="../../style/home.css?v=2.1" />
  </head>
  <body>
  <?php include 'adminNavbar.php';  ?>
    <main id="main">
      <section id="home">
          <div class="section-title">
            <h2>Home</h2>
        </div>
      </section>
      <section class="index-home">
        <div>
          <b>Welcome to the Admin Home Page of "Evolve"!</b>
          <p>As an administrator, you have full control and access to the various features and settings of the "Evolve" web application. This comprehensive admin panel empowers you to manage user accounts, configure system preferences, and ensure a smooth and seamless experience for all users. Here's an overview of the key functionalities available to you:</p>
          <p>The Admin Home Page is your central hub for managing and optimizing the "Evolve" web application. Explore the various sections, navigate through the intuitive interface, and leverage the powerful tools at your disposal to drive user engagement, foster personal development, and make "Evolve" the ultimate companion for users on their journey of growth and self-improvement.</p>
          </div>
        <img src="../../assets/admin.PNG"/>
        </section>
    </main>
  </body>
</html>