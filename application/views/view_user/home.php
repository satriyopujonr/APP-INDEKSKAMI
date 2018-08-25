<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>

<div class="row">
   <div class="col-md-12 col-xs-12">
         <div class="msg" style="display:none;">
              <?php echo $this->session->flashdata('msg'); ?>
            </div>
    </div>


  <div class="col-md-7 col-xs-12">

        <div class="box">
          
              <div class="box-header with-border">
                  <i class="fa fa-area-chart"></i>
                  <h1 class="box-title">Grafik Hasil Evaluasi</h1>
                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
              </div>

          <div class="box-body table-responsive"> 

            <canvas id="radar-chart" width="600" height="400"></canvas>
          
          </div>
        </div>
  </div>


      
        

        <div class="col-md-5 col-xs-12">
            <div class="box">
      
                <div class="box-header with-border">
                    <i class="fa fa-check-circle"></i>
                    <h1 class="box-title">Skor Evaluasi</h1>
                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                </div>


                 <div class="box-body table-responsive">
                       <table class="table">
                    
                     <tr>
                    <td>Skor Kategori SE</td>
                    <td style="text-align: center; background-color: #fff3c4"><b> 
                      
                      <?php 
                      if ($cek_SE > 0) {
                            foreach ($nilai as $row) {

                              $nilai = $row['total'];
                            }
                            $SEKOR_SE = $nilai;
                      }else{
                        $SEKOR_SE = '';
                      }               
                      
                      ?>

                      <?php echo $SEKOR_SE; ?>

                      

                    </b></td>
                    <td>Kategori SE</td>
                    <td style="background-color: #fff3c4; text-align: center;"><b>
                                            
                      <?php 
                      if ($cek_status > 0) {
                            foreach ($status as $row) {

                              $nilai = $row['status'];
                            }
                            $STATUS_SE = $nilai;
                      }else{
                        $STATUS_SE = '-';
                      }               
                      
                      ?>

                      <?php echo $STATUS_SE; ?>

                      </b></td>
                  </tr> 


<?php /* ========================================================TATA KELOLA=============================================================================*/ ?>

                   <tr>
                    <td>Tata Kelola</td>
                    <td style="text-align: center; background-color: #fff3c4"><b> 
                      <?php foreach ($totalTK as $nilai) { ?>
                      <?php echo $nilai->total_nilai;?>
                      <?php }?>

                      <?PHP  $SEKOR_TK = $nilai->total_nilai ?>
                    </b></td>
                    <td>TK Kematangan</td>
                    <td style = "<?php 

                    if($cek>0 && $cek2>0 && $cek3>0)
{
  print( "background-color: #fff3c4; text-align: left;" );
} else {
  print("background-color: #f4c4c4; text-align: left;");
}

                     ?>"><b>:
                          <?php

                                 if($cek>0 && $cek2>0 && $cek3>0){
                                     foreach ($TK2 as $row) {
                                        $ques1 = $row['ques1'];
                                        $ques2 = $row['ques2'];
                                        $ques3 = $row['ques3'];
                                        $ques4 = $row['ques4'];
                                        $ques5 = $row['ques5'];
                                        $ques6 = $row['ques6'];
                                        $ques7 = $row['ques7'];
                                        $ques8 = $row['ques8'];
                                        $ques9 = $row['ques9'];
                                        $ques10 = $row['ques10'];
                                        $ques11 = $row['ques11'];
                                        $ques12 = $row['ques12'];
                                        $ques13 = $row['ques13'];   
                                      }
        $skor_II = $ques1 + $ques2 +  $ques3 +  $ques4 +  $ques5 +  $ques6 +  $ques7 +  $ques8 +  $ques9 +  $ques10 +  $ques11 +  $ques12 +  $ques13 ;

        
                                    foreach ($TK3 as $row) {
                                        $ques14 = $row['ques14'];
                                        $ques15 = $row['ques15'];
                                        $ques16 = $row['ques16'];
                                       }
        $skor_III = $ques14 + $ques15 +  $ques16  ;

        
                                    foreach ($TK4 as $row) {
                                        $ques17 = $row['ques17'];
                                        $ques18 = $row['ques18'];
                                        $ques19 = $row['ques19'];
                                        $ques20 = $row['ques20'];
                                        $ques21 = $row['ques21'];
                                        $ques22 = $row['ques22'];
                                      }
         $skor_IV = $ques17 + $ques18 +  $ques19 +  $ques20 +  $ques21 +  $ques22  ;

         if ($skor_II >= 36) {
                $hasil_II =  "II";
             } elseif ($skor_II >= 12) {
                $hasil_II =  "I+";
             } elseif ($skor_II < 12) {
                $hasil_II =  "I";
             }

         if ($skor_II >= 43) {
              $valid3 =  "yes";
            }else {
              $valid3 =  "No";
            }

                if ($skor_II >= 43 && $skor_III >= 14) {
                    $hasil_III = "III";
                }elseif ($skor_II >= 43 && $skor_III >= 8) {
                    $hasil_III = "II+";
                }elseif ($skor_II >= 43 && $skor_III < 8) {
                    $hasil_III = "II";
                }else{
                $hasil_III = "No";
                }

         if ($skor_II >= 43 && $skor_III >= 16){
                $valid4 =  "yes";
            } else {
                $valid4 =  "No";
            }


             if ( $skor_II >= 43 && $skor_III >= 16 && $skor_II = 54 && $skor_III >= 18 && $skor_IV >= 54) {
                    $hasil_IV =  "IV";
             }elseif ($skor_II >= 43 && $skor_III >= 16 && $skor_IV >= 24){
                 $hasil_IV =  "III+";
             }elseif ($skor_II >= 43 && $skor_III >= 16 && $skor_IV < 24){
                 $hasil_IV =  "III";
             }
        



        if ($skor_II >= 43 && $skor_III >= 16) {
            echo $hasil_IV;
        }else{
            if ($skor_II >= 43) {
                echo $hasil_III;
            }else{
                if ($skor_II >= 36) {
                echo  "II";
               } elseif ($skor_II >= 12) {
                  echo  "I+";
               } elseif ($skor_II < 12) {
                  echo  "I";
               }
            }
        }
                                  }elseif ($cek>0 && $cek2==null && $cek3==null){
                                    echo "Lengkapi evaluasi";
                                  }elseif($cek>0 && $cek2>0 && $cek3==0){
                                     foreach ($TK2 as $row) {
                                        $ques1 = $row['ques1'];
                                        $ques2 = $row['ques2'];
                                        $ques3 = $row['ques3'];
                                        $ques4 = $row['ques4'];
                                        $ques5 = $row['ques5'];
                                        $ques6 = $row['ques6'];
                                        $ques7 = $row['ques7'];
                                        $ques8 = $row['ques8'];
                                        $ques9 = $row['ques9'];
                                        $ques10 = $row['ques10'];
                                        $ques11 = $row['ques11'];
                                        $ques12 = $row['ques12'];
                                        $ques13 = $row['ques13'];   
                                      }
        $skor_II = $ques1 + $ques2 +  $ques3 +  $ques4 +  $ques5 +  $ques6 +  $ques7 +  $ques8 +  $ques9 +  $ques10 +  $ques11 +  $ques12 +  $ques13 ;

        
                                    foreach ($TK3 as $row) {
                                        $ques14 = $row['ques14'];
                                        $ques15 = $row['ques15'];
                                        $ques16 = $row['ques16'];
                                       }
        $skor_III = $ques14 + $ques15 +  $ques16  ;

        
                                    
                                        $ques17 = 0;
                                        $ques18 = 0;
                                        $ques19 = 0;
                                        $ques20 = 0;
                                        $ques21 = 0;
                                        $ques22 = 0;
                                      
         $skor_IV = $ques17 + $ques18 +  $ques19 +  $ques20 +  $ques21 +  $ques22  ;

         if ($skor_II >= 36) {
                $hasil_II =  "II";
             } elseif ($skor_II >= 12) {
                $hasil_II =  "I+";
             } elseif ($skor_II < 12) {
                $hasil_II =  "I";
             }

         if ($skor_II >= 43) {
              $valid3 =  "yes";
            }else {
              $valid3 =  "No";
            }

                if ($skor_II >= 43 && $skor_III >= 14) {
                    $hasil_III = "III";
                }elseif ($skor_II >= 43 && $skor_III >= 8) {
                    $hasil_III = "II+";
                }elseif ($skor_II >= 43 && $skor_III < 8) {
                    $hasil_III = "II";
                }else{
                $hasil_III = "No";
                }

         if ($skor_II >= 43 && $skor_III >= 16){
                $valid4 =  "yes";
            } else {
                $valid4 =  "No";
            }


             if ( $skor_II >= 43 && $skor_III >= 16 && $skor_II = 54 && $skor_III >= 18 && $skor_IV >= 54) {
                    $hasil_IV =  "IV";
             }elseif ($skor_II >= 43 && $skor_III >= 16 && $skor_IV >= 24){
                 $hasil_IV =  "III+";
             }elseif ($skor_II >= 43 && $skor_III >= 16 && $skor_IV < 24){
                 $hasil_IV =  "III";
             }
        


        if ($skor_II >= 43 && $skor_III >= 16) {
            echo $hasil_IV;
        }else{
            if ($skor_II >= 43) {
                echo $hasil_III;
            }else{
                if ($skor_II >= 36) {
                echo  "II";
               } elseif ($skor_II >= 12) {
                  echo  "I+";
               } elseif ($skor_II < 12) {
                  echo  "I";
               }
            }
        }


}

                          ?>
                    </b></td>
                  </tr>

