<?php
$activePage = 'tasks';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Tasks</title>
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