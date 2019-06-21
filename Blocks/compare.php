<?php
	require_once 'trangchu.php'; 
	if(isset($_GET['idPro1']))
		$idPro_1 = $_GET['idPro1'];
	else
		$idPro_1 = "";
		
	if(isset($_GET['idPro2']))
		$idPro_2 = $_GET['idPro2'];
	else
		$idPro_2 = "";
	
	$Pro_1 = mysqli_fetch_array(getDataProduct($idPro_1));
	$Pro_2 = mysqli_fetch_array(getDataProduct($idPro_2));

	$dataPro_1 = json_decode(file_get_contents($Pro_1["dataPro"]),true);
	$dataPro_2 = json_decode(file_get_contents($Pro_2["dataPro"]),true);

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="JavaScripts/jquery-3.2.1.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="CSS/compare_css.css"/>
<link rel="stylesheet" type="text/css" href="CSS/detail_css.css"/>
<script>
	$(document).ready(function(e) {
        
		$(".button_buy").click(function(e) {
            $("#buyModal").css("display","block");
        });
		
    });
</script>

</head>

<body>

<div id="title_">
	So sánh điện thoại<strong><?php echo $Pro_1['namePro']?> </strong> và <strong><?php echo $Pro_2['namePro']?></strong>
</div>

<h4  class="title_SS">THÔNG TIN CHUNG</h4>
<table style="border-top:0.1px solid #F2F2F2;">
	<tr class="row" id="row_1">
      <td class="column_one" style="border:none" valign="top">
      <!--  	<a href="#">
        		<img src="Images/banner_compare1.png" width="200" height="125" style="padding-bottom:5px;  padding-top:0px" />
           </a>
           <a href="#">
            <img src="Images/banner_compare2.png" width="200" height="125" style="padding-bottom:5px;" />
            </a>
            <a href="#">
            <img src="Images/banner_compare3.jpg" width="200" height="125" style="padding-bottom:5px;" />
           </a>
           <a href="#">
            <img src="Images/banner_compare4.jpg" width="200" height="125" style="padding-bottom:5px;" />
           </a>
          --> 
        </td>
        <th class="column_two" style="border:0.1px solid #F2F2F2; border-bottom:none;">
        <div class="intro_SP">
            <div style="text-align:center; ">
            <img src=<?php echo $dataPro_1['photos'][0]?> width="300" height="300"/>
            </div>
            <div class="info_SP">
                <div class="name_SP"><?php echo $Pro_1['namePro'] ?></div>
                <strong><?php echo priceToString($Pro_1['pricePro'])?></strong><br />
                <button class="button_buy">
                <a href=<?php echo "http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]."&idBuy=$idPro_1"?> class="button_buy">
                    MUA NGAY
                </a>
            </button>
            </div>
        
        </div>
        </th>
        <th class="column_three" style="border-top:0.1px solid #F2F2F2;">
        	<div class="intro_SP">
                <div style="text-align:center">
                <img src=<?php echo $dataPro_2['photos'][0]?> width="300" height="300"/>
                </div>
                <div class="info_SP">
                    <div class="name_SP"><?php echo $Pro_2['namePro'] ?></div>
                    <strong><?php echo priceToString($Pro_2['pricePro'])?></strong><br />
                    <button class="button_buy">
                    <a href=<?php echo "http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]."&idBuy=$idPro_2"?> class="button_buy">
                        MUA NGAY
                    </a>
                </button>
                </div>
        
       		 </div>
        
        </th>
    </tr>
    </table>
    <h4 class="title_SS">TÍNH NĂNG NỔI BẬT</h4>
    <table>
    <tr class="row">
    	<th class="column_one" style="text-align:center;">
				
        </th>
        <th class="column_two" style="height:300px; border-right:0.1px solid #F2F2F2;">
    	
        <div class="slideshow-container">
        	<?php
				$demHinh = 1;
				$photosPro_1 = $dataPro_1['images'];
				while($demHinh<=count($photosPro_1)){ 
			?>
            <div class="mySlides fade">
              <img src=<?php echo $photosPro_1[$demHinh-1] ?> width="504" height="280" />
            </div>
            
            <?php
				$demHinh += 1;
				}
			?>
            
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
            
            </div>
            <br>
            
            <div style="text-align:center">
			  <?php 
                    $demDot = 0;
                    while($demDot<count($photosPro_1)){
                ?>
                  <span class="dot" onclick="currentSlide(<?php echo $demDot?>)"></span> 
                 <?php
                    $demDot+=1;
                    }
                 ?> 
            </div>
        
             
            </div>
        </div>
        </th>
        
    	<th class="column_three" style="height:300px;">
    	
        <div class="slideshow-container2">
        	<?php
				$demHinh = 1;
				$photosPro_2 = $dataPro_2['images'];
				while($demHinh<=count($photosPro_2)){ 
			?>
            <div class="mySlides2 fade2">
              <img src=<?php echo $photosPro_2[$demHinh-1] ?> width="504" height="280" />
            </div>
            
            <?php
				$demHinh += 1;
				}
			?>
            
            <a class="prev2" onclick="plusSlides2(-1)">&#10094;</a>
            <a class="next2" onclick="plusSlides2(1)">&#10095;</a>
            
            </div>
            <br>
            
            <div style="text-align:center">
			  <?php 
                    $demDot = 0;
                    while($demDot<count($photosPro_2)){
                ?>
                  <span class="dot2" onclick="currentSlide2(<?php echo $demDot?>)"></span> 
                 <?php
                    $demDot+=1;
                    }
                 ?> 
            </div>
        
             
            </div>
        </div>
        </th>
    </tr>
   	</table>
    <h4 class="title_SS">CẤU HÌNH SẢN PHẨM</h4>
    <table style="border-bottom:0.1px solid #F2F2F2;">
    <?php
		$parametter = $dataPro_1['detail'];
		$detail_1 = $dataPro_1['detail'];
		$detail_2 = $dataPro_2['detail'];
		if($Pro_1['Supplier'] == 'Apple'){
					array_splice($detail_1,7,0,array("  "));
			}
		if($Pro_2['Supplier'] != 'Apple'){
			$parametter = $dataPro_2['detail'];
		} else {
					array_splice($detail_2,7,0,array("  "));
			};
			
		for($i=0;$i<count($parametter);$i++){ 
	?>
    <tr>
    	<td  class="column_one para_Pro" style=" width:180px"><?php echo $parametter[$i][0].":" ?></td>
        <td class="column_two para_Pro" style="width:495px"><?php echo $detail_1[$i][1]?> </td>
        <td class="column_three para_Pro" style=" border-right:0.1px solid #F2F2F2; width:495px">	
			<?php
             	echo $detail_2[$i][1];
             ?>
         </td>
    </tr>
    <?php 
		}
	?>
	  
</table>    

<div class="one_SP">

    
   
    
    
    
</div>


</body>
<script type="text/javascript" src="JavaScripts/slideshow.js"></script>

</html>