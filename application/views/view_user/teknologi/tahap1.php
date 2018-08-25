<style type="text/css">

#regForm {
  background-color: #ffffff;
}

.container {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom checkbox */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 24px;
    width: 24px;
    background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
    background-color: #4CAF50;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
    display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}


input[type="checkbox"], input[type="radio"] {
    margin: 4px 4px 0px;
    line-height: normal;
}

.input-radio {
  margin-top: 10px;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 30px;
  width: 30px;
  margin: 2px 2px;
  background-color: #ffffff;
  border: 2px solid black;
  border-radius: 5px;
  display: inline-block;
  opacity: 0.5;
}

/* Mark the active step: */
.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
  color: white; 
}
</style>



<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="row">
        <div class="col-md-9">
          <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Pertanyaan : </h3>

              
              <!-- /.box-tools -->
            </div>
  <div class="box-body table-responsive">

       <form id="regForm" method="post" action="<?php echo base_url();?>User/TG/jawab1">
       
    
    <?php 
    $no = 1;
    foreach($dataTG1 as $row) { ?>
        
    <div class="tab"><h2 style="text-align: justify;"><b><?php echo $row->pertanyaan; ?></h2><br>

      <label class="container">Tidak Dilakukan
        <input type="radio" name="jawaban<?=$row->id?>" value="0" oninput="this.className = ''">
        <span class="checkmark"></span>
      </label>

      <label class="container">Dalam Perencanaan
        <input type="radio" name="jawaban<?=$row->id?>" value="1" oninput="this.className = ''">
        <span class="checkmark"></span>
      </label>

      <label class="container">Dalam Penerapan / Diterapkan Sebagian
        <input type="radio" name="jawaban<?=$row->id?>" value="2" oninput="this.className = ''">
        <span class="checkmark"></span>
      </label>

      <label class="container">Diterapkan Secara Menyeluruh
        <input type="radio" name="jawaban<?=$row->id?>" value="3" oninput="this.className = ''">
        <span class="checkmark"></span>
      </label>

    </div>




 <?php 
    $no++;
  } ?>




    <div style="overflow:auto;">
      <div style="float:right;">
        <button class="btn btn-warning" type="button" id="prevBtn" onclick="nextPrev(-1)">Sebelumnya</button>
        <button class="btn btn-info" type="button" id="nextBtn" onclick="nextPrev(1)">Selanjutnya</button>
      </div>
    </div>

</div>
</div>
</div>

        <div class="col-md-3">
          <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Navigasi</h3>


              
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
               <div style="text-align:center;margin-top:5px;">
                    <?php 
                        $no = 1;
                        foreach($dataTG1 as $row) { ?>
                        <span class="step"><b><?=$no ?></span>

                     <?php 
                        $no++;
                      } ?>

                </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>


    

<script type="text/javascript">

var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Kirim";
  } else {
    document.getElementById("nextBtn").innerHTML = "Selanjutnya";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
    var x, y, i, valid = false; // Change valid to false
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");

    for (i = 0; i < y.length; i++) {
      if (y[i].value !== "" && y[i].checked) {  
        valid = true;
      } else {
        y[i].className += " invalid";
      }
    }

    if (valid) {
      document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}
</script>



    
 
