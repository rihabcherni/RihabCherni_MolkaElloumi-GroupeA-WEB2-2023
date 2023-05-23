<?php
  $activePage = 'club';
  include 'crud.php';
  session_start();
  include('config.php');
  $id= $_SESSION['student_id'];
  $club = getRecordById('club', $id , $conn);
  $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
  $searchAttributes = ['id', 'name', 'logo', 'category'];
  $club = searchRecords('club', $searchTerm, $searchAttributes, $conn);
  if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
    if (!empty($_POST['action']) && $_POST['action'] === 'insert') {
      if (!empty($_POST['name']) && !empty( $_FILES['logo']['name']) && !empty($_POST['category']) ) {
          $data = [
              'name' => $_POST['name'],
              'logo' =>  $_FILES['logo']['name'],
              'category' => $_POST['category'],
          ];
          $result = insertRecord('club', $data, $conn);

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
        $logo="";
        $category="";
        $name= $_POST['name'];
        $logo= $_FILES['logo']['name'];
        $category= $_POST['category'];
        $data = [
          'name' => $_POST['name'],
          'logo' =>  $_FILES['logo']['name'],
          'category' => $_POST['category'],
        ];
        $result = updateRecord('club',$id,$data,  $conn);
        if ($result) {
          echo "Record updated successfully!";
          header("Location: ".$_SERVER['REQUEST_URI']);
          exit();
        } else {
          echo "Failed to update the record.";
        }
    }else if (!empty($_POST['action']) && $_POST['action'] === 'delete'){
      $id = $_POST['id'];
      $result = deleteRecord('club',$id,  $conn);
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
  <link rel="stylesheet" href="../style/index.css" />
  <link rel="stylesheet" href="../style/all.css" />
    <link rel="stylesheet" href="../style/Nav2.css" />
    <link rel="stylesheet" href="../style/home.css" />
    <link rel="stylesheet" href="../style/modal.css" />
    <script src="../js/modal.js"></script>
</head>
<body>
  <?php include 'navbar.php'; ?>
  <main id="main">    
      <section id="club">
        <div>
        <div class="section-title">
            <h2>My clubs</h2>
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
                    <input type="file" name="logo" accept="image/*" required>
                  </div>
                  <div class="grp-input">
                    <input type="text" name="category" placeholder="Category" required>
                  </div>
                  <input type="hidden" name="action" value="insert"> 
                  <button id="cancel" onclick="closeModal('popup')">Cancel</button>
                  <input type="submit" value="ADD">
              </form>
            </div>
          </div>         
          <div id="updateModal" class="popup">
            <div class="popup-content">
              <div class="popup-header"> <h2>Update Club</h2></div> 
              <p id="id"></p> 
              <button id="closeBtn" onclick="closeModal('updateModal')"><i class="fa fa-times" aria-hidden="true"></i></button>
              <form id="updateForm" action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="update"> 
                <div class="grp-input">
                  <input type="text" name="name" placeholder="Name" id="nameUp">
                </div>
                <div class="grp-input">
                  <input type="file" name="logo" accept="image/*" id="logoUp">
                </div>
                <div class="grp-input">
                  <input type="text" name="category" placeholder="Category"  id="categoryUp">
                </div>
                <input type="submit" value="Update">
              </form>
              <button id="cancel" onclick="closeModal('updateModal')">Cancel</button>
            </div>
          </div>
          <div id="showModal" class="popup">
            <div class="popup-content">
              <div class="popup-header"> <h2>Show Club</h2></div> 
              <button id="closeBtn" onclick="closeModal('showModal')"><i class="fa fa-times" aria-hidden="true"></i></button>
              <div id='show-content'></div>
            </div>
            <button id="cancel" onclick="closeModal('showModal')">Cancel</button>
          </div>
          <div id="deleteModal" class="popup">
            <div class="popup-content">
            <div class="popup-header"> <h2>Delete Club</h2></div> 
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
              <button id="openBtn" onclick="modal()">ADD</button>
            </div> 
            <table border="2" class="tableCrud">
              <thead>
                <tr>
                  <th>ID club</th>
                  <th>Name</th>
                  <th>Logo</th>
                  <th>Category</th>
                  <th>Actions</th></tr>
                </tr>
              </thead>
              <tbody>
                  <?php              
                  foreach ($club as $record): ?>
                    <tr>
                      <td><?php echo $record['id']; ?></td>
                      <td><?php echo $record['name']; ?></td>
                      <td><img src="<?php echo $record['logo']; ?>" alt="Logo" width="180px"></td>
                      <td><?php echo $record['category']; ?></td>
                      <td>
                        <button onclick="openShowModal('<?php echo htmlspecialchars(json_encode([['idUp',$record['id']],['nameUp', $record['name']],['logoUp', $record['logo']],['categoryUp', $record['category']]])); ?>')">Show</button>
                        <button onclick="openUpdateModal('<?php echo htmlspecialchars(json_encode([['idUp',$record['id']],['nameUp', $record['name']],['logoUp', $record['logo']],['categoryUp', $record['category']]])); ?>')">Update</button>
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