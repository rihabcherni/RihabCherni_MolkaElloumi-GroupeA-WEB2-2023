<?php
$activePage = 'home-admin';
 session_start();
 if ($_SESSION['conn'] == false) {
  header("Location: ../login.php");
  exit();
} 
echo $_SESSION['id'];
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Admin Home</title>
    <script src="https://kit.fontawesome.com/ff3b6c3621.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style/index.css?v=1.1" />
    <script src="../js/jquery.min.js"></script>
    <link rel="stylesheet" href="../style/all.css?v=1.1" />
      <link rel="stylesheet" href="../style/Nav2.css?v=1.1" />
      <link rel="stylesheet" href="../style/home.css?v=1.1" />
  </head>
  <body>
    <?php include 'adminNavbar.php'; ?>
    <main id="main">
      <section id="home">
      <div class="section-title">
          <h2>Home</h2>
      </div>
        <div>
          <h1 id="animated-text" class="stud-name">
            <?php echo $_SESSION['lastname']." ".$_SESSION['firstName']?>
          </h1>
        </div>
      </section>
    </main>
  </body>
</html>