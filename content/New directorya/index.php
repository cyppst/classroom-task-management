<!DOCTYPE html>
<html>
<head>

	<title>www</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  

</head>

<style type="text/css" media="screen">
		.btn{
			width: 250pt;
			height: 30pt;
           	box-shadow:7px 7px 20px 0px #cccccc;
        }
       .btn:hover{
          color: #cc0000;
          cursor: pointer;
        }
</style>

<body>

		<div id="demo" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
			  <ul class="carousel-indicators">
			    <li data-target="#demo" data-slide-to="0" class="active"></li>
			    <li data-target="#demo" data-slide-to="1"></li>
			    <li data-target="#demo" data-slide-to="2"></li>
			  </ul>
			  
			  <!-- The slideshow -->
			  <div class="carousel-inner">
			    <div class="carousel-item active">
			      	<img src="img/s1.gif" alt="" width="100%" height="500" >
			    </div>
			    <div class="carousel-item">
			     	<img src="img/c1.jpg" alt="" width="100%" height="500" >
			    </div>
			    <div class="carousel-item">
			      	<img src="img/s3.jpg" alt="" width="100%" height="500" >
			    </div>
			  </div>
			  
			  <!-- Left and right controls -->
			  <a class="carousel-control-prev" href="#demo" data-slide="prev">
			    <span class="carousel-control-prev-icon"></span>
			  </a>
			  <a class="carousel-control-next" href="#demo" data-slide="next">
			    <span class="carousel-control-next-icon"></span>
			  </a>
		</div>

	<center>
		<form action="examples/login.php" method="post">
			<div style="line-height: 60pt;">
				<button type="submit" name="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
			</div>
		</form>
	
	</center>


</body>
</html>