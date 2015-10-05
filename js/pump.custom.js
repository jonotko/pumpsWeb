 function createImage(fphoto,i){
              var imgOpen = "<img src='";
              var imgClose = "' data-display='Box" + i + "'class='img-responsive img-thumbnail clubs'/>";
              imgOpen += fphoto;
              imgOpen += imgClose;
              return imgOpen;
          }
function createPopup(description, i){
              var divOpen = "<div id='Box" + i +"' class='portBox'>";
              var divClose = "</div>";
              var photoDescription = "<p>" + description + "</p>";
              var portBoxDiv = divOpen + photoDescription + divClose ;
              return portBoxDiv;
          }
          
          
         
