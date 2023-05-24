<script src="../js/nav.js"></script>
  <header>
    <div id="menu">
      <div class="profile">
        <img src="../assets/profile-img.jpg" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><?php echo $_SESSION['lastname']." ".$_SESSION['firstName']?></h1>
        <div class="social-links">
          <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
          <a href="#" class="facebook"><i class="fab fa-facebook"></i></a>
          <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
          <a href="#" class="linkedin"><i class="fab fa-linkedin"></i></a>
        </div> 
      </div>
      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="home.php" class="<?php if($activePage == 'home-admin') echo 'active'; ?>"><i class="fas fa-home"></i> <span>Home</span></a></li>
          <li><a href="studentAdmin.php" class="<?php if($activePage == 'student-admin') echo 'active'; ?>"><i class="fas fa-user"></i> <span>Student</span></a></li>
        </ul>
      </nav>
    </div>
    <div class="nav-horiz">
    <button class="navbar-toggle" id="navbar-toggle" onclick="toggleMenu()"><i class="fas fa-bars"></i></button>
     <form action="logout.php" method="post">
      <button class="" type="submit" name="logout"><i class="fas fa-sign-out-alt"></i></button>
      </form>
      <button class="navbar-toggle"><a href="updatePassword.php" class="btn btn-primary"><i class="fas fa-key"></i></a></button>
    </div>
  </header>
  <footer id="footer">
      <div>
        <div>
          &copy; Copyright <strong><span></span></strong>
        </div>
      </div>
    </footer>