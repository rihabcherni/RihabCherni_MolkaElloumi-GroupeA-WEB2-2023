<?php
  session_start();
  if ($_SESSION['conn'] == false) {
    header("Location: ../login.php");
    exit();
  } 
  $activePage = 'books';
  include '../crud.php';
  include('../config.php');
  $searchTerm = isset($_GET['search']) ? $_GET['search']:'';
  $searchAttributes=['id','name','author','duration','nature','summary','number_of_page'];
  $books=searchRecords('books',$searchTerm,$searchAttributes,$conn);
  if ($_SERVER['REQUEST_METHOD']==='POST') { 	
    if (!empty($_POST['action']) && $_POST['action'] === 'insert') {
      if (!empty($_POST['name'])&&!empty($_POST['author'])&&!empty($_POST['duration']) && 
      !empty($_POST['nature'])&& !empty($_POST['summary'])&&!empty($_POST['number_of_page']) ) {
          $data = [
              'name' => $_POST['name'],
              'author' => $_POST['author'],
              'duration' => $_POST['duration'],
              'nature' => $_POST['nature'],
              'summary' => $_POST['summary'],
              'number_of_page' => $_POST['number_of_page'],
              'picture' =>  $_FILES['picture']['name'],
          ];
          $result = insertRecord('books', $data, $conn);

          if ($result) {
              echo "Record inserted successfully!";
              header("Location: ".$_SERVER['REQUEST_URI']);
              exit();
          } else {
              echo "Failed to insert the record.";
          }
      } else {
          echo "Please fill in all the fields.";
      }
    }else if (!empty($_POST['action']) && $_POST['action'] === 'update'){
        $id = $_POST['id'];
        echo"". $id ;
        $name="";
        $author="";
        $duration="";
        $nature="";
        $summary="";
        $number_of_page="";
        $name= $_POST['name'];
        $author= $_POST['author'];
        $nature= $_POST['nature'];
        $duration= $_POST['duration'];
        $summary= $_POST['summary'];
        $number_of_page= $_POST['number_of_page'];
        $data = [
          'name' => $_POST['name'],
          'author' => $_POST['author'],
          'duration' => $_POST['duration'],
          'nature' => $_POST['nature'],
          'summary' => $_POST['summary'],
          'number_of_page' => $_POST['number_of_page'],
          'picture' =>  $_FILES['picture']['name'],
        ];
        $result = updateRecord('books',$id,$data,  $conn);
        if ($result) {
          echo "Record updated successfully!";
          header("Location: ".$_SERVER['REQUEST_URI']);
          exit();
        } else {
          echo "Failed to update the record.";
        }
    }else if (!empty($_POST['action']) && $_POST['action'] === 'delete'){
      $id = $_POST['id'];
      $result = deleteRecord('books',$id,  $conn);
      if ($result) {
        echo "Record delete successfully!";
        header("Location: ".$_SERVER['REQUEST_URI']);
        exit();
      } else {
        echo "Failed to delete the record.";
      }
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Books</title>
  <script src="https://kit.fontawesome.com/ff3b6c3621.js" crossorigin="anonymous"></script>
  <script src="../js/jquery.min.js"></script>
  <link rel="stylesheet" href="../../style/index.css?v=1.1" />
  <link rel="stylesheet" href="../../style/all.css?v=3.1" />
    <link rel="stylesheet" href="../../style/Nav.css?v=3.1" />
    <link rel="stylesheet" href="../../style/home.css?v=1.1" />
    <link rel="stylesheet" href="../../style/modal.css?v=1.1" />
    <script src="../../js/modal.js"></script>
    <style>
    table {
      border-collapse: collapse;
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
      <section id="books">
        <div>
        <div class="section-title">
            <h2>My books</h2>
          </div>
          <div id="popup" class="popup">
            <div class="popup-content">
              <h2>Add <?php echo $activePage ?></h2>
              <button id="closeBtn"  onclick="closeModal('popup')"><i class="fa fa-times" aria-hidden="true"></i></button>
              <form action="" method="POST" enctype="multipart/form-data">
                  <div class="grp-input">
                    <input type="text" name="name" placeholder="Name" required>
                  </div> 
                  <div class="grp-input">
                    <input type="text" name="author" placeholder="author" required>
                  </div>
                  <div class="grp-input">
                    <input type="text" name="duration" placeholder="duration" required>
                  </div>
                  <div class="grp-input">
                    <input type="text" name="summary" placeholder="summary" required>
                  </div>
                  <div class="grp-input">
                    <input type="text" name="number_of_page" placeholder="number_of_page" required>
                  </div>
                  <div class="grp-input">
                    <input type="file" name="picture" accept="image/*" id="picture">
                  </div>
                  <input type="hidden" name="action" value="insert"> 
                  <button id="cancel" onclick="closeModal('popup')">Cancel</button>
                  <input type="submit" value="ADD">
              </form>
            </div>
          </div>         
          <div id="updateModal" class="popup">
            <div class="popup-content">
              <div class="popup-header"> <h2>Update books</h2></div> 
              <p id="id"></p> 
              <button id="closeBtn" onclick="closeModal('updateModal')"><i class="fa fa-times" aria-hidden="true"></i></button>
              <form id="updateForm" action="" method="POST" enctype="multipart/form-data">
              <div class="grp-input">
                    <input type="text" name="nameUp" placeholder="Name" required>
                  </div> 
                  <div class="grp-input">
                    <input type="text" name="authorUp" placeholder="author" required>
                  </div>
                  <div class="grp-input">
                    <input type="text" name="durationUp" placeholder="duration" required>
                  </div>
                  <div class="grp-input">
                    <input type="text" name="summaryUp" placeholder="summary" required>
                  </div>
                  <div class="grp-input">
                    <input type="text" name="number_of_pageUp" placeholder="number_of_page" required>
                  </div>
                  <div class="grp-input">
                    <input type="file" name="pictureUp" accept="image/*" id="picture">
                  </div>
                <input type="submit" value="Update">
              </form>
              <button id="cancel" onclick="closeModal('updateModal')">Cancel</button>
            </div>
          </div>
          <div id="showModal" class="popup">
            <div class="popup-content">
              <div class="popup-header"> <h2>Show books</h2></div> 
              <button id="closeBtn" onclick="closeModal('showModal')"><i class="fa fa-times" aria-hidden="true"></i></button>
              <div id='show-content'></div>
            </div>
            <button id="cancel" onclick="closeModal('showModal')">Cancel</button>
          </div>
          <div id="deleteModal" class="popup">
            <div class="popup-content">
            <div class="popup-header"> <h2>Delete books</h2></div> 
              <p id="id"></p> 
              <button id="closeBtn" onclick="closeModal('deleteModal')"><i class="fa fa-times" aria-hidden="true"></i></button>
              <form id="deleteForm" action="" method="POST">
                <p class="msg">Are you sure to delete this record?</p>
                <input type="hidden" name="id" placeholder="id" id='idDele'>
                <input type="hidden" name="action" value="delete"> 
                <button id="cancel" onclick="closeModal('deleteModal')">Cancel</button>
                <input type="submit" value="delete">
              </form>
            </div>
          </div>
          <div class="table-container"> 
            <div>
              <form action="" method="GET">
                <input type="text" name="search" placeholder="Search..." value="<?php echo $searchTerm; ?>"/>
                <input type="submit" value="Search"/>
              </form>
              <button id="openBtn" onclick="openAddModal()">ADD</button>
            </div> 
            <table>
              <thead>
                <tr>
                  <th>ID books</th>
                  <th>Name</th>
                  <th>author</th>
                  <th>duration</th>
                  <th>nature</th>
                  <th>summary</th>
                  <th>number_of_page</th>
                  <th>Actions</th></tr>
                </tr>
              </thead>
              <tbody>
                  <?php              
                  foreach ($books as $record): ?>
                    <tr>
                      <td><?php echo $record['id']; ?></td>
                      <td><?php echo $record['name']; ?></td>
                      <td><?php echo $record['author']; ?></td>
                      <td><?php echo $record['duration']; ?></td>
                      <td><?php echo $record['nature']; ?></td>
                      <td><?php echo $record['summary']; ?></td>
                      <td><?php echo $record['number_of_page']; ?></td>
                      <td>
                    <button onclick="openShowModal('<?php echo htmlspecialchars(json_encode([['idUp',$record['id']],['nameUp', $record['name']],['natureUp', $record['nature']],['levelUp', $record['level']],['domain_studyUp', $record['domain_study']],['summaryUp', $record['summary']]])); ?>')">Show</button>
                    <button onclick="openUpdateModal('<?php echo htmlspecialchars(json_encode([['idUp',$record['id']],['nameUp', $record['name']],['natureUp', $record['nature']],['levelUp', $record['level']],['domain_studyUp', $record['domain_study']],['summaryUp', $record['summary']]])); ?>')">Update</button>
                    <button onclick="openDeleteModal(<?php echo $record['id']; ?>)">Delete</button>
                  </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>

            </table>
          </div>
        </div>
      </section>
  </main>
</body>
</html>