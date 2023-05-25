<?php
$activePage = 'student-admin';
 session_start();
 if ($_SESSION['conn'] == false) {
  header("Location: ../login.php");
  exit();
} 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Students</title>
    <script src="https://kit.fontawesome.com/ff3b6c3621.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style/index.css?v=1.1" />
    <script src="../js/jquery.min.js"></script>
    <link rel="stylesheet" href="../../style/all.css?v=3.1" />
      <link rel="stylesheet" href="../../style/Nav.css?v=2.1" />
      <link rel="stylesheet" href="../../style/home.css?v=2.1" />
      <style>
    table {
      border-collapse: collapse;
      position: absolute;
      margin: 30px 0 0 30px ;
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
    <?php include 'adminNavbar.php'; ?>
    <main id="main">
      <section id="Students">
      <div class="section-title">
          <h2>Students</h2>
      </div>
        <div>
        
  <table>
    <tr>
      <th>ID</th>
      <th>Photo</th>
      <th>LastName</th>
      <th>FirstName</th>
      <th>Gender</th>
      <th>Date of birth</th>
      <th>Phone</th>
      <th>Email</th>
      <th>Address</th>
      <th>Education level</th>
    </tr>
    <?php 
      include('../config.php');
      $stmt = $conn->query("SELECT * FROM student");
      $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
      foreach ($students as $student) {
        echo "<tr>";
        echo "<td>".$student['student_id']."</td>";
        echo "<td><img width='90px' src='../../picture/userPicture/".$student['Photo']."'></td>";
        echo "<td>".$student['lastName']."</td>";
        echo "<td>".$student['firstName']."</td>";
        echo "<td>".$student['gender']."</td>";
        echo "<td>".$student['Date_of_birth']."</td>";
        echo "<td>".$student['phone']."</td>";
        echo "<td>".$student['Email']."</td>";
        echo "<td>".$student['address']."</td>";
        echo "<td>".$student['education_level']."</td>";
        echo "</tr>";
      }
    ?>
  </table>  
        </div>
      </section>
    </main>
  </body>
</html>