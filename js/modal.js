function modal() {
    var openBtn = document.getElementById("openBtn");
    var closeBtn = document.getElementById("closeBtn");
    var cancel = document.getElementById("cancel");
    var popup = document.getElementById("popup");
    openBtn.addEventListener("click", function() {
    popup.style.display = "block";
    });
    closeBtn.addEventListener("click", function() {
    popup.style.display = "none";
    });

    cancel.addEventListener("click", function() {
      popup.style.display = "none";
      });
  }
  function openUpdateModal(data) {
    var parsedData = JSON.parse(data);        
    var modal = document.getElementById("updateModal");
      parsedData.forEach(pair => {
        var attribute = pair[0];
        var value = pair[1];
        var element = document.getElementById(attribute);
        if (element) {
          if (attribute !== 'logoUp') {
            element.value = value;
          }
        }
      });
      modal.style.display = "block";
    }
    function openShowModal(data) {
      var parsedData = JSON.parse(data);        
      var modal = document.getElementById("showModal");
      var popupContent = document.getElementById("show-content");  
      parsedData.forEach(pair => {
        var attribute = pair[0];
        var value = pair[1];
        var element = document.getElementById(attribute);
        if (element && attribute !== 'logoUp') {
          var p = document.createElement("p");
          var att = document.createElement("span");
          var v = document.createElement("span");
          var attribute = attribute.slice(0, -2);
          att.textContent = attribute+" : ";
          v.textContent = value;
          p.appendChild(att);
          p.appendChild(v);
          popupContent.appendChild(p);
        }
        if (element && attribute === 'logoUp' || element && attribute === 'pictureUp' ) {
          var div = document.createElement("div");
          var img = document.createElement("img");
          var att = document.createElement("span");
          var attribute = attribute.slice(0, -2);
          att.textContent = attribute+" : ";
          img.src = value;
          div.appendChild(att);
          div.appendChild(img);
          popupContent.appendChild(div);
        }
      });
        modal.style.display = "block";
      }
    function openDeleteModal(id) {
      var modal = document.getElementById("deleteModal");
      document.getElementById("idDele").value=id;
      modal.style.display = "block";
    }
      
    function closeModal(modalId) {
      var modal = document.getElementById(modalId);
      modal.style.display = "none"; 
      var popupContent = document.getElementById("show-content");  
      while (popupContent.firstChild) {
        popupContent.removeChild(popupContent.firstChild);
      } 
    }