<?php
  $activePage = 'tasks';
  include '../crud.php';
  include('../config.php');
  session_start();
  if ($_SESSION['conn'] == false) {
    header("Location: ../login.php");
    exit();
  } 	
  $searchTerm = isset($_GET['search']) ? $_GET['search']:'';
  $searchAttributes=['id','name','start_date','end_date','nature','status','importance','location'];
  $tasks=searchRecords('tasks',$searchTerm,$searchAttributes,$conn);
  if ($_SERVER['REQUEST_METHOD']==='POST') { 	
    if (!empty($_POST['action']) && $_POST['action'] === 'insert') {
      if (!empty($_POST['name'])&&!empty($_POST['start_date'])&&!empty($_POST['end_date']) && 
      !empty($_POST['nature'])&& !empty($_POST['status'])&&!empty($_POST['importance'])&&!empty($_POST['location']) ) {
          $data = [
              'name' => $_POST['name'],
              'start_date' => $_POST['start_date'],
              'end_date' => $_POST['end_date'],
              'nature' => $_POST['nature'],
              'status' => $_POST['status'],
              'importance' => $_POST['importance'],
              'location' =>  $_POST['location'],
          ];
          $result = insertRecord('tasks', $data, $conn);

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
        $start_date="";
        $end_date="";
        $nature="";
        $status="";
        $importance="";
        $location="";
        $name= $_POST['name'];
        $start_date= $_POST['start_date'];
        $nature= $_POST['nature'];
        $end_date= $_POST['end_date'];
        $status= $_POST['status'];
        $importance= $_POST['importance'];
        $location= $_POST['location'];
        $data = [
          'name' => $_POST['name'],
          'start_date' => $_POST['start_date'],
          'end_date' => $_POST['end_date'],
          'nature' => $_POST['nature'],
          'status' => $_POST['status'],
          'importance' => $_POST['importance'],
          'location' =>  $_POST['location'],
        ];
        $result = updateRecord('tasks',$id,$data,  $conn);
        if ($result) {
          echo "Record updated successfully!";
          header("Location: ".$_SERVER['REQUEST_URI']);
          exit();
        } else {
          echo "Failed to update the record.";
        }
    }else if (!empty($_POST['action']) && $_POST['action'] === 'delete'){
      $id = $_POST['id'];
      $result = deleteRecord('tasks',$id,  $conn);
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
  <title>Tasks</title>
  <script src="https://kit.fontawesome.com/ff3b6c3621.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../style/index.css?v=1.1" />
  <script src="../../js/jquery.min.js"></script>
  <link rel="stylesheet" href="../../style/all.css?v=3.1" />
    <link rel="stylesheet" href="../../style/Nav.css?v=3.1" />
    <link rel="stylesheet" href="../../style/home.css?v=3.1" />
    <link rel="stylesheet" href="../../style/modal.css?v=1.1" />
    <script src="../../js/modal.js"></script>
    <style>
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
      <section id="tasks">
        <div>
        <div class="section-title">
            <h2>My tasks</h2>
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
                    <input type="date" name="start_date" placeholder="start_date" required>
                  </div>
                  <div class="grp-input">
                    <input type="date" name="end_date" placeholder="end_date" required>
                  </div>
                  <div class="grp-input">
                    <input type="text" name="nature" placeholder="nature" required>
                  </div>
                  <div class="grp-input">
                    <input type="text" name="status" placeholder="status" required>
                  </div>
                  <div class="grp-input">
                    <input type="text" name="importance" placeholder="importance" required>
                  </div>
                  <div class="grp-input">
                    <input type="text" name="location" placeholder="location" required>
                  </div>
                  
                  <input type="hidden" name="action" value="insert"> 
                  <button id="cancel" onclick="closeModal('popup')">Cancel</button>
                  <input type="submit" value="ADD">
              </form>
            </div>
          </div>         
          <div id="updateModal" class="popup">
            <div class="popup-content">
              <div class="popup-header"> <h2>Update tasks</h2></div> 
              <p id="id"></p> 
              <button id="closeBtn" onclick="closeModal('updateModal')"><i class="fa fa-times" aria-hidden="true"></i></button>
              <form id="updateForm" action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="update"> 
                <div class="grp-input">
                  <input type="text" name="name" placeholder="Name" id="nameUp">
                </div>
                <div class="grp-input">
                  <input type="text" name="start_date" placeholder="start_date"  id="start_dateUp">
                </div>
                  <div class="grp-input">
                    <input type="date" name="end_date" placeholder="end_date"   id="end_dateUp">
                  </div>
                  <div class="grp-input">
                    <input type="text" name="nature" placeholder="nature"   id="natureUp">
                  </div>
                  <div class="grp-input">
                    <input type="text" name="status" placeholder="status"  id="statusUp">
                  </div>
                  <div class="grp-input">
                    <input type="text" name="importance" placeholder="importance"   id="importanceUp">
                  </div>
                  <div class="grp-input">
                    <input type="text" name="location" placeholder="location"   id="locationUp">
                  </div>
                <input type="submit" value="Update">
              </form>
              <button id="cancel" onclick="closeModal('updateModal')">Cancel</button>
            </div>
          </div>
          <div id="showModal" class="popup">
            <div class="popup-content">
              <div class="popup-header"> <h2>Show tasks</h2></div> 
              <button id="closeBtn" onclick="closeModal('showModal')"><i class="fa fa-times" aria-hidden="true"></i></button>
              <div id='show-content'></div>
            </div>
            <button id="cancel" onclick="closeModal('showModal')">Cancel</button>
          </div>
          <div id="deleteModal" class="popup">
            <div class="popup-content">
            <div class="popup-header"> <h2>Delete tasks</h2></div> 
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
              <input type="text"name="search"  id="searchInput" placeholder="Search..." value="<?php echo $searchTerm; ?>"/>
                <input type="submit" value="Search" id="search"/>
              </form>
              <button id="openBtn" onclick="openAddModal()">ADD</button>
            </div> 
            <table border="2" class="tableCrud">
              <thead>
                <tr>
                  <th>ID tasks</th>
                  <th>Name</th>
                  <th>start_date</th>
                  <th>end_date</th>
                  <th>nature</th>
                  <th>status</th>
                  <th>importance</th>
                  <th>location</th>
                  <th>Actions</th></tr>
                </tr>
              </thead>
              <tbody>
                  <?php              
                  foreach ($tasks as $record): ?>
                    <tr>
                      <td><?php echo $record['id']; ?></td>
                      <td><?php echo $record['name']; ?></td>
                      <td><?php echo $record['start_date']; ?></td>
                      <td><?php echo $record['end_date']; ?></td>
                      <td><?php echo $record['status']; ?></td>
                      <td><?php echo $record['nature']; ?></td>
                      <td><?php echo $record['importance']; ?></td>
                      <td><?php echo $record['location']; ?></td>
                      <td>
                        <button class="showBtn" onclick="openShowModal('<?php echo htmlspecialchars(json_encode([['idUp',$record['id']],['nameUp', $record['name']],['start_dateUp', $record['start_date']]])); ?>')">Show</button>
                        <button  class="updateBtn" onclick="openUpdateModal('<?php echo htmlspecialchars(json_encode([['idUp',$record['id']],['nameUp', $record['name']],['start_dateUp', $record['start_date']]])); ?>')">Update</button>
                        <button class="deleteBtn" onclick="openDeleteModal(<?php echo $record['id']; ?>)">Delete</button>
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