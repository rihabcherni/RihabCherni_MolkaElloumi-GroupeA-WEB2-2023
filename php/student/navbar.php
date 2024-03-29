  <script src="../../js/nav.js"></script>
  <header>
    <div id="menu">
      <div class="profile">
      <img src="<?php echo '../../picture/userPicture/'.$_SESSION['photo']?>" alt="student" class="img-nav">
        <h1 class="nameNav"><?php echo $_SESSION['lastname']." ".$_SESSION['firstName']?></h1>
      </div>
      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="home.php" class="<?php if($activePage == 'home') echo 'active'; ?>"><i class="fas fa-home"></i> <span>Home</span></a></li>
          <li><a href="profile.php" class="<?php if($activePage == 'profile') echo 'active'; ?>"><i class="fas fa-user"></i> <span>Profile</span></a></li>
          <li><a href="skills.php" class="<?php if($activePage == 'skills') echo 'active'; ?>"><i class="fas fa-brain"></i> <span>Skills</span></a></li>
          <li><a href="club.php" class="<?php if($activePage == 'club') echo 'active'; ?>"><i class="fas fa-palette"></i> <span>Clubs</span></a></li>
          <li><a href="books.php" class="<?php if($activePage == 'books') echo 'active'; ?>"><i class="fas fa-book"></i> <span>Books</span></a></li>
          <li><a href="course.php" class="<?php if($activePage == 'course') echo 'active'; ?>"><i class="fas fa-server"></i> <span>Course</span></a></li>
          <li><a href="tasks.php" class="<?php if($activePage == 'tasks') echo 'active'; ?>"><i class="fas fa-tasks"></i> <span>Tasks</span></a></li>
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