<?php /* ========================================================PENGELOLAAN RISIKO===========================================================================*/ ?>
                   <tr>
                    <td>Pengelolaan Resiko</td>
                    <td style="text-align: center; background-color: #fff3c4"><b> 
                      <?php foreach ($totalPR as $nilai) { ?>
                      <?php echo $nilai->total_nilai;?>
                      <?php }?>

                      <?PHP  $SEKOR_PR = $nilai->total_nilai ?>
                    </b></td>
                    <td>TK Kematangan</td>
                    <td style = "<?php 

                    if($cek_PR>0 && $cek_PR2>0 && $cek_PR3>0)
{
  print( "background-color: #fff3c4; text-align: left;" );
} else {
  print("background-color: #f4c4c4; text-align: left;");
}

                     ?>"><b>:

                      <?php

                      if($cek_PR>0 && $cek_PR2>0 && $cek_PR3>0){

                        
                                                        foreach ($PR2 as $row) {
                                        $ques1 = $row['ques1'];
                                        $ques2 = $row['ques2'];
                                        $ques3 = $row['ques3'];
                                        $ques4 = $row['ques4'];
                                        $ques5 = $row['ques5'];
                                        $ques6 = $row['ques6'];
                                        $ques7 = $row['ques7'];
                                        $ques8 = $row['ques8'];
                                        $ques9 = $row['ques9'];
                                        $ques10 = $row['ques10'];  
                                      }
        $skor_II = $ques1 + $ques2 +  $ques3 +  $ques4 +  $ques5 +  $ques6 +  $ques7 +  $ques8 +  $ques9 +  $ques10 ;

        
                                    foreach ($PR3 as $row) {
                                        $ques11 = $row['ques11'];
                                        $ques12 = $row['ques12'];
                                       }
        $skor_III = $ques11 + $ques12 ;

        
                                    foreach ($PR4 as $row) {
                                        $ques13 = $row['ques13'];
                                        $ques14 = $row['ques14'];
                                      }
        $skor_IV = $ques13 + $ques14 ;


                                    foreach ($PR5 as $row) {
                                        $ques15 = $row['ques15'];
                                        $ques16 = $row['ques16'];
                                      }
        $skor_V = $ques15 + $ques16 ;                

         if ($skor_II >= 20) {
                $hasil_II =  "II";
             } elseif ($skor_II >= 14) {
                $hasil_II =  "I+";
             } elseif ($skor_II < 14) {
                $hasil_II =  "I";
             }

         if ($skor_II >= 24) {
              $valid3 =  "yes";
            }else {
              $valid3 =  "No";
            }

                if ($skor_II >= 24 && $skor_III >= 8) {
                    $hasil_III = "III";
                }elseif ($skor_II >= 24 && $skor_III >= 4) {
                    $hasil_III = "II+";
                }elseif ($skor_II >= 24 && $skor_III < 4) {
                    $hasil_III = "II";
                }else{
                $hasil_III = "No";
                }

         if ($skor_II >= 24 && $skor_III >= 10){
                $valid4 =  "yes";
            } else {
                $valid4 =  "No";
            }


                 if ( $skor_II >= 24 && $skor_III >= 10 && $skor_II = 30 && $skor_III >= 12 && $skor_IV >= 12) {
                        $hasil_IV =  "IV";
                 }elseif ($skor_II >= 24 && $skor_III >= 10 && $skor_IV >= 8){
                     $hasil_IV =  "III+";
                 }elseif ($skor_II >= 24 && $skor_III >= 10 && $skor_IV < 8){
                     $hasil_IV =  "III";
                 }
        

         if ($skor_II >= 24 && $skor_III >= 10 && $skor_IV >= 12){
                $valid5 =  "yes";
            } else {
                $valid5 =  "No";
            }


                if ($skor_II >= 24 && $skor_III >= 10 && $skor_IV >= 12 && $skor_V >= 18) {
                        $hasil_V =  "V";
                 }elseif ($skor_II >= 24 && $skor_III >= 10 && $skor_IV >= 12 && $skor_V >= 12){
                     $hasil_V =  "IV+";
                 }elseif ($skor_II >= 24 && $skor_III >= 10 && $skor_IV >= 12 && $skor_V < 12){
                     $hasil_V =  "IV";
                 }


  if ($skor_II >= 24 && $skor_III >= 10 && $skor_IV >= 12){
          echo $hasil_V;
        }else{
            if ($skor_II >= 24 && $skor_III >= 10) {
                echo $hasil_IV;
            }else{
                if ($skor_II >= 24) {
                    echo $hasil_III;
                }else{
                    if ($skor_II >= 20) {
                        echo  "II";
                     } elseif ($skor_II >= 14) {
                        echo  "I+";
                     } elseif ($skor_II < 14) {
                        echo  "I";
                     }
                }
            }
        }

                      }elseif ($cek_PR>0 && $cek_PR2==null && $cek_PR3==null){
                                    


                                  foreach ($PR2 as $row) {
                                        $ques1 = $row['ques1'];
                                        $ques2 = $row['ques2'];
                                        $ques3 = $row['ques3'];
                                        $ques4 = $row['ques4'];
                                        $ques5 = $row['ques5'];
                                        $ques6 = $row['ques6'];
                                        $ques7 = $row['ques7'];
                                        $ques8 = $row['ques8'];
                                        $ques9 = $row['ques9'];
                                        $ques10 = $row['ques10'];  
                                      }
        $skor_II = $ques1 + $ques2 +  $ques3 +  $ques4 +  $ques5 +  $ques6 +  $ques7 +  $ques8 +  $ques9 +  $ques10 ;

        
                                    
                                        $ques11 = 0;
                                        $ques12 = 0;
                                       
        $skor_III = $ques11 + $ques12 ;

        
                                    
                                        $ques13 = 0;
                                        $ques14 = 0;
                                      
        $skor_IV = $ques13 + $ques14 ;


                                    
                                        $ques15 = 0;
                                        $ques16 = 0;
                                      
        $skor_V = $ques15 + $ques16 ;                

         if ($skor_II >= 20) {
                $hasil_II =  "II";
             } elseif ($skor_II >= 14) {
                $hasil_II =  "I+";
             } elseif ($skor_II < 14) {
                $hasil_II =  "I";
             }

         if ($skor_II >= 24) {
              $valid3 =  "yes";
            }else {
              $valid3 =  "No";
            }

                if ($skor_II >= 24 && $skor_III >= 8) {
                    $hasil_III = "III";
                }elseif ($skor_II >= 24 && $skor_III >= 4) {
                    $hasil_III = "II+";
                }elseif ($skor_II >= 24 && $skor_III < 4) {
                    $hasil_III = "II";
                }else{
                $hasil_III = "No";
                }

         if ($skor_II >= 24 && $skor_III >= 10){
                $valid4 =  "yes";
            } else {
                $valid4 =  "No";
            }


                 if ( $skor_II >= 24 && $skor_III >= 10 && $skor_II = 30 && $skor_III >= 12 && $skor_IV >= 12) {
                        $hasil_IV =  "IV";
                 }elseif ($skor_II >= 24 && $skor_III >= 10 && $skor_IV >= 8){
                     $hasil_IV =  "III+";
                 }elseif ($skor_II >= 24 && $skor_III >= 10 && $skor_IV < 8){
                     $hasil_IV =  "III";
                 }
        

         if ($skor_II >= 24 && $skor_III >= 10 && $skor_IV >= 12){
                $valid5 =  "yes";
            } else {
                $valid5 =  "No";
            }


                if ($skor_II >= 24 && $skor_III >= 10 && $skor_IV >= 12 && $skor_V >= 18) {
                        $hasil_V =  "V";
                 }elseif ($skor_II >= 24 && $skor_III >= 10 && $skor_IV >= 12 && $skor_V >= 12){
                     $hasil_V =  "IV+";
                 }elseif ($skor_II >= 24 && $skor_III >= 10 && $skor_IV >= 12 && $skor_V < 12){
                     $hasil_V =  "IV";
                 }


  if ($skor_II >= 24 && $skor_III >= 10 && $skor_IV >= 12){
          echo $hasil_V;
        }else{
            if ($skor_II >= 24 && $skor_III >= 10) {
                echo $hasil_IV;
            }else{
                if ($skor_II >= 24) {
                    echo $hasil_III;
                }else{
                    if ($skor_II >= 20) {
                        echo  "II";
                     } elseif ($skor_II >= 14) {
                        echo  "I+";
                     } elseif ($skor_II < 14) {
                        echo  "I";
                     }
                }
            }
        }
                                  
                      }elseif($cek_PR>0 && $cek_PR2>0 && $cek_PR3==0){
                        

                                                        foreach ($PR2 as $row) {
                                        $ques1 = $row['ques1'];
                                        $ques2 = $row['ques2'];
                                        $ques3 = $row['ques3'];
                                        $ques4 = $row['ques4'];
                                        $ques5 = $row['ques5'];
                                        $ques6 = $row['ques6'];
                                        $ques7 = $row['ques7'];
                                        $ques8 = $row['ques8'];
                                        $ques9 = $row['ques9'];
                                        $ques10 = $row['ques10'];  
                                      }
        $skor_II = $ques1 + $ques2 +  $ques3 +  $ques4 +  $ques5 +  $ques6 +  $ques7 +  $ques8 +  $ques9 +  $ques10 ;

        
                                    foreach ($PR3 as $row) {
                                        $ques11 = $row['ques11'];
                                        $ques12 = $row['ques12'];
                                       }
        $skor_III = $ques11 + $ques12 ;

        
                                    foreach ($PR4 as $row) {
                                        $ques13 = $row['ques13'];
                                        $ques14 = $row['ques14'];
                                      }
        $skor_IV = $ques13 + $ques14 ;


                                    
                                        $ques15 = 0;
                                        $ques16 = 0;
                                      
        $skor_V = $ques15 + $ques16 ;                

         if ($skor_II >= 20) {
                $hasil_II =  "II";
             } elseif ($skor_II >= 14) {
                $hasil_II =  "I+";
             } elseif ($skor_II < 14) {
                $hasil_II =  "I";
             }

         if ($skor_II >= 24) {
              $valid3 =  "yes";
            }else {
              $valid3 =  "No";
            }

               if ($skor_II >= 24 && $skor_III >= 8) {
                    $hasil_III = "III";
                }elseif ($skor_II >= 24 && $skor_III >= 4) {
                    $hasil_III = "II+";
                }elseif ($skor_II >= 24 && $skor_III < 4) {
                    $hasil_III = "II";
                }else{
                $hasil_III = "No";
                }

         if ($skor_II >= 24 && $skor_III >= 10){
                $valid4 =  "yes";
            } else {
                $valid4 =  "No";
            }


                 if ( $skor_II >= 24 && $skor_III >= 10 && $skor_II = 30 && $skor_III >= 12 && $skor_IV >= 12) {
                        $hasil_IV =  "IV";
                 }elseif ($skor_II >= 24 && $skor_III >= 10 && $skor_IV >= 8){
                     $hasil_IV =  "III+";
                 }elseif ($skor_II >= 24 && $skor_III >= 10 && $skor_IV < 8){
                     $hasil_IV =  "III";
                 }
        

         if ($skor_II >= 24 && $skor_III >= 10 && $skor_IV >= 12){
                $valid5 =  "yes";
            } else {
                $valid5 =  "No";
            }


                if ($skor_II >= 24 && $skor_III >= 10 && $skor_IV >= 12 && $skor_V >= 18) {
                        $hasil_V =  "V";
                 }elseif ($skor_II >= 24 && $skor_III >= 10 && $skor_IV >= 12 && $skor_V >= 12){
                     $hasil_V =  "IV+";
                 }elseif ($skor_II >= 24 && $skor_III >= 10 && $skor_IV >= 12 && $skor_V < 12){
                     $hasil_V =  "IV";
                 }


  if ($skor_II >= 24 && $skor_III >= 10 && $skor_IV >= 12){
          echo $hasil_V;
        }else{
            if ($skor_II >= 24 && $skor_III >= 10) {
                echo $hasil_IV;
            }else{
                if ($skor_II >= 24) {
                    echo $hasil_III;
                }else{
                    if ($skor_II >= 20) {
                        echo  "II";
                     } elseif ($skor_II >= 14) {
                        echo  "I+";
                     } elseif ($skor_II < 14) {
                        echo  "I";
                     }
                }
            }
        }

                      }

                    ?>
                      
                    </td>
                  </tr>


