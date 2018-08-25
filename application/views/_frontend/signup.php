<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html>

<style type="text/css">
	fieldset {
    border: thin solid #ccc; 
    border-radius: 4px;
    padding: 20px;
    padding-left: 40px;
    background: #fbfbfb;
}
legend {
   color: #678;
}
.form-control {
    width: 95%;
}
label small {
    color: #678 !important;
}
span.req {
    color:maroon;
    font-size: 112%;
}
</style>

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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />  
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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
	<div class="row">
		<div class="col-md-3">
		</div>
        <div class="col-md-6">
  
            <form action="<?php echo base_url('Signup/submit'); ?>" method="post" role="form" id="fileForm">

            <div class="tittle-w3ls_head">
				<h3 class="tittle-w3ls three">Form Pendaftaran<span> </span></h3>
			</div>
			<section class="content">
                <?php if($this->session->flashdata('message')){?>
                	<div class="alert alert-danger alert-dismissible">
                            <strong class="green">
                            	<?php echo $this->session->flashdata('message')?>
                                </strong>
                    </div>
                <?php }?>

			<div class="form-group">    
                    <label for="instansi"><span class="req">* </span> Nama Instansi : </label>
                    <input class="form-control" type="text" name="instansi" required /> 
                    <div id="errFirst"></div>    
            </div>

            <div class="form-group">   
                <label for="alamat"><span class="req">* </span> Alamat instansi : </label>
                    <input class="form-control" type="text" name="alamat" required /> 
            <div id="errFirst"></div>    
            </div>
          

            <div class="form-group">
                    <label for="phonenumber"><span class="req">* </span> Nomor Telepon: </label>
                    <input required type="text" name="telp" id="phone" class="form-control phone" maxlength="12" onkeyup="validatephone(this);" > 
            </div>

            <div class="form-group">
                    <label for="email"><span class="req">* </span> Email : <small> (Digunakan untuk Login) </small></label> 
                     <input type="email" name="email" id="email" class="form-control" onchange="email_validate(this.value);"/>  
                     <span id="email_result"></span> 
            </div>
           
           <div class="form-group">
                <label for="password"><span class="req">* </span> Password: </label>
                    <input required name="password" type="password" class="form-control inputpass" minlength="4" maxlength="30"  id="pass1" /> </p>

                <label for="password"><span class="req">* </span> Password Confirm: </label>
                    <input required name="password" type="password" class="form-control inputpass" minlength="4" maxlength="30" placeholder="Konfirmasi password"  id="pass2" onkeyup="checkPass(); return false;" />
                        <span id="confirmMessage" class="confirmMessage"></span>
            </div>

            <br><br>
            <div class="form-group">   
                <label for="instansi"><span class="req">* </span> Nama Pengisi Evaluasi : </label>
                    <input class="form-control" type="text" name="nama" required /> 
                        <div id="errFirst"></div>    
            </div>

            <div class="form-group">
            <label for="nip"><span class="req"> </span> NIP: </label>
                    <input type="text" name="nip" id="phone" class="form-control phone" maxlength="40" onkeyup="validatephone(this);" > 
            </div>

            <div class="form-group">   
                <label for="instansi"><span class="req">* </span> Jabatan : </label>
                    <input class="form-control" type="text" name="jabatan" required /> 
                        <div id="errFirst"></div>    
            </div>

            <div class="form-group">
            
                <?php $date_entered = date('d/M/Y H:i:s'); ?>
                <input type="hidden" value="<?php echo $date_entered; ?>" name="dateregistered">
                <input type="hidden" value="0" name="activate" />
                <hr>

                <input type="checkbox" required name="terms" onchange="this.setCustomValidity(validity.valueMissing ? 'Please indicate that you accept the Terms and Conditions' : '');" id="field_terms">   <label for="terms">Saya Menyetujui <a href="terms.php" title="You may read our terms and conditions by clicking on this link">Kebijakan dan Privasi</a> Untuk Pendaftaran.</label><span class="req">* </span>
            </div>

            <div class="form-group">
                <input class="btn btn-success" type="submit" name="submit_reg" value="Register">
            </div>
                      <h5>Anda akan mendapatkan email untuk menyelesaikan pendaftaran ini dan menvalidasinya. </h5>
                      <h5> </h5>
 

            </fieldset>
            </form><!-- ends register form -->
      
        </div>
  </div></div>
	</div>

