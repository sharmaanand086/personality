<?php
include("isdk.php");
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
$name 		= 	$_POST['name'];
$email		= 	$_POST['email'];
$phone 		= 	$_POST['phone'];

$app = new iSDK;
if ($app->cfgCon("connectionName")) 
{
	
	$contactId = $app->addWithDupCheck(array('FirstName' => $name, 'Email' => $email,'Phone1' => $phone), 'Email');
	$groupId = 10597; 					// Registration  
	$result = $app->grpAssign($contactId, $groupId);
 
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Personality</title>
	  <!--<meta charset="utf-8">-->
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	  <link rel="stylesheet" href="css/main1.css">
  	  <link rel="stylesheet" href="css/responsive.css">
</head>

<body>
	<section class="top_header" id="div_id">
		<div class="container-fluid">
			<div class="row" id="topheader">
				<div class="header  p-4" style="width:100%;">
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-center">
						<p class="logo ">ARFEEN KHAN</p>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 qr">
						<p class="ques_count text-center">Question Remaining :</p>
						<p class="ques_count text-center"> <span id="countdata">150</span> / 150</p>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<p class="timer text-center" id="countTime">30:00</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="questions">
		<div class="container-fluid">
		    <form action="answer.php" method="post" id="target">
		 <input type="hidden" name="name" value="<?php echo $name ?>">
		 <input type="hidden" name="email" value="<?php echo $email ?>">
		 <input type="hidden" name="phone" value="<?php echo $phone ?>">
	    <?php
    $sql1 = "SELECT * FROM questions1";
    $result1 = $conn->query($sql1);
    $totalrow=mysqli_num_rows($result1);
    while($row1 = $result1->fetch_assoc()) {
      ?>
		    <div class="ques" style="margin-bottom:35px;">
			<div class="row question_col" id="<?php echo $row1["sid"]; ?>" style="display:none;">
				<div class="col-md-1" style="">
					<div class="question_number"><?php echo $row1["id"]; ?></div>
				</div>
				<div class="col-md-5 clicktest">
    				<label class="labl  shadow  mb-4 bg-white q-text">
                        <input type="radio" name="radioname<?php echo $row1["sid"]; ?>"  value="<?php echo $row1["ans"]; ?>" checked/>
                         <div><?php  echo ($row1["qutn"]);   ?></div>
                    </label>
				</div>
				<div class="col-md-5 clicktest">
				<label class="labl  shadow  mb-4 bg-white q-text">
                    <input type="radio" name="radioname<?php echo $row1["sid"]; ?>"  value="<?php echo $row1["ans1"]; ?>"/>
                     <div><?php echo ($row1["qutn1"]); ?></div>
                </label>
				</div>
			</div>
			</div>
			<?php
        }
        ?>
			 
			<div id="userques">
			    
			     <a class="next" id="next"> NEXT </a>
			     <a  class="next" style="display:none" id="previous"> PREVIOUS </a> 
			     <a  class="next" style="display:none" id="next2"> NEXT 2 </a> 
			     <a  class="next" style="display:none" id="previous2"> PREVIOUS 2</a> 
			     <a  class="next" style="display:none" id="next3"> NEXT 3</a> 
			     <a  class="next" style="display:none" id="previous3"> PREVIOUS 3</a> 
			     <a  class="next" style="display:none" id="next4"> NEXT 4</a> 
			     <a  class="next" style="display:none" id="previous4"> PREVIOUS 4</a> 
			     <a  class="next" style="display:none" id="next5"> NEXT 5 </a> 
			     <a  class="next" style="display:none"  id="previous5"> PREVIOUS 5</a> 
			     <a  class="next" style="display:none" id="next6"> NEXT 6</a> 
			     <a  class="next" style="display:none" id="previous6"> PREVIOUS 6</a> 
			     <a  class="next" style="display:none" id="next7"> NEXT 7 </a> 
			     <a class="next" style="display:none"  id="previous7"> PREVIOUS 7 </a> 
			     <a  class="next" style="display:none" id="next8"> NEXT 8 </a> 
			     <a  class="next" style="display:none" id="previous8"> PREVIOUS 8</a> 
			     <a class="next" style="display:none"  id="next9"> NEXT 9 </a>
			     <a  class="next" style="display:none" id="previous9"> PREVIOUS 9 </a> 
			     <a class="next" style="display:none"  id="submit"> SUBMIT </a> 
			    
			    
        	</div>
        	</form>
		</div>
	</section>
<script>
$( document ).ready(function() {
    var a=1;
    var count = 150;
    $('#topheader').show();
    while(a < 16)
    {
        $('#'+a).show();
        a++;
    }
    $('input[type=radio]').change(function(){
            var getname = $(this).attr('name');
            //var a=0;
            var res = getname.substring(9);
            //alert(res);
            
            var section = $('input[name='+getname+']:checked').length;
            if(section == 1){
                
                if($("#"+res).hasClass("nonactive") && section == 1){
                    //alert(count);
                }else{
                count--;
                $('#'+res).addClass('nonactive');
                //alert(count);
                $("#countdata").html(count);
                }
            }
        });
});
$('#next').click(function(){
    var a=16;var b=1;var c=0;
    while(b < a)
    {
        var section = $('input[name=radioname'+b+']:checked').length;
        if(section == 1){c++;}
        b++;
    }
    if(c == 15)
    {
    $('#next').hide();
    $('#next2').css('display','block');
    $('#previous').css('display','block');
   $('.row').hide();
   $('#topheader').show();
   while(a < 32)
    {
        $('#'+a).show();
        a++;
    }
    }else{
        alert('complete all question');
    }
     $('html,body').animate({scrollTop: $(".top_header").offset().top},'slow');
});
 $('#previous').click(function(){
     $('#next').css('display','block');
     $('#next2').css('display','none');
     $('#previous').css('display','none');
    var a=1;
     
   $('.row').hide(); 
   $('#topheader').show();
    while(a < 16)
    {
        $('#'+a).show();
        a++;
    }
     $('html,body').animate({scrollTop: $(".top_header").offset().top},'slow');
});
 $('#next2').click(function(){
    var a=32;var b=16;var c=0;
    while(b < a)
    {
        var section = $('input[name=radioname'+b+']:checked').length;
        if(section == 1){c++;}
        b++;
    }
    if(c == 15)
    {
    $('#next').hide();
    $('#next3').css('display','block');
    $('#next2').css('display','none');
     $('#previous').css('display','none');
     $('#previous2').css('display','block');
     $('.row').hide();
     $('#topheader').show();
   while(a < 47)
    {
        $('#'+a).show();
        a++;
    }
    }else{
        alert('complete all question');
    }
     $('html,body').animate({scrollTop: $(".top_header").offset().top},'slow');
});
 $('#previous2').click(function(){
      $('#next').css('display','none');
     $('#next2').css('display','block');
     $('#next3').css('display','none');
     $('#previous').css('display','block');
     $('#previous2').css('display','none');
    var a=16;
    
   $('.row').hide(); 
   $('#topheader').show();
    while(a < 32)
    {
        $('#'+a).show();
        a++;
    }
     $('html,body').animate({scrollTop: $(".top_header").offset().top},'slow');
});
$('#next3').click(function(){
    var a=47;var b=32;var c=0;
    while(b < a)
    {
        var section = $('input[name=radioname'+b+']:checked').length;
        if(section == 1){c++;}
        b++;
    }
    if(c == 15)
    {
    $('#next4').css('display','block');
    $('#previous3').css('display','block');
    $('#previous2').css('display','none');
    $('#next3').css('display','none');
   $('.row').hide();
   $('#topheader').show();
   while(a < 62)
    {
        $('#'+a).show();
        a++;
    }
    }else{
        alert('complete all question');
    }
     $('html,body').animate({scrollTop: $(".top_header").offset().top},'slow');
    
});
$('#previous3').click(function(){
     $('#next').css('display','none');
     $('#next3').css('display','block');
     $('#next4').css('display','none');
     $('#previous2').css('display','block');
     $('#previous3').css('display','none');
    var a=32;
   
   $('.row').hide(); 
   $('#topheader').show();
    while(a < 47)
    {
        $('#'+a).show();
        a++;
    }
     $('html,body').animate({scrollTop: $(".top_header").offset().top},'slow');
});
$('#next4').click(function(){
    
    var a=62;var b=47;var c=0;
    while(b < a)
    {
        var section = $('input[name=radioname'+b+']:checked').length;
        if(section == 1){c++;}
        b++;
    }
    if(c == 15)
    {
    $('#next4').css('display','none');
    $('#next5').css('display','block');
    $('#previous4').css('display','block');
    $('#previous3').css('display','none');
    
   $('.row').hide(); 
   $('#topheader').show();
   while(a < 77)
    {
        $('#'+a).show();
        a++;
    }
    }else{
        alert('complete all question');
    }
     $('html,body').animate({scrollTop: $(".top_header").offset().top},'slow');
});
$('#previous4').click(function(){
     $('#next').css('display','none');
     $('#next5').css('display','none');
     $('#next4').css('display','block');
     $('#previous4').css('display','none');
     $('#previous3').css('display','block');
    var a=47;
   
   $('.row').hide(); 
   $('#topheader').show();
    while(a < 62)
    {
        $('#'+a).show();
        a++;
    }
     $('html,body').animate({scrollTop: $(".top_header").offset().top},'slow');
});
$('#next5').click(function(){
    
    var a=77;var b=62;var c=0;
    while(b < a)
    {
        var section = $('input[name=radioname'+b+']:checked').length;
        if(section == 1){c++;}
        b++;
    }
    if(c == 15)
    {
    $('#next4').hide();
    $('#next6').css('display','block');
     $('#next5').css('display','none');
    $('#previous5').css('display','block');
    $('#previous4').css('display','none');
   $('.row').hide(); 
   $('#topheader').show();
   while(a < 92)
    {
        $('#'+a).show();
        a++;
    }
    }else{
        alert('complete all question');
    }
     $('html,body').animate({scrollTop: $(".top_header").offset().top},'slow');
});
$('#previous5').click(function(){
     $('#next').css('display','none');
     $('#next6').css('display','none');
     $('#next5').css('display','block');
     $('#previous5').css('display','none');
     $('#previous4').css('display','block');
    var a=62;
   
   $('.row').hide(); 
   $('#topheader').show();
   
    while(a < 77)
    {
        $('#'+a).show();
        a++;
    }
     $('html,body').animate({scrollTop: $(".top_header").offset().top},'slow');
});
$('#next6').click(function(){
    
     var a=92;var b=77;var c=0;
    while(b < a)
    {
        var section = $('input[name=radioname'+b+']:checked').length;
        if(section == 1){c++;}
        b++;
    }
    if(c == 15)
    {
    $('#next7').css('display','block');
     $('#next6').css('display','none');
    $('#previous6').css('display','block');
    $('#previous5').css('display','none');
    
   $('.row').hide(); 
   $('#topheader').show();
   while(a < 107)
    {
        $('#'+a).show();
        a++;
    }
    }else{
        alert('complete all question');
    }
     $('html,body').animate({scrollTop: $(".top_header").offset().top},'slow');
});
$('#previous6').click(function(){
     $('#next').css('display','none');
     $('#next7').css('display','none');
     $('#next6').css('display','block');
     $('#previous6').css('display','none');
     $('#previous5').css('display','block');
    var a=77;
   
   $('.row').hide(); 
   $('#topheader').show();
    while(a < 92)
    {
        $('#'+a).show();
        a++;
    }
     $('html,body').animate({scrollTop: $(".top_header").offset().top},'slow');
});
$('#next7').click(function(){
    
   var a=107;var b=92;var c=0;
    while(b < a)
    {
        var section = $('input[name=radioname'+b+']:checked').length;
        if(section == 1){c++;}
        b++;
    }
    if(c == 15)
    {
    $('#next8').css('display','block');
     $('#next7').css('display','none');
    $('#previous7').css('display','block');
    $('#previous6').css('display','none');
    
   $('.row').hide(); 
   $('#topheader').show();
   while(a < 122)
    {
        $('#'+a).show();
        a++;
    }
    }else{
        alert('complete all question');
    }
     $('html,body').animate({scrollTop: $(".top_header").offset().top},'slow');
});
$('#previous7').click(function(){
     $('#next').css('display','none');
     $('#next8').css('display','none');
     $('#next7').css('display','block');
     $('#previous7').css('display','none');
     $('#previous6').css('display','block');
    var a=92;
   
   $('.row').hide(); 
   $('#topheader').show();
    while(a < 107)
    {
        $('#'+a).show();
        a++;
    }
     $('html,body').animate({scrollTop: $(".top_header").offset().top},'slow');
});
$('#next8').click(function(){
    
    var a=122;var b=107;var c=0;
    while(b < a)
    {
        var section = $('input[name=radioname'+b+']:checked').length;
        if(section == 1){c++;}
        b++;
    }
    if(c == 15)
    {
    $('#next9').css('display','block');
     $('#next8').css('display','none');
    $('#previous8').css('display','block');
    $('#previous7').css('display','none');
    
   $('.row').hide(); 
   $('#topheader').show();
   while(a < 137)
    {
        $('#'+a).show();
        a++;
    }
    }else{
        alert('complete all question');
    }
     $('html,body').animate({scrollTop: $(".top_header").offset().top},'slow');
});
$('#previous8').click(function(){
     $('#next').css('display','none');
     $('#next9').css('display','none');
     $('#next8').css('display','block');
     $('#previous8').css('display','none');
     $('#previous7').css('display','block');
    var a=107;
   
   $('.row').hide(); 
   $('#topheader').show();
    while(a < 122)
    {
        $('#'+a).show();
        a++;
    }
     $('html,body').animate({scrollTop: $(".top_header").offset().top},'slow');
});
$('#next9').click(function(){
    
    var a=137;var b=122;var c=0;
    while(b < a)
    {
        var section = $('input[name=radioname'+b+']:checked').length;
        if(section == 1){c++;}
        b++;
    }
    if(c == 15)
    {
    $('#next10').css('display','block');
    $('#submit').css('display','block');
     $('#next9').css('display','none');
    $('#previous9').css('display','block');
    $('#previous8').css('display','none');
    
   $('.row').hide(); 
   $('#topheader').show();
   while(a < 152)
    {
        $('#'+a).show();
        a++;
    }
    }else{
        alert('complete all question');
    }
     $('html,body').animate({scrollTop: $(".top_header").offset().top},'slow');
});
$('#previous9').click(function(){
     $('#next').css('display','none');
     $('#next10').css('display','none');
     $('#next9').css('display','block');
     $('#previous9').css('display','none');
     $('#previous8').css('display','block');
     $('#submit').css('display','none');
    var a=122;
   
   $('.row').hide();
   $('#topheader').show();
    while(a <137 )
    {
        $('#'+a).show();
        a++;
    }
     $('html,body').animate({scrollTop: $(".top_header").offset().top},'slow');
});
$('#submit').click(function(){
    
    var a=145;var b=137;var c=0;
    while(b < a)
    {
        var section = $('input[name=radioname'+b+']:checked').length;
        if(section == 1){c++;}
        b++;
    }
    if(c == 8)
    {
    $( "#target" ).submit();
    }else{
        alert('complete all question');
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
</body>
</html>