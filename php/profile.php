<?php
$activePage = 'profile';
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Profile EVELVE</title>
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
      <section id="profile">
        <div>
          <div>
            <div>
              <div>
                <img src="../assets/profile-img.jpg" alt="">
              </div>
              <div>
                <div class="section-title">
                  <h2>My informations</h2>
                </div>
                <div>
                  <div>
                    <ul>
                      <li><strong>lastname:</strong> <span>student</span></li>
                      <li><strong>firstname</strong> <span>student</span></li>
                      <li><strong>Age</strong> <span>20</span></li>
                      <li> <strong>Education level:</strong> <span>1 ere G info</span></li>
                      <li> <strong>E-mail:</strong> <span>student @student.com</span>
                      </li>
                    </ul>
                  </div>
                  <div>
                    <ul>
                      <li> <strong>Age:</strong> <span>30</span></li>
                      <li> <strong>Degree:</strong> <span>Master</span></li>
                      <li> <strong>PhEmailone:</strong> <span>email@example.com</span>
                      </li>
                      <li> <strong>Freelance:</strong> <span>Available</span></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </section>
    </main>
  </body> 
</html>