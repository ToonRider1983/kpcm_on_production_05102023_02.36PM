<style>

  .centered-text {
      text-align: center;
  }
  .table {
    display: table;
    border-collapse: collapse;
    width: 100%;
  }
  .table-row {
    display: table-row;
  }
  .table-cell {
    display: table-cell;
    font-size:7.5px;
    vertical-align: top;
    padding: 3px;
  }
  .table-head {
    display: table-cell;
    font-size: 10px;
    padding: 3px;
  }
  .table-inline {
    display: inline-block;
    padding: 2px;
    margin-right: 10px; 
  }
  .left-cell {
    padding: 4px;
    border: 1px solid black;
    padding-right: 10px; /* ช่องว่างทางขวาของช่องซ้าย */
  }
  .right-cell {
    padding: 4px;
    border: 1px solid black;
    padding-left: 10px; /* ช่องว่างทางซ้ายของช่องขวา */
  }
  .container {
            display: flex;
            align-items: center;
        }

        .logo img {
            width: 100px; /* ปรับขนาดของโลโก้ตามต้องการ */
            margin-top: -5px;
        }
        .text {
            font-weight: bold;
            font-size: 16px; /* ปรับขนาดตัวอักษรตามต้องการ */
            margin-top: -100px; 
        }
  

  
  
</style>


