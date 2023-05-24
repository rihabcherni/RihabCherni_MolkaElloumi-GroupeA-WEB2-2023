<?php
  session_start();
  if ($_SESSION['conn'] == false) {
    header("Location: ../login.php");
    exit();
  } 
$activePage = 'course';
include 'crud.php';
include('config.php');
$id= $_SESSION['id'];
$course = getRecordById('course', $id , $conn);
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
$searchAttributes = ['id', 'name', 'nature', 'domain_study', 'level','description'];
$course = searchRecords('course', $searchTerm, $searchAttributes, $conn);
if ($_SERVER['REQUEST_METHOD'] === 'POST' ) { 	
  if (!empty($_POST['action']) && $_POST['action'] === 'insert') {
    if (!empty($_POST['name']) && !empty($_POST['nature']) && !empty($_POST['domain_study']) && !empty($_POST['level']) && !empty($_POST['description']) ) {
        $data = [
            'name' => $_POST['name'],
            'nature' => $_POST['nature'],
            'domain_study' => $_POST['domain_study'],
            'level' => $_POST['level'],
            'description' => $_POST['description'],
        ];
        $result = insertRecord('course', $data, $conn);

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
      $nature="";
      $domain_study="";
      $level="";
      $description="";
      $name= $_POST['name'];
      $nature= $_POST['nature'];
      $domain_study= $_POST['domain_study'];
      $level= $_POST['level'];
      $description= $_POST['description'];
      $data = [
        'name' => $_POST['name'],
        'nature' => $_POST['nature'],
        'domain_study' => $_POST['domain_study'],
        'level' => $_POST['level'],
        'description' => $_POST['description'],
      ];
      $result = updateRecord('course',$id,$data,  $conn);
      if ($result) {
        echo "Record updated successfully!";
        header("Location: ".$_SERVER['REQUEST_URI']);
        exit();
      } else {
        echo "Failed to update the record.";
      }
  }else if (!empty($_POST['action']) && $_POST['action'] === 'delete'){
    $id = $_POST['id'];
    $result = deleteRecord('course',$id,  $conn);
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
  <title>Home</title>
  <script src="https://kit.fontawesome.com/ff3b6c3621.js" crossorigin="anonymous"></script>
  <script src="../js/jquery.min.js"></script>
  <link rel="stylesheet" href="../style/index.css?v=1.1" />
  <link rel="stylesheet" href="../style/all.css?v=1.1" />
    <link rel="stylesheet" href="../style/Nav2.css?v=1.1" />
    <link rel="stylesheet" href="../style/home.css?v=1.1" />
    <link rel="stylesheet" href="../style/modal.css?v=1.1" />
    <script src="../js/modal.js"></script>
</head>
<body>
  <?php include 'navbar.php'; ?>
  <main id="main">    
      <section id="course">
        <div>
        <div class="section-title">
            <h2>My courses</h2>
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
                    <input type="text" name="nature" placeholder="nature" required>
                  </div>
                  <div class="grp-input">
                    <input type="text" name="domain_study" placeholder="domain_study" required>
                  </div>
                  <div class="grp-input">
                    <input type="text" name="level" placeholder="level" required>
                  </div>
                  <div class="grp-input">
                    <input type="text" name="description" placeholder="description" required>
                  </div>
                  <input type="hidden" name="action" value="insert"> 
                  <button id="cancel" onclick="closeModal('popup')">Cancel</button>
                  <input type="submit" value="ADD">
              </form>
            </div>
          </div>         
          <div id="updateModal" class="popup">
            <div class="popup-content">
              <div class="popup-header"> <h2>Update course</h2></div> 
              <p id="id"></p> 
              <button id="closeBtn" onclick="closeModal('updateModal')"><i class="fa fa-times" aria-hidden="true"></i></button>
              <form id="updateForm" action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="update"> 
                  <div class="grp-input">
                    <input type="text" name="nameUp" placeholder="Name" required>
                  </div>
                  <div class="grp-input">
                    <input type="text" name="natureUp" placeholder="nature" required>
                  </div>
                  <div class="grp-input">
                    <input type="text" name="domain_studyUp" placeholder="domain_study" required>
                  </div>
                  <div class="grp-input">
                    <input type="text" name="levelUp" placeholder="level" required>
                  </div>
                  <div class="grp-input">
                    <input type="text" name="descriptionUp" placeholder="description" required>
                  </div>
                <input type="submit" value="Update">
              </form>
              <button id="cancel" onclick="closeModal('updateModal')">Cancel</button>
            </div>
          </div>
          <div id="showModal" class="popup">
            <div class="popup-content">
              <div class="popup-header"> <h2>Show course</h2></div> 
              <button id="closeBtn" onclick="closeModal('showModal')"><i class="fa fa-times" aria-hidden="true"></i></button>
              <div id='show-content'></div>
            </div>
            <button id="cancel" onclick="closeModal('showModal')">Cancel</button>
          </div>
          <div id="deleteModal" class="popup">
            <div class="popup-content">
            <div class="popup-header"> <h2>Delete course</h2></div> 
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
            <table border="2" class="tableCrud">
              <thead>
                <tr>
                  <th>ID course</th>
                  <th>Name</th>
                  <th>Nature</th>
                  <th>Domain study</th>
                  <th>Level</th>
                  <th>Description</th>
                  <th>Actions</th></tr>
                </tr>
              </thead>
              <tbody>
                  <?php              
                  foreach ($course as $record): ?>
                    <tr>
                      <td><?php echo $record['id']; ?></td>
                      <td><?php echo $record['name']; ?></td>
                      <td><?php echo $record['nature']; ?></td>
                      <td><?php echo $record['domain_study']; ?></td>
                      <td><?php echo $record['level']; ?></td>
                      <td><?php echo $record['description']; ?></td>
                      <td>

                    <button onclick="openShowModal('<?php echo htmlspecialchars(json_encode([['idUp',$record['id']],['nameUp', $record['name']],['natureUp', $record['nature']],['levelUp', $record['level']],['domain_studyUp', $record['domain_study']],['descriptionUp', $record['description']]])); ?>')">Show</button>
                    <button onclick="openUpdateModal('<?php echo htmlspecialchars(json_encode([['idUp',$record['id']],['nameUp', $record['name']],['natureUp', $record['nature']],['levelUp', $record['level']],['domain_studyUp', $record['domain_study']],['descriptionUp', $record['description']]])); ?>')">Update</button>
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