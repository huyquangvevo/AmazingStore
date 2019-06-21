 <?php
	//	require_once "trangchu.php";
		if(isset($_GET["idpro"])){
				//	echo $_GET["idpro"];
					$id_pro = $_GET["idpro"];
					}  else {
				//		$id_pro = "";
						}
		$sp = getDataProduct($id_pro);
		$product = mysqli_fetch_array($sp);
		$str = file_get_contents($product["dataPro"]);
		
		$data = json_decode($str,true);
		if (isset($_POST['sent_comment']))
				addComment();
	?>
            
           
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="CSS/detail_css.css"/>
<link rel="stylesheet" type="text/css" href="JavaScripts/VipModal/remodal.css"/>
<link rel="stylesheet" type="text/css" href="JavaScripts/VipModal/remodal-default-theme.css"/>
<script type="text/javascript" src="JavaScripts/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="JavaScripts/jquery-ui.js"></script>
<script type="text/javascript" src="JavaScripts/VipModal/remodal.min.js"></script>
<script type="text/javascript" src="JavaScripts/jquery.avgrund.js-master/jquery.avgrund.min.js">


</script>
<link rel="stylesheet" type="text/css" href="JavaScripts/jquery.avgrund.js-master/style/avgrund.css"/>

<script type="text/javascript" src="JavaScripts/jquery.avgrund.js-master/jquery.avgrund.js"></script>

<script>


// Get the modal
	var modal = document.getElementById('myModal');

// Get the button that opens the modal
	var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
	btn.onclick = function() {
   	 modal.style.display = "block";
	}

// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
   	 modal.style.display = "none";
	}

// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
   	 if (event.target == modal) {
   	     modal.style.display = "none";
   	 }
	}



	function sentComment(){
		
				$("#reply_hidden").submit();	
		
		}



	function replyClick(event){
			$("#myModal").css("display","block");
			$("#content_reply_input").attr('value',$(event.target).parent('div').children('.textarea_reply').val());
		}	

</script>
<script>
	
	$(document).ready(function(e) {
			
		
	
		
		window.onclick = function(event){
			if($(event.target).is("#myModal")){
				$("#myModal").css("display","none");
				}
			}
		
		$(".close").click(function(e) {
            $("#myModal").css("display","none");
        });
		
		
		$("#myBtn").click(function(e) {
            $("#myModal").css("display","block");
        });
		
		
		
		$("#reply").click(function(e) {
            $("#demo").avgrund({template:$("#demo").clone()}).click();

        });

		$("#submit_comment").click(function(e) {
            
			$("#comment_user").html($("#comment_SP").val());
			
			
        });
		
		$("#like_icon").hide();
		
		var checkLike = false;
		
		
		$("#submit_comment").click(function(e) {
			
			$("#myModal").css("display","block");
		
        });
		
		function replyClick1(event){
	
	
		$("#demo").avgrund({template:$("#demo").clone()}).click();

	
	
	}		
		
			
		
		
		<?php
			$result = getComment($id_pro);
			$count_comment = 0;
			while($row_comment = mysqli_fetch_array($result)){ 
		?>
			var cmt = $(".user_comment");
			if(cmt.attr("title")=="yes"){
				
				var copy  = cmt.clone();
				var time = new Date();
				copy.children("div").children(".comment_user").html('<?php echo $row_comment['timeComment']?>');
				copy.children("div").children(".name_user").html('<?php echo $row_comment['nameUserCMT']?>');
				copy.children('div').children('.name_user').attr('id','<?php echo $row_comment['noComment']?>');
				copy.children("div").children(".content_cmt").html('<?php echo $row_comment['contentCMT']?>');
				
				copy.children('div').children('div').children('form').attr('id','<?php echo $row_comment['noComment']?>');
				$("#comment_SP").html("");

				<?php 
					 $resultReply = getReplyComment($row_comment['noComment']);
					 while($row_reply = mysqli_fetch_array($resultReply)){ 
				 ?> 
					var replyCMT = $(".reply_content_form");
					if(replyCMT.attr('title')=='yes'){
						replyCopy = replyCMT.clone();
						replyCopy.children('div').children('div').children('.name_reply').html('<?php echo $row_reply['nameUserCMT']?>');
						replyCopy.children('div').children('div').children('.time_reply').html('<?php echo $row_reply['timeComment']?>');
						replyCopy.children('div').children('div').children('.content_reply').html('<?php echo $row_reply['contentCMT']?>');
						$(copy.children('div').children('div').children('.reply_btn')).after(replyCopy.html());
						replyCopy.attr('title','no');
					}
					
				<?php
					 }
				?>
				
								$(copy.html()).insertAfter("#form_cmt");

				copy.attr("title","no");
				$("#myModal").css("display","none");
				}
			
		<?php 
			$count_comment += 1;
			}
		?>
		
		$("#count_cmt").html('<?php echo $count_comment." Bình luận"?>');
		
			$(".form_reply").hide();

	
    });



	function replyComment(event){
		
			$(event.target).parent('div').parent('div').children('.form_reply').toggle(300);
			$(".modal-body").children(".id_parent").attr('value',$(event.target).parent('div').parent('div').parent("div").children(".name_user").attr('id'));
		
		
		}
		
