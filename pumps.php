<?php //index1.php
require_once 'header.php';
require_once 'login.php';

echo <<<_SOCIAL
<div class='container-fluid start' id='social'>
<img src='FB-f-Logo__blue_114.png'class='img-responsive social' />
<img src='Twitter_logo_blue.png' class='img-responsive social' width='150px' />
</div>
_SOCIAL;
$query = "SELECT * FROM events ORDER BY date ";
$result = mysql_query($query);
if(!$result) die ("Something Went wrong ".mysql_error());

$rows = mysql_num_rows($result);
//echo "<h1>".$rows."</h1>";
for($i =0; $i<$rows; $i++){
$row = mysql_fetch_row($result);
$image= $row[7];
$date = date_create($row[5]);
$date = date_format($date,'l jS F Y');
$time = date_create($row[6]);
$time = date_format($time, 'g:i A');

if(file_exists("img/$image.jpg"))
{
echo <<<_HTML
<div class='container-fluid start'> 
<div class='card'>
<img src='img/$image.jpg' data-display='$image' class=' img-thumbnail clubs'/>
</div>          
</div>
<div class='container-fluid'>
<div id='$image' class='portBox'>
    <!--<h5><strong>Event Name: </strong>$row[0]</h5>
    <h5><strong>Dress Code: </strong>$row[1]</h5>
    <h5><strong>Male Price: </strong>$row[2]</h5>
    <h5><strong>Female Price: </strong>$row[3]</h5>
    <h5><strong>Specials: </strong>$row[4]</h5>
    <h5><strong>Date: </strong>$date</h5>
    <h5><strong>Time: </strong>$time</h5> -->
    
    <!-- Club Template -->
    
    <div class='clubList'>
    <!--
        <div class='clubHeader'>
            <p id='amount' class='pull-right'><span class='badge'></span>going</p>
        </div>
        -->
        <div class='clubContent'>
        
            <div id='title'>
            <h3>$row[0]</h3>
            <hr>
            </div>
            
            <div id='date'>
            <h5>
            <span class='glyphicon glyphicon-calendar'>
            </span>Date/Time:</h5>
            <p>$date<br/>$time </p>
            </div>
            
            <div id='pricing'>
            <h5><span class="glyphicon glyphicon-usd">
            </span>Pricing:</h5>
            <p>Male-$row[2]</p>
            <p>Female-$row[3]</p>
            <hr>
            </div>
            
            <div id='details'>
            <h5>
            <span class='glyphicon glyphicon-map-marker'>
            </span>Location:
            </h5>
            <p>$row[8]</p>
            <hr>
            </div>
            
            
            <div id='details'>
            <h5>
            <span class='glyphicon glyphicon-eye-open'>
            </span>Dress Code:
            </h5>
            <p>$row[1]</p>
            <hr>
            </div>
            
            <div id='specials'>
            <h5><span class="glyphicon glyphicon-glass">
            </span> Specials:</h5>
             <p>$row[4]</p>
             <hr>
            </div>
            
            
        </div>
    </div>
    </div>
    
    
    
    
    
    
    
    
    

</div>

_HTML;
}

}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Port box files -->
      <script src="js/jquery-ui-1.10.3.custom.min.js"></script>
      
      <script src="js/portBox.slimscroll.min.js"></script>
      
      <script>
      $(function () {
            $('[data-toggle="popover"]').popover()
      })
      </script>


    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>


  </body>


</html>
