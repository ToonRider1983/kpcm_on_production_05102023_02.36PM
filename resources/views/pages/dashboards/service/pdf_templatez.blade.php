
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
    font-size: 9px;
    vertical-align: top;
    padding: 3px;
  }
  .table-head {
    display: table-cell;
    font-size: 10px;
    padding: 3px;
  }
  .table-inline {
    display: flex; 
    justify-content: space-between;
    font-size: 10px;
    padding: 3px;
  }

  .left-cell {
    padding: 4px;
    border: 1px solid black;
    width: 60%;
    padding-right: 10px; /* ช่องว่างทางขวาของช่องซ้าย */
  }

  .right-cell {
    padding: 4px;
    border: 1px solid black;
    width: 40%;
    padding-left: 10px; /* ช่องว่างทางซ้ายของช่องขวา */
  }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<!-- <img src="C:\xampp\htdocs\Kobelco_Service\Kobelco_Service\Kobelco_frontend-MrLAsr\public\assets\img\kobelco_100x21_blue.png"; -->
<img src="/assets/img/kobelco_100x21_blue.png";

<body>
    <div class="">
      <div>
        <p class="fw-bold centered-text">OIL FREE COMPRESSOR SERVICE REPORT</p>
      </div>
    </div>
    <div class="row">
      <div class="table">
        <div class="table-row">
          <div class="table-cell left-cell">
            <div>1. Customer's Name: ................................................................................................................................</div>
            <div>2. Address: ...............................................................................................................................................</div>
            <div>...................................................................................................................................................................</div>
            <div>...................................................................................................................................................................</div>
          </div>
          <div  style=" padding: 2px; width:10%;">
          
          </div>
          <div class="table-cell right-cell">
            <!-- เนื้อหาเซลล์ฝั่งขวา -->
          </div>
        </div>
      </div>
    </div>

    <div  style=" padding: 2px; width:10%;"></div>
   
    <div class="table" style=" border: 1px solid black;width: 100%;">
      <div class="table-row " >
        <div class="table-head">MACHINE DATA</div>
        <div class="table-cell">4. Model:  ........................................</div>
        <div class="table-cell">5. Serial: ......................................</div>
        <div class="table-cell">6. O.NO.:  .....................................</div>
      </div>
      <div class="table-row " >
        <div class="table-cell"></div>
        <div class="table-cell">7. Year of Manufacture: ..................</div>
        <div class="table-cell">8. MC No. in Customer:  ...............</div>
        <div class="table-cell">9. Comm' Date:  ...........................</div>
      </div>
    </div>

    <div  style=" padding: 2px; width:10%;"></div>

    <div class="table" style=" border: 1px solid black;width: 100%;">
      <div class="table-row " >
          <div class="table-head">SITE CONDITION &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
          <div class="table-cell" >10. Ventilation: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Good,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Fair,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Not Good,</div>
          <div class="table-cell">11. Room Temp.:  ............................................&#8451;</div>
          <div class="table-cell"></div>
      </div>
      <div class="table-row " >
          
          <div class="table-cell"></div>
          <div class="table-cell">12. Cooling Water:&nbsp;&nbsp;&nbsp;&nbsp; ......... Temp.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;............................../................................&#8451;,</div>
          <div class="table-cell">Pressure............./.............. (In / Out)</div>
          <div class="table-cell"></div>
      </div>
    </div>

    <div  style=" padding: 2px; width:10%;"></div>

    <div class="table" style=" border: 1px solid black;width: 100%;">

      <div class="table-row">
        <div class="table-head">SERVICE CONTENT</div>
        <div class="table-cell">13. Prtrol Service / cleanup  </div>
        <div class="table-cell">14. Annual Inspection / Parts Change </div>
        <div class="table-cell">15. Repair </div>
        <div class="table-cell">16. Overhaul  </div>
      </div>
      <div class="table-row " >
         
          <div class="table-cell"></div>
          <div class="table-cell">17. Commissioning </div>
          <div class="table-cell">18. Warranty Claim Related  </div>
          <div class="table-cell">19. Emergency Call / Checkup </div>
          <div class="table-cell">20. Others / etc.</div>
      </div>
    </div>

    <div  style=" padding: 2px; width:10%;"></div>

    <div class="table" style=" border: 1px solid black;width: 100%;">
      <div class="table-row " >
        <div class="table-head">SERVICE CONTENT(DETAIL)</div>
        <div class="table-cell"></div>
        <div class="table-cell"></div>
        <div class="table-cell"></div>
      </div>
      <div class="table-row " >
        <div class="table-cell">21.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Motor: Grease up </div>
        <div class="table-cell">22.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cooler Cleaning </div>
        <div class="table-cell">23.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Oil Top Up : Number of Liters ......... Liters</div>
        <div class="table-cell">24.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Replace Oil : Brand..................................</div>
      </div>
      <div class="table-row " >
        <div class="table-cell">25.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Overhaul Air end       </div>
        <div class="table-cell">26.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Overhaul Main Motor     </div>
        <div class="table-cell">27.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Main Motor Coil Rewind / Revarnish</div>
        <div class="table-cell"></div>
      </div>
      <div class="table-row " >
        <div class="table-cell">28.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3,000Hrs</div>
        <div class="table-cell">29.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6,000Hrs</div>
        <div class="table-cell">30.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;12,000Hrs</div>
        <div class="table-cell">31. Other(................................................................)</div>
      </div>
    </div>

    <div  style=" padding: 2px; width:10%;"></div>

    <div class="table" style=" border: 1px solid black;width: 100%;">
      <div class="table-row " >
        <div class="table-head">RUNNING DATA</div>
        <div class="table-cell">32. Discharge Air Pressue: ........................../...................</div>
        <div class="table-cell">(Load / Unload / Normal)</div>
        <div class="table-cell">33. O/S Pressure:........................................</div>
      </div>
      <div class="table-row " >
        <div class="table-cell">34.Load Condition: .................. %</div>
        <div class="table-cell">35.Discharde Air Temp.:................./..................&#8451; (Load / Unload)</div>
        <div class="table-cell"></div>
        <div class="table-cell"></div>
      </div>
      <div class="table-row " >
        <div class="table-cell">36. Houtmeter:...........................Hrs -></div>
        <div class="table-cell">Check when hour has been reser, (e..g. due to Monitor replace, Software upgrade, hour reset)</div>
        <div class="table-cell"></div>
        <div class="table-cell"></div>
      </div>
      <div class="table-row " >
        <div class="table-cell">37.Current:............/............A(Load / Unload)</div>
        <div class="table-cell">38.After O/S Temp.:........................&#8451;</div>
        <div class="table-cell">39.</div>
        <div class="table-cell">40</div>
      </div>
      <div class="table-row " >
        <div class="table-cell">41</div>
        <div class="table-cell">42</div>
        <div class="table-cell">43</div>
        <div class="table-cell">44</div>
      </div>
    </div>

    <div  style=" padding: 2px; width:10%;"></div>

    <div class="table" style=" border: 1px solid black;width: 100%;">
      <div class="table-row " >
        <div class="table-head">MACHINE SETTING</div>
        <div class="table-cell"></div>
        <div class="table-cell"></div>
        <div class="table-cell"></div>
      </div>
      <div class="table-row " >
        <div class="table-cell"></div>
        <div class="table-cell">4. Model:  ........................................</div>
        <div class="table-cell">5. Serial: ......................................</div>
        <div class="table-cell">6. O.NO.:  .....................................</div>
      </div>
      
      <div class="table-row " >
        <div class="table-cell"></div>
        
        <div class="table-cell">7. Year of Manufacture: ..................</div>
        <div class="table-cell">8. MC No. in Customer:  ...............</div>
        <div class="table-cell">9. Comm' Date:  ...........................</div>
      </div>
    </div>

    <div  style=" padding: 2px; width:10%;"></div>

    <div class="table" style=" border: 1px solid black;width: 100%;">
      <div class="table-row " >
        <div class="table-head">MEASUREMENT</div>
        <div class="table-cell"></div>
        <div class="table-cell"></div> 
      </div>
      <div class="table-row " >
          <div class="table-cell">4. Model:  ........................................</div>
          <div class="table-cell">5. Serial: ......................................</div>
          <div class="table-cell">6. O.NO.:  .....................................</div>
      </div>
      <div class="table-row " >
          <div class="table-cell">7. Year of Manufacture: ..................</div>
          <div class="table-cell">8. MC No. in Customer:  ...............</div>
          <div class="table-cell">9. Comm' Date:  ...........................</div>
      </div>
      <div class="table-row " >
        <div class="table-cell">7. Year of Manufacture: ..................</div>
        <div class="table-cell">8. MC No. in Customer:  ...............</div>
        <div class="table-cell">9. Comm' Date:  ...........................</div>
      </div>
    </div>         
  </body>
</html>
