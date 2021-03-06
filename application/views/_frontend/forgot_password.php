<!DOCTYPE html>
<html>

<head>
	<title>Indeks KAMI | Sign-In</title>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Conceit Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--//tags -->
	<link href="<?php echo base_url() ?>frontend/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="<?php echo base_url() ?>frontend/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="<?php echo base_url() ?>frontend/css/font-awesome.css" rel="stylesheet">
	<!-- //for bootstrap working -->
	<link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,300,300i,400,400i,500,500i,600,600i,700,800" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,600,600i,700" rel="stylesheet">
</head>

<body>
	<div class="top_header" id="home">
		<!-- Fixed navbar -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="nav_top_fx_w3ls_agileinfo">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
					    aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
					<div class="logo-w3layouts-agileits">
						<h1> <a class="navbar-brand" href="<?php echo base_url() ?>"><i class="fa fa-shield" aria-hidden="true"></i> INDEKS KAMI <span class="desc">&nbsp &nbsp - KEAMANAN INFORMASI -</span></a></h1>
					</div>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<div class="nav_right_top">
						<ul class="nav navbar-nav navbar-right">
							<li class="active"><a class="request" href="<?php echo base_url() ?>Auth">Masuk</a></li>

						</ul>
						<ul class="nav navbar-nav">
							<li><a href="<?php echo base_url() ?>">Beranda</a></li>
							<li><a href="<?php echo base_url() ?>Tentang">Tentang</a></li>
						</ul>
					</div>
				</div>
				<!--/.nav-collapse -->
			</div>
		</nav>
	</div>

	<!--/banner_info-->
	<div class="banner_inner_con">
	</div>
	<!--//banner_info-->

	<!-- /inner_content -->
	<div class="banner_bottom">
		<div class="container">
			<div class="tittle-w3ls_head">
				<h3 class="tittle-w3ls three">Lupa Password<span> </span></h3>
			</div>
			<div class="inner_sec_info_wthree_agile">
				<div class="signin-form">
					<div class="login-form-rec">
						<?php 
                if($this->session->flashdata('error_msg')){?>
                	<div class="alert alert-danger alert-dismissible">
                     <strong class="green">
                     <?php echo $this->session->flashdata('error_msg')?>
                      </strong>
                   </div>
                <?php }?>
                <?php 
                if($this->session->flashdata('message')){?>
                	<div class="alert alert-success alert-dismissible">
                     <strong class="green">
                     <?php echo $this->session->flashdata('message')?>
                      </strong>
                   </div>
                <?php }?>
						<div class="body bg-gray">
				          <form action="<?php echo base_url();?>Lupa_password/kirim_email" method="post">
					            <div class="form-group">
					                 <input type="mail" name="email" id="email" class="form-control" placeholder="Alamat Email Akun">
					            </div>				                                                                        
				                <div class="col-xs-6">
						          <button type="submit" class="btn btn-primary btn-block btn-flat">Lanjutkan</button>
						        </div>										               				          
				          </form>
					          <div class="col-xs-6">
							         <a href="<?php echo base_url() ?>Auth" class="btn btn-danger btn-block btn-flat">Batal</a>
							  </div>          
				        </div>
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- footer -->
	<div class="footer">
		<div class="footer_inner_info_w3ls_agileits">
			<p class="copy-right">&copy 2018 INDEKS KAMI. All rights reserved | <a href="">Satriyo Pujo Nur Rahino</a></p>
		</div>
	</div>
<!-- //footer -->

	<!-- js -->
	<script type="text/javascript" src="<?php echo base_url() ?>frontend/js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>frontend/js/bootstrap.js"></script>
	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="<?php echo base_url() ?>frontend/js/move-top.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>frontend/js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 900);
			});
		});
	</script>
	<!-- start-smoth-scrolling -->

	<script>
		$('ul.dropdown-menu li').hover(function () {
			$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
		}, function () {
			$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
		});
	</script>
	<!-- stats -->
	<script src="<?php echo base_url() ?>frontend/js/jquery.waypoints.min.js"></script>
	<script src="<?php echo base_url() ?>frontend/js/jquery.countup.js"></script>
	<script>
		$('.counter').countUp();
	</script>
	<!-- //stats -->
	<script type="text/javascript">
		$(document).ready(function () {
			/*
									var defaults = {
							  			containerID: 'toTop', // fading element id
										containerHoverID: 'toTopHover', // fading element hover id
										scrollSpeed: 1200,
										easingType: 'linear' 
							 		};
									*/

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>

	<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>



</body>

</html>