<?php
$activePage = 'skills';
include '../crud.php';
include('../config.php');
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
  <link rel="stylesheet" href="../../style/index.css?v=1.1" />
  <script src="../../js/jquery.min.js"></script>
  <link rel="stylesheet" href="../../style/all.css?v=3.1" />
    <link rel="stylesheet" href="../../style/Nav.css?v=3.1" />
    <link rel="stylesheet" href="../../style/home.css?v=1.1" />
    <style>
      .container {
        width: 100%;
        background-color: #ddd;
      }

      .skills {
        text-align: center;
        margin: 20px;
        padding-top: 10px;
        padding-bottom: 10px;
        color: white;
        font-weight: bold;
        background-color: #345146;
      }
    table {
      border-collapse: collapse !important;

      margin: 30px 30px ;
    }

    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #f2f2f2;
      text-align: center;
    }
  </style>
</head>
<body>
  <?php include 'navbar.php'; ?>
  <main id="main">    
    <section id="skills">
        <div>
          <div class="section-title">
            <h2>My skills</h2>
          </div>
          <?php 
          $sessionid = $_SESSION['id'];
          $query = "SELECT * FROM skills WHERE student_id = :sessionid";
          $stmt = $conn->prepare($query);
          $stmt->bindParam(':sessionid', $sessionid);
          $stmt->execute();
          $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
          if ($result) {
            foreach ($result as $row) {
              echo '<div class="skills" style="width:'.$row['percentage'].'%">'.$row["skill"].' '.$row['percentage'].'%</div>';
            }
          }       
        ?>
    </section>
  </main> 
</body>
</html>