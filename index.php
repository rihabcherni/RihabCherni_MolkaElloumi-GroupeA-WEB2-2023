<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login EVELVE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <link rel="stylesheet" href="./style/index.css?v=3.1" />
    <link rel="stylesheet" href="./style/home.css?v=3.1" />
    <link rel="stylesheet" href="./style/all.css?v=3.1" />
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
  <main>
    <section id="mainIndex">
    <img src="assets/logo.gif" width="100px" alt="logo"/>
      <button><a href="php/login.php">Login</a></button>
      <h1 id="animated-text" class="animated-text">Welcome to EVOLVE</h1>
    </section>
    <section id="facts">
      <div>
        <div class="section-title">
        <h2>Our Statistics</h2>
        </div>
        <div class="cont-facts">
          <div class="column" data-aos="fade-up">
            <div class="count-box">
              <span class="purecounter"><?php echo $countStu; ?></span>
              <p><strong>Number students</strong></p>
            </div>
          </div>
          <div class="column" data-aos="fade-up">
            <div class="count-box">
              <span class="purecounter"><?php echo $countSkills; ?></span>
              <p><strong>Number skills</strong></p>
            </div>
          </div>
          <div class="column" data-aos="fade-up">
            <div class="count-box">
              <span class="purecounter"><?php echo $countCourse; ?></span>
              <p><strong>Number course</strong></p>
            </div>
          </div>
          <div class="column" data-aos="fade-up">
            <div class="count-box">
              <span class="purecounter"><?php echo $countClub; ?></span>
              <p><strong>Number clubs</strong></p>
            </div>
          </div>
          <div class="column" data-aos="fade-up">
            <div class="count-box">
              <span class="purecounter"><?php echo $countbooks; ?></span>
              <p><strong>Number books</strong></p>
            </div>
          </div>
          <div class="column" data-aos="fade-up">
            <div class="count-box">
              <span class="purecounter"><?php echo $countTasks; ?></span>
              <p><strong>Number tasks</strong></p>
            </div>
          </div>   
        </div>
      </div>
    </section>
    <section id="about_us">
      <div class="section-title">
        <h2>Our Perspective</h2>
      </div>
      <div class="index-container">
        <p>
          We are a computer team whose goal is to provide you with a tool that facilitates your learning journey and 
          acquisition of knowledge through our web application "Evolve". 
        <br/>
          This application helps you stay up to date with your personal development goals, maintain habits, 
          and track your daily tasks such as academic courses, reading challenges, household and sports tasks, 
          clubs, etc.
        </p>
        <img src="assets/pres.PNG" width="100%"/>
      </div>
    </section>
    <section id="about_us">
      <div class="section-title"><h2>"Discover the Power of "Evolve": Supercharge Your Personal Development Journey</h2></div>
        <div class="section-title"><h3>Introducing "Evolve"- Your Ultimate Personal Development Companion</h3></div>
        <div class="index-container">
          <p>"Evolve" is an innovative web application designed by our expert computer team to revolutionize your learning journey and enhance your personal development goals. With its user-friendly interface and powerful features, "Evolve" empowers you to stay organized, motivated, and focused on achieving your aspirations.</p>
          <img src="assets/logo.gif" width="100%" style="margin-top:-70px;"/>
        </div>
        <div class="section-title"><h3>Stay Up to Date with Personal Development Goals:</h3></div>
        <div class="index-container">
          <p>"Evolve" serves as your digital companion, helping you set and track your personal development goals. Whether you're pursuing academic courses, reading challenges, household tasks, sports activities, or club memberships, our app ensures you never miss a beat. Plan your activities, set milestones, and experience the joy of progress as you evolve into your best self.</p>   
          <img src="assets/index.png" width="100%"/>
        </div>
        <div class="section-title"><h3>Track Daily Tasks and Habits:</h3></div>
        <div class="index-container">
          <p>Building positive habits is key to personal growth, and "Evolve" makes it effortless. Easily manage your daily tasks, create to-do lists, and set reminders to keep you on track. From completing assignments to practicing meditation, our app provides a comprehensive overview of your tasks, ensuring you never lose sight of your priorities.</p>   
          <img src="assets/index2.jpeg" width="100%"/>
        </div>
        <div class="section-title"><h3>Stay Organized and Efficient:</h3></div>
        <div class="index-container">
          <p>Say goodbye to scattered notes and disorganized schedules. "Evolve" brings all your personal development activities under one virtual roof. Seamlessly manage your academic courses, reading lists, fitness routines, and more, all in a single intuitive platform. Our app's powerful organization features empower you to optimize your time, increase productivity, and achieve balance in your daily life.</p>       
          <img src="assets/index3.PNG" width="100%"/>
        </div>
        <div class="section-title"><h3>Inspiring Progress Visualization:</h3></div>
        <div class="index-container">
          <p>Visualizing your progress is a powerful motivator, and "Evolve" offers captivating ways to see how far you've come. Track your achievements, earn badges, and unlock rewards as you conquer your goals. Dynamic charts and insightful statistics provide real-time feedback on your progress, inspiring you to push further and embrace continuous growth.</p>
          <img src="assets/index4.PNG" width="100%"/>
        </div> 
        <div class="section-title"><h3>Collaborate and Connect:</h3></div>
        <div class="index-container">
          <p>"Evolve" is more than just a personal development app; it's a vibrant community of like-minded individuals on a quest for self-improvement. Connect with others, join clubs, participate in challenges, and share your experiences. Collaborate on group projects, exchange knowledge, and support each other's journeys towards personal growth.</p>
          <img src="assets/index5.PNG" width="100%"/>
        </div>
        <div class="section-title"><h3>Your Personal Development, Elevated:</h3></div>
        <div class="index-container">
          <p>"Evolve" is the ultimate tool to take your personal development to new heights. Empowered by cutting-edge technology, intuitive design, and a supportive community, you'll unlock your full potential and make progress like never before. Embrace your journey of self-discovery, cultivate positive habits, and evolve into the best version of yourself with "Evolve."</p>
          <img src="assets/index6.PNG" width="100%"/>
        </div>
    </section>
  </main>
    <footer id="footer-index">
          &copy; Copyright <strong><span>Evolve</span></strong>
    </footer>
</body>
</html>