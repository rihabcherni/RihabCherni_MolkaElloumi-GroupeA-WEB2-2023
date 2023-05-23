<?php
$activePage = 'home';
 session_start();
 echo $_SESSION['student_id'];
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>
    <script src="https://kit.fontawesome.com/ff3b6c3621.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style/index.css" />
    <script src="../js/jquery.min.js"></script>
    <link rel="stylesheet" href="../style/all.css" />
      <link rel="stylesheet" href="../style/Nav2.css" />
      <link rel="stylesheet" href="../style/home.css" />
  </head>
  <body>
    <?php include 'navbar.php'; ?>
    <main id="main">
      <section id="home">
      <div class="section-title">
          <h2>Home</h2>
      </div>
        <div>
          <h1 id="animated-text">Student
            <?php echo $_SESSION['lastname']." ".$_SESSION['firstName']?>
          </h1>
        </div>
      </section>
    </main>
  </body>
</html>