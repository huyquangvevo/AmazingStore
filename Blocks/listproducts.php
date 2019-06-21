<?php require_once "trangchu.php";
	
	if(isset($_POST['supplier_Pro'])){
		
		$_SESSION["supplier_filter"] = $_POST['supplier_Pro'];
		
	}
	if(isset($_POST["supplier_filter"]))
		$_SESSION["supplier_filter"] = $_POST["supplier_filter"];
	
	
	
	if(isset($_POST["price_filter"]))
		$_SESSION["price_filter"] = $_POST["price_filter"];
	
	if(!isset($_SESSION['new_check']))	
	if(isset($_POST['new_check']))
		$_SESSION["new_check"] = 'checked';

    if(isset($_POST['highlight_filter']))
        $_SESSION['highlight_filter'] = $_POST['highlight_filter'];


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="CSS/listproducts_css.css"/>
<link rel="stylesheet" type="text/css" href="CSS/pretty-checkbox.min.css">
<script type="text/javascript" src="JavaScripts/jquery-3.2.1.min.js"></script>

<script type="text/javascript">
    
    $(document).ready(function(e){
		<?php
		if(isset($_POST['new_check'])) 
		if($_POST['new_check'] == 'checked')
			{
		?>
			$("#check").attr('checked','checked');
		<?php 
			}
		?>
		
		
		
		
		
    });
	
	function getSupplierSelect(){
			
			var x = document.getElementById("myForm").submit();
			
			}
		function getSupplierSelect1(){
			
			var x = document.getElementById("twoForm").submit();
			
			}
	function getSupplierSelect2(){
						
						<?php if(isset($_SESSION['new_check'])){
							
							if($_SESSION['new_check'] == 'checked')
								$_SESSION['new_check'] = 'notchecked';
							else 
								$_SESSION['new_check'] = 'checked';
						}
						?>			
						document.getElementById("newForm").submit();
			
			
						
			}

    function getSupplierSelect3(){


            document.getElementById("threeForm").submit(); 


    }
	
</script>

</head>

<body>
<div id="filter" > 
		<form action="#" method="post" id="myForm" style="float:left">
            <select id="select_supplier" name="supplier_filter" onchange="getSupplierSelect();">
            <option value="All" class="option_supplier"
            <?php if(isset($_SESSION['supplier_filter']))
						if($_SESSION['supplier_filter']=="All")
							echo 'selected=\"selected\" ';?>
                           >Tất cả</option>
            <?php
				$sp = getSupplier();
				while($row_sp = mysqli_fetch_array($sp)){ 
			?>
            
                <option 
                	value=<?php echo $row_sp["Supplier"] ?> 
                    class="option_supplier"
                    <?php if(isset($_SESSION['supplier_filter']))
						if($_SESSION['supplier_filter']==$row_sp["Supplier"])
							echo 'selected=\"selected\" ';?> >
					<?php echo $row_sp["Supplier"]?> 
                    
                 </option>
                
                
            <?php 
				}
			?>
            </select>
        </form>
        <form method="post" id="twoForm" style="float:left" >     
            <select name="price_filter" onchange="getSupplierSelect1();">
                <option value="-1"
					<?php if(isset($_SESSION['price_filter']))
                        if($_SESSION['price_filter']=='-1')
                        echo "selected=\"selected\" ";
                    ?>
                >Tất cả</option>
                <option value="0"
					<?php if(isset($_SESSION['price_filter']))
                        if($_SESSION['price_filter']=='0')
                        echo "selected=\"selected\" ";
                    ?>>Dưới 5 triệu</option>
                <option value="5000000"
					<?php if(isset($_SESSION['price_filter']))
                        if($_SESSION['price_filter']=='5000000')
                        echo "selected=\"selected\" ";
                    ?>>Từ 5 - 10 triệu</option>
                <option value="10000000"
					<?php if(isset($_SESSION['price_filter']))
                        if($_SESSION['price_filter']=='10000000')
                        echo "selected=\"selected\" ";
                    ?>>Từ 10 - 15 triệu</option>
                <option value="15000000"
					<?php if(isset($_SESSION['price_filter']))
                        if($_SESSION['price_filter']=='15000000')
                        echo "selected=\"selected\" ";
                    ?>>Từ 15 - 20 triệu</option>
                <option value="20000000"
					<?php if(isset($_SESSION['price_filter']))
                        if($_SESSION['price_filter']=='20000000')
                        echo "selected=\"selected\" ";
                    ?>>Trên 20 triệu</option>
            </select>
	</form>
    <form method="post" id="newForm" style="float:left">
    <div class="pretty p-switch p-fill" style="padding: 12px 20px 12px 10px; font-size: 16px; background-color: #FF8C00; margin: 0px; float: left;">
        <input type="checkbox" style="float:left;" name="new_check" value="checked" onchange="getSupplierSelect2();" id="check"
        <?php 
			if(isset($_SESSION['new_check']))
			if($_SESSION['new_check'] == 'checked')
				echo "checked=\"checked\"";
		?>
        />
      	
        <div class="state" style="float: left;">
          <label style="color: #FFFFFF">Mới</label>
        </div>
    </div>
    </form>
  <form action="#" method="post" style="float:left" id="threeForm">
    <select name="highlight_filter" onchange="getSupplierSelect3();" id='highlight_filter'>
        <option>Tính năng nổi bật</option>
        <option value="cameraBehind">Camera Sau</option>
        <option value="cameraFont">Camera Trước</option>
        <option value="screen">Màn hình</option>
    </select>
</form>

</div>

<div id = "container-list" style="clear:both;">
<ul id="list_pro" style="clear:both">
<?php 
	$sp = getProByFilter();
	while($info = mysqli_fetch_array($sp))
	{
?>
 <li class="element_pro"> 
 	<div class="InforPro">
 	<a href="index.php">
    	<img src=<?php echo $info["iPro"] ?> width="150" height="150" alt="s8" class="avatar_pro"/>
        <h3 class="NameSP"><?php echo $info["namePro"] ?></h3>
        <div class="price_pro">
            <strong class="PriceSP"><?php echo priceToString($info['pricePro']) ?> </strong>
        </div>
    </a>
    <div>
        <a class="buy_this" href=<?php echo "http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]."&idBuy=".$info['idPro']?> >
		 Mua Ngay
		  </a>
    <div>
    <img src="Icon/star.png" width="75" height="20" class="star">
    <div class="view_pro">
        <?php echo "(".$info["view"]." views)"?>
    </div>
   </div>
 </li>
<?php
	}
?>

 
</ul>
</div>

</body>
</html>