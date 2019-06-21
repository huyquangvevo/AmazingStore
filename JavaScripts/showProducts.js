var showIndex = 1;
showPro(showIndex);

function plusPro(n) {
  showPro(showIndex += n);
}

function currentPro(n) {
  showPro(showIndex = n);
}

function showPro(n) {
  var i;
  var slidesPro = document.getElementsByClassName("show");
  var imagePro = document.getElementsByClassName("image_SP");
  if (n > slidesPro.length) {showIndex = 1}    
  if (n < 1) {showIndex = slidesPro.length}
  for (i = 0; i < slidesPro.length; i++) {
      slidesPro[i].style.display = "none";  
  }
  for (i = 0; i < imagePro.length; i++) {
      imagePro[i].className = imagePro[i].className.replace(" active", "");
  }
  slidesPro[showIndex-1].style.display = "block";  
  imagePro[showIndex-1].className += " active";
}