<?php //new_event.php
require_once 'login.php';
require_once 'functions.php';
if(!($_FILES['image']['name'])){
    header('Location:add_event.php?new=photo');
}
elseif($_POST["eventname"] && $_POST["location"] && $_POST["date"] && $_POST["imgname"])
{
    $event_name = sanitizeString($_POST["eventname"]);
    $dresscode = sanitizeString($_POST["dresscode"]);
    $location = sanitizeString($_POST['location']);
    $mprice = sanitizeString($_POST['mprice']);
    $fprice = sanitizeString($_POST['fprice']);
    $specials = sanitizeString($_POST['specials']);
    $verify = $_POST['legit'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $imgname = sanitizeString(trim($_POST['imgname']," "));
    
    $query = "INSERT INTO events VALUES('$event_name','$dresscode','$mprice','$fprice','$specials','$date','$time','$imgname','$location','$verify')";
    $result = mysql_query($query);
    
    if(!$result){
        die("Event not successfully added".mysql_error());
    }
    
if(isset($_FILES['image']['name']))
{
    $saveto = "img/$imgname.jpg";
    move_uploaded_file($_FILES['image']['tmp_name'], $saveto);
    
    $typeok = TRUE;
    
    switch($_FILES['image']['type'])
    {
        case "image/gif":  $src = imagecreatefromgif($saveto); break;
        case "image/jpeg":
        case "image/pjpeg": $src = imagecreatefromjpeg($saveto); break;
        case "image/png":   $src = imagecreatefromjpeg($saveto); break;
        default: $typeok = FALSE; break;
    }
    
    if($typeok)
    {
        list($w, $h) = getimagesize($saveto);
        $max = 800;
        $tw = $w;
        $th = $h;
        
        if($w > $h && $max < $w)
        {
            $th = $max/$w * $h;
            $tw = $max;
        }
        elseif ($h > $w && $max < $h)
        {
            $tw = $max/$w * $h;
            $th = $max;
        }
        elseif ($max < $w)
        {
            $tw = $th = $max;
        }
        
        $tmp = imagecreatetruecolor($tw, $th);
        imagecopyresampled($tmp, $src, 0,0,0,0, $tw, $th, $w, $h);
        imageconvolution($tmp, array(array(-1, -1, -1),array(-1, 16, -1),array(-1, -1 ,-1)),8,0);
        imagejpeg($tmp, $saveto);
        imagedestroy($tmp);
        imagedestroy($src);
    }
}
require_once 'header.php';
    if(file_exists("img/$imgname.jpg")){
        echo <<<_HTML
        <div class="container-fluid">
        <div class="alert alert-success" role="alert">
        <h3><span>Successfully Added</span>
        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></h3>
        </div>
        
        <img src="img/$imgname.jpg" class="img-responsive" />
        <h1><a  href="index1.php">Click Here to Close</a>              </h1>
        </div>
_HTML;
}    
//header("Location:messages.php?new=success&imgname=".$imgname);
    
}
else{
    header('Location:add_event.php?new=field');
    
}
    
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>


  </body>


</html>