<?php /* ========================================================KERANGKA KERJA=============================================================================*/ ?>

                   <tr>
                    <td>Kerangka Kerja</td>
                    <td style="text-align: center; background-color: #fff3c4"><b>
                      <?php foreach ($totalKK as $nilai) { ?>
                      <?php echo $nilai->total_nilai;?>
                      <?php }?>

                      <?PHP  $SEKOR_KK = $nilai->total_nilai ?>
                    </b></td>
                    <td>TK Kematangan</td>
                    <td style = "<?php 

                    if($cek_KK>0 && $cek_KK2>0 && $cek_KK3>0)
{
  print( "background-color: #fff3c4; text-align: left;" );
} else {
  print("background-color: #f4c4c4; text-align: left;");
}

                     ?>"><b>:
                    <?php



if($cek_KK>0 && $cek_KK2>0 && $cek_KK3>0)
{
     foreach ($KK2 as $row) {
                                        $ques1 = $row['ques1'];
                                        $ques2 = $row['ques2'];
                                        $ques3 = $row['ques3'];
                                        $ques4 = $row['ques4'];
                                        $ques5 = $row['ques5'];
                                        $ques6 = $row['ques6'];
                                        $ques7 = $row['ques7'];
                                        $ques8 = $row['ques8'];
                                        $ques9 = $row['ques9'];
                                        $ques20 = $row['ques20'];
                                        $ques21 = $row['ques21'];  
                                      }
        $skor_II = $ques1 + $ques2 +  $ques3 +  $ques4 +  $ques5 +  $ques6 +  $ques7 +  $ques8 +  $ques9 +  $ques20 +  $ques21 ;

        
                                    foreach ($KK3 as $row) {
                                        $ques10 = $row['ques10'];
                                        $ques11 = $row['ques11'];
                                        $ques12 = $row['ques12'];
                                        $ques13 = $row['ques13'];
                                        $ques14 = $row['ques14'];
                                        $ques15 = $row['ques15'];
                                        $ques16 = $row['ques16'];
                                        $ques17 = $row['ques17'];
                                        $ques22 = $row['ques22'];
                                        $ques23 = $row['ques23'];
                                        $ques24 = $row['ques24'];
                                        $ques25 = $row['ques25'];
                                        $ques26 = $row['ques26'];

                                       }
        $skor_III = $ques10 + $ques11 +  $ques12 +  $ques13 +  $ques14 +  $ques15 +  $ques16 +  $ques17 +  $ques22 +  $ques23 +  $ques24 +  $ques25 +  $ques26;

        
                                    foreach ($KK4 as $row) {
                                        $ques18 = $row['ques18'];
                                        $ques19 = $row['ques19'];
                                        $ques27 = $row['ques27'];
                                      }
        $skor_IV = $ques18 + $ques19 + $ques27 ;


                                    foreach ($KK5 as $row) {
                                        $ques28 = $row['ques28'];
                                        $ques29 = $row['ques29'];
                                      }
        $skor_V = $ques28 + $ques29 ;                

         if ($skor_II >= 24) {
                $hasil_II =  "II";
             } elseif ($skor_II >= 15) {
                $hasil_II =  "I+";
             } elseif ($skor_II < 15) {
                $hasil_II =  "I";
             }

         if ($skor_II >= 34) {
              $valid3 =  "yes";
            }else {
              $valid3 =  "No";
            }

                if ($skor_II >= 34 && $skor_III >= 62) {
                    $hasil_III = "III";
                }elseif ($skor_II >= 34 && $skor_III >= 45) {
                    $hasil_III = "II+";
                }elseif ($skor_II >= 34 && $skor_III < 45) {
                    $hasil_III = "II";
                }else{
                $hasil_III = "No";
                }

         if ($skor_II >= 34 && $skor_III >= 70){
                $valid4 =  "yes";
            } else {
                $valid4 =  "No";
            }


                 if ( $skor_II >= 34 && $skor_III >= 70 && $skor_II = 42 && $skor_III = 75 && $skor_IV >= 27) {
                        $hasil_IV =  "IV";
                 }elseif ($skor_II >= 34 && $skor_III >= 70 && $skor_IV >= 15){
                     $hasil_IV =  "III+";
                 }elseif ($skor_II >= 34 && $skor_III >= 70 && $skor_IV < 15){
                     $hasil_IV =  "III";
                 }
        

         if ($skor_II >= 34 && $skor_III >= 70 && $skor_IV >= 27){
                $valid5 =  "yes";
            } else {
                $valid5 =  "No";
            }


                if ($skor_II >= 34 && $skor_III >= 70 && $skor_IV >= 27 && $skor_V >= 18) {
                        $hasil_V =  "V";
                 }elseif ($skor_II >= 34 && $skor_III >= 70 && $skor_IV >= 27 && $skor_V >= 12){
                     $hasil_V =  "IV+";
                 }elseif ($skor_II >= 34 && $skor_III >= 70 && $skor_IV >= 27 && $skor_V < 12){
                     $hasil_V =  "IV";
                 }


  if ($skor_II >= 34 && $skor_III >= 70 && $skor_IV >= 27){
          echo $hasil_V;
        }else{
            if ($skor_II >= 34 && $skor_III >= 70) {
                echo $hasil_IV;
            }else{
                if ($skor_II >= 34) {
                    echo $hasil_III;
                }else{
                    if ($skor_II >= 24) {
                        echo  "II";
                     } elseif ($skor_II >= 15) {
                        echo  "I+";
                     } elseif ($skor_II < 15) {
                        echo  "I";
                     }
                }
            }
        }

}
elseif($cek_KK>0 && $cek_KK2==0 && $cek_KK3==0)
{
  echo("Lengkapi Evaluasi");
}
elseif($cek_KK>0 && $cek_KK2>0 && $cek_KK3==0)
{
  echo("Lengkapi Evaluasi");
}


                    ?>
                     </b></td>
                  </tr>

