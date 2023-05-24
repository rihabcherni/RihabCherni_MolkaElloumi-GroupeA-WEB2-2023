<?php
$activePage = 'skills';
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
  <title>Skills</title>
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
    <section id="skills">
        <div>
          <div class="section-title">
            <h2>My skills</h2>
          </div>
          <div>
            <div>
              <div>
                <span>HTML <i>100%</i></span>
                <div>
                  <div role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                  </div>
                </div>
              </div>

              <div>
                <span>CSS <id="val">90%</i></span>
                <div>
                  <div role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                  </div>
                </div>
              </div>

              <div>
                <span>JavaScript <i>75%</i></span>
                <div>
                  <div role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                  </div>
                </div>
              </div>

            </div>

            <div>

              <div>
                <span>PHP <i>80%</i></span>
                <div>
                  <div role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                  </div>
                </div>
              </div>

              <div>
                <span>WordPress/CMS <i>90%</i></span>
                <div>
                  <div role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                  </div>
                </div>
              </div>

              <div>
                <span>Photoshop <i>55%</i></span>
                <div>
                  <div role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100">
                  </div>
                </div>
              </div>

            </div>

          </div>
        </div>
    </section>
  </main> 
</body>
</html>