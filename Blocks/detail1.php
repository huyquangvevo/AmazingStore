
 <?php
				if(isset($_GET['id'])){
					echo "Huy";
					}  else {
						}
			?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../CSS/detail_css.css"/>

<title>Untitled Document</title>
</head>

<body>
<div id="name_SP"> Quang Huy </div>
<div id="review_SP">
	<div id="view_SP">
    	<div style="text-align:center; width:80px; position:absolute; left:0px;" >
          <div class="image_SP" onclick="currentPro(1)" > 
          	<img src="../Phone/J7Plus/j7plus_v1.jpeg" width="48" height="48"/>
          </div> 
          
          <div class="image_SP" onclick="currentPro(2)"> 
          	<img src="../Phone/J7Plus/j7plus_v2.jpeg" width="48" height="48" />
          </div>
          
          <div class="image_SP" onclick="currentPro(3)"> 
          	<img src="../Phone/J7Plus/j7plus_v3.jpeg" width="48" height="48" />
          </div>
          
          <div class="image_SP" onclick="currentPro(4)"> 
          	<img src="../Phone/J7Plus/j7plus_v4.jpeg" width="48" height="48" />
          </div>
          
          <div class="image_SP" onclick="currentPro(5)"> 
          	<img src="../Phone/J7Plus/j7plus_v5.jpeg" width="48" height="48" />
          </div> 
		</div>
        
        <div style="position:absolute; left:80px; top:0px;">
			
            <div class="show faded">
                <img src="../Phone/J7Plus/j7plus_v1.jpeg" width="480" height="480" />
            </div>
            
            <div class="show faded">
                <img src="../Phone/J7Plus/j7plus_v2.jpeg" width="480" height="480" />
            </div>
            
            <div class="show faded">
                <img src="../Phone/J7Plus/j7plus_v3.jpeg" width="480" height="480" />
            </div>
            
            <div class="show faded">
                <img src="../Phone/J7Plus/j7plus_v4.jpeg" width="480" height="480" />
            </div>
            
            <div class="show faded">
                <img src="../Phone/J7Plus/j7plus_v5.jpeg" width="480" height="480" />
            </div>
        
        </div>
        
        <script type="text/javascript" src="../JavaScripts/showProducts.js"></script>

	</div>
     
        <div id="price_SP" style=" position:relative; left:600px;">
        	<strong>8.690.000đ</strong>
        </div>
        
        <div id="sale_SP" style="position:relative; left:550px; top:20px; max-width:400px;">
        	<div id="info_sale"> Khuyến mại áp dụng đến 31/12</div>
            <ul id="chitiet_sale">
            	<li class="gif"> Cơ hội trúng xe Honda SH 2017</li>
                <li class="gif"> Tặng thẻ nhớ 32GB khi mua online</li>
                <li class="gif"> Tặng Phiếu mua hàng 500.000đ (chỉ áp dụng cho khách hàng mua từ 2 sản phẩm trở nên)</li>
            </ul>
        </div>
        <div id="buy_now">
            <a href="#comment" > 
             <div style="font-size:24px; color:#F4F4F4 ">MUA NGAY</div>
             <div style="font-size:14px;color:#F4F4F4">Giao tận nơi hoặc nhận ở shop</div>
            </a>
        </div>
        <div id="add_cart">
            <a href="../index.php" style="color:#FFF;">
                <div> THÊM VÀO GIỎ HÀNG </div>
            </a>
        </div>
        <ul id="add_note">
        	<li class="note"> Gọi đặt mua:<strong style="font-size:14px;margin-left:5px;">18008190</strong> (miến phí)</li>
        	<li class="note">Bảo hành chính hãng 1 năm</li>
            <li class="note">Giao hàng tận nơi miễn phí trong 30 phút</li>    
        </ul>
       
      
	</div>
</div>
<div class="detail_SP" style="position:relative;">
	<div id="highlights">
    	<div style="font-size:22px; padding-top:20px; padding-left:10px; padding-bottom:15px">Đặc điểm nổi bật của Samsung J7 Plus</div>
        
        <!-- Slide dac diem noi bat -->
        
        <div class="slideshow-container">

            <div class="mySlides fade">
              <img src="../Images/J7Plus/j7plus_1.jpg" width="780" height="433" />
            </div>
            
            <div class="mySlides fade">
            	<img src="../Images/J7Plus/j7plus_2.jpg" width="780" height="433" />
            </div>
            
            <div class="mySlides fade">
              <img src="../Images/J7Plus/j7plus_3.jpg" width="780" height="433" />
            </div>
            
            <div class="mySlides fade">
              <img src="../Images/J7Plus/j7plus_4.jpg" width="780" height="433" />
            </div>
            
            <div class="mySlides fade">
              <img src="../Images/J7Plus/j7plus_5.jpg" width="780" height="433" />
            </div>
            
            <div class="mySlides fade">
              <img src="../Images/J7Plus/j7plus_6.jpg" width="780" height="433" />
            </div>
            
            <div class="mySlides fade">
              <img src="../Images/J7Plus/j7plus_7.jpg" width="780" height="433" />
            </div>
            
            <div class="mySlides fade">
              <img src="../Images/J7Plus/j7plus_8.jpg" width="780" height="433" />
            </div>
            
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
            
            </div>
            <br>
            
            <div style="text-align:center">
              <span class="dot" onclick="currentSlide(0)"></span> 
              <span class="dot" onclick="currentSlide(1)"></span> 
              <span class="dot" onclick="currentSlide(2)"></span>
              <span class="dot" onclick="currentSlide(3)"></span>
              <span class="dot" onclick="currentSlide(4)"></span>
              <span class="dot" onclick="currentSlide(5)"></span>
              <span class="dot" onclick="currentSlide(6)"></span>
              <span class="dot" onclick="currentSlide(7)"></span> 
            </div>
            
            <script type="text/javascript" src="../JavaScripts/slideshow.js"></script>
       </div> 
        
    
    
    <div id="configuration">
     	<div style="font-size:22px; padding-top:20px; padding-left:10px; padding-bottom:0px;">Thông số kỹ thuật</div>
            <ul>
            	<?php 
					$str = file_get_contents("../Phone/J7Plus/Data/configuration.json");
					$data = json_decode($str,true);
					$i = 0;
					while ($i<count($data))
					{
				?>
                 <li class="info_detail">
                    <span class="parameter"><?php
						echo $data[$i][0].":";?> </span>
                    <span class="information"><?php echo $data[$i][1]?></span>
                </li>
				<?php
					$i += 1;
					}
				?>            
            
            </ul>
        
     	</div>
	</div>
</div>


<div style="position:relative;top:550px; border-top:1px solid #C2C2C2; width:100%;">
	<div id="comment" style=" ">
    	Quang Huy
    </div>
</div>



</body>


</html>