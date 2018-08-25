<!DOCTYPE html>  
 <html>  
 <head>  
      <title>Webslesson | <?php echo $title; ?></title>  
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />  
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
 </head>  
 <body>
   
      <div class="container" style="width:600px">  
            <form action="<?php echo base_url('Signup/submit'); ?>" method="post" role="form" id="fileForm">

            <div class="tittle-w3ls_head">
            <h3 class="tittle-w3ls three">Form Pendaftaran<span> </span></h3>
            </div>

                <?php
                  echo show_err_msg($this->session->flashdata('error_msg'));
                ?>

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
                     <input type="email" name="email" id="email" class="form-control" />  
                     <span id="email_result"></span>  
            </div>
           
           <div class="form-group">
                <label for="password"><span class="req">* </span> Password: </label>
                    <input required name="password" type="password" class="form-control inputpass" minlength="4" maxlength="30"  id="pass1" /> </p>

                <label for="password"><span class="req">* </span> Password Confirm: </label>
                    <input required name="password" type="password" class="form-control inputpass" minlength="4" maxlength="30" placeholder="Enter again to validate"  id="pass2" onkeyup="checkPass(); return false;" />
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
 </body>  
 </html> 
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