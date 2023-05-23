<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login EVELVE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <link rel="stylesheet" href="./style/index.css" />
    <link rel="stylesheet" href="./style/home.css" />
    <link rel="stylesheet" href="./style/all.css" />
    <script src="./js/jquery.min.js"></script>
</head>
<body>
<?php
  include('php/config.php');
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
  <main id="mainIndex">
  <button><a href="php/login.php">Login</a></button>
  <h1 id="animated-text">Bienvenue à EVOLVE</h1>
    <section id="facts">
      <div>
        <div class="section-title">
        <h2>Our Statistics</h2>
        </div>
        <div class="cont-facts">
          <div class="column" data-aos="fade-up">
            <div class="count-box">
              <span class="purecounter"><?php echo $countStu; ?></span>
              <p><strong>Nbr students</strong></p>
            </div>
          </div>
          <div class="column" data-aos="fade-up">
            <div class="count-box">
              <span class="purecounter"><?php echo $countSkills; ?></span>
              <p><strong>Nbr skills</strong></p>
            </div>
          </div>
          <div class="column" data-aos="fade-up">
            <div class="count-box">
              <span class="purecounter"><?php echo $countCourse; ?></span>
              <p><strong>Nbr course</strong></p>
            </div>
          </div>
          <div class="column" data-aos="fade-up">
            <div class="count-box">
              <span class="purecounter"><?php echo $countClub; ?></span>
              <p><strong>Nbr clubs</strong></p>
            </div>
          </div>
          <div class="column" data-aos="fade-up">
            <div class="count-box">
              <span class="purecounter"><?php echo $countbooks; ?></span>
              <p><strong>Nbr books</strong></p>
            </div>
          </div>
          <div class="column" data-aos="fade-up">
            <div class="count-box">
              <span class="purecounter"><?php echo $countTasks; ?></span>
              <p><strong>Nbr tasks</strong></p>
            </div>
          </div>   
        </div>
      </div>
    </section>
    <section id="about_us">
      <div class="section-title">
        <h2>Our Perspective</h2>
     </div>
      <p>
        We are a computer team whose goal is to provide you with a tool that facilitates your learning journey and 
        acquisition of knowledge through our web application "Evolve". 
       <br/>
        This application helps you stay up to date with your personal development goals, maintain habits, 
        and track your daily tasks such as academic courses, reading challenges, household and sports tasks, 
        clubs, etc.
      </p>
    </section>
  </main>
</body>
</html>