<?php /* ========================================================PENGELOLAAN ASET=============================================================================*/ ?>
                   
                   <tr>
                    <td>Pengelolaan Aset</td>
                    <td style="text-align: center; background-color: #fff3c4"><b>
                      <?php foreach ($totalPA as $nilai) { ?>
                      <?php echo $nilai->total_nilai;?>
                      <?php }?>

                      <?PHP  $SEKOR_PA = $nilai->total_nilai ?>
                    </b></td>
                    <td>TK Kematangan</td>
                    <td style = "<?php 

                    if($cek_PA>0 && $cek_PA2>0 && $cek_PA3>0)
{
  print( "background-color: #fff3c4; text-align: left;" );
} else {
  print("background-color: #f4c4c4; text-align: left;");
}

                     ?>"><b>:
                    <?php



if($cek_PA>0 && $cek_PA2>0 && $cek_PA3>0)
{
   foreach ($PA2 as $row) {
                                        $ques1 = $row['ques1'];
                                        $ques2 = $row['ques2'];
                                        $ques3 = $row['ques3'];
                                        $ques4 = $row['ques4'];
                                        $ques5 = $row['ques5'];
                                        $ques6 = $row['ques6'];
                                        $ques7 = $row['ques7'];
                                        $ques8 = $row['ques8'];
                                        $ques9 = $row['ques9'];
                                        $ques10 = $row['ques10'];
                                        $ques11 = $row['ques11'];
                                        $ques12 = $row['ques12'];  
                                        $ques13 = $row['ques13'];
                                        $ques14 = $row['ques14'];
                                        $ques15 = $row['ques15'];
                                        $ques16 = $row['ques16'];
                                        $ques17 = $row['ques17'];
                                        $ques18 = $row['ques18'];
                                        $ques19 = $row['ques19'];
                                        $ques28 = $row['ques28'];
                                        $ques29 = $row['ques29'];
                                        $ques30 = $row['ques30'];
                                        $ques31 = $row['ques31'];
                                        $ques32 = $row['ques32'];
                                        $ques33 = $row['ques33'];
                                        $ques34 = $row['ques34'];
                                        $ques35 = $row['ques35'];
                                        $ques36 = $row['ques36'];
                                        $ques37 = $row['ques37'];
                                      }
        $skor_II = $ques1 + $ques2 +  $ques3 +  $ques4 +  $ques5 +  $ques6 +  $ques7 +  $ques8 +  $ques9 +  $ques10 +  $ques11 + $ques12 + $ques13 +  $ques14 +  $ques15 +  $ques16 +  $ques17 +  $ques18 +  $ques19 +  $ques28 +  $ques29 +  $ques30 + $ques31 + $ques32 +  $ques33 +  $ques34 +  $ques35 +  $ques36 +  $ques37 ;

        
                                    foreach ($PA3 as $row) {
                                        $ques20 = $row['ques20'];
                                        $ques21 = $row['ques21'];
                                        $ques22 = $row['ques22'];
                                        $ques23 = $row['ques23'];
                                        $ques24 = $row['ques24'];
                                        $ques25 = $row['ques25'];
                                        $ques26 = $row['ques26'];
                                        $ques27 = $row['ques27'];
                                        $ques38 = $row['ques38'];
                                       
                                       }
        $skor_III = $ques20 + $ques21 +  $ques22 +  $ques23 +  $ques24 +  $ques25 +  $ques26 +  $ques27 +  $ques38 ;

                    

         if ($skor_II >= 62) {
                $hasil_II =  "II";
             } elseif ($skor_II >= 25) {
                $hasil_II =  "I+";
             } elseif ($skor_II < 25) {
                $hasil_II =  "I";
             }

         if ($skor_II >= 84) {
              $valid3 =  "yes";
            }else {
              $valid3 =  "No";
            }

                if ($skor_II >= 84 && $skor_III >= 50) {
                    $hasil_III = "III";
                }elseif ($skor_II >= 84 && $skor_III >= 35) {
                    $hasil_III = "II+";
                }elseif ($skor_II >= 84 && $skor_III < 35) {
                    $hasil_III = "II";
                }else{
                $hasil_III = "No";
                }




                if ($skor_II >= 84) {
                    echo $hasil_III;
                }else{
                    if ($skor_II >= 62) {
                        echo  "II";
                     } elseif ($skor_II >= 25) {
                        echo  "I+";
                     } elseif ($skor_II < 25) {
                        echo  "I";
                     }
                }
    

}
elseif($cek_PA>0 && $cek_PA2==0 && $cek_PA3==0)
{
  echo("Lengkapi Evaluasi");
}
elseif($cek_PA>0 && $cek_PA2>0 && $cek_PA3==0)
{
  echo("Lengkapi Evaluasi");
}


                    ?>
                     </b></td>
                  </tr>