</script>


<title>Untitled Document</title>
</head>

<body>


<!--     Modal Comment     -->


    


<!-- End Comment -->



<div class="demo" data-remodal-id="modal">
<a href="http://www.jqueryscript.net/tags.php?/Modal/">Modal</a> Content Goes Here
<a class="remodal-cancel" href="#">Cancel</a>
<a class="remodal-confirm" href="#">OK</a>
</div>



<div id="name_SP">

<?php
	echo "Điện thoại ".$product["namePro"]; 
?>
	
 </div>
<div class="review_SP">
	<div id="view_SP">
    	<div style="text-align:center; width:80px; position:relative; left:0px; float:left; " >
          <?php
		  		$dem = 1;
				$photosPro = $data['photos'];
				
				while($dem<=count($photosPro)){ 
		  ?>
              <div class="image_SP" onclick="currentPro(<?php echo $dem?>)" > 
                <img src=<?php echo $photosPro[$dem-1] ?> width="48" height="48"/>
              </div>
          
          <?php
		  		$dem += 1;
				}
			?>
		</div>
        
        <div style="position:absolute; left:80px; top:0px;">
        
        
        <?php
		  		$dem = 1;
				$photosPro = $data["photos"];
				while($dem<=count($photosPro)){ 
		  ?>
          
          	<div class="show faded">
                <img src=<?php echo $photosPro[$dem-1] ?> width="480" height="480" />
            </div>
              
         <?php
		  		$dem += 1;
				}
			?>
			 
        
        </div>
        
        <script type="text/javascript" src="JavaScripts/showProducts.js"></script>

	</div>
     <div id="buy" style="position:relative; left:580px; max-width:350px; float:left;">
     	
        <div id="price_SP">
        	<strong><?php echo priceToString($product["pricePro"])?></strong>
        </div>
        
        <div id="sale_SP">
        	<div id="info_sale"> Khuyến mại áp dụng đến 31/12</div>
            <ul id="chitiet_sale">
            	<li class="gif"> Cơ hội trúng xe Honda SH 2017</li>
                <li class="gif"> Tặng thẻ nhớ 32GB khi mua online</li>
                <li class="gif"> Tặng Phiếu mua hàng 500.000đ (chỉ áp dụng cho khách hàng mua từ 2 sản phẩm trở nên)</li>
            </ul>
        </div>
        <div id="buy_now">
            <a href=<?php echo "http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]."&idBuy=$id_pro"?> > 
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
    
     
	
     <div  style=" position:relative; left:625px; float:left; top: 25px;border:1px solid #EFEFEF; border-radius:4px; width:250px; background-color:#F3FAB6">
                <div style="padding:15px 10px;color:#BF0000"> Amazing cam kết </div>
                <div style="padding:5px;padding-bottom:10px;">
                        <img src="Icon/award.png" width="16" height="16"  style="float:left;"/>
                        <div class="note_shop">
                        100% hàng chính hãng
                        </div>
                </div>
                
                <div style="padding:5px; clear:both;padding-bottom:10px;">
                    <img src="Icon/phone.png" width="16" height="16"  style=" float:left;"/>
                    <div class="note_shop">
                    Tư vấn miến phí: 
                    <strong style="font-size:12px; margin-left:2px;">18008198</strong>
                    </div>
                </div>
                
                <div style="padding:5px; clear:both; padding-bottom:10px;">
                        <img src="Icon/car.png" width="16" height="16" style="float:left;"  />
                        <div class="note_shop">
                        Giao hàng miễn phí trong 10km
                        </div>
                </div>
                
                <div style="padding:5px; clear:both;padding-bottom:10px;">
                        <img src="Icon/sync.png" width="16" height="16" style="float:left;"  />
                        <div class="note_shop">
                        Đổi trả thoái mái theo nhu cầu
                        </div>
                </div>
                
                
                <div style="padding:15px 10px; margin-top:20px; color:#BF0000"> Amazing hỗ trợ thanh toán</div>
                <img src="Icon/visa.png" width="64" height="40" style="padding:10px;" />
        		<img src="Icon/master_card.png" width="64" height="64" />
                <img src="Icon/bank.png" width="64" height="64" style="padding:10px; padding-bottom:0px;" />
                <img src="Icon/cash.png" width="64" height="64" style="padding:10px; padding-top:0px; margin-left:20px;" />
                <img src="Icon/jcb.png" width="64" height="64" style="padding:10px; padding-top:0px; padding-bottom:5px;" />
     </div>
      
     
    
