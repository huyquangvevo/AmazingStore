<?php

  require "Blocks/trangchu.php";
  	session_start();
 	if(isset($_GET["page"]))
		 $page = $_GET["page"];
	else {
		$page = "";
		}

  if(isset($_GET["idBuy"])){
    $idBuy = $_GET["idBuy"];
    $buyPro = mysqli_fetch_row(getDataProduct($idBuy));
  } else {
    $idBuy = "";
  }

	if(isset($_POST['ok']))
		insertOrderToDB();
  
  
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Amazing.vn Thế giới Flagship, Smartphone cao cấp</title>
<link rel="stylesheet" type="text/css" href="CSS/index_css.css"/>
<script type="text/javascript" src="JavaScripts/jquery-3.2.1.min.js"></script>

<script>
<?php if (isset($_POST['ok'])) {
          ?>

           alert("Bạn đã đặt mua thành công"); 

        <?php
          } 
        ?>

      

	$(document).ready(function(e) {
    
	
	
    $("#bank_account").hide();

		window.onclick = function(event){
			if($(event.target).is("#buyModal")){
				$("#buyModal").css("display","none");
				}
			}
		
		$(".close").click(function(e) {
            $("#buyModal").css("display","none");
        });
		
		
		$("#myBtn").click(function(e) {
            $("#buyModal").css("display","block");
        });
		
		
    $("#bank_").click(function(e){

        $("#bank_account").toggle(300);

    });

    

   <?php if ((isset($_GET["idBuy"]))&(!isset($_POST["ok"])))
    {
   ?>
        $("#buyModal").css("display","block");

    <?php
      } 
    ?>



    

    });

</script>

</head>

<body>
	<div class="TopPage">
    	<?php require "Blocks/top_page.php";?>

    </div>
	
    <div class="block" id="banner">
    	<?php
			if($page=="")
				require "Blocks/topbanner.php";

			else
		 		require "Blocks/".$page.".php";
			
		 ?>
     
     
    </div>
    
    
      <div id="buyModal" class="modal">
          <div class="buy-content">
            <div class="buy-header">
              <div class="close">&times;</div>
              <div style="text-align:center; padding: 6px 0px;">MUA HÀNG - NGHE TƯ VẪN MIỄN PHÍ</div>
              <div style="text-align:center; padding-bottom: 10px">(Mua là quyền của bạn - Tư vẫn miễn phí là trách nhiệm của chúng tôi)</div>
            </div>
            <div class="buy-body">
              
              <div id="step_1" class="step">
                	<div style="float:left;">
                    	<img src=<?php
                        echo json_decode(file_get_contents($buyPro[5]),true)['photos'][0]; 
                       ?> width="160" height="160" />
                    </div>
                    <div style="float:left">
                    	<div id="choose_color">
                        <div id="mau_sac">Màu sắc:</div>
                          <form action="#2" method="post">
                            <div>
                              <?php
                                $listColor = explode(",",$buyPro[3]);
                                foreach ($listColor as $value) {
                              ?>
                                <div class="radio_check1">
                                 <input type="radio" id=<?php echo $value?> name="radio_color" value=<?php echo $value?>>
                                  <label  for=<?php echo $value?> class="color_label" ><?php echo convertVN($value)?></label>
                                </div>
                              <?php
                                } 
                              ?>
                                
                            </div>
                      </div>
                      <div id="name_buy"><?php echo $buyPro[1] ?></div>
                      <strong style="margin:0px; padding:0; font-size: 18px"><?php echo priceToString($buyPro[6])?></strong>
                  </div>
                
                <div id="sale_info">
                  <div id="info_KM">
                    <div id="text_km">Khuyến mại </div>
                    <div id="contents_sale">
                      <ul>
                        <li class="li_KM">
                          Trả góp 0% hoặc tặng sim Viettel 4G 99K(miễn phí 1000 phút gọi nội mạng + 300 SMS nội mạng + 1GB data 4GB + Không giới hạn Data lướt Facebook).
                        </li>
                        <li class="li_KM">
                          Cơ hội trúng Tivi 4K 55 inch
                        </li>
                        <li class="li_KM">
                          Tặng PMH 500.000đ và tặng PMH phụ kiện 300.000đ
                        </li>
                        <li class="li_KM">
                          Trả góp lãi suất 0%
                        </li>
                        <li class="li_KM">
                          Cơ hội trúng trọn bộ Apple trị giá 80 triệu
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              
              <div id="step_2" class="step">
              	<div>
                      <div class="radio_check2">
                        <input type="radio" id="ra_4" name="radio_sex" value="A" checked>
                        <label for="ra_4" class="color_label ">Anh</label>
                       </div>
                       <div class="radio_check2"> 
                        <input type="radio" id="ra_5" name="radio_sex" value="C">
                        <label for="ra_5" class="color_label" >Chị</label>
                      </div>

                      <div class="info_KH">
                        <input type="text" name="name_costumer"  placeholder="Họ tên" style="background-image: none; border: 0.1px solid #b5b5b5">
                      </div>
                      <div class="info_KH">
                        <input type="text" name="phone_costumer"  placeholder="Số điện thoại" style="background-image: none; border: 0.1px solid #b5b5b5">
                      </div>
                      <div class="info_KH">
                        <input type="text" name="mail_costumer" placeholder="Email" style="background-image: none; border: 0.1px solid #b5b5b5">
                      </div>
                      <div class="info_KH">
                        <input type="text" name="add_costumer" placeholder="Địa chỉ" style="background-image: none; border: 0.1px solid #b5b5b5">
                      </div>
                      <div style="text-align: center;">
                        <div id="bank_">
                          Thanh toán bằng tài khoản ngân hàng
                        </div>
                      </div>
                      <div id="bank_account">
                        <div style="padding:0px 5px 20px;">
                          <img src="Icon/bank_cc.png" width="24" height="24"  style=" float:left;"/>
                          <div class="note_shop" style="padding-top: 3px;">
                            Số tài khoản: 
                          <strong style="font-size:16px; margin-left:2px;">108002009453</strong>
                          </div>
                       </div>
                        <div class="info_KH">
                        <input type="text" name="bankAcc_costumer" placeholder="Số tài khoản của bạn" style="background-image: none; border: 0.1px solid #b5b5b5" >
                         </div>
                      </div>
                      <div id="submit_input">
                          <input type="submit" name="ok" value="XÁC NHẬN" id="submit_">
                      </div>
                      <div style="padding:20px 5px 10px;">
                        <img src="Icon/phone2.png" width="24" height="24"  style="float: left;"/>
                        <div class="note_shop">
                          Tư vấn miến phí: 
                        <strong style="font-size:18px; margin-left:2px;">18008198</strong>
                        </div>
                       </div>
                      
                        
                    </form>
                  </div>
              </div>
              
            </div>
            
      </div>

</div>

  
 	
   
</body>
</html>