<?php /* ===========================================================TEKNOLOGI=============================================================================*/ ?>                  
                  <tr>
                    <td style=" width: 218px;">Teknologi & Keamanan Informasi </td>
                    <td style="text-align: center; background-color: #fff3c4"><b> 
                      <?php foreach ($totalTG as $nilai) { ?>
                      <?php echo $nilai->total_nilai;?>
                      <?php }?>

                      <?PHP  $SEKOR_TG = $nilai->total_nilai ?>
                    </b></td>
                    <td>TK Kematangan</td>
                    <td style = "<?php 
                                       if($cek_TG>0 && $cek_TG2>0 && $cek_TG3>0)
                                          {
                                            print( "background-color: #fff3c4; text-align: left;" );
                                          } else {
                                            print("background-color: #f4c4c4; text-align: left;");
                                          }

                     ?>"><b>:

                    <?php



if($cek_TG>0 && $cek_TG2>0 && $cek_TG3>0)
{

                                  foreach ($TG2 as $row) {
                                        $ques1 = $row['ques1'];
                                        $ques2 = $row['ques2'];
                                        $ques3 = $row['ques3'];
                                        $ques4 = $row['ques4'];
                                        $ques5 = $row['ques5'];
                                        $ques6 = $row['ques6'];
                                        $ques7 = $row['ques7'];
                                        $ques8 = $row['ques8'];
                                        $ques9 = $row['ques9'];
                                        $ques10 = $row['ques10'];
                                        $ques11 = $row['ques11'];
                                        $ques18 = $row['ques18'];
                                        $ques19 = $row['ques19'];
                                        $ques20 = $row['ques20'];   
                                      }
        $skor_II = $ques1 + $ques2 +  $ques3 +  $ques4 +  $ques5 +  $ques6 +  $ques7 +  $ques8 +  $ques9 +  $ques10 +  $ques11 +  $ques18 +  $ques19 +  $ques20 ;

        
                                    foreach ($TG3 as $row) {
                                        $ques12 = $row['ques12'];
                                        $ques13 = $row['ques13'];
                                        $ques14 = $row['ques14'];
                                        $ques15 = $row['ques15'];
                                        $ques16 = $row['ques16'];
                                        $ques17 = $row['ques17'];
                                        $ques21 = $row['ques21'];
                                        $ques22 = $row['ques22'];
                                        $ques23 = $row['ques23'];
                                        $ques24 = $row['ques24'];
                                        $ques25 = $row['ques25'];
                                       }
        $skor_III = $ques12 + $ques13 +  $ques14 + $ques15 +  $ques16 +  $ques17 +  $ques21 +  $ques22 +  $ques23 +  $ques24 +  $ques25 ;

        
                                    foreach ($TG4 as $row) {
                                        $ques26 = $row['ques26'];
                                      }
        $skor_IV = $ques26 ;

         if ($skor_II >= 28) {
                $hasil_II =  "II";
             } elseif ($skor_II >= 18) {
                $hasil_II =  "I+";
             } elseif ($skor_II < 18) {
                $hasil_II =  "I";
             }

         if ($skor_II >= 33) {
              $valid3 =  "yes";
            }else {
              $valid3 =  "No";
            }

                if ($skor_II >= 33 && $skor_III >= 62) {
                    $hasil_III = "III";
                }elseif ($skor_II >= 33 && $skor_III >= 40) {
                    $hasil_III = "II+";
                }elseif ($skor_II >= 33 && $skor_III < 40) {
                    $hasil_III = "II";
                }else{
                $hasil_III = "No";
                }

         if ($skor_II >= 33 && $skor_III >= 64){
                $valid4 =  "yes";
            } else {
                $valid4 =  "No";
            }


             if ( $skor_II >= 33 && $skor_III >= 64 && $skor_II = 42 && $skor_III >= 66 && $skor_IV >= 9) {
                    $hasil_IV =  "IV";
             }elseif ($skor_II >= 33 && $skor_III >= 64 && $skor_IV >= 6){
                 $hasil_IV =  "III+";
             }elseif ($skor_II >= 33 && $skor_III >= 64 && $skor_IV < 6){
                 $hasil_IV =  "III";
             }
        



        if ($skor_II >= 33 && $skor_III >= 64) {
            echo $hasil_IV;
        }else{
            if ($skor_II >= 33) {
                echo $hasil_III;
            }else{
                if ($skor_II >= 28) {
                echo  "II";
             } elseif ($skor_II >= 18) {
                echo  "I+";
             } elseif ($skor_II < 18) {
                echo  "I";
             }
            }
        }
}
elseif($cek_TG>0 && $cek_TG2==0 && $cek_TG3==0)
{ echo "Lengkapi evaluasi";
}
elseif($cek_TG>0 && $cek_TG2>0 && $cek_TG3==0)
{
  echo "Lengkapi evaluasi";
}


                    ?>
                     </b></td>
                  </tr>                       

                      </table>
                </div>

            </div>


