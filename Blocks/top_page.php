
<?php// require_once "trangchu.php" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="CSS/top_page_css.css"/>
<title>Untitled Document</title>
</head>

<body>
<div id="container_toppage">
	<div id="container_top">
        <a href="http://localhost/Amazing.vn/index.php" ><img id="logo" src="Images/AmazingLogo1.png" width="165" height="50" />
        </a>

        <!-- Search Form -->

        <div style="position: fixed; top: 10px; left: 300px;">

                <input type="text" id="myInput" onkeyup="resultSearch()" placeholder="Nhập tên sản phẩm bạn muốn tìm..." title="Type in a name">


        <table id="myTable">
          <?php
                    $all = getAllProducts('All');
                    while($row_products = mysqli_fetch_array($all)){ 
            ?>
			
              <tr>
              	<td class="avatar_pro_s">
                <a href=<?php echo "?page=detail&idpro=".$row_products["idPro"];?>>
                <img src=<?php echo $row_products['iPro'] ?> width="50" height="50" style="float:left" class="image_pro_s"/>
                <div class="name_pro_s"> <?php echo $row_products['namePro'] ?> </div>
                <strong class="price_pro_s"><?php echo priceToString($row_products['pricePro']) ?></strong>
                </a>
                </td>
                
              </tr>
			
            <?php 
                }
            ?>
              
        </table>


        </div>
        <a  class="top-select" id="login">
                Đăng nhập
        </a>
        <a href="index.php" class="top-select" id="instruction">
                Hướng dẫn
        </a>
        <a href="index.php" class="top-select" id="contact_title">
                Liên hệ
        </a>
        <a href="index.php" class="top-select" id="cart">
                <img src="Images/cart.png" width="48" height="48" />
        </a>
    
	</div>
    <div id="select">
    
                  <form action="index.php?page=listproducts" method="post">
    <div id="select_type">
    <!--<a  href="?page=listproducts&supplier=all" class="typeTopSp" id="sales" style="color:#FFFFFF">
        	Tất cả
        </a>-->
        
        <input type="submit" class="typeTopSp" id="sales" name="supplier_Pro" value="All"/>
    <?php $sp = getSupplier();
		while($row_sp = mysqli_fetch_array($sp)){
	?>
    
         <input type="submit" class="typeTopSp" name="supplier_Pro" value="<?php echo $row_sp["Supplier"]?>" />
    
	<?php
		}
	?>
          </form>
    	</div>
    </div>
</div>
</body>
<script>
	
    function resultSearch() {
          var input, filter, table, tr, td, i;
          input = document.getElementById("myInput");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable");
		  if(filter!="")
		  	table.style.display = "block";
			else
			table.style.display = "none";
			
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
			//td = tr[i].getElementByClassName('name_pro_s');
			td = td.getElementsByClassName('name_pro_s')[0];
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