</div>
<div class="detail_SP">
	<div id="highlights">
    	<div style="font-size:22px; padding-top:20px; padding-left:10px; padding-bottom:15px">Đặc điểm nổi bật của <?php echo $product["namePro"]?></div>
        
        <!-- Slide dac diem noi bat -->
        
        <div class="slideshow-container">
        	<?php
				$dem = 0;
				$imagesPro = $data["images"]; 
				while ($dem<count($imagesPro)){
			?>

            <div class="mySlides fade">
              <img src=<?php echo $imagesPro[$dem] ?> width="780" height="433" />
            </div>
            <?php
				$dem += 1;
				}
			?>
            
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
            
            </div>
            <br>
            
            <div style="text-align:center">
            <?php 
				$dem = 0;
				while($dem<count($imagesPro)){
			?>
              <span class="dot" onclick="currentSlide(<?php echo $dem?>)"></span> 
             <?php
			 	$dem+=1;
				}
			 ?> 
            </div>
            
            <script type="text/javascript" src="JavaScripts/slideshow.js"></script>
            <a href="http://samsung.com" id="xem_ct"> 
            	Xem chi tiết
            </a>
       </div>
         
     
    
    <div class="configuration">
     	<div style="font-size:22px; padding-top:20px; padding-left:10px; padding-bottom:0px;">Thông số kỹ thuật</div>
            <ul>
            	<?php 
					$config = $data["detail"];
					$dem = 0;
					while ($dem<count($config)){
				?>
                 <li class="info_detail">
                    <div class="parameter"><?php
						echo $config[$dem][0].":";?> </div>
                    <div class="information"><?php echo $config[$dem][1]?></div>
                </li>
				<?php
					$dem += 1;
					}
				?>            
            
            </ul>
		</div>   
   
</div>
     
<div class="review_SP" style="position:relative; top:550px; border-top:1px solid #C2C2C2; min-height:500px;">


    <div style="height:500px; float:left; width:780px;" id="form_comment">
    	<div id="form_cmt">
            <form  method="post" action="#form_comment">
            
            
            	<input type="hidden" name="content_reply" value="0" id="content_reply_input" />

            
                <textarea  name="content_comment" rows="4" cols="110" id="comment_SP" placeholder="Nhập bình luận..."></textarea>
                
                <strong style="position:absolute; top:115px; left:5px; font-size:14px; margin-left:0px" id="count_cmt">2269 Bình luận</strong>
               <input type="button" name="submitComment" value="Bình luận" id="submit_comment" />
           
           <!-- Modal Box Comment -->    
              <div id="myModal" class="modal" >
      <!-- Modal content -->
          <div class="modal-content">
            <div class="modal-header">
              <span class="close">&times;</span>
              <h3>THÔNG TIN NGƯỜI GỬI</h3>
            </div>
            
                <div class="modal-body">
                  
                        <div style="padding-top:20px;">
                          <span class="radio_check">
                            <input type="radio" id="test1" name="radio_cmt" value="A" checked>
                            <label for="test1">Anh</label>
                          </span>
                          <span class="radio_check">
                            <input type="radio" id="test2" name="radio_cmt" value="C">
                            <label for="test2">Chị</label>
                          </span>
                        </div>
                        <div style="padding:15px 0px 0px">
                            <input type="text" placeholder="Họ tên (bắt buộc)" id="name_cmt" name="nickname"/>
                        </div>
                         <div style="padding:15px 0px 20px">
                            <input type="text" placeholder="Số điện thoại (phản hồi qua Zalo)"
                             id="phone_cmt"  name="phone_number_cmt"/>
                        </div>
                        
                    
             					<input type="hidden" name="parent_reply" value="0" class="id_parent"  />     
                  
                </div>
                <div class="modal-footer">
                <input type="submit" name="sent_comment" value="Gửi bình luận" id="sent_cmt" onclick="sentComment()" />
                </div>
    
          </div>
        
        </div>   
            
            
            
        </div>
  