<?PHP $SEKOR_TOTAL = $SEKOR_TK + $SEKOR_PR + $SEKOR_KK + $SEKOR_PA + $SEKOR_TG ;?>

            <div class="box">
              
                        <div class="box-header with-border">
                            <i class="fa fa-line-chart"></i>
                            <h1 class="box-title">Tingkat Kelengkapan Penerapan Sesuai Standar ISO27001</h1>
                              <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                              </div>
                        </div>

                                <div class="box-body table-responsive">
                                  <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-red" role="progressbar" style="width:43%">
                                        </div>
                                        <div class="progress-bar progress-bar-yellow" role="progressbar" style="width:28%">
                                          
                                        </div>
                                        <div class="progress-bar progress-bar-aqua" role="progressbar" style="width:19%">
                                          
                                        </div>
                                        <div class="progress-bar progress-bar-green" role="progressbar" style="width:10%">
                                          
                                        </div>
                                  </div>
                                  <div class="progress" style="height: 25px;">

                       <?php
$proges_bar = (($SEKOR_TOTAL/645)*100);

          if ($proges_bar <= 43) {
                $warna =  "progress-bar progress-bar-danger";
             } elseif ($proges_bar <= 71) {
                $warna =  "progress-bar progress-bar-warning";
             } elseif ($proges_bar < 90) {
                $warna =  "progress-bar progress-bar-info";
             } elseif ($proges_bar > 90) {
                $warna =  "progress-bar progress-bar-success";
            }

 {
    echo <<<EOL
  
                                      <div class="$warna" role="progressbar" style="width:$proges_bar%; color:#000; font-size:20px;">
                                         <b>$SEKOR_TOTAL</b>
                                      </div>
                                    
                                      
EOL;
}
?>       
                                      
                                        
                                      
                                    </div>
                                </div>
                        
            </div>

            <div class="box">
      
                    

                            <div class="box-body table-responsive">
                              <table class="table">
                                    <tr>
                                      <td style="

                                       <?php