<!-- footer -->
	<div class="footer">
		<div class="footer_inner_info_w3ls_agileits">
			<p class="copy-right">&copy 2018 INDEKS KAMI. All rights reserved | <a href="">Satriyo Pujo Nur Rahino</a></p>
		</div>
	</div>
<!-- //footer -->

	<!-- js -->
	
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

	<script type="text/javascript">
  document.getElementById("field_terms").setCustomValidity("Jika ingin melanjutkan, Anda harus Menyetujui Syarat dan Ketentuan Indeks KAMI");
</script>

 <script>  
 $(document).ready(function(){  
      $('#email').change(function(){  
           var email = $('#email').val();  
           if(email != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>main/check_email_avalibility",  
                     method:"POST",  
                     data:{email:email},  
                     success:function(data){  
                          $('#email_result').html(data);  
                     }  
                });  
           }  
      });  
 });  
 </script>  

 <script type="text/javascript">
    function checkPass()
      {
          //Store the password field objects into variables ...
          var pass1 = document.getElementById('pass1');
          var pass2 = document.getElementById('pass2');
          //Store the Confimation Message Object ...
          var message = document.getElementById('confirmMessage');
          //Set the colors we will be using ...
          var goodColor = "#66cc66";
          var badColor = "#ff6666";
          //Compare the values in the password field 
          //and the confirmation field
          if(pass1.value == pass2.value){
              //The passwords match. 
              //Set the color to the good color and inform
              //the user that they have entered the correct password 
              pass2.style.backgroundColor = goodColor;
              message.style.color = goodColor;
              message.innerHTML = "Password benar"
          }else{
              //The passwords do not match.
              //Set the color to the bad color and
              //notify the user.
              pass2.style.backgroundColor = badColor;
              message.style.color = badColor;
              message.innerHTML = "Password tidak sama!"
          }
      } 

    function validatephone(phone) 
    {
        var maintainplus = '';
        var numval = phone.value
        if ( numval.charAt(0)=='+' )
        {
            var maintainplus = '';
        }
        curphonevar = numval.replace(/[\\A-Za-z!"£$%^&\,*+_={};:'@#~,.Š\/<>?|`¬\]\[]/g,'');
        phone.value = maintainplus + curphonevar;
        var maintainplus = '';
        phone.focus;
    }
    // validates text only
    function Validate(txt) {
        txt.value = txt.value.replace(/[^a-zA-Z-'\n\r.]+/g, '');
    }
    // validate email
    function email_validate(email)
    {
    var regMail = /^([_a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;

        if(regMail.test(email) == false)
        {
        document.getElementById("status").innerHTML    = "<span class='warning'>Alamat Email Tidak Valid</span>";
        }
        else
        {
        document.getElementById("status").innerHTML = "<span class='valid'>Alamat Email Valid</span>";  
        }
    }

  </script>

  <script type="text/javascript">
            window.onload = function () {
                document.getElementById("pass1").onchange = validatePassword;
                document.getElementById("pass2").onchange = validatePassword;
            }
            function validatePassword(){
                var pass2=document.getElementById("pass2").value;
                var pass1=document.getElementById("pass1").value;
                if(pass1!=pass2)
                    document.getElementById("pass2").setCustomValidity("Password Tidak Sama, Coba Lagi");
                else
                    document.getElementById("pass2").setCustomValidity('');
            }
        </script>

</body>

</html>