<!-- Comment Product -->  
        
      <div class="user_comment" title="yes">
        <img src="Icon/avatar.png" width="48" height="48"  style="float:left; padding-right:20px;"/>
        <div style="float:left; width:700px; padding-bottom:20px;">
        	<div class="name_user"> Quang Huy </div>
            
            <div class="comment_user" style="float:right; font-size:12px;">
				20:22 12/09/2017
            </div>
            <p class="content_cmt" style="display:inline-block;">Sẩn phẩm tốt, chất lượng tuyệt vời 
            </p>
            <div style="clear:both;">
            <div class="reply_btn">
            	<button style="padding-right:10px;" onclick="replyComment(event)" id="reply">Trả lời</button>
   			</div>
            	<div style="float:left; padding:5px 0px" class="form_reply">
                	<textarea name="content_reply1" rows="1" cols="100" placeholder="Trả lời bình luận..." class="textarea_reply" style="float:left;" ></textarea>
                    <input type="button" name="submitComment" value="Trả lời"
                     class="reply_button" style="float:right" onclick="replyClick(event)"/>
                </div>
     			
                </form>
               	<div class="reply_content_form" title="yes">
                	<div class="reply_css">
                		<img src="Icon/user.png" width="32" height="32" style="float:left" />
                        <div class="element_reply">
                            <div class="name_reply"> Quang Huy </div>
                            <div class="time_reply"> Thoi gian </div>
                            <p class="content_reply"> Sản phẩm tốt</p>
                        </div>
                    </div>
                </div>
            </div>



         </div>
        </div> 
    </div>
    
    
    
    <div class="configuration" style="min-height:600px;">
    
    
    	<div style="font-size:20px;padding-left:20px; margin-left:10px; padding-bottom:20px;">So sánh với các sản phẩm tương tự</div>
        
        
        <?php
			$pro_similar = getSimilarProduct($product["pricePro"]);
			while($row_pro_similar = mysqli_fetch_array($pro_similar))
			{
				$str_path = file_get_contents($row_pro_similar["dataPro"]);
				$data_pro = json_decode($str_path,true);
				$start_n = strpos($data_pro["detail"][0][1],"\"")-3;
		?>
        
        
        <div style=" padding-top:20px; border-top:1px solid #F7F7F7; clear:both;">
        	<img src=<?php echo $data_pro["photos"][0]?> width="128" height="128" style="float:left; padding-right: 20px;"/>
            <div style="float:left; padding-bottom:10px;">
            	<div style="font-size:18px; padding-bottom:5px;"><?php echo $row_pro_similar["namePro"]?></div>
            	<strong style=" font-size:16px; margin-left:0px;line-height:25px;"><?php echo  priceToString($row_pro_similar["pricePro"])?> </strong>
                
                <div style="font-size:13px; padding-bottom:5px; color:#575757;"><?php echo "Màn hình ".substr($data_pro["detail"][0][1],$start_n,4) ?></div>
                <div style="font-size:13px; padding-bottom:5px; color:#575757"><?php echo "Camera sau ".$data_pro["detail"][2][1]?></div>
                <div style="font-size:13px; padding-bottom:5px; color:#575757">
                	<?php
						if($row_pro_similar["Supplier"]=="Apple") 
							echo "Pin ".$data_pro["detail"][8][1];
						else 
							echo "Pin ".$data_pro["detail"][9][1];
					?>
                </div>
                <a href=<?php echo "?page=compare&idPro1=".$id_pro."&idPro2=".$row_pro_similar['idPro']?> style="color:#09F; padding-top:10px; font-size:13px;">So sánh chi tiết</a>
            </div>
        </div>
        
        <?php
			}
		?>
        
        
        
        <!-- Search So sánh --> 
        <div style="padding-left:20px; margin-top:150px;">
         <input type="text" id="searchCompare" onkeyup="myFunction()" placeholder="Nhập tên sản phẩm bạn muốn so sánh..." title="Type in a name">


        <table id="tableCompare">
         
       		 <?php
                    $all = getAllProducts('All');
                    while($row_products = mysqli_fetch_array($all)){ 
            ?>
			
              <tr>
              	<td class="avatar_pro_ss">
                <a href=<?php echo "?page=compare&idPro1=".$id_pro."&idPro2=".$row_products["idPro"];?>>
                <img src=<?php echo $row_products['iPro'] ?> width="50" height="50" style="float:left" class="image_pro_ss"/>
                <div class="name_pro_ss"> <?php echo $row_products['namePro'] ?> </div>
                <strong class="price_pro_ss"><?php echo priceToString($row_products['pricePro']) ?></strong>
                </a>
                </td>
                
              </tr>
			
            <?php 
                }
            ?>
              
        </table>


        </div>
    </div>
    
	</div>
</div>

</body>
<script>

	function myFunction() {
          var input, filter, table, tr, td, i;
          input = document.getElementById("searchCompare");
          filter = input.value.toUpperCase();
          table = document.getElementById("tableCompare");
		  if(filter!="")
		  		table.style.display = "block";
			else
				table.style.display = "none";
			
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
			td = td.getElementsByClassName('name_pro_ss')[0];
            if (td) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }       
          }
    }


</script>
</html>