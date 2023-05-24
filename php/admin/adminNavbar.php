<script src="../../js/nav.js"></script>
  <header>
    <div id="menu">
      <div class="profile">
        <img src="../../picture/userPicture/admin.png" alt="amdin" class="img-nav">
        <h1 class="text-light"><?php echo $_SESSION['lastName']." ".$_SESSION['firstName']?></h1>
      </div>
      <nav id="navbar" class="nav-menu navbar">
        <ul>
        <li><a href="AdminHome.php" class="<?php if($activePage == 'home-admin') echo 'active'; ?>"><i class="fas fa-home"></i> <span>Home</span></a></li>
        <li><a href="AdminDashboard.php" class="<?php if($activePage == 'dash-admin') echo 'active'; ?>"><i class="fas fa-chart-line"></i> <span>Dashboard</span></a></li>
          <li><a href="studentAdmin.php" class="<?php if($activePage == 'student-admin') echo 'active'; ?>"><i class="fas fa-users"></i> <span>Student</span></a></li>
          <li><a href="profileAdmin.php" class="<?php if($activePage == 'profile-admin') echo 'active'; ?>"><i class="fas fa-user"></i> <span>Profile</span></a></li>
        </ul>
      </nav>
    </div>
    <div class="nav-horiz">
    <button class="navbar-toggle" id="navbar-toggle" onclick="toggleMenu()"><i class="fas fa-bars"></i></button>
     <form action="../logout.php" method="post">
      <button class="" type="submit" name="logout"><i class="fas fa-sign-out-alt"></i></button>
      </form>
      <button class="navbar-toggle"><a href="../updatePassword.php" class="btn btn-primary"><i class="fas fa-key"></i></a></button>
    </div>
  </header>
  <footer id="footer">
      <div>
        <div>
          &copy; Copyright <strong><span></span></strong>
        </div>
      </div>
    </footer>