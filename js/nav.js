function toggleMenu() {
    var menu = document.getElementById("menu");
    var footer = document.getElementById("footer");
    var main = document.getElementById("main");  
    var btn = document.getElementById("navbar-toggle");
    if (menu.style.display === "none") {
      menu.style.display = "block";
      footer.style.display = "block";
      main.style.marginLeft = "300px";
      btn.style.marginLeft = "300px !important";
    } else {
      menu.style.display = "none";
      footer.style.display = "none";
      main.style.marginLeft = "10px";
      btn.style.marginLeft = "10px !important";
    }
  }