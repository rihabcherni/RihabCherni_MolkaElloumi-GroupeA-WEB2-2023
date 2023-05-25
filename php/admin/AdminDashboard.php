<?php
    $activePage = 'dash-admin';
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
      <link rel="stylesheet" href="../../style/home.css?v=2.1" />
  </head>
  <body>
    <?php 
        include 'adminNavbar.php';
        include('../config.php');
        $queryStu = "SELECT COUNT(*) as countStudent FROM student";
        $statementstu = $conn->query($queryStu);
        $resultStu = $statementstu->fetch(PDO::FETCH_ASSOC);
        $countStu = $resultStu['countStudent'];

        $queryClub = "SELECT COUNT(*) as countClub FROM club";
        $statementClub = $conn->query($queryClub);
        $resultClub = $statementClub->fetch(PDO::FETCH_ASSOC);
        $countClub = $resultClub['countClub'];

        $querySkills = "SELECT COUNT(*) as countSkills FROM skills";
        $statementSkills = $conn->query($querySkills);
        $resultSkills = $statementSkills->fetch(PDO::FETCH_ASSOC);
        $countSkills = $resultSkills['countSkills'];

        $queryCourse = "SELECT COUNT(*) as countCourse FROM course";
        $statementCourse = $conn->query($queryCourse);
        $resultCourse = $statementCourse->fetch(PDO::FETCH_ASSOC);
        $countCourse = $resultCourse['countCourse'];

        $queryTasks = "SELECT COUNT(*) as countTasks FROM tasks";
        $statementTasks = $conn->query($queryTasks);
        $resultTasks = $statementTasks->fetch(PDO::FETCH_ASSOC);
        $countTasks = $resultTasks['countTasks'];

        $querybooks = "SELECT COUNT(*) as countbooks FROM books";
        $statementbooks = $conn->query($querybooks);
        $resultbooks = $statementbooks->fetch(PDO::FETCH_ASSOC);
        $countbooks = $resultbooks['countbooks'];
    ?>
    <main id="main">
      <div class="section-title">
        <h2>Our Statistics</h2>
        </div>
        <br/>
        <div class="cont-facts">
          <div class="column" data-aos="fade-up">
            <div class="count-box">
              <span class="purecounter"><?php echo $countStu; ?></span>
              <p><strong>Students</strong></p>
            </div>
          </div>
          <div class="column" data-aos="fade-up">
            <div class="count-box">
              <span class="purecounter"><?php echo $countSkills; ?></span>
              <p><strong>Skills</strong></p>
            </div>
          </div>
          <div class="column" data-aos="fade-up">
            <div class="count-box">
              <span class="purecounter"><?php echo $countCourse; ?></span>
              <p><strong>Course</strong></p>
            </div>
          </div>
          <div class="column" data-aos="fade-up">
            <div class="count-box">
              <span class="purecounter"><?php echo $countClub; ?></span>
              <p><strong>Clubs</strong></p>
            </div>
          </div>
          <div class="column" data-aos="fade-up">
            <div class="count-box">
              <span class="purecounter"><?php echo $countbooks; ?></span>
              <p><strong>Books</strong></p>
            </div>
          </div>
          <div class="column" data-aos="fade-up">
            <div class="count-box">
              <span class="purecounter"><?php echo $countTasks; ?></span>
              <p><strong>Tasks</strong></p>
            </div>
          </div>   
        </div>
    </main>
  </body>
</html>