if ($SEKOR_SE >= 10 && $SEKOR_SE <= 15 && $SEKOR_TOTAL >= 0 && $SEKOR_TOTAL <= 174) {
  print("color: #fff; font-size: 20px; text-align: center; background-color: #ff0000;");
}elseif ($SEKOR_SE >= 10 && $SEKOR_SE <=15 && $SEKOR_TOTAL >= 175 && $SEKOR_TOTAL <= 312) {
  print("color: #000; font-size: 20px; text-align: center; background-color: #ffff00;");
}elseif ($SEKOR_SE >= 10 && $SEKOR_SE <=15 && $SEKOR_TOTAL >= 313 && $SEKOR_TOTAL <= 562) {
  print("color: #000; font-size: 20px; text-align: center; background-color: #a0ff00;;");
}elseif ($SEKOR_SE >= 10 && $SEKOR_SE <=15 && $SEKOR_TOTAL >=563  && $SEKOR_TOTAL <= 645) {
  print("color: #000; font-size: 20px; text-align: center; background-color: #00ff00;");
}


elseif ($SEKOR_SE >= 16 && $SEKOR_SE <=34 && $SEKOR_TOTAL >= 0 && $SEKOR_TOTAL <= 272) {
  print("color: #fff; font-size: 20px; text-align: center; background-color: #ff0000;");
}elseif ($SEKOR_SE >= 16 && $SEKOR_SE <=34 && $SEKOR_TOTAL >= 273 && $SEKOR_TOTAL <= 455) {
   print("color: #000; font-size: 20px; text-align: center; background-color: #ffff00;");
}elseif ($SEKOR_SE >= 16 && $SEKOR_SE <=34 && $SEKOR_TOTAL >= 456 && $SEKOR_TOTAL <= 583) {
  print("color: #000; font-size: 20px; text-align: center; background-color: #a0ff00;;");
}elseif ($SEKOR_SE >= 16 && $SEKOR_SE <=34 && $SEKOR_TOTAL >=584  && $SEKOR_TOTAL <= 645) {
   print("color: #000; font-size: 20px; text-align: center; background-color: #00ff00;");
}


elseif ($SEKOR_SE >= 35 && $SEKOR_SE <=50 && $SEKOR_TOTAL >= 0 && $SEKOR_TOTAL <= 333) {
  print("color: #fff; font-size: 20px; text-align: center; background-color: #ff0000;");
}elseif ($SEKOR_SE >= 35 && $SEKOR_SE <=50 && $SEKOR_TOTAL >= 334 && $SEKOR_TOTAL <= 535) {
  print("color: #000; font-size: 20px; text-align: center; background-color: #ffff00;");
}elseif ($SEKOR_SE >= 35 && $SEKOR_SE <=50 && $SEKOR_TOTAL >= 536 && $SEKOR_TOTAL <= 609) {
  print("color: #000; font-size: 20px; text-align: center; background-color: #a0ff00;;");
}elseif ($SEKOR_SE >= 35 && $SEKOR_SE <=50 && $SEKOR_TOTAL >=610  && $SEKOR_TOTAL <= 645) {
  print("color: #000; font-size: 20px; text-align: center; background-color: #00ff00;");
}
else{
  print("color: #fff; font-size: 20px; text-align: center; background-color: #000;");
}


