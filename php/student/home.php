<?php
  session_start();
  if ($_SESSION['conn'] == false) {
    header("Location: ../login.php");
    exit();
  } 
$activePage = 'home';
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>
    <script src="https://kit.fontawesome.com/ff3b6c3621.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style/index.css?v=1.1" />
    <script src="../js/jquery.min.js"></script>
    <link rel="stylesheet" href="../../style/all.css?v=3.1" />
      <link rel="stylesheet" href="../../style/Nav.css?v=3.1" />
      <link rel="stylesheet" href="../../style/home.css?v=1.1" />
      <style>
          .index-home2{
              margin:10px 20px !important;
              line-height: 3;
              color: rgb(96, 96, 96);
            }
            .liste-student{
              margin-left: 50px;
            }
      </style>
  </head>
  <body>
    <?php include 'navbar.php'; ?>
    <main id="main">
      <section id="home">
      <div>
          <h1 id="animated-text" class="stud-name">Welcome Student
            <?php echo $_SESSION['lastname']." ".$_SESSION['firstName']?>
          </h1>
        </div>
      <div class="section-title">
          <h2>Home</h2>
      </div>
      </section>
      <section>
      <section class="index-home2">
        <div>
          <p>Manage your personal development and track your progress with Evolve. Our platform offers a range of features to help you enhance your learning journey:</p>
          <ul class="liste-student">
              <li><strong>Manage Profile:</strong> Update your personal information, upload a profile picture, and customize your preferences.</li>
              <li><strong>Manage Books:</strong> Organize your reading list, track your progress, and discover new books in your areas of interest.</li>
              <li><strong>Manage Skills:</strong> Set goals, track your skill development, and access resources to improve in areas important to you.</li>
              <li><strong>Manage Tasks:</strong> Stay organized and focused by managing your daily tasks, setting reminders, and tracking your accomplishments.</li>
              <li><strong>Manage Clubs:</strong> Explore and join clubs related to your interests, collaborate with like-minded individuals, and participate in club activities.</li>
              <li><strong>Manage Courses:</strong> Enroll in academic courses, access course materials, submit assignments, and track your academic progress.</li>
            </ul>
          <p>With Evolve, you have the power to shape your personal development journey and reach your full potential. Start exploring the features and unleash your growth today!</p>
        </div>
      </section>




    </main>
  </body>
</html>