<?php
     $checkbox = '<img src="http://localhost/kpcm/public/assets/media/logos/images/CheckOn.png" alt="ss" width="10px" height="10px">';
      $uncheckbox = '<img src="http://localhost/kpcm/public/assets/media/logos/images/CheckOff.png" alt="ss" width="10px" height="10px">';
      $radio = '<img src="http://localhost/kpcm/public/assets/media/logos/images/RadioOn.png" alt="ss" width="10px" height="10px">';
      $unradio = '<img src="http://localhost/kpcm/public/assets/media/logos/images/RadioOff.png" alt="ss" width="10px" height="10px">';


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Document</title>
</head>
  <body>
    <div class="container">
      <div class="logo">
          <img src="http://localhost/kpcm/public/assets/media/logos/images/kobelco_100x21_blue.png" alt="ss">
          {{-- <img src=../public/assets/media/logos/images/kobelco_100x21_blue.png" alt="ss"> --}}
      </div>
      <div class="text centered-text" >
          OIL FLOODED COMPRESSOR SERVICE REPORT
      </div>
  </div>
   <div  style=" padding: 1px; width:5%;"></div>
    <div class="row">
      <div class="table">
        <div class="table-row">
          <div class="table-cell left-cell"  style=" padding: 2px; width:60%;"> 
            <div >1. Customer's Name: <span  style="color: #5153de;"><?php echo ($keyValue->customer_name1);?></span></div>
             <div  style=" padding: 1px; width:5%;"></div>
            <div>2. Address: <span  style="color: #5153de;"><?php echo ($keyValue->address1);?></span></div>
             <div  style=" padding: 1px; width:5%;"></div>
            <div>................................................................................................................................................................................................................</div>
             <div  style=" padding: 1px; width:5%;"></div>
            <div>................................................................................................................................................................................................................</div>
          </div>
          <div style="padding: 2px; width: 10%;"></div>
          <div class="table-cell right-cell" style="padding: 2px; width: 40%;">
            <div class="row">
              <div  >3. Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span  style="color: #5153de;"><?php echo ($keyValue->service_dt);?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Report No:<span  style="color: #5153de;"><?php echo ($keyValue->report_no);?></span></div> 
              <div >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( DD/MM/YYYY )</div>  
              <div  style=" padding: 3px; width:10%;"></div>
              <div style="text-align: center;    font-size: 11px;" ><span  style="color: #5153de;"><?php echo ($keyValue->company_name);?></span></div>
            </div>   
          </div>          
        </div>         
        </div>
      </div>
    </div>
    

     <div  style=" padding: 1px; width:5%;"></div>
   
    <div class="table" style=" border: 1px solid black;width: 100%;">
      <div class="table-row">
        <div class="table-head">MACHINE DATA</div>
        <div class="table-cell">4. Model: <span   style="color: #5153de; text-align: center;"><?php echo ($keyValue->machine_cd);?></span></div>
        <div class="table-cell">5. Serial No: <span  style="color: #5153de; text-align: center;"><?php echo ($keyValue->serial);?></span> </div>
        <div class="table-cell">6. O.NO.: <span  style="color: #5153de; text-align: center;"><?php echo ($keyValue->ksl_order_cd);?></span> </div>
      </div>
      <div class="table-row " >
        <div class="table-cell"></div>
        <div class="table-cell" style= >7. Year of Manufacture:</div>
        <div class="table-cell">8. MC No. in Customer:  <span  style="color: #5153de; text-align: center;"><?php echo ($keyValue->customer_machine_no);?></span></div>
        <div class="table-cell">9. Comm' Date: <span style="color: #5153de; text-align: center;"><?php echo ($keyValue->testrun_dt);?></span></div>
      </div>
    </div>

     <div  style=" padding: 1px; width:5%;"></div>
      <?php
        $site_ventilation = $keyValue->site_ventilation;

          switch ($site_ventilation) {
              case 1:
                  $show1 = $radio;
                  $show2 = $unradio;
                  $show3 = $unradio;
                  break;
              case 2:
                  $show1 = $unradio;
                  $show2 = $radio;
                  $show3 = $unradio;
                  break;
              case 3:
                  $show1 = $unradio;
                  $show2 = $unradio;
                  $show3 = $radio;
                  break;
              default:
                  $show1 = $unradio;
                  $show2 = $unradio;
                  $show3 = $unradio;
                  break;
          }
    ?>
    <div class="table" style=" border: 1px solid black;width: 100%;">
      <div class="table-row " >
          <div class="table-head">SITE CONDITION &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
          <div class="table-cell" >10. Ventilation: &nbsp;&nbsp;&nbsp;<?php echo ($show1);?>&nbsp;&nbsp;&nbsp;
            Good,&nbsp;&nbsp;&nbsp;<?php echo ($show2);?>&nbsp;&nbsp;&nbsp;
            Fair,&nbsp;&nbsp;&nbsp;<?php echo ($show3);?>&nbsp;&nbsp;&nbsp;
            Not Good,</div>
          <div class="table-cell">11. Room Temp.:  <span   style="color: #5153de;"><?php echo ($keyValue->site_roomtemp);?></span><span style="font-family: DejaVu Sans;">&#8451;</div>
          <div class="table-cell"></div>
      </div>
      <div class="table-row " >
          
          <div class="table-cell"></div>
          <div class="table-cell">12. Cooling Water:&nbsp;&nbsp;&nbsp; Temp.<span   style="color: #5153de;"><?php echo ($keyValue->site_cooling_temp_in);?>/<?php echo ($keyValue->site_cooling_temp_out);?></span><span style="font-family: DejaVu Sans;">&#8451;</span>,</div>
          <div class="table-cell">Pressure <span  style="color: #5153de;"><?php echo ($keyValue->site_cooling_pressure_in);?>/<?php echo ($keyValue->site_cooling_pressure_out);?> </span>(In / Out)</div>
          <div class="table-cell"></div>
      </div>
    </div>

     <div  style=" padding: 1px; width:5%;"></div>

    <div class="table" style=" border: 1px solid black;width: 100%;">
    <?php
        $service_content = $keyValue->service_content;

          switch ($service_content) {
              case 1:
                  $content1 = $radio;
                  $content2 = $unradio;
                  $content3 = $unradio;
                  $content4 = $unradio;
                  $content5 = $unradio;
                  $content6 = $unradio;
                  $content7 = $unradio;
                  $content8 = $unradio;
                  break;
              case 2:
                  $content1 = $unradio;
                  $content2 = $radio;
                  $content3 = $unradio;
                  $content4 = $unradio;
                  $content5 = $unradio;
                  $content6 = $unradio;
                  $content7 = $unradio;
                  $content8 = $unradio;

                  break;
              case 3:
                  $content1 = $unradio;
                  $content2 = $unradio;
                  $content3 = $radio;
                  $content4 = $unradio;
                  $content5 = $unradio;
                  $content6 = $unradio;
                  $content7 = $unradio;
                  $content8 = $unradio;
                  break;

              case 4:
                  $content1 = $unradio;
                  $content2 = $unradio;
                  $content3 = $unradio;
                  $content4 = $radio;
                  $content5 = $unradio;
                  $content6 = $unradio;
                  $content7 = $unradio;
                  $content8 = $unradio;
                  break;

              case 5:
                  $content1 = $unradio;
                  $content2 = $unradio;
                  $content3 = $unradio;
                  $content4 = $unradio;
                  $content5 = $radio;
                  $content6 = $unradio;
                  $content7 = $unradio;
                  $content8 = $unradio;
                  break;
              case 6:
                  $content1 = $unradio;
                  $content2 = $unradio;
                  $content3 = $unradio;
                  $content4 = $unradio;
                  $content5 = $unradio;
                  $content6 = $radio;
                  $content7 = $unradio;
                  $content8 = $unradio;
                break;
              case 7:
                  $content1 = $unradio;
                  $content2 = $unradio;
                  $content3 = $unradio;
                  $content4 = $unradio;
                  $content5 = $unradio;
                  $content6 = $unradio;
                  $content7 = $radio;
                  $content8 = $unradio;
                break;
              case 8:
                  $content1 = $unradio;
                  $content2 = $unradio;
                  $content3 = $unradio;
                  $content4 = $unradio;
                  $content5 = $unradio;
                  $content6 = $unradio;
                  $content7 = $unradio;
                  $content8 = $radio;
                break;
          }
    ?>
      <div class="table-row">
        <div class="table-head">SERVICE CONTENT</div>
        <div class="table-cell">13.<?php echo ($content6);?> Prtrol Service / cleanup  </div>
        <div class="table-cell">14.<?php echo ($content3);?> Annual Inspection / Parts Change </div>
        <div class="table-cell">15.<?php echo ($content4);?> Repair </div>
        <div class="table-cell">16.<?php echo ($content2);?> Overhaul  </div>
      </div>
      <div class="table-row " >
         
          <div class="table-cell"></div>
          <div class="table-cell">17.<?php echo ($content1);?> Commissioning </div>
          <div class="table-cell">18.<?php echo ($content5);?> Warranty Claim Related  </div>
          <div class="table-cell">19.<?php echo ($content8);?> Emergency Call / Checkup </div>
          <div class="table-cell">20.<?php echo ($content7);?> Others / etc.</div>
      </div>
    </div>

     <div  style=" padding: 1px; width:5%;"></div>
    <?php 
            
            if ($keyValue->detail_motor == 1) {
              $showmotor = $checkbox ;

            }  else {
             
              $showmotor = $uncheckbox;
            }

            if ($keyValue->detail_cooler == 1) {
              $showcooler = $checkbox ;

            }  else {
             
              $showcooler = $uncheckbox;
            }

            if ($keyValue->detail_topup == 1) {
              $showtopup = $checkbox ;

            }  else {
             
              $showtopup = $uncheckbox;
            }

            if ($keyValue->detail_replace == 1) {
              $showreplace = $checkbox ;

            }  else {
             
              $showreplace = $uncheckbox;
            }

            if ($keyValue->detail_overhaul_air == 1) {
              $showoverhaul = $checkbox ;

            }  else {
             
              $showoverhaul = $uncheckbox;
            }

            if ($keyValue->detail_overhaul_motor == 1) {
              $showoverhaulmotor = $checkbox ;

            }  else {
             
              $showoverhaulmotor = $uncheckbox;
            }

            if ($keyValue->detail_rewind == 1) {
              $showrewind = $checkbox ;

            }  else {
             
              $showrewind = $uncheckbox;
            }

            if ($keyValue->detail_3000 == 1) {
              $show3000 = $checkbox ;

            }  else {
             
              $show3000 = $uncheckbox;
            }

            if ($keyValue->detail_6000 == 1) {
              $show6000 = $checkbox ;

            }  else {
             
              $show6000 = $uncheckbox;
            }

            if ($keyValue->detail_12000 == 1) {
              $show12000  = $checkbox ;

            }  else {
             
              $show12000  = $uncheckbox;
            }
                        
            
            
    ?>

    <div class="table" style=" border: 1px solid black;width: 100%;">
      <div class="table-row " >
        <div class="table-head">SERVICE CONTENT(DETAIL)</div>
        <div class="table-cell"></div>
        <div class="table-cell"></div>
        <div class="table-cell"></div>
      </div>
      
      <div class="table-row " >
        <div class="table-cell">21.&nbsp;&nbsp;&nbsp;<?php echo  ($showmotor);?>&nbsp;&nbsp;&nbsp;Motor: Grease up </div>
        <div class="table-cell">22.&nbsp;&nbsp;&nbsp;<?php echo  ($showcooler);?>&nbsp;&nbsp;&nbsp;Cooler Cleaning </div>
        <div class="table-cell">23.&nbsp;&nbsp;&nbsp;<?php echo  ($showtopup);?>&nbsp;&nbsp;&nbsp;Oil Top Up : Number of Liters<span style="color: #5153de;"><?php echo ($keyValue->detail_topup_liters);?></span> Liters</div>
        <div class="table-cell">24.&nbsp;&nbsp;&nbsp;<?php echo  ($showreplace);?>&nbsp;&nbsp;&nbsp;Replace Oil : Brand<span style="color: #5153de;"><?php echo ($keyValue->detail_replace_brand);?></span></div>
      </div>
      <div class="table-row " >
        <div class="table-cell">25.&nbsp;&nbsp;&nbsp;<?php echo  ($showoverhaul);?>&nbsp;&nbsp;&nbsp;Overhaul Air end       </div>
        <div class="table-cell">26.&nbsp;&nbsp;&nbsp;<?php echo  ($showoverhaulmotor);?>&nbsp;&nbsp;Overhaul Main Motor     </div>
        <div class="table-cell">27.&nbsp;&nbsp;&nbsp;<?php echo  ($showrewind);?>&nbsp;&nbsp;&nbsp;Main Motor Coil Rewind / Revarnish</div>
        <div class="table-cell"></div>
      </div>
      <div class="table-row " >
        <div class="table-cell">28.&nbsp;&nbsp;&nbsp;<?php echo  ($show3000);?>&nbsp;&nbsp;&nbsp;3,000Hrs</div>
        <div class="table-cell">29.&nbsp;&nbsp;&nbsp;<?php echo  ($show6000);?>&nbsp;&nbsp;&nbsp;6,000Hrs</div>
        <div class="table-cell">30.&nbsp;&nbsp;&nbsp;<?php echo  ($show12000);?>&nbsp;&nbsp;&nbsp;12,000Hrs</div>
        <div class="table-cell">31. Other(&nbsp;&nbsp;&nbsp;<span style="color: #5153de;"><?php echo ($keyValue->detail_other);?></span>&nbsp;&nbsp;&nbsp;)</div>
      </div>
    </div>

     <div  style=" padding: 1px; width:5%;"></div>

    <div class="table" style=" border: 1px solid black;width: 100%;">
      <div class="table-row " >
        <div class="table-head">RUNNING DATA</div>
        <div class="table-cell"colspan="2">32. Discharge Air Pressue:<span style="color: #5153de;"><?php echo ($keyValue->running_air_pressure_load . ' / '.  $keyValue->running_air_pressure_unload . ' / '.  $keyValue->running_air_pressure_normal);?></span>&nbsp;(Load / Unload / Normal)</div>
       
        <div class="table-cell">33. O/S Pressure:<span style="color: #5153de;"><?php echo ($keyValue->running_os_pressure);?></span></div>
      </div>
      <div class="table-row " >
        <div class="table-cell">34.Load Condition: <span style="color: #5153de;"><?php echo ($keyValue->running_load);?> %</div>
        <div class="table-cell" colspan="2">35.Discharde Air Temp.:<span style="color: #5153de;"><?php echo ($keyValue->running_air_temp_load);?>/<?php echo ($keyValue->running_air_temp_unload);?></span><span style="font-family: DejaVu Sans;">&#8451;</span> &nbsp;(Load / Unload)</div>

        <div class="table-cell"></div>
      </div>
      <div class="table-row " >
        <div class="table-cell" colspan="4">36. Houtmeter:<span style="color: #5153de;"><?php echo ($keyValue->running_hourmeter_check);?></span>Hrs -> &nbsp; Check when hour has been reser, (e..g. due to Monitor replace, Software upgrade, hour reset)</div>
      </div>
      <div class="table-row " >
        <div class="table-cell">37.Current:<span style="color: #5153de;"><?php echo ($keyValue->running_current_load . ' / '. $keyValue->running_current_unload); ?></span>A&nbsp;(Load / Unload)</div>
        <div class="table-cell">38.After O/S Temp.:<span style="color: #5153de;"><?php echo ($keyValue->running_os_temp);?></span><span style="font-family: DejaVu Sans;">&#8451;</span></div>
        <div class="table-cell">39.Ambien Temp: <span style="color: #5153de;"><?php echo ($keyValue->running_ambient_temp);?></span><span style="font-family: DejaVu Sans;">&#8451;</span> </div>
        <div class="table-cell">40. Tc Temp. (Motor Coil) <span style="color: #5153de;"><?php echo ($keyValue->running_tc_temp);?></span></div>
      </div>
      <div class="table-row " >
        <div class="table-cell">41.Load Count(Load Run Time <span style="color: #5153de;"><?php echo ($keyValue->running_load_count);?></span>)</div>
        <div class="table-cell">42.Load Hour(Load Run Time)<span style="color: #5153de;"><?php echo ($keyValue->running_load_hour);?></span>Hrs</div>
        <div class="table-cell">43.Running Count:<span style="color: #5153de;"><?php echo ($keyValue->running_count);?></span></div>
        <div class="table-cell">44.Suction<span style="color: #5153de;"><?php echo ($keyValue->running_suction_pressure);?></span></div>
      </div>
    </div>

     <div  style=" padding: 1px; width:5%;"></div>
    <?php 
    
      if ($keyValue->setting_operation_local == 1) {
        $showlocal = $checkbox ;

      }  else {
      
        $showlocal = $uncheckbox;
      }

      if ($keyValue->setting_operation_run_on == 1) {
        $showon  = $checkbox ;

      }  else {
      
        $showon  = $uncheckbox;
      }

      if ($keyValue->setting_operation_run_load == 1) {
        $showload  = $checkbox ;

      }  else {
      
        $showload  = $uncheckbox;
      }


      if ($keyValue->setting_group_link == 1) {
        $showlink  = $checkbox ;

      }  else {
      
        $showlink  = $uncheckbox;
      }

      if ($keyValue->setting_group_panel == 1) {
        $showpanel = $checkbox ;

      }  else {
      
        $showpanel  = $uncheckbox;
      }

    ?>

    <div class="table" style=" border: 1px solid black;width: 100%;">
      <div class="table-row " >
        <div class="table-head">MACHINE SETTING</div>
        <div class="table-cell" colspan="5"><?php echo ($showlocal);?>&nbsp;&nbsp;Local (Run Mode: &nbsp;&nbsp;<?php echo ($showon);?>&nbsp;&nbsp; On/off, &nbsp;&nbsp;<?php echo ($showload);?>&nbsp;&nbsp; Load/Unload) /&nbsp;&nbsp;<?php echo ($showlink);?>&nbsp;&nbsp;Link Operation /&nbsp;&nbsp;&nbsp;<?php echo ($showpanel);?>&nbsp;&nbsp;&nbsp;  Group Control Panel </div>

      </div>
      <div class="table-row " >
        <div class="table-cell">Local / Link Op.:</div>
        <div class="table-cell">Load:<span style="color: #5153de;"><?php echo ($keyValue->setting_op_load);?></span></div>
        <div class="table-cell">Unload: <span style="color: #5153de;"><?php echo ($keyValue->setting_op_unload);?></span></div>
        <div class="table-cell">Auto start: <span style="color: #5153de;"><?php echo ($keyValue->setting_op_auto);?></span></div>
        <div class="table-cell">Constant:<span style="color: #5153de;"><?php echo ($keyValue->setting_op_constant);?></span></div>
        <div class="table-cell"></div> 
      </div>
      <div class="table-row " >
        <div class="table-cell">Group Control Pnel:</div>
        <div class="table-cell">PHH: <span style="color: #5153de;"><?php echo ($keyValue->setting_phh);?></span></div>
        <div class="table-cell">PHL: <span style="color: #5153de;"><?php echo ($keyValue->setting_phl);?></span></div>
        <div class="table-cell">PH:  <span style="color: #5153de;"><?php echo ($keyValue->setting_ph);?></span></div>
        <div class="table-cell">PL:  <span style="color: #5153de;"><?php echo ($keyValue->setting_pl);?></span></div>
        <div class="table-cell">PLL: <span style="color: #5153de;"><?php echo ($keyValue->setting_pll);?></span></div>


      </div>
    </div>
    <div  style=" padding: 1px; width:5%;"></div>
    <div class="table" style=" border: 1px solid black;width: 100%;">
      <div class="table-row " >
        <div class="table-head" colspan="5">MEASUREMENT</div>
      </div>
      <div class="table-row " >
          <div class="table-cell">Voltage:</div>
          <div class="table-cell">R-S <span style="color: #5153de;"><?php echo ($keyValue->meas_voltage_rs_on .' / '. $keyValue->meas_voltage_rs_off);?></span>V,</div>
          <div class="table-cell">S-T <span style="color: #5153de;"><?php echo ($keyValue->meas_voltage_st_on .' / '. $keyValue->meas_voltage_st_off);?></span>V,</div>
          <div class="table-cell" colspan="2">T-R <span style="color: #5153de;"><?php echo ($keyValue->meas_voltage_tr_on .' / '. $keyValue->meas_voltage_tr_off);?></span>V, (On / off)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[+-10% of uated current]</div> 
      </div>
      <div class="table-row " >
        <div class="table-cell">Input Current:</div>
          <div class="table-cell">R&nbsp; <span style="color: #5153de;"><?php echo ($keyValue->meas_input_r_load .' / '. $keyValue->meas_input_r_unload);?></span>A,</div>
          <div class="table-cell">S&nbsp; <span style="color: #5153de;"><?php echo ($keyValue->meas_input_s_load .' / '. $keyValue->meas_input_s_unload);?></span>A,</div>
          <div class="table-cell" colspan="2">T &nbsp;<span style="color: #5153de;"><?php echo ($keyValue->meas_input_t_load .' / '. $keyValue->meas_input_t_load);?></span>A, (Load / Unload)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[+-5% of uated current]</div> 
      </div>
      <div class="table-row " >
        <div class="table-cell">Motor Current:</div>
        <div class="table-cell">U1<span style="color: #5153de;"><?php echo ($keyValue->meas_motor_u_load .' / '. $keyValue->meas_motor_u_unload);?></span>A,</div>
        <div class="table-cell">V1<span style="color: #5153de;"><?php echo ($keyValue->meas_motor_v_load .' / '. $keyValue->meas_motor_v_unload);?></span>A,</div>
        <div class="table-cell" colspan="2">W1 <span style="color: #5153de;"><?php echo ($keyValue->meas_motor_w_load .' / '. $keyValue->meas_motor_w_unload);?></span>A, (Load / Unload)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dis. Pipe Temp.: </div> 
      </div>
    </div>    
    
    <div  style=" padding: 1px; width:5%;"></div>
    <?php
   

      switch ($keyValue->functions_monitor) {
          case 1:
              $funcmonitor1 = $radio;
              $funcmonitor2 = $unradio;

          break;
          case 2:
              $funcmonitor1 = $unradio;
              $funcmonitor2 = $radio;
          break;

          default:
              $funcmonitor1 = $unradio;
              $funcmonitor2 = $unradio;
          break;

  
      }

      switch ($keyValue->functions_battery) {
          case 1:
              $funcbattery1 = $radio;
              $funcbattery2 = $unradio;

          break;
          case 2:
              $funcbattery1 = $unradio;
              $funcbattery2 = $radio;
          break;

          default:
              $funcbattery1 = $unradio;
              $funcbattery2 = $unradio;
          break;

  
      }

      switch ($keyValue->functions_sensor) {
          case 1:
              $funcsensor1 = $radio;
              $funcsensor2 = $unradio;

          break;
          case 2:
              $funcsensor1 = $unradio;
              $funcsensor2 = $radio;
          break;

          default:
              $funcsensor1 = $unradio;
              $funcsensor2 = $unradio;
          break;

  
      }

      switch ($keyValue->functions_ocr) {
          case 1:
              $funcocr1 = $radio;
              $funcocr2 = $unradio;

          break;
          case 2:
              $funcocr1 = $unradio;
              $funcocr2 = $radio;
          break;

          default:
              $funcocr1 = $unradio;
              $funcocr2 = $unradio;
          break;

  
      }

      switch ($keyValue->functions_magnetic) {
          case 1:
              $funcmagnetic1 = $radio;
              $funcmagnetic2 = $unradio;

          break;
          case 2:
              $funcmagnetic1 = $unradio;
              $funcmagnetic2 = $radio;
          break;

          default:
              $funcmagnetic1 = $unradio;
              $funcmagnetic2 = $unradio;
          break;

  
      }
      switch ($keyValue->functions_presssensor) {
          case 1:
              $funcpresssensor1 = $radio;
              $funcpresssensor2 = $unradio;

          break;
          case 2:
              $funcpresssensor1 = $unradio;
              $funcpresssensor2 = $radio;
          break;

          default:
              $funcpresssensor1 = $unradio;
              $funcpresssensor2 = $unradio;
          break;

  
      }

      switch ($keyValue->functions_tempsensor) {
          case 1:
              $functempsensor1 = $radio;
              $functempsensor2 = $unradio;

          break;
          case 2:
              $functempsensor1 = $unradio;
              $functempsensor2 = $radio;
          break;

          default:
              $functempsensor1 = $unradio;
              $functempsensor2 = $unradio;
          break;

  
      }

      switch ($keyValue->functions_pressswitch) {
          case 1:
              $funcpressswitch1 = $radio;
              $funcpressswitch2 = $unradio;

          break;
          case 2:
              $funcpressswitch1 = $unradio;
              $funcpressswitch2 = $radio;
          break;

          default:
              $funcpressswitch1 = $unradio;
              $funcpressswitch2 = $unradio;
          break;

  
      }

      switch ($keyValue->functions_flowswitch) {
          case 1:
              $funcflowswitch1 = $radio;
              $funcflowswitch2 = $unradio;

          break;
          case 2:
              $funcflowswitch1 = $unradio;
              $funcflowswitch2 = $radio;
          break;

          default:
              $funcflowswitch1 = $unradio;
              $funcflowswitch2 = $unradio;
          break;

  
      }

      switch ($keyValue->functions_discharge) {
          case 1:
              $funcdischarge1 = $radio;
              $funcdischarge2 = $unradio;

          break;
          case 2:
              $funcdischarge1 = $unradio;
              $funcdischarge2 = $radio;
          break;

          default:
              $funcdischarge1 = $unradio;
              $funcdischarge2 = $unradio;
          break;

  
      }
  ?>


  <div class="row " >
    <div class="table" >
      <div class="table-row">
        <div class="table-cell " style="padding: 1px; width: 40%;">
          <!-- ส่วนบนของช่อง -->
          <div  class="table " style=" border: 1px solid black; border-bottom: 1px solid #000; margin-bottom: 19px;">
            <div class="table-row " >
              <div class="table-cell"  colspan="3" style="padding: 2px; width: 10%;"></div>
            </div>
            <div class="table-row " >
              <div class="table-cell"  colspan="3">CHECK FUNCTION</div>
            </div>
            <div class="table-row " >
              <div class="table-cell">Montor / Controller</div>
              <div class="table-cell"> <?php echo ($funcmonitor1);?>OK</div>
              <div class="table-cell"> <?php echo ($funcmonitor2);?>NG</div>
            </div>
            <div class="table-row">
              <div class="table-cell">Battery</div>
              <div class="table-cell"> <?php echo ($funcbattery1);?> OK</div>
              <div class="table-cell"> <?php echo ($funcbattery2);?> NG</div>
            </div>
           
            <div class="table-row">
              <div class="table-cell">Drain Sensor</div>
              <div class="table-cell"><?php echo ($funcsensor1);?>OK</div>
              <div class="table-cell"><?php echo ($funcsensor2);?>NG</div>
            </div>

            <div class="table-row " >
              <div class="table-cell">OCR</div>
              <div class="table-cell"><?php echo ($funcocr1);?>OK</div>
              <div class="table-cell"><?php echo ($funcocr2);?>NG</div>
            </div>
          
            <div class="table-row">
              <div class="table-cell">Star-Delta Timer</div>
              <div class="table-cell"><span style="color: #5153de;"><?php echo ($keyValue->functions_timer);?></span></div>
              <div class="table-cell">sec[5-7 sec]</div>
            </div>
        
            <div class="table-row">
              <div class="table-cell">Pressure Keep Valve Opens at</div>
              <div class="table-cell"><span style="color: #5153de;"><?php echo ($keyValue->functions_valve_open);?></span></div>
              <div class="table-cell"></div>
            </div>
            
            <div class="table-row " >
              <div class="table-cell">Blow Off Valve Blows within</div>
              <div class="table-cell"><span style="color: #5153de;"><?php echo ($keyValue->functions_valve_blow);?></span></div>
              <div class="table-cell">sec[60 sec]</div>
            </div>
            <div class="table-row " >
              <div class="table-cell">Safety Valve Operates at</div>
              <div class="table-cell"><span style="color: #5153de;"><?php echo ($keyValue->functions_valve_operate);?></span></div>
              <div class="table-cell">[spec x 1.1]</div>
            </div>

            <div class="table-row " >
              <div class="table-cell">Thermal Relay Trips at</div>
              <div class="table-cell"><span style="color: #5153de;"><?php echo ($keyValue->functions_thermal);?></span></div>
              <div class="table-cell">A</div>
            </div>
            <div class="table-row " >
              <div class="table-cell">Magnetic Connector</div>
              <div class="table-cell"><?php echo ($funcmagnetic1);?>OK</div>
              <div class="table-cell"><?php echo ($funcmagnetic2);?>NG</div>
            </div>
            <div class="table-row " >
              <div class="table-cell">Pressure Sensor</div>
              <div class="table-cell"><?php echo ($funcpresssensor1);?>OK</div>
              <div class="table-cell"><?php echo ($funcpresssensor2);?>NG</div>
            </div>
            <div class="table-row " >
              <div class="table-cell">Temperature Sensor</div>
              <div class="table-cell"><?php echo ($functempsensor1);?>OK</div>
              <div class="table-cell"><?php echo ($functempsensor2);?>NG</div>
            </div>
            <div class="table-row " >
              <div class="table-cell">Pressure Switch</div>
              <div class="table-cell"><?php echo ($funcpressswitch1);?>OK</div>
              <div class="table-cell"><?php echo ($funcpressswitch2);?>NG</div>
            </div>
            <div class="table-row " >
              <div class="table-cell">Flow Switch</div>
              <div class="table-cell"><?php echo ($funcflowswitch1);?>OK</div>
              <div class="table-cell"><?php echo ($funcflowswitch2);?>NG</div>
            </div>
            <div class="table-row " >
              <div class="table-cell">Discharge Valve</div>
              <div class="table-cell"><?php echo ($funcdischarge1);?>OK</div>
              <div class="table-cell"><?php echo ($funcdischarge2);?>NG</div>
            </div>

            <div class="table-row " >
              <div class="table-cell"  style=" padding: 15px;"  colspan="3"></div>
            </div>
          </div>
          <div  style=" padding: 2px; width:5%;"></div>
          <div class="table" style=" border: 1px solid black; border-top: 1px solid #000; margin-top:2px; width: 202%;">
            <div class="table-row " >
              
              <div class="table-cell"colspan="7" style=" padding: 1px; width:5%;"></div>
             
            </div>
            <div class="table-row " >
              <div class="table-cell">FILTER</div>
              <div class="table-cell"colspan="2">Maker:<span style="color: #5153de;"><?php echo ($keyValue->filter_maker);?></span> </div>
              <div class="table-cell">Replacement:</div>
              <div class="table-cell">Elment,</div>
              <div class="table-cell">A'ssy,</div>
              <div class="table-cell">Auto Drain</div>
            </div>
            <div class="table-row " >
              <div class="table-cell" colspan="4">1)&nbsp;<span style="color: #5153de;"><?php echo ($keyValue->filter_comment_1);?></span></div>
              <?php 
                  
                  if ($keyValue->filter_replacement_1 == 1) {
                    $replacement1 =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->filter_replacement_1 == 2) {
                    $replacement1 =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->filter_replacement_1 == 3) {
                    $replacement1 =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->filter_replacement_1 == 4) {
                    $replacement1 =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->filter_replacement_1 == 5) {
                    $replacement1 =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->filter_replacement_1 == 6) {
                    $replacement1 =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->filter_replacement_1 == 7) {
                    $replacement1 =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } else {
                    // ในกรณีอื่น ๆ ที่ไม่ตรงกับเงื่อนไขข้างต้น
                    $replacement1 =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  }
                              
                  echo $replacement1 ;
                  
                ?>
            </div>
            <div class="table-row " >
              <div class="table-cell" colspan="4">2)&nbsp;<span style="color: #5153de;"><?php echo ($keyValue->filter_comment_2);?></span></div>
              <?php 
                  
                  if ($keyValue->filter_replacement_2 == 1) {
                    $replacement2 =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->filter_replacement_2 == 2) {
                    $replacement2 =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->filter_replacement_2 == 3) {
                    $replacement2 =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->filter_replacement_2 == 4) {
                    $replacement2 =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->filter_replacement_2 == 5) {
                    $replacement2 =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->filter_replacement_2 == 6) {
                    $replacement2 =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->filter_replacement_2 == 7) {
                    $replacement2 =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } else {
                    // ในกรณีอื่น ๆ ที่ไม่ตรงกับเงื่อนไขข้างต้น
                    $replacement2 =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  }
                              
                  echo $replacement2 ;
                  
                ?>
            </div>
            <div class="table-row " >
              <div class="table-cell" colspan="4">3)&nbsp;<span style="color: #5153de;"><?php echo ($keyValue->filter_comment_3);?></span></div>
              <?php 
                  
                  if ($keyValue->filter_replacement_3 == 1) {
                    $replacement3 =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->filter_replacement_3 == 2) {
                    $replacement3 =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->filter_replacement_3 == 3) {
                    $replacement3 =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->filter_replacement_3 == 4) {
                    $replacement3 =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->filter_replacement_3 == 5) {
                    $replacement3 =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->filter_replacement_3 == 6) {
                    $replacement3 =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->filter_replacement_3 == 7) {
                    $replacement3 =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } else {
                    // ในกรณีอื่น ๆ ที่ไม่ตรงกับเงื่อนไขข้างต้น
                    $replacement3 =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  }
                              
                  echo $replacement3 ;
                  
                ?>
           
            </div>
            <div class="table-row " >
              <div class="table-cell" colspan="7"></div>
            </div>
            <?php
                if($keyValue->comment_compressor_normal == 1){

                  $Normal  = $checkbox;
                } else {

                  $Normal  = $uncheckbox;

                }


                if($keyValue->comment_compressor_abnormal == 1){

                  $abnormal  = $checkbox;

                } else {

                  $abnormal  = $uncheckbox;

                }
              ?>

          </div>
          <div  style=" padding: 1px; width:10%;"></div>
          <div class="table" style=" border: 1px solid black; border-top: 1px solid #000; margin-top: 11px; width: 202%;">
         
            <div class="table-row " >
              <div class="table-cell"style=" padding: 5px; width:10%;" colspan="7"></div>
 
            </div>
            <div class="table-row " >
              <div class="table-cell">COMMENTS:</div>
              <div class="table-cell">Air Compressor </div>
              <div class="table-cell"><?php echo ($Normal);?>Normal</div>
              <div class="table-cell"colspan="4"><?php echo ($abnormal);?>Abnormal</div>
 
            </div>
            <div class="table-row " >
              <div class="table-cell" colspan="7"></div>
            </div>
            <div class="table-row " >
              <div class="table-cell" colspan="7">...................................................................................................................................................................................................................................</div>
            </div>
            <div class="table-row " >
              <div class="table-cell" colspan="7"></div>
            </div>
            <div class="table-row " >
              <div class="table-cell" colspan="7">....................................................................................................................................................................................................................................</div>
            </div>
            <div class="table-row " >
              <div class="table-cell" colspan="7"></div>
            </div>
            <div class="table-row " >
              <div class="table-cell" colspan="7">....................................................................................................................................................................................................................................</div>
            </div>
            
          </div>
          <div  style=" padding: 5px; width:10%;"></div>
        </div>
        
        <div  style=" padding: 1px; width:5%;"></div>
        
        <div class="table-cell " style="padding: 1px; width: 40%;">
          <!-- ส่วนบนของช่อง -->
          <div  class="table " style=" border: 1px solid black; border-bottom: 1px solid #000; margin-bottom: 10px;">
            <div class="table-row " >
              <div class="table-cell"  colspan="3">Insulation Test</div>
            </div>
            <div class="table-row " >
              <div class="table-cell"  colspan="3">Main Motor Insulation (M)</div>
            </div>
            <div class="table-row " >
              <div class="table-cell">U1-V1<span style="color: #5153de;"><?php echo ($keyValue->insulation_main_u1v1);?></span>,</div>
              <div class="table-cell">V1-W1<span style="color: #5153de;"><?php echo ($keyValue->insulation_main_v1w1);?></span>,</div>
              <div class="table-cell">W1-U1<span style="color: #5153de;"><?php echo ($keyValue->insulation_main_w1u1);?></span></div>
            </div>
            <div class="table-row">
              <div class="table-cell">(U1-U2) <span style="color: #5153de;"><?php echo ($keyValue->insulation_main_u1u2);?></span>,</div>
              <div class="table-cell">(V1-V2) <span style="color: #5153de;"><?php echo ($keyValue->insulation_main_v1v2);?></span>,</div>
              <div class="table-cell">(W1-W2) <span style="color: #5153de;"><?php echo ($keyValue->insulation_main_w1w2);?></span></div>
            </div>
           
            <div class="table-row">
              <div class="table-cell">U1-E <span style="color: #5153de;"><?php echo ($keyValue->insulation_main_u1e);?></span>,</div>
              <div class="table-cell">&nbsp;&nbsp;W1-E&nbsp;<span style="color: #5153de;"><?php echo ($keyValue->insulation_main_v1e);?></span>,</div>
              <div class="table-cell">V1-E&nbsp;<span style="color: #5153de;"><?php echo ($keyValue->insulation_main_w1e);?></span>,</div>
            </div>

            <div class="table-row " >
              <div class="table-cell"  colspan="3">Fan Motor Insulation(M)</div>
            </div>
          
            <div class="table-row">
              <div class="table-cell">(U-V) <span style="color: #5153de;"><?php echo ($keyValue->insulation_fan_u1v1);?></span>,</div>
              <div class="table-cell">(V-W) <span style="color: #5153de;"><?php echo ($keyValue->insulation_fan_v1w1);?></span>,</div>
              <div class="table-cell">(W-U) <span style="color: #5153de;"><?php echo ($keyValue->insulation_fan_w1u1);?></span></div>
            </div>
        
            <div class="table-row">
              <div class="table-cell">U-E <span style="color: #5153de;"><?php echo ($keyValue->insulation_fan_u1e);?></span></div>
              <div class="table-cell">V-E <span style="color: #5153de;"><?php echo ($keyValue->insulation_fan_u1e);?></span></div>
              <div class="table-cell">W-E <span style="color: #5153de;"><?php echo ($keyValue->insulation_fan_w1e);?></span></div>
            </div>
            <div class="table-row " >
              <div class="table-cell"  colspan="3">Remark: With () mark tobe nearly 0  in good condition</div>
            </div>

            <div class="table-row " >
              <div class="table-cell"  style=" padding: 5px;"  colspan="3"></div>
            </div>
          </div>


         
          <!-- ส่วนล่างของช่อง -->
          <div class="table" style=" border: 1px solid black; border-top: 1px solid #000; margin-top: 17px;">

          <?php
            $dryer_type = $keyValue->dryer_type;

            switch ($dryer_type) {
                case 1:
                    $showtype1 = $radio;
                    $showtype2 = $unradio;
                   
                    break;
                case 2:
                    $showtype1 = $unradio;
                    $showtype2 = $radio;
                    
                    break;

                default:
                    $showtype1 = $unradio;
                    $showtype2 = $unradio;
                  
                    break;
            }
          ?>

         
            <div class="table-row " >
              
              <div class="table-cell"  colspan="3">Air Dryer</div>
            </div>
            <div class="table-row " >
              <div class="table-cell">Type:</div>
              <div class="table-cell"><?php echo ($showtype1);?>Refrierator,</div>
              <div class="table-cell"><?php echo ($showtype2);?>Other,</div>
            </div>
            <div class="table-row " >
              <div class="table-cell">Maker:&nbsp;</div>
              <div class="table-cell" colspan="2"><span style="color: #5153de;"><?php echo ($keyValue->dryer_maker);?></span></div>
             
            </div>
            <div class="table-row " >
              <div class="table-cell">Model Number:&nbsp;</div>
              <div class="table-cell" colspan="2"><span style="color: #5153de;"><?php echo ($keyValue->dryer_model);?></span></div>
            </div>
            <div class="table-row " >
              <div class="table-cell">S/N:&nbsp;</div>
              <div class="table-cell" colspan="2"><span style="color: #5153de;"><?php echo ($keyValue->dryer_sn);?></span></div>
       
            </div>
            <div class="table-row " >
              <div class="table-cell">Dew Point:&nbsp;</div>
              <div class="table-cell" colspan="2"><span style="color: #5153de;"><?php echo ($keyValue->dryer_dew);?></span></div>
            </div>
            <div class="table-row "  >
              <div class="table-cell">Inlet Pressure:&nbsp;</div>
              <div class="table-cell" colspan="2"><span style="color: #5153de;"><?php echo ($keyValue->dryer_inlet);?></span></div>
            </div>
            <div class="table-row " >
     
              <div class="table-cell" colspan="3" style=" padding: 8px;"  ></div>
             
            </div>
          </div>
        </div>
      
        
        <div  style=" padding: 1px; width:5%;"></div>


        <div class="table-cell " style="padding: 1px; width: 40%;">
          <!-- ส่วนบนของช่อง -->
          <div  class="table " style=" border: 1px solid black; border-bottom: 1px solid #000; margin-bottom:3px;">
            <div class="table-row " >
              <div class="table-cell"  colspan="4">MAINTNCE</div>
            </div>
            <div class="table-row " >
              <div class="table-cell">ITEMS</div>
              <div class="table-cell">Check</div>
              <div class="table-cell">Service</div>
              <div class="table-cell">Replace</div>
            </div>
            <div class="table-row " >
              <div class="table-cell">SUCTION AIR FIL TER</div>
              <?php 
              
                if ($keyValue->maint_suction == 1) {
                  $showSuction ='<div class="table-cell">' . $checkbox . '</div>' .
                                '<div class="table-cell">' . $uncheckbox . '</div>' .
                                '<div class="table-cell">' . $uncheckbox . '</div>';
                } elseif ($keyValue->maint_suction == 2) {
                  $showSuction ='<div class="table-cell">' . $uncheckbox . '</div>' .
                                '<div class="table-cell">' . $checkbox . '</div>' .
                                '<div class="table-cell">' . $uncheckbox . '</div>';
                } elseif ($keyValue->maint_suction == 3) {
                  $showSuction ='<div class="table-cell">' . $checkbox . '</div>' .
                                '<div class="table-cell">' . $checkbox . '</div>' .
                                '<div class="table-cell">' . $uncheckbox . '</div>';
                } elseif ($keyValue->maint_suction == 4) {
                  $showSuction ='<div class="table-cell">' . $uncheckbox . '</div>' .
                                '<div class="table-cell">' . $uncheckbox . '</div>' .
                                '<div class="table-cell">' . $checkbox . '</div>';
                } elseif ($keyValue->maint_suction == 5) {
                  $showSuction ='<div class="table-cell">' . $checkbox . '</div>' .
                                '<div class="table-cell">' . $uncheckbox . '</div>' .
                                '<div class="table-cell">' . $checkbox . '</div>';
                } elseif ($keyValue->maint_suction == 6) {
                  $showSuction ='<div class="table-cell">' . $uncheckbox . '</div>' .
                                '<div class="table-cell">' . $checkbox . '</div>' .
                                '<div class="table-cell">' . $checkbox . '</div>';
                } elseif ($keyValue->maint_suction == 7) {
                  $showSuction ='<div class="table-cell">' . $checkbox . '</div>' .
                                '<div class="table-cell">' . $checkbox . '</div>' .
                                '<div class="table-cell">' . $checkbox . '</div>';
                } else {
                  $showSuction ='<div class="table-cell">' . $uncheckbox . '</div>' .
                                '<div class="table-cell">' . $uncheckbox . '</div>' .
                                '<div class="table-cell">' . $uncheckbox . '</div>';
                }
              
              echo $showSuction; ?>
            </div>
            <div class="table-row">
              <div class="table-cell">OIL FIL TER</div>
              <?php 
    
                if ($keyValue->maint_oilfiter == 1) {
                  $showOilFilter =  '<div class="table-cell">' . $checkbox . '</div>' .
                                    '<div class="table-cell">' . $uncheckbox . '</div>' .
                                    '<div class="table-cell">' . $uncheckbox . '</div>';
                } elseif ($keyValue->maint_oilfiter == 2) {
                  $showOilFilter =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                    '<div class="table-cell">' . $checkbox . '</div>' .
                                    '<div class="table-cell">' . $uncheckbox . '</div>';
                } elseif ($keyValue->maint_oilfiter == 3) {
                  $showOilFilter =  '<div class="table-cell">' . $checkbox . '</div>' .
                                    '<div class="table-cell">' . $checkbox . '</div>' .
                                    '<div class="table-cell">' . $uncheckbox . '</div>';
                } elseif ($keyValue->maint_oilfiter == 4) {
                  $showOilFilter =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                    '<div class="table-cell">' . $uncheckbox . '</div>' .
                                    '<div class="table-cell">' . $checkbox . '</div>';
                } elseif ($keyValue->maint_oilfiter == 5) {
                  $showOilFilter =  '<div class="table-cell">' . $checkbox . '</div>' .
                                    '<div class="table-cell">' . $uncheckbox . '</div>' .
                                    '<div class="table-cell">' . $checkbox . '</div>';
                } elseif ($keyValue->maint_oilfiter == 6) {
                  $showOilFilter =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                    '<div class="table-cell">' . $checkbox . '</div>' .
                                    '<div class="table-cell">' . $checkbox . '</div>';
                } elseif ($keyValue->maint_oilfiter == 7) {
                  $showOilFilter =  '<div class="table-cell">' . $checkbox . '</div>' .
                                    '<div class="table-cell">' . $checkbox . '</div>' .
                                    '<div class="table-cell">' . $checkbox . '</div>';
                } else {
                  // ในกรณีอื่น ๆ ที่ไม่ตรงกับเงื่อนไขข้างต้น
                  $showOilFilter =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                    '<div class="table-cell">' . $uncheckbox . '</div>' .
                                    '<div class="table-cell">' . $uncheckbox . '</div>';
                }
                            
              echo $showOilFilter ;?>
            </div>
       
           
            <div class="table-row">
              <div class="table-cell">OIL SEPARATOR ELEMENT</div>
              <?php 
    
                if ($keyValue->maint_oilseparator == 1) {
                  $showSeparator =  '<div class="table-cell">' . $checkbox . '</div>' .
                                    '<div class="table-cell">' . $uncheckbox . '</div>' .
                                    '<div class="table-cell">' . $uncheckbox . '</div>';
                } elseif ($keyValue->maint_oilseparator == 2) {
                  $showSeparator =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                    '<div class="table-cell">' . $checkbox . '</div>' .
                                    '<div class="table-cell">' . $uncheckbox . '</div>';
                } elseif ($keyValue->maint_oilseparator == 3) {
                  $showSeparator =  '<div class="table-cell">' . $checkbox . '</div>' .
                                    '<div class="table-cell">' . $checkbox . '</div>' .
                                    '<div class="table-cell">' . $uncheckbox . '</div>';
                } elseif ($keyValue->maint_oilseparator == 4) {
                  $showSeparator =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                    '<div class="table-cell">' . $uncheckbox . '</div>' .
                                    '<div class="table-cell">' . $checkbox . '</div>';
                } elseif ($keyValue->maint_oilseparator == 5) {
                  $showSeparator =  '<div class="table-cell">' . $checkbox . '</div>' .
                                    '<div class="table-cell">' . $uncheckbox . '</div>' .
                                    '<div class="table-cell">' . $checkbox . '</div>';
                } elseif ($keyValue->maint_oilseparator == 6) {
                  $showSeparator =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                    '<div class="table-cell">' . $checkbox . '</div>' .
                                    '<div class="table-cell">' . $checkbox . '</div>';
                } elseif ($keyValue->maint_oilseparator == 7) {
                  $showSeparator =  '<div class="table-cell">' . $checkbox . '</div>' .
                                    '<div class="table-cell">' . $checkbox . '</div>' .
                                    '<div class="table-cell">' . $checkbox . '</div>';
                } else {
                  // ในกรณีอื่น ๆ ที่ไม่ตรงกับเงื่อนไขข้างต้น
                  $showSeparator =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                    '<div class="table-cell">' . $uncheckbox . '</div>' .
                                    '<div class="table-cell">' . $uncheckbox . '</div>';
                }
                            
                echo $showSeparator ;
              ?>
            </div>

            <div class="table-row " >
              <div class="table-cell">OIL</div>
              <?php 
    
                if ($keyValue->maint_oil == 1) {
                  $showOil =  '<div class="table-cell">' . $checkbox . '</div>' .
                                    '<div class="table-cell">' . $uncheckbox . '</div>' .
                                    '<div class="table-cell">' . $uncheckbox . '</div>';
                } elseif ($keyValue->maint_oil == 2) {
                  $showOil =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                    '<div class="table-cell">' . $checkbox . '</div>' .
                                    '<div class="table-cell">' . $uncheckbox . '</div>';
                } elseif ($keyValue->maint_oil == 3) {
                  $showOil =  '<div class="table-cell">' . $checkbox . '</div>' .
                                    '<div class="table-cell">' . $checkbox . '</div>' .
                                    '<div class="table-cell">' . $uncheckbox . '</div>';
                } elseif ($keyValue->maint_oil == 4) {
                  $showOil =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                    '<div class="table-cell">' . $uncheckbox . '</div>' .
                                    '<div class="table-cell">' . $checkbox . '</div>';
                } elseif ($keyValue->maint_oil == 5) {
                  $showOil =  '<div class="table-cell">' . $checkbox . '</div>' .
                                    '<div class="table-cell">' . $uncheckbox . '</div>' .
                                    '<div class="table-cell">' . $checkbox . '</div>';
                } elseif ($keyValue->maint_oil == 6) {
                  $showOil =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                    '<div class="table-cell">' . $checkbox . '</div>' .
                                    '<div class="table-cell">' . $checkbox . '</div>';
                } elseif ($keyValue->maint_oil == 7) {
                  $showOil =  '<div class="table-cell">' . $checkbox . '</div>' .
                                    '<div class="table-cell">' . $checkbox . '</div>' .
                                    '<div class="table-cell">' . $checkbox . '</div>';
                } else {
                  // ในกรณีอื่น ๆ ที่ไม่ตรงกับเงื่อนไขข้างต้น
                  $showOil =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                    '<div class="table-cell">' . $uncheckbox . '</div>' .
                                    '<div class="table-cell">' . $uncheckbox . '</div>';
                }
                            
                echo $showOil ;
                
              ?>
            </div>
          
            <div class="table-row">
              <div class="table-cell">DRAIN SEPARATOR</div>
              <?php 
    
                  if ($keyValue->maint_drainseparator == 1) {
                    $showDrainseparator =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_drainseparator == 2) {
                    $showDrainseparator =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_drainseparator == 3) {
                    $showDrainseparator =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_drainseparator == 4) {
                    $showDrainseparator =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_drainseparator == 5) {
                    $showDrainseparator =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_drainseparator == 6) {
                    $showDrainseparator =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_drainseparator == 7) {
                    $showDrainseparator =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } else {
                    // ในกรณีอื่น ๆ ที่ไม่ตรงกับเงื่อนไขข้างต้น
                    $showDrainseparator =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  }
                              
                  echo $showDrainseparator; 
                  
                ?>
            </div>
        
            <div class="table-row">
              <div class="table-cell">MOTOR GREASE</div>
              <?php 
    
                  if ($keyValue->maint_motorgrease == 1) {
                    $showMotor =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_motorgrease == 2) {
                    $showMotor =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_motorgrease == 3) {
                    $showMotor =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_motorgrease == 4) {
                    $showMotor =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_motorgrease == 5) {
                    $showMotor =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_motorgrease == 6) {
                    $showMotor =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_motorgrease == 7) {
                    $showMotor =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } else {
                    // ในกรณีอื่น ๆ ที่ไม่ตรงกับเงื่อนไขข้างต้น
                    $showMotor =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  }
                              
                  echo $showMotor ;
                  
                ?>
            </div>
            <div class="table-row " >
              <div class="table-cell">*AUTO BLOW OFF SYSTEM</div>
              <?php 
    
                  if ($keyValue->maint_autoblowoff == 1) {
                    $showMotor =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_autoblowoff == 2) {
                    $showMotor =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_motorgrease == 3) {
                    $showMotor =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_motorgrease == 4) {
                    $showMotor =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_motorgrease == 5) {
                    $showMotor =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_motorgrease == 6) {
                    $showMotor =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_motorgrease == 7) {
                    $showMotor =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } else {
                    // ในกรณีอื่น ๆ ที่ไม่ตรงกับเงื่อนไขข้างต้น
                    $showMotor =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  }
                              
                  echo $showMotor ;
                  
                ?>
            </div>
            <div class="table-row " >
              <div class="table-cell">CAPACITY CONTROL VALVE</div>
              <?php 
    
                  if ($keyValue->maint_capacityvav == 1) {
                    $showCapacityvav =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_capacityvav == 2) {
                    $showCapacityvav =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_capacityvav == 3) {
                    $showCapacityvav =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_capacityvav == 4) {
                    $showCapacityvav =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_capacityvav == 5) {
                    $showCapacityvav =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_capacityvav == 6) {
                    $showCapacityvav =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_capacityvav == 7) {
                    $showCapacityvav =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } else {
                    // ในกรณีอื่น ๆ ที่ไม่ตรงกับเงื่อนไขข้างต้น
                    $showCapacityvav =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  }
                              
                  echo $showCapacityvav ;
                  
                ?>
            </div>

            <div class="table-row " >
              <div class="table-cell">PRESSURE CONTROL VALVE</div>
              <?php 
    
                  if ($keyValue->maint_presscontvav == 1) {
                    $showPresscontvav =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_presscontvav == 2) {
                    $showPresscontvav =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_presscontvav == 3) {
                    $showPresscontvav =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_presscontvav == 4) {
                    $showPresscontvav =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_presscontvav == 5) {
                    $showPresscontvav =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_presscontvav == 6) {
                    $showPresscontvav =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_presscontvav == 7) {
                    $showPresscontvav =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } else {
                    // ในกรณีอื่น ๆ ที่ไม่ตรงกับเงื่อนไขข้างต้น
                    $showPresscontvav =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  }
                              
                  echo $showPresscontvav ;
                  
                ?>
            </div>
            <div class="table-row " >
              <div class="table-cell">*PRESURE KEEP VALVE</div>
              <?php 
                  
                  if ($keyValue->maint_presskeepvav == 1) {
                    $showPresskeepvav =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_presskeepvav == 2) {
                    $showPresskeepvav =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_presskeepvav == 3) {
                    $showPresskeepvav =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_presskeepvav == 4) {
                    $showPresskeepvav =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_presskeepvav == 5) {
                    $showPresskeepvav =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_presskeepvav == 6) {
                    $showPresskeepvav =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_presskeepvav == 7) {
                    $showPresskeepvav =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } else {
                    // ในกรณีอื่น ๆ ที่ไม่ตรงกับเงื่อนไขข้างต้น
                    $showPresskeepvav =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  }
                              
                  echo $showPresskeepvav ;
                  
                ?>
            </div>
            <div class="table-row " >
              <div class="table-cell">AUTO THERMO VALVE</div>
              <?php 
                  
                  if ($keyValue->maint_thermovav == 1) {
                    $showThermovav =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_thermovav == 2) {
                    $showThermovav =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_thermovav == 3) {
                    $showThermovav =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_thermovav == 4) {
                    $showThermovav =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_thermovav == 5) {
                    $showThermovav =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_thermovav == 6) {
                    $showThermovav =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_thermovav == 7) {
                    $showThermovav =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } else {
                    // ในกรณีอื่น ๆ ที่ไม่ตรงกับเงื่อนไขข้างต้น
                    $showThermovav =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  }
                              
                  echo $showThermovav ;
                  
                ?>
            </div>
            <div class="table-row " >
              <div class="table-cell">OIL LEVEL GAUGES</div>
              <?php 
                  
                  if ($keyValue->maint_oillevel == 1) {
                    $showOillevel =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_oillevel == 2) {
                    $showOillevel =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_oillevel == 3) {
                    $showOillevel =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_oillevel == 4) {
                    $showOillevel =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_oillevel == 5) {
                    $showOillevel =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_oillevel == 6) {
                    $showOillevel =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_oillevel == 7) {
                    $showOillevel =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } else {
                    // ในกรณีอื่น ๆ ที่ไม่ตรงกับเงื่อนไขข้างต้น
                    $showOillevel =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  }
                              
                  echo $showOillevel ;
                  
                ?>
            </div>
            <div class="table-row " >
              <div class="table-cell">OIL RECOVERY SYSTEM</div>
              <?php 
                  
                  if ($keyValue->maint_oilrecovery == 1) {
                    $showOilrecovery =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_oilrecovery == 2) {
                    $showOilrecovery =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_oilrecovery == 3) {
                    $showOilrecovery =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_oilrecovery == 4) {
                    $showOilrecovery =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_oilrecovery == 5) {
                    $showOilrecovery =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_oilrecovery == 6) {
                    $showOilrecovery =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_oilrecovery == 7) {
                    $showOilrecovery =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } else {
                    // ในกรณีอื่น ๆ ที่ไม่ตรงกับเงื่อนไขข้างต้น
                    $showOilrecovery =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  }
                              
                  echo $showOilrecovery ;
                  
                ?>
            </div>
            <div class="table-row " >
              <div class="table-cell">Belt/V-Belt</div>
              <?php 
                  
                  if ($keyValue->maint_belt == 1) {
                    $showBelt =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_belt == 2) {
                    $showBelt =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_belt == 3) {
                    $showBelt =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_belt == 4) {
                    $showBelt =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_belt == 5) {
                    $showBelt =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_belt == 6) {
                    $showBelt =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_belt == 7) {
                    $showBelt =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } else {
                    // ในกรณีอื่น ๆ ที่ไม่ตรงกับเงื่อนไขข้างต้น
                    $showBelt =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  }
                              
                  echo $showBelt ;
                  
                ?>
            </div>
            <div class="table-row " >
              <div class="table-cell">**AFTER COOLER</div>
              <?php 
                  
                  if ($keyValue->maint_aftercooler == 1) {
                    $showAftercooler =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_aftercooler == 2) {
                    $showAftercooler =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_aftercooler == 3) {
                    $showAftercooler =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_aftercooler == 4) {
                    $showAftercooler =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_aftercooler == 5) {
                    $showAftercooler =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_aftercooler == 6) {
                    $showAftercooler =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_aftercooler == 7) {
                    $showAftercooler =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } else {
                    // ในกรณีอื่น ๆ ที่ไม่ตรงกับเงื่อนไขข้างต้น
                    $showAftercooler =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  }
                              
                  echo $showAftercooler ;
                  
                ?>
            </div>
            <div class="table-row " >
              <div class="table-cell">*OIL COOLER</div>
              <?php 
                  
                  if ($keyValue->maint_oilcooler == 1) {
                    $showOilcooler =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_oilcooler == 2) {
                    $showOilcooler =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_oilcooler == 3) {
                    $showOilcooler =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_oilcooler == 4) {
                    $showOilcooler =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_oilcooler == 5) {
                    $showOilcooler =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_oilcooler == 6) {
                    $showOilcooler =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_oilcooler == 7) {
                    $showOilcooler =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } else {
                    // ในกรณีอื่น ๆ ที่ไม่ตรงกับเงื่อนไขข้างต้น
                    $showOilcooler =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  }
                              
                  echo $showOilcooler ;
                  
                ?>
            </div>
            <div class="table-row " >
              <div class="table-cell">MAIN MOTOR</div>
              <?php 
                  
                  if ($keyValue->maint_mainmotor == 1) {
                    $showMainmotor =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_mainmotor == 2) {
                    $showMainmotor =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_mainmotor == 3) {
                    $showMainmotor =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_mainmotor == 4) {
                    $showMainmotor =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_mainmotor == 5) {
                    $showMainmotor =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_mainmotor == 6) {
                    $showMainmotor =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_mainmotor == 7) {
                    $showMainmotor =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } else {
                    // ในกรณีอื่น ๆ ที่ไม่ตรงกับเงื่อนไขข้างต้น
                    $showMainmotor =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  }
                              
                  echo $showMainmotor ;
                  
                ?>
            </div>
            <div class="table-row " >
              <div class="table-cell">MECHNICAL / OIL SEAL</div>
              <?php 
                  
                  if ($keyValue->maint_mecoilseal == 1) {
                    $showMecoilseal =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_mecoilseal == 2) {
                    $showMecoilseal =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_mecoilseal == 3) {
                    $showMecoilseal =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_mecoilseal == 4) {
                    $showMecoilseal =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_mecoilseal == 5) {
                    $showMecoilseal =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_mecoilseal == 6) {
                    $showMecoilseal =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_mecoilseal == 7) {
                    $showMecoilseal =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } else {
                    // ในกรณีอื่น ๆ ที่ไม่ตรงกับเงื่อนไขข้างต้น
                    $showMecoilseal =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  }
                              
                  echo $showMecoilseal ;
                  
                ?>
            </div>
            <div class="table-row " >
              <div class="table-cell">FAN & FAN MOTOR</div>
              <?php 
                  
                  if ($keyValue->maint_fanmotor == 1) {
                    $showFanmotor =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_fanmotor == 2) {
                    $showFanmotor =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_fanmotor == 3) {
                    $showFanmotor =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_fanmotor == 4) {
                    $showFanmotor =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_fanmotor == 5) {
                    $showFanmotor =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_fanmotor == 6) {
                    $showFanmotor =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_fanmotor == 7) {
                    $showFanmotor =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } else {
                    // ในกรณีอื่น ๆ ที่ไม่ตรงกับเงื่อนไขข้างต้น
                    $showFanmotor =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  }
                              
                  echo $showFanmotor ;
                  
                ?>
            </div>
            <div class="table-row " >
              <div class="table-cell">AIR END</div>
              <?php 
                  
                  if ($keyValue->maint_airend == 1) {
                    $showAirend =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_airend == 2) {
                    $showAirend =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_airend == 3) {
                    $showAirend =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_airend == 4) {
                    $showAirend =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_airend == 5) {
                    $showAirend =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_airend == 6) {
                    $showAirend =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_airend == 7) {
                    $showAirend =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } else {
                    // ในกรณีอื่น ๆ ที่ไม่ตรงกับเงื่อนไขข้างต้น
                    $showAirend =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  }
                              
                  echo $showAirend ;
                  
                ?>
            </div>

            <div class="table-row " >
              <div class="table-cell">BEARING (AIR END)</div>
              <?php 
                  
                  if ($keyValue->maint_bearingair == 1) {
                    $showBearingair =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_bearingair == 2) {
                    $showBearingair =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_bearingair == 3) {
                    $showBearingair =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_bearingair == 4) {
                    $showBearingair =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_bearingair == 5) {
                    $showBearingair =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_bearingair == 6) {
                    $showBearingair =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_bearingair == 7) {
                    $showBearingair =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } else {
                    // ในกรณีอื่น ๆ ที่ไม่ตรงกับเงื่อนไขข้างต้น
                    $showBearingair =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  }
                              
                  echo $showBearingair ;
                  
                ?>
            </div>

            <div class="table-row " >
              <div class="table-cell">BEARING (MOTOR)</div>
              <?php 
                  
                  if ($keyValue->maint_gauge == 1) {
                    $showBearingmotor =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_gauge == 2) {
                    $showBearingmotor =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_gauge == 3) {
                    $showBearingmotor =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_gauge == 4) {
                    $showBearingmotor =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_gauge == 5) {
                    $showBearingmotor =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_gauge == 6) {
                    $showBearingmotor =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_gauge == 7) {
                    $showBearingmotor =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } else {
                    // ในกรณีอื่น ๆ ที่ไม่ตรงกับเงื่อนไขข้างต้น
                    $showBearingmotor =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  }
                              
                  echo $showBearingmotor ;
                  
                ?>
            </div>

            <div class="table-row " >
              <div class="table-cell">GAUGE, LIGHT, MONITOR</div>
              
                 <?php 
                  
                  if ($keyValue->maint_bearingmotor == 1) {
                    $showGauge =  '<div class="table-cell">' . $checkbox . '</div>' .
                                  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                  '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_bearingmotor == 2) {
                    $showGauge =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                  '<div class="table-cell">' . $checkbox . '</div>' .
                                  '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_bearingmotor == 3) {
                    $showGauge =  '<div class="table-cell">' . $checkbox . '</div>' .
                                  '<div class="table-cell">' . $checkbox . '</div>' .
                                  '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_bearingmotor == 4) {
                    $showGauge =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_bearingmotor == 5) {
                    $showGauge =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_bearingmotor == 6) {
                    $showGauge =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_bearingmotor == 7) {
                    $showGauge =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } else {
                    // ในกรณีอื่น ๆ ที่ไม่ตรงกับเงื่อนไขข้างต้น
                    $showGauge =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  }
                              
                  echo $showGauge ;
                  
                ?>
            </div>
            <div class="table-row " >
              <div class="table-cell">*MAGNETIC CONTACTOR</div>
           
              <?php 
                  
                  if ($keyValue->maint_magnetic == 1) {
                    $showMagnetic =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_magnetic == 2) {
                    $showMagnetic =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_magnetic == 3) {
                    $showMagnetic =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_magnetic == 4) {
                    $showMagnetic =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_magnetic == 5) {
                    $showMagnetic =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_magnetic == 6) {
                    $showMagnetic =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_magnetic == 7) {
                    $showMagnetic =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } else {
                    // ในกรณีอื่น ๆ ที่ไม่ตรงกับเงื่อนไขข้างต้น
                    $showMagnetic =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  }
                              
                  echo $showMagnetic ;
                  
                ?>
            </div>
            <div class="table-row " >
              <div class="table-cell">SENSOR</div>
              <?php 
                  
                  if ($keyValue->maint_sensor == 1) {
                    $showSensor =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_sensor == 2) {
                    $showSensor =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_sensor == 3) {
                    $showSensor =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_sensor == 4) {
                    $showSensor =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_sensor == 5) {
                    $showSensor =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_sensor == 6) {
                    $showSensor =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_sensor == 7) {
                    $showSensor =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } else {
                    // ในกรณีอื่น ๆ ที่ไม่ตรงกับเงื่อนไขข้างต้น
                    $showSensor =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  }
                              
                  echo $showSensor ;
                  
                ?>
            </div>
            <div class="table-row " >
              <div class="table-cell">MAIN INVERTER</div>
              <?php 
                  
                  if ($keyValue->maint_maininv == 1) {
                    $showMaininv =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_maininv == 2) {
                    $showMaininv =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_maininv == 3) {
                    $showMaininv =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_maininv == 4) {
                    $showMaininv =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_maininv == 5) {
                    $showMaininv =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_maininv == 6) {
                    $showMaininv =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_maininv == 7) {
                    $showMaininv =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } else {
                    // ในกรณีอื่น ๆ ที่ไม่ตรงกับเงื่อนไขข้างต้น
                    $showMaininv =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  }
                              
                  echo $showMaininv ;
                  
                ?>
            </div>
            <div class="table-row " >
              <div class="table-cell">FAN INVERTER</div>
              <?php 
                  
                  if ($keyValue->maint_faninv == 1) {
                    $showFaninv =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_faninv == 2) {
                    $showFaninv =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_faninv == 3) {
                    $showFaninv =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_faninv == 4) {
                    $showFaninv =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_faninv == 5) {
                    $showFaninv =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_faninv == 6) {
                    $showFaninv =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_faninv == 7) {
                    $showFaninv =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } else {
                    // ในกรณีอื่น ๆ ที่ไม่ตรงกับเงื่อนไขข้างต้น
                    $showFaninv =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  }
                              
                  echo $showFaninv ;
                  
                ?>
            </div>
            <div class="table-row " >
              <div class="table-cell">CHECK FOR LEAKAGE (aIR/OIL/WATER)</div>
              <?php 
                  
                  if ($keyValue->maint_leakage == 1) {
                    $showLeakage =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_leakage == 2) {
                    $showLeakage =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_leakage == 3) {
                    $showLeakage =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  } elseif ($keyValue->maint_leakage == 4) {
                    $showLeakage =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_leakage == 5) {
                    $showLeakage =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_leakage == 6) {
                    $showLeakage =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } elseif ($keyValue->maint_leakage == 7) {
                    $showLeakage =  '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>' .
                                      '<div class="table-cell">' . $checkbox . '</div>';
                  } else {
                    // ในกรณีอื่น ๆ ที่ไม่ตรงกับเงื่อนไขข้างต้น
                    $showLeakage =  '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>' .
                                      '<div class="table-cell">' . $uncheckbox . '</div>';
                  }
                              
                  echo $showLeakage ;
                  
                ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>
 
  <div class="table" style="font-size: 7px; width: 100%;">
    <div style="text-align: right; white-space: nowrap;">
        *: Can be done when machine stops, **:Only for air cooled
    </div>
  </div>

  <div class="table" >
    <div class="table-row">
      <div class="table-cell " style="padding: 1px; width: 50%;">
        <!-- ส่วนบนของช่อง -->
        <div  class="table " style=" border: 1px solid black; border-bottom: 1px solid #000; ">
          <div class="table-cell"   style="text-align: center;" colspan="4">Serviced By</div>
          <div class="table-row " >
            <div class="table-cell"colspan="4" ></div>
          </div>
          <div class="table-row " >
            <div class="table-cell" colspan="4"></div>
          </div>
          <div class="table-row " >
            <div class="table-cell" colspan="4"></div>
          </div>
          <div class="table-row " >
            <div class="table-cell" colspan="4"></div>
          </div>
          <div class="table-row " >
            <div class="table-cell" colspan="4"></div>
          </div>
          <div class="table-row " >
            <div class="table-cell" colspan="4"></div>
          </div>
        </div>
      </div>
        
        
      <div  style=" padding:3px; width:10%;">  </div>
      
      <div class="table-cell " style="padding: 1px; width: 50%;">
        <!-- ส่วนบนของช่อง -->
        <div  class="table " style=" border: 1px solid black; border-bottom: 1px solid #000; ">
          <div class="table-cell"  style="text-align: center;" colspan="4">Accepted by Customer</div>
          <div class="table-row " >
            <div class="table-cell" colspan="4"></div>
          </div>
          <div class="table-row " >
            <div class="table-cell" colspan="4"></div>
          </div>
          <div class="table-row " >
            <div class="table-cell" colspan="4"></div>
          </div>
          <div class="table-row " >
            <div class="table-cell" colspan="4"></div>
          </div>
          <div class="table-row " >
            <div class="table-cell" colspan="4"></div>
          </div>
          <div class="table-row " >
            <div class="table-cell" colspan="4"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
    
  </body>
</html>
