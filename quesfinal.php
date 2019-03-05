<?php
include("isdk.php");
$servername = "localhost";
$username = "worldsuc_assign";
$password = "asdf1234";
$dbname = "worldsuc_personality";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$name 		= 	$_POST['name'];
$email		= 	$_POST['email'];
$phone 		= 	$_POST['phone'];

 
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
				<div class="header  p-5" style="width:100%;">
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-center">
					<img src="img/logo.png" class="logo1">
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 qr">
						<p class="ques_count text-center">Question Remaining :</p>
						<p class="ques_count text-center"> <span id="countdata">0</span> / 154</p>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					    <!--<div id="timer">60:00</div>-->
						<p id="timer" class="timer text-center" >60:00</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="questions" id="questions">
		<div class="container-fluid">
		 <form action="answer1.php" method="post" id="target">
		 <input type="hidden" name="name" value="<?php echo $name ?>">
		 <input type="hidden" name="email" value="<?php echo $email ?>">
		 <input type="hidden" name="phone" value="<?php echo $phone ?>">
	    <?php
    $sql1 = "SELECT * FROM questions1 ORDER BY sid ASC";
    $result1 = $conn->query($sql1);
    $totalrow=mysqli_num_rows($result1);
    while($row1 = $result1->fetch_assoc()) {
      ?>
		    <div class="ques" style="">
			<div class="row question_col" id="<?php echo $row1["sid"]; ?>" style="display:none;margin-bottom:35px;">
				<div class="col-md-1" style="">
					<div class="question_number"><?php echo $row1["sid"]; ?></div>
				</div>
				<div class="col-md-5 clicktest">
    				<label class="labl  shadow  mb-4 bg-white q-text">
                        <input type="radio" name="radioname<?php echo $row1["sid"]; ?>"  value="<?php echo $row1["ans"]; ?>" />
                         <div><?php  echo ($row1["qutn"]);   ?></div>
                    </label>
				</div>
				<div class="col-md-5 clicktest">
				<label class="labl  shadow  mb-4 bg-white q-text">
                    <input type="radio" name="radioname<?php echo $row1["sid"]; ?>"  value="<?php echo $row1["ans1"]; ?> " />
                     <div><?php echo ($row1["qutn1"]); ?></div>
                </label>
				</div>
			</div>
			</div>
			<?php
        }
        ?>
			 
			  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog quesmod-dialog">
    
      <!-- Modal content-->
      <div class="modal-content ques-content">
        <div class="modal-header">
          
          <h4 class="modal-title"style="text-align:center;"><b>Oops!</b></h4>
          <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
        </div>
        <div class="modal-body ques-body">
          <p id="alerttext"></p>
          <p id="ac"></p>
        </div>
        <div class="ques-footer">
          <button type="button" class="btn btn-default mod-btn" data-dismiss="modal" style="text-align:center;">Ok</button>
        </div>
      </div>
      
    </div>
  </div>
    <!-- Modal END-->
			 
			 
			 
			<div id="userques" >
			    
			     <a class="next" id="next" style="padding:16px 70px;margin-left: 7%;" > NEXT </a>
			     </div>
			     <div class="jugad" id="jugad1"  style="display:inline-flex">
    			     <a  class="next xy" style="display:none" id="previous"> PREVIOUS </a> 
    			     <a  class="next xy" style="display:none" id="next2"> NEXT  </a> 
			     </div>
			      <div class="jugad" id="jugad2" style="display:none">
			     <a  class="next xy" style="display:none" id="previous2"> PREVIOUS </a> 
			     <a  class="next xy" style="display:none" id="next3"> NEXT </a> 
			      </div>
			       <div class="jugad" id="jugad3" style="display:none">
			     <a  class="next xy" style="display:none" id="previous3"> PREVIOUS </a> 
			     <a  class="next xy" style="display:none" id="next4"> NEXT </a>
			     </div>
			      <div class="jugad" id="jugad4" style="display:none">
			     <a  class="next xy" style="display:none" id="previous4"> PREVIOUS </a> 
			     <a  class="next xy" style="display:none" id="next5"> NEXT  </a> 
			        </div>
			      <div class="jugad" id="jugad5" style="display:none">
			     <a  class="next xy" style="display:none"  id="previous5"> PREVIOUS </a> 
			     <a  class="next xy" style="display:none" id="next6"> NEXT </a> 
			        </div>
			      <div class="jugad" id="jugad6" style="display:none">
			     <a  class="next xy" style="display:none" id="previous6"> PREVIOUS </a> 
			     <a  class="next xy" style="display:none" id="next7"> NEXT  </a> 
			     </div>
			      <div class="jugad" id="jugad7" style="display:none">
			     <a class="next xy" style="display:none"  id="previous7"> PREVIOUS  </a> 
			     <a  class="next xy" style="display:none" id="next8"> NEXT  </a> 
			     </div>
			      <div class="jugad" id="jugad8" style="display:none">
			     <a  class="next xy" style="display:none" id="previous8"> PREVIOUS </a> 
			     <a class="next xy" style="display:none"  id="next9"> NEXT  </a>
			     </div>
			      <div class="jugad" id="jugad9" style="display:none">
			     <a  class="next xy" style="display:none" id="previous9"> PREVIOUS  </a> 
			     <a class="next xy" style="display:none"  id="next10"> NEXT </a> 
			    </div>
			     <div class="jugad" id="jugad10" style="display:none">
			     <a  class="next xy" style="display:none" id="previous10"> PREVIOUS  </a> 
			     <a class="next xy" style="display:none"  id="submit"> SUBMIT </a> 
			    </div>
        	
        	</form>
		</div>
	</section>
	
