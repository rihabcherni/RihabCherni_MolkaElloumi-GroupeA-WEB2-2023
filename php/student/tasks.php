<?php
  $activePage = 'tasks';
  include 'crud.php';
  session_start();
  session_start();
  if ($_SESSION['conn'] == false) {
    header("Location: ../login.php");
    exit();
  } 
?>

<!DOCTYPE html>
<html>
<head>
  <title>Tasks</title>
  <script src="https://kit.fontawesome.com/ff3b6c3621.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../style/index.css?v=1.1" />
  <script src="../js/jquery.min.js"></script>
  <link rel="stylesheet" href="../style/all.css?v=1.1" />
    <link rel="stylesheet" href="../style/Nav2.css?v=1.1" />
    <link rel="stylesheet" href="../style/home.css?v=1.1" />
</head>
<body>
  <?php include 'navbar.php'; ?>
  <main id="main">    
      <section id="tasks">
        <div>
          <div class="section-title">
            <h2>My tasks</h2>
          </div>
          <ul>
            <li>Faire les courses</li>
            <li>Nettoyer la maison</li>
            <li>Envoyer un e-mail à Julie</li>
          </ul>

        </div>
      </section>
  </main>
</body>
</html>