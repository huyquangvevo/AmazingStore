<?php
 
	$link = mysqli_connect('localhost', 'root', '');
	if (!$link) {
    	die('Could not connect: ' . mysql_error());
	}

	$dbselect = mysqli_select_db($link,'Amazing');
	mysqli_set_charset($link,'utf8');
	function getProduct(){
			global $link;
			$qr = "
				SELECT * FROM products 
				ORDER BY codePro ASC
				LIMIT 0,9
			";
			return mysqli_query($link,$qr);
		} 
	function getMostProduct(){
		global $link;
		$qr = "
			SELECT * FROM products ORDER BY view DESC
			LIMIT 0,3
		";
		return mysqli_query($link,$qr);
		}
		
		
	function getBanner(){
			global $link;
			$qr = "
				SELECT * FROM banners ORDER BY noBanner ASC
				LIMIT 0,4 
			";
			return mysqli_query($link,$qr);
		}
		
	function getSupplier(){
		global $link;
		$qr = "
			SELECT Supplier,COUNT(Supplier) FROM products GROUP BY Supplier ORDER BY 				  			COUNT(Supplier) DESC LIMIT 0,6
		";
		return mysqli_query($link,$qr);
		}
		
	function getDataProduct($pid){
		global $link;
		$qr = "SELECT * FROM products WHERE idPro = '$pid' ";
		return mysqli_query($link,$qr);
		}
		
		
	function getSimilarProduct($price){
		global $link;
		$price_ = $price + 1000000;
		$_price = $price - 1000000;
		$qr = "SELECT * FROM products WHERE pricePro > '$price'
		LIMIT 0,3";
		return mysqli_query($link,$qr);
		}
		
	function getCommentProduct($id){
		global $link;
		$qr = "SELECT * FROM comment WHERE idPro = '$id' ";
		return mysqli_query($link,$qr);
		
		}
		
	function priceToString($pri){
		$xau = strval($pri);
		$s = "";
		$i = 3;
		while($i<strlen($xau)){
			$s = substr_replace($xau,".",strlen($xau)-$i,0);
			$xau = $s;
			$i += 4;
		}
		return $s."đ";
		}

	function insertOrderToDB(){
		global $link;
		if(isset($_POST["name_costumer"]))
			$nameC = $_POST["name_costumer"];
		else
			$nameC = "";

		if(isset($_GET["idBuy"]))
			$idP = $_GET["idBuy"];
		else
			$idP = "";

		if(isset($_POST["radio_color"]))
			$colorP = $_POST["radio_color"];
		else
			$colorP = "";

		if(isset($_POST["radio_sex"]))
			$sexC = $_POST["radio_sex"];
		else
			$sexC = "";

		if(isset($_POST["phone_costumer"]))
			$phoneC = $_POST["phone_costumer"];
		else
			$phoneC = "";

		if(isset($_POST["mail_costumer"]))
			$mailC = $_POST["mail_costumer"];
		else
			$mailC = "";

		if(isset($_POST["add_costumer"]))
			$addC = $_POST["add_costumer"];
		else
			$addC = "";

		if(isset($_POST["bank_costumer"]))
			$bankA = $_POST["bank_costumer"];
		else
			$bankA = "";

		$qr = "INSERT INTO orderpro(idPro,color,sex,nameCos,phoneCos,mailCos,addCos,bankAcc) VALUES ('$idP','$colorP','$sexC','$nameC','$phoneC','$mailC','$addC','$bankA')";
		
		return mysqli_query($link,$qr);
	}

	function convertVN($str){

		switch ($str) {
			case 'Red':
				return 'Đỏ';
				break;
			case 'Black':
				return 'Đen';
				break;
			case 'Yellow':
				return 'Vàng';
				break;
			case 'White':
				return 'Trắng';
				break;
			case 'Blue':
				return 'Xanh';
				break;
		}

	}

	function getAllProducts($sp){
		global $link;
		if($sp=='All'){
			$qr = "SELECT * FROM products";
			return mysqli_query($link,$qr);
		} 
		else {
			$qr = "SELECT * FROM products WHERE Supplier='$sp'";
			return mysqli_query($link,$qr);
		}
	}
	
	function getProByFilter(){
		global $link;
		$qr = "SELECT * FROM products ";
		$sf='';
		if (isset($_SESSION['supplier_filter'])){
			$rs = $_SESSION['supplier_filter'];
			if($rs!='All'){
				$sf = " WHERE Supplier = '$rs'";
				$qr = $qr.$sf;
			}
		}
		else
			$sf = '';

				
	
		if(isset($_SESSION['price_filter'])){
			$price = (int)$_SESSION['price_filter'];
			if($price >= 0){
				$price_limit = $price+5000000;
				if($price<20000000)
					$pf = " pricePro >= '$price' AND pricePro < '$price_limit' ";
				else
					$pf = " pricePro >= '$price' ";
				if ($sf==''){
					$qr = $qr." WHERE ".$pf;
					} else {
					$qr = $qr." AND ".$pf;	
					}	
			}
		}
		else 
			$pf = '';
		
		$nc = "";	
		if(isset($_SESSION['new_check']))
		if($_SESSION['new_check'] == 'checked'){
			$nc = " ORDER BY codePro DESC ";
			$qr = $qr.$nc;
		}
		else 
			$nc = "";
			
		if(isset($_SESSION['highlight_filter'])){
			if($nc=="")
				$hf =" ORDER BY ".$_SESSION['highlight_filter']." DESC ";
			else 
				$hf = " , ".$_SESSION['highlight_filter']." DESC ";
			$qr = $qr.$hf;
		}
		else
			$hf = "";
			
		//echo $qr;
	
		
		return mysqli_query($link,$qr);
		
		}
		
		
		function addComment(){
			global $link;
			if(isset($_GET['idpro']))
				$id_p = $_GET['idpro'];
			else 
				$id_p = "";
			
			if(isset($_POST['radio_cmt']))
				$sex_user = $_POST['radio_cmt'];
			else 
				$sex_user ="";
				
			if(isset($_POST['nickname']))
				$nickname = $_POST['nickname'];
			else
				$nickname = '';
			
			if(isset($_POST['phone_number_cmt']))
				$phone = $_POST['phone_number_cmt'];
			else 
				$phone = '';
			
			if(isset($_POST['content_comment']))
				$content = $_POST['content_comment'];
			else{ 
				$content = '';
			}
			
			if($content== '')
				if(isset($_POST['content_reply']))
					$content = $_POST['content_reply'];
				else
					$content = '';
			
				
			
				
			if(isset($_POST['parent_reply']))
				$idParent = $_POST['parent_reply'];
			else
				$idParent = '';
					
					
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$time = date("d/m/Y h:i A");
			$qr = "INSERT INTO comment(idPro,nameUserCMT,phoneUserCMT,contentCMT,timeComment,parentCMT)
			VALUES ('$id_p','$nickname','$phone','$content','$time','$idParent')";
		

			return mysqli_query($link,$qr);
			
			}
			
		
		function getComment($id){
				global $link;
				$qr = "SELECT * FROM comment WHERE idPro = '$id' AND parentCMT = '0' ";
				return mysqli_query($link,$qr);
			}
			
		function changeLike($id,$c){
				global $link;
				$qr = "SELECT likeCMT FROM WHERE idPro = '$id'";
				$result = mysqli_query($link,$qr);
				$like = (int) mysqli_fetch_row($result);
				$like = $like + $c;
				$qr = "UPDATE comment SET likeCMT='$like' WHERE noComment = '$id'";
				mysqli_query($link,$qr);
				
			}
			
		
		function getReplyComment($idReply){
				global $link;
				$qr = "SELECT * FROM comment WHERE parentCMT = '$idReply'";
				return mysqli_query($link,$qr);			
			}
		
	
?>