?>






                                      ";><b> 


                                        <?php

if ($SEKOR_SE >= 10 && $SEKOR_SE <= 15 && $SEKOR_TOTAL >= 0 && $SEKOR_TOTAL <= 174) {
  echo "TIDAK LAYAK";
}elseif ($SEKOR_SE >= 10 && $SEKOR_SE <=15 && $SEKOR_TOTAL >= 175 && $SEKOR_TOTAL <= 312) {
  echo "PERLU PERBAIKAN";
}elseif ($SEKOR_SE >= 10 && $SEKOR_SE <=15 && $SEKOR_TOTAL >= 313 && $SEKOR_TOTAL <= 562) {
  echo "CUKUP";
}elseif ($SEKOR_SE >= 10 && $SEKOR_SE <=15 && $SEKOR_TOTAL >=563  && $SEKOR_TOTAL <= 645) {
  echo "BAIK";
}


elseif ($SEKOR_SE >= 16 && $SEKOR_SE <=34 && $SEKOR_TOTAL >= 0 && $SEKOR_TOTAL <= 272) {
  echo "TIDAK LAYAK";
}elseif ($SEKOR_SE >= 16 && $SEKOR_SE <=34 && $SEKOR_TOTAL >= 273 && $SEKOR_TOTAL <= 455) {
  echo "PERLU PERBAIKAN";
}elseif ($SEKOR_SE >= 16 && $SEKOR_SE <=34 && $SEKOR_TOTAL >= 456 && $SEKOR_TOTAL <= 583) {
  echo "CUKUP";
}elseif ($SEKOR_SE >= 16 && $SEKOR_SE <=34 && $SEKOR_TOTAL >=584  && $SEKOR_TOTAL <= 645) {
  echo "BAIK";
}


elseif ($SEKOR_SE >= 35 && $SEKOR_SE <=50 && $SEKOR_TOTAL >= 0 && $SEKOR_TOTAL <= 333) {
  echo "TIDAK LAYAK";
}elseif ($SEKOR_SE >= 35 && $SEKOR_SE <=50 && $SEKOR_TOTAL >= 334 && $SEKOR_TOTAL <= 535) {
  echo "PERLU PERBAIKAN";
}elseif ($SEKOR_SE >= 35 && $SEKOR_SE <=50 && $SEKOR_TOTAL >= 536 && $SEKOR_TOTAL <= 609) {
  echo "CUKUP";
}elseif ($SEKOR_SE >= 35 && $SEKOR_SE <=50 && $SEKOR_TOTAL >=610  && $SEKOR_TOTAL <= 645) {
  echo "BAIK";
}
else{
  echo "BELUM ADA EVALUASI";
}


?>


                                      </b></td>
                                    </tr>
                              </table>
                            </div>
                
            </div>         

          
              
  </div>




         

</div>


<script type="text/javascript">

    new Chart(document.getElementById("radar-chart"), {
        type: 'radar',
            data: {
                labels: ["Tata Kelola", "Pengelolaan Risiko", "Kerangka Kerja", "Pengelolaan Aset", "Aspek Teknologi"],
                    
                    datasets: [
                      
                      {
                        label: "Responden",
                        fill: true,
                        backgroundColor: "rgba(255,99,132,0.7)",
                        borderColor: "rgba(255,99,132,1)",
                        pointBorderColor: "#fff",
                        pointBackgroundColor: "rgba(255,99,132,1)",
                        pointBorderColor: "#fff",
                        data: [
                                <?php foreach ($totalTK as $TK) { ?>
                                <?php echo $TK->total_nilai;?>
                                <?php }?>,

                                <?php foreach ($totalPR as $nilai) { ?>
                                <?php echo $nilai->total_nilai;?>
                                <?php }?>,

                                <?php foreach ($totalKK as $nilai) { ?>
                                <?php echo $nilai->total_nilai;?>
                                <?php }?>,

                                <?php foreach ($totalPA as $nilai) { ?>
                                <?php echo $nilai->total_nilai;?>
                                <?php }?>,

                                <?php foreach ($totalTG as $nilai) { ?>
                                <?php echo $nilai->total_nilai;?>
                                <?php }?>


                              ]
                      },{
                        label: "Kerangka Kerja Dasar",
                        fill: true,
                        backgroundColor: "rgba(247, 247, 94, 0.7)",
                        borderColor: "rgba(247, 247, 94, 1)",
                        pointBorderColor: "#fff",
                        pointBackgroundColor: "rgba(247, 247, 94, 1)",
                        pointBorderColor: "#fff",
                        data: [24,30,36,72,42]
                      }, {
                        label: "Proses Penerapan",
                        fill: true,
                        backgroundColor: "rgba(147, 246, 49,0.7)",
                        borderColor: "rgba(147, 246, 49,1)",
                        pointBorderColor: "#fff",
                        pointBackgroundColor: "rgba(147, 246, 49,1)",
                        data: [72,54,96,132,102]
                      },{
                        label: "Kepatuhan ISO 27001/SNI",
                        fill: true,
                        backgroundColor: "rgba(5, 178, 34,0.7)",
                        borderColor: "rgba(5, 178, 34,1)",
                        pointBorderColor: "#fff",
                        pointBackgroundColor: "rgba(5, 178, 34,1)",
                        data: [126,72,159,168,120]
                      }
                    ]
                  },
                  options: {
                    animateRotate: true,
                    animateScale: false,
                    responsive: true,
                    maintainAspectRatio: true,
                 

                   
                    title: {
                      display: true,
                      text: 'INDEKS KAMI (Keamanan Informasi)'
                    }
                  }
              });
  </script> 


