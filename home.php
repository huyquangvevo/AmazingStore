<?php require "Others/connectDB.php" ?>
<?php require "Blocks/trangchu.php" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Amazing</title>
<link rel="stylesheet" type="text/css" href="CSS/home_css.css"/>
<script type="text/javascript" src="jquery-3.2.1.min.js"></script>

</head>

<body bgcolor="#F0F0F0">

<div id="top1", class="container" >
		 <?php require "Others/amazingHome.php" ?>
</div>
<div class="container", id="selectType" align="center">
			Select Type
</div>
<div class="container status">
	<div id="banner", align="center">
		Banner 

	</div>
	<div id="newFeed", align="center">
		New Feed
	</div>
</div>
<?php require "listProducts.php" ?>
</body>
</html>