<!--<script>-->
<!--$(document).ready(function(){-->
<!--    $("#next").click(function(){-->
<!--        $("#myModal").modal();-->
<!--    });-->
<!--});-->
	
<!--</script>	-->
<script>
$( document ).ready(function() {
    var a=1;
    var count = 0;
    $('#topheader').show();
    while(a < 16)
    {
        $('#'+a).show();
        a++;
    }
    $('input[type=radio]').change(function(){
            var getname = $(this).attr('name');
            //var a=0;
             //alert(getname);
            var res = getname.substring(9);
           // alert(res);
            
            var section = $('input[name='+getname+']:checked').length;
           //alert(section);
            if(section == 1){
                
                if($("#"+res).hasClass("nonactive") && section == 1){
                    //alert(count);
                }else{
                count++;
                $('#'+res).addClass('nonactive');
                //alert(count);
                $("#countdata").html(count);
                }
            }
        });
});
$('#next').click(function(){
    var a=16;var b=1;var c=0; var alrt =[];var tp;
    while(b < a)
    {
        var section = $('input[name=radioname'+b+']:checked').length;
        if(section == 1)
        {
            c++;
        }
        else
        {    alrt.push(c);
             tp= alrt[0];
            
        }
        b++;
    }
    if(c == 15)
    {
    $('#next').hide();
    $('#next2').css('display','block');
    $('#previous').css('display','block');
   $('.row').hide();
   $('#topheader').show();
   while(a < 31)
    {
        $('#'+a).show();
        a++;
    }
    $('html,body').animate({scrollTop: $(".questions").offset().top},'slow');
    }else{
        //alert(tp);
        if(tp == 0){
            var newtp = 'questions';
        }else if(tp == 1){var newtp = 'questions';}else{
            var newtp = tp - 1;
        }
        var ac = 15 -c;
        $("#myModal").modal();
        document.getElementById("alerttext").innerHTML = ac+" Questions are unanwsered on this page!";
        //alert(tp);
          $('html,body').animate({scrollTop: $('#'+newtp).offset().top},'slow');
    }
     
});
 $('#previous').click(function(){
     $('#next').css('display','inline-flex');
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
     $('html,body').animate({scrollTop: $(".questions").offset().top},'slow');
});
 $('#next2').click(function(){
     
    var a=31;var b=16;var c=0; var alrt =[]; var tp;
    
    while(b < a)
    {
        var section = $('input[name=radioname'+b+']:checked').length;
        if(section == 1)
        {
            c++;
        }
        else
        {    alrt.push(b);
             tp= alrt[0];
             
         }
        b++;
    }
    if(c == 15)
    {
    $('#next').hide();
    $('#next3').css('display','block');
    $('#next2').css('display','none');
    $('#jugad1').css('display','none');
    $('#jugad2').css('display','inline-flex');
     $('#previous').css('display','none');
     $('#previous2').css('display','block');
     $('.row').hide();
     $('#topheader').show();
   while(a < 46)
    {
        $('#'+a).show();
        a++;
    }
     $('html,body').animate({scrollTop: $(".questions").offset().top},'slow');
    }else{
        //alert(tp);
        
        if(tp == 16){
            var newtp = 'questions';
        }else{
            var newtp = tp - 1;
        }
        var ac = 15 -c;
         $("#myModal").modal();
         document.getElementById("alerttext").innerHTML = ac+" Questions are unanwsered on this page!";
         $('html,body').animate({scrollTop: $('#'+newtp).offset().top},'slow');
    }
   
});
 $('#previous2').click(function(){
      $('#next').css('display','none');
     $('#next2').css('display','block');
     $('#next3').css('display','none');
     $('#previous').css('display','block');
     $('#previous2').css('display','none');
     $('#jugad1').css('display','inline-flex');
    $('#jugad2').css('display','none');
    var a=16;
    
   $('.row').hide(); 
   $('#topheader').show();
    while(a < 31)
    {
        $('#'+a).show();
        a++;
    }
     $('html,body').animate({scrollTop: $(".questions").offset().top},'slow');
});
$('#next3').click(function(){
    var a=46;var b=31;var c=0; var alrt =[]; var tp;
   // alrt.length = 0;
    while(b < a)
    {
        var section = $('input[name=radioname'+b+']:checked').length;
       if(section == 1)
        {
            c++;
        }
        else
        {    alrt.push(b);
             tp= alrt[0];
        }
        b++;
    }
    if(c == 15)
    {
    $('#next4').css('display','block');
    $('#previous3').css('display','block');
    $('#previous2').css('display','none');
    $('#next3').css('display','none');
    $('#jugad2').css('display','none');
    $('#jugad3').css('display','inline-flex');
   $('.row').hide();
   $('#topheader').show();
   while(a < 61)
    {
        $('#'+a).show();
        a++;
    }
       $('html,body').animate({scrollTop: $(".questions").offset().top},'slow');
    }else{
        if(tp == 31){
            var newtp = 'questions';
        }else{
            var newtp = tp - 1;
        }
        var ac = 15 -c;
         $("#myModal").modal();
        document.getElementById("alerttext").innerHTML = ac+" Questions are unanwsered on this page!";    
        $('html,body').animate({scrollTop: $('#'+newtp).offset().top},'slow');
    }
    
});
$('#previous3').click(function(){
     $('#next').css('display','none');
     $('#next3').css('display','block');
     $('#next4').css('display','none');
     $('#previous2').css('display','block');
     $('#previous3').css('display','none');
      $('#jugad2').css('display','inline-flex');
    $('#jugad3').css('display','none');
    var a=31;
   
   $('.row').hide(); 
   $('#topheader').show();
    while(a < 46)
    {
        $('#'+a).show();
        a++;
    }
     $('html,body').animate({scrollTop: $(".questions").offset().top},'slow');
});
$('#next4').click(function(){
    
    var a=61;var b=46;var c=0; var alrt =[]; var tp;
    while(b < a)
    {
        var section = $('input[name=radioname'+b+']:checked').length;
        if(section == 1)
        {
            c++;
        }
        else
        {    alrt.push(b);
             tp= alrt[0];
              
        }
        b++;
    }
    if(c == 15)
    {
    $('#next4').css('display','none');
    $('#next5').css('display','block');
    $('#previous4').css('display','block');
    $('#previous3').css('display','none');
    $('#jugad3').css('display','none');
    $('#jugad4').css('display','inline-flex');
   $('.row').hide(); 
   $('#topheader').show();
   while(a < 76)
    {
        $('#'+a).show();
        a++;
    }
     $('html,body').animate({scrollTop: $(".questions").offset().top},'slow');
    }else{
        if(tp == 46){
            var newtp = 'questions';
        }else{
            var newtp = tp - 1;
        }
        var ac = 15 -c;
         $("#myModal").modal();
        document.getElementById("alerttext").innerHTML = ac+" Questions are unanwsered on this page!";
         $('html,body').animate({scrollTop: $('#'+newtp).offset().top},'slow');
       
    }
   
});
$('#previous4').click(function(){
     $('#next').css('display','none');
     $('#next5').css('display','none');
     $('#next4').css('display','block');
     $('#previous4').css('display','none');
     $('#previous3').css('display','block');
      $('#jugad3').css('display','inline-flex');
    $('#jugad4').css('display','none');
    var a=46;
   
   $('.row').hide(); 
   $('#topheader').show();
    while(a < 61)
    {
        $('#'+a).show();
        a++;
    }
     $('html,body').animate({scrollTop: $(".questions").offset().top},'slow');
});
$('#next5').click(function(){
    
    var a=76;var b=61;var c=0; alrt =[];var tp;
    while(b < a)
    {
        var section = $('input[name=radioname'+b+']:checked').length;
        if(section == 1)
        {
            c++;
        }
        else
        {    alrt.push(b);
              tp= alrt[0];
        }
        b++;
    }
    if(c == 15)
    {
    $('#next4').hide();
    $('#next6').css('display','block');
     $('#next5').css('display','none');
    $('#previous5').css('display','block');
    $('#previous4').css('display','none');
    $('#jugad4').css('display','none');
    $('#jugad5').css('display','inline-flex');
   $('.row').hide(); 
   $('#topheader').show();
   while(a < 91)
    {
        $('#'+a).show();
        a++;
    } $('html,body').animate({scrollTop: $(".questions").offset().top},'slow');
    }else{
        if(tp == 61){
            var newtp = 'questions';
        }else{
            var newtp = tp - 1;
        }
        var ac = 15 -c;
         $("#myModal").modal();
        document.getElementById("alerttext").innerHTML = ac+" Questions are unanwsered on this page!";
         $('html,body').animate({scrollTop: $('#'+newtp).offset().top},'slow');
         
    }
   
});
$('#previous5').click(function(){
     $('#next').css('display','none');
     $('#next6').css('display','none');
     $('#next5').css('display','block');
     $('#previous5').css('display','none');
     $('#previous4').css('display','block');
      $('#jugad4').css('display','inline-flex');
    $('#jugad5').css('display','none');
    var a=61;
   
   $('.row').hide(); 
   $('#topheader').show();
   
    while(a < 76)
    {
        $('#'+a).show();
        a++;
    }
     $('html,body').animate({scrollTop: $(".questions").offset().top},'slow');
});
$('#next6').click(function(){
    
     var a=91;var b=76;var c=0; var alrt =[];var tp;
    while(b < a)
    {
        var section = $('input[name=radioname'+b+']:checked').length;
        if(section == 1)
        {
            c++;
        }
        else
        {    alrt.push(b);
             tp= alrt[0];
              
        }
        b++;
    }
    if(c == 15)
    {
    $('#next7').css('display','block');
     $('#next6').css('display','none');
    $('#previous6').css('display','block');
    $('#previous5').css('display','none');
    $('#jugad5').css('display','none');
    $('#jugad6').css('display','inline-flex');
   $('.row').hide(); 
   $('#topheader').show();
   while(a < 106)
    {
        $('#'+a).show();
        a++;
    }$('html,body').animate({scrollTop: $(".questions").offset().top},'slow');
    }else{
        if(tp == 76){
            var newtp = 'questions';
        }else{
            var newtp = tp - 1;
        }
       var ac = 15 -c;
        $("#myModal").modal();
        document.getElementById("alerttext").innerHTML = ac+" Questions are unanwsered on this page!";
         $('html,body').animate({scrollTop: $('#'+newtp).offset().top},'slow');
      
    }
     
});
$('#previous6').click(function(){
     $('#next').css('display','none');
     $('#next7').css('display','none');
     $('#next6').css('display','block');
     $('#previous6').css('display','none');
     $('#previous5').css('display','block');
       $('#jugad5').css('display','inline-flex');
    $('#jugad6').css('display','none');
    var a=76;
   
   $('.row').hide(); 
   $('#topheader').show();
    while(a < 91)
    {
        $('#'+a).show();
        a++;
    }
     $('html,body').animate({scrollTop: $(".questions").offset().top},'slow');
});
$('#next7').click(function(){
    
   var a=106;var b=91;var c=0;  var alrt =[];var tp;
    while(b < a)
    {
        var section = $('input[name=radioname'+b+']:checked').length;
        if(section == 1)
        {
            c++;
        }
        else
        {    alrt.push(b);
             tp= alrt[0];
           
        }
        b++;
    }
    if(c == 15)
    {
    $('#next8').css('display','block');
     $('#next7').css('display','none');
    $('#previous7').css('display','block');
    $('#previous6').css('display','none');
    $('#jugad6').css('display','none');
    $('#jugad7').css('display','inline-flex');
   $('.row').hide(); 
   $('#topheader').show();
   while(a < 121)
    {
        $('#'+a).show();
        a++;
    }$('html,body').animate({scrollTop: $(".questions").offset().top},'slow');
    }else{
        if(tp == 91){
            var newtp = 'questions';
        }else{
            var newtp = tp - 1;
        }
        var ac = 15 -c;
         $("#myModal").modal();
        document.getElementById("alerttext").innerHTML = ac+" Questions are unanwsered on this page!";
       $('html,body').animate({scrollTop: $('#'+newtp).offset().top},'slow');
     
    }
      
});
$('#previous7').click(function(){
     $('#next').css('display','none');
     $('#next8').css('display','none');
     $('#next7').css('display','block');
     $('#previous7').css('display','none');
     $('#previous6').css('display','block');
       $('#jugad6').css('display','inline-flex');
    $('#jugad7').css('display','none');
    var a=91;
   
   $('.row').hide(); 
   $('#topheader').show();
    while(a < 106)
    {
        $('#'+a).show();
        a++;
    }
     $('html,body').animate({scrollTop: $(".questions").offset().top},'slow');
});
$('#next8').click(function(){
    
    var a=121;var b=106;var c=0;var  alrt =[]; var tp;
    while(b < a)
    {
        var section = $('input[name=radioname'+b+']:checked').length;
        if(section == 1)
        {
            c++;
        }
        else
        {    alrt.push(b);
              tp= alrt[0];
              
        }
        b++;
    }
    if(c == 15)
    {
    $('#next9').css('display','block');
     $('#next8').css('display','none');
    $('#previous8').css('display','block');
    $('#previous7').css('display','none');
    $('#jugad7').css('display','none');
    $('#jugad8').css('display','inline-flex');
   $('.row').hide(); 
   $('#topheader').show();
   while(a < 136)
    {
        $('#'+a).show();
        a++;
    }$('html,body').animate({scrollTop: $(".questions").offset().top},'slow');
    }else{
        if(tp == 106){
            var newtp = 'questions';
        }else{
            var newtp = tp - 1;
        }
        var ac = 15 -c;
         $("#myModal").modal();
        document.getElementById("alerttext").innerHTML = ac+" Questions are unanwsered on this page!";
        $('html,body').animate({scrollTop: $('#'+newtp).offset().top},'slow');
    }
   
});
$('#previous8').click(function(){
     $('#next').css('display','none');
     $('#next9').css('display','none');
     $('#next8').css('display','block');
     $('#previous8').css('display','none');
     $('#previous7').css('display','block');
       $('#jugad7').css('display','inline-flex');
    $('#jugad8').css('display','none');
    var a=106;
   
   $('.row').hide(); 
   $('#topheader').show();
    while(a < 121)
    {
        $('#'+a).show();
        a++;
    }
     $('html,body').animate({scrollTop: $(".questions").offset().top},'slow');
});
$('#next9').click(function(){
    
    var a=136;var b=121;var c=0; var alrt =[];  var tp;
    while(b < a)
    {
        var section = $('input[name=radioname'+b+']:checked').length;
       if(section == 1)
        {
            c++;
        }
        else
        {    alrt.push(b);
             tp= alrt[0];
              
        }
        b++;
    }
    if(c == 15)
    {
    $('#next10').css('display','block');
    $('#submit').css('display','block');
     $('#next9').css('display','none');
    $('#previous9').css('display','block');
    $('#previous8').css('display','none');
    $('#jugad8').css('display','none');
    $('#jugad9').css('display','inline-flex');
   $('.row').hide(); 
   $('#topheader').show();
   while(a < 151)
    {
        $('#'+a).show();
        a++;
    }$('html,body').animate({scrollTop: $(".questions").offset().top},'slow');
    }else{
        if(tp == 121){
            var newtp = 'questions';
        }else{
            var newtp = tp - 1;
        }
        var ac = 15 -c;
         $("#myModal").modal();
        document.getElementById("alerttext").innerHTML = ac+" Questions are unanwsered on this page!";
        $('html,body').animate({scrollTop: $('#'+newtp).offset().top},'slow');
       
    }
   
});
$('#previous9').click(function(){
     $('#next').css('display','none');
     $('#next10').css('display','none');
     $('#next9').css('display','block');
     $('#previous9').css('display','none');
     $('#previous8').css('display','block');
       $('#jugad8').css('display','inline-flex');
    $('#jugad9').css('display','none');
     $('#submit').css('display','none');
    var a=121;
   
   $('.row').hide();
   $('#topheader').show();
    while(a <136 )
    {
        $('#'+a).show();
        a++;
    }
     $('html,body').animate({scrollTop: $(".questions").offset().top},'slow');
});
$('#next10').click(function(){
    
    var a=151;var b=136;var c=0; var alrt =[];var tp;
    while(b < a)
    {
        var section = $('input[name=radioname'+b+']:checked').length;
        if(section == 1)
        {
            c++;
        }
        else
        {    alrt.push(b);
               tp= alrt[0];
             
        }
        b++;
    }
    if(c == 15)
    {
    $('#next10').css('display','none');
    $('#submit').css('display','block');
     $('#next9').css('display','none');
    $('#previous10').css('display','block');
    $('#previous9').css('display','none');
    $('#jugad9').css('display','none');
    $('#jugad10').css('display','inline-flex');
   $('.row').hide(); 
   $('#topheader').show();
   while(a < 155)
    {
        $('#'+a).show();
        a++;
    }$('html,body').animate({scrollTop: $(".questions").offset().top},'slow');
    }else{
        if(tp == 136){
            var newtp = 'questions';
        }else{
            var newtp = tp - 1;
        }
        var ac = 15 -c;
         $("#myModal").modal();
        document.getElementById("alerttext").innerHTML = ac+" Questions are unanwsered on this page!";
        $('html,body').animate({scrollTop: $('#'+newtp).offset().top},'slow');
      
    }
   
});
$('#previous10').click(function(){
     $('#next').css('display','none');
     $('#submit').css('display','none');
     $('#next10').css('display','block');
     $('#previous10').css('display','none');
     $('#previous9').css('display','block');
       $('#jugad9').css('display','inline-flex');
    $('#jugad10').css('display','none');
    var a=136;
   
   $('.row').hide();
   $('#topheader').show();
    while(a < 151 )
    {
        $('#'+a).show();
        a++;
    }
     $('html,body').animate({scrollTop: $(".questions").offset().top},'slow');
});
$('#submit').click(function(){
    
    var a=155;var b=151;var c=0; var alrt =[];var tp;
    while(b < a)
    {
        var section = $('input[name=radioname'+b+']:checked').length;
        if(section == 1)
        {
            c++;
        }
        else
        {    alrt.push(b);
              tp= alrt[0];
           
        }
        b++;
    }
    if(c == 4)
    {
    $( "#target" ).submit();
    }else{
        if(tp == 151){
            var newtp = 'questions';
        }else{
            var newtp = tp - 1;
        }
        var ac = 4 -c;
         $("#myModal").modal();
        document.getElementById("alerttext").innerHTML = ac+" Questions are unanwsered on this page!";
         $('html,body').animate({scrollTop: $('#'+newtp).offset().top},'slow');
         
    }
             
});

</script>
<script>
   
 
 function countdown(minutes) {
  var seconds = 60;
 
  var mins = minutes

  function tick() {

    var counter = document.getElementById("timer");
    var current_minutes = mins - 1
    seconds--;

    counter.innerHTML = '' +
      current_minutes.toString() + ":" + (seconds < 10 ? "0" : "") + String(seconds);
    if (seconds > 0) {
      setTimeout(tick, 1000);
    } else {
    var newMin = mins-1;
    	if(newMin === 40 || newMin === 20 || newMin === 5 )
      	alert(newMin+" minutes left.");
    
      if (mins > 1) {
        // countdown(mins-1);   never reach “00? issue solved:Contributed    by Victor Streithorst
        setTimeout(function() {
          countdown(newMin);
        }, 1000);
      }
    }
  }

  tick();
}
var config = "<?php echo json_encode($time4) ?>";
countdown(60);

</script>
</body>
</html>
