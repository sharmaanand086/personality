<?php
$servername = "localhost";
$username = "xxxxxxxxxxxxxxxxxxx";
$password = "xxxxxxxxxxxx";
$dbname = "xxxxxxxxxxxxxxxxxxxxxxxxx";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/questionstyle.css">
<script src="https://code.jquery.com/jquery-3.3.1.js"  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="  crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
  body{
          margin: 0px;
          padding:0px;
  }
   .topbar{
    background-image: linear-gradient(to right, #14274c, #14274c,#14274c ,#305cb5, #37a2e7, #49b1ec);
    padding: 18px 0px;
   }
   .logocss{
      padding: 20px 0px 0px 10px;
    color: white;
   }
   .middlesection{
    padding-top: 14px;
    text-align: center;
    color: white;
   }
   .removeclass{
       margin:0px;
   }
   .inpad{
       padding-top: 20px;
   }
   .mainqdiv{
       padding-top: 20px;
   }
   @media only screen and (max-width: 600px){
      .logocss{
      padding: 20px 0px 0px 0px;
   } 
   }
  </style>
</head>

<body>
    <section class="">
        <div class="container-fluid">
            <div class="row topbar">
                <div class="col-md-2 col-sm-2 col-xs-12 logocss text-center">ARFEEN KHAN</div>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="middlesection">
                        <p class="removeclass">Question Remaining :</p>
                        <p class="removeclass"><span>150</span>/150</p>
                    </div>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12">
                    <div class="middlesection inpad">
                        <p class="removeclass" id="countTime">30:00</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container-fluid">
        	  <form action="" method="post">
        	    <?php
            $sql1 = "SELECT * FROM questions1";
            $result1 = $conn->query($sql1);
            $totalrow=mysqli_num_rows($result1);
            while($row1 = $result1->fetch_assoc()) {
              ?>
        	<div class="row mainqdiv" style="display:none;" id="<?php echo $row1["sid"]; ?>">
        	    <div class="col-md-2 col-sm-2 col-xs-12 text-center"><?php echo $row1["id"]; ?> 
        	    </div>
        	    <div class="col-md-5 col-sm-5 col-xs-12 clicktest">
                	<label class="labl">
                    <input type="radio" name="radioname<?php echo $row1["sid"]; ?>[]" value="one_value"/>
                     <div>  <?php echo $row1["qutn"]; ?></div>
                    </label>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12 clicktest">
                    <label class="labl">
                        <input type="radio" name="radioname<?php echo $row1["sid"]; ?>[]" value="another" />
                        <div><?php echo $row1["qutn1"]; ?></div>
                    </label>
        	    </div>
        	</div>
        		<?php
                }
                ?>
                <a id="next">Next</a>
                <a id="previous" style="display:none">previous</a>
                <a id="next2" style="display:none">Next2</a>
                <a id="previous2" style="display:none">previous2</a>
                <a id="next3" style="display:none">Next3</a>
                <a id="previous3" style="display:none">previous3</a>
                <a id="next4" style="display:none">Next4</a>
                <a id="previous4" style="display:none">previous4</a>
                <a id="next5" style="display:none">Next5</a>
             <!--<input type="submit" name="submit"  value="Next" />-->
            </form>
        </div>
</section>
</body>
<script>
$( document ).ready(function() {
    var a=1;
    //$('.row').hide();
    while(a < 16)
    {
        $('#'+a).show();
        a++;
    }
});
$('#next').click(function(){
    var a=16;
    $('#next').hide();
    $('#next2').css('display','block');
    $('#previous').css('display','block');
   $('.row').hide(); 
    while(a < 32)
    {
        $('#'+a).show();
        a++;
    }
});
 $('#previous').click(function(){
     $('#next').css('display','block');
     $('#next2').css('display','none');
     $('#previous').css('display','none');
    var a=1;
    $()
   $('.row').hide(); 
    while(a < 16)
    {
        $('#'+a).show();
        a++;
    }
});
 $('#next2').click(function(){
    $('#next2').hide();
    $('#next').hide();
    $('#next3').css('display','block');
     $('#previous').css('display','none');
     $('#previous2').css('display','block');
    var a=32;
    $()
   $('.row').hide(); 
    while(a < 48)
    {
        $('#'+a).show();
        a++;
    }
});
 $('#previous2').click(function(){
      $('#next').css('display','none');
     $('#next2').css('display','block');
     $('#next3').css('display','none');
     $('#previous').css('display','block');
     $('#previous2').css('display','none');
    var a=16;
    $()
   $('.row').hide(); 
    while(a < 32)
    {
        $('#'+a).show();
        a++;
    }
});
$('#next3').click(function(){
    
    $('#next3').hide();
    $('#next4').css('display','block');
    $('#previous3').css('display','block');
    $('#previous2').css('display','none');
    var a=48;
    $()
   $('.row').hide(); 
    while(a < 64)
    {
        $('#'+a).show();
        a++;
    }
});
$('#previous3').click(function(){
      $('#next').css('display','none');
     $('#next2').css('display','none');
     $('#next4').css('display','none');
     $('#next3').css('display','block');
     $('#previous').css('display','none');
       $('#previous3').css('display','none');
     $('#previous2').css('display','block');
    var a=32;
    $()
   $('.row').hide(); 
    while(a < 48)
    {
        $('#'+a).show();
        a++;
    }
});
$('#next4').click(function(){
    
    $('#next4').hide();
    $('#next5').css('display','block');
    $('#previous4').css('display','block');
    $('#previous4').css('display','none');
    var a=64;
    $()
   $('.row').hide(); 
    while(a < 80)
    {
        $('#'+a).show();
        a++;
    }
});
</script>
<script>
    var countdown = 30 * 60 * 1000;
var timerId = setInterval(function(){
  countdown -= 1000;
  var min = Math.floor(countdown / (60 * 1000));
  //var sec = Math.floor(countdown - (min * 60 * 1000));  // wrong
  var sec = Math.floor((countdown - (min * 60 * 1000)) / 1000);  //correct

  if (countdown <= 0) {
     alert("30 min!");
     clearInterval(timerId);
     //doSomething();
  } else {
     $("#countTime").html(min + " : " + sec);
  }

}, 1000);
</script>
</html>
