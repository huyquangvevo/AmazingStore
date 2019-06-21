<?php //require_once "trangchu.php"?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="CSS/topbanner_css.css">
<script src="JavaScripts/jquery-3.2.1.min.js"></script>

<script>
$(document).ready(function(e) {
	var titles = document.getElementsByClassName("dot");
	var banner = document.getElementsByClassName("mySlides");
	var slideIndex = 0;
	var index = [] ;
	var check = false;
	var images = document.getElementsByClassName("img");
	for(i=0;i<images.length;i++){
		index[i] = titles.item(i).innerHTML;
		}
	
	showSlides();
	
function showSlides() {
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
		
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
	if(check==false)
	setTimeout(showSlides,5000);
	else check = false;
	}
	
    $(".dot").click(function(){
		
		var name = $(this).html();
		for(i=0;i<index.length;i++){
			if(name==index[i]){
				slideIndex = i;
				break;
				}
			}
			check = true;		
		  showSlides(); 			
		});
		
	
});
</script>

<style>

</style>
</head>
<body>

<div class="slideshow-container">

	<?php
        $banner = getBanner();
        while($row_banner = mysqli_fetch_array($banner)){ 
    ?>
    <div class="mySlides fade">
    
        <a href=<?php echo "?page=detail&idpro=".$row_banner["pid"]?>>
            <img class="img" src= <?php echo $row_banner["iBanner"] ?> width="809" height="305" alt=<?php $row_banner["desBanner"]?>/>
        </a>

 
	</div>

	<?php 
        }
    ?>
<?php
	$banner = getBanner();
	$i = 0;
	while($row_banner = mysqli_fetch_array($banner)){ 
?>

<p class="dot"><?php echo $row_banner["desBanner"] ?></p>

<?php 
	}
?>
<br>

</div>
<div>
<div id="hot">
	<div id="top_hot">
    	<div id="noi_bat">
        	Nổi bật
        </div>
    </div>
    <ul id="list_hot">
    <?php
		$li = getMostProduct();
		while ($top = mysqli_fetch_array($li)){ 
	?>
    	<li class="list_top">
        	<a href=<?php echo "?page=detail&idpro=".$top["idPro"]?>>
            	<div class="info_top">
            		<div class="name_top"><?php  echo $top["namePro"]?></div>
                	<div class="price_top"><?php  echo priceToString($top["pricePro"])?></div>
                </div>
                <img class="image_top" src=<?php echo $top["iPro"]?> width="60" height="60" >
            </a>
        </li>
      <?php 
	  }?>
        <div id="advertise">
        	<a href="../index.php">
        	<img src="Images/samsung_ad.png" width="195" height="75" id="ad1">
       		 </a>
 
        	<a href="../index.php">
        	<img src="Images/iphone7_ad.png" width="195" height="75" id="ad2">
        	</a>
        </div>
    </ul> 
	</div>
</div>
</div>

<div id = "container-list">
    
        <ul>
            <?php 
                $sp = getProduct();
                while($info = mysqli_fetch_array($sp))
                {
            ?>
             <li class="list-pro"> 
                <div class="InforPro">
                <a href=<?php echo "?page=detail&idpro=".$info["idPro"] ?> >
                    <img src=<?php echo $info["imagesPro"] ?> width="400" height="185" alt="s8" />
                    
                    <h3 class="NameSP"><?php echo $info["namePro"] ?></h3>
                    <strong class="PriceSP"><?php echo priceToString($info["pricePro"]) ?> </strong>
                </a>
                    <a class="AddCart" href=<?php echo "?page=detail&idpro=".$info["idPro"] ?>> Xem chi tiết sản phẩm </a>
               </div>
             </li>
            <?php
                }
            ?>
         
         
        </ul>
        
</div>
</body>
</html> 
