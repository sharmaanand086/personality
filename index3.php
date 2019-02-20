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
<html>

<head>
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/questionstyle.css">
<script src="https://code.jquery.com/jquery-3.3.1.js"  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="  crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
</head>

<body>
<div class="container">
	  <form action="answer.php" method="post">
	    <?php
    $sql1 = "SELECT * FROM questions1";
    $result1 = $conn->query($sql1);
    $totalrow=mysqli_num_rows($result1);
    while($row1 = $result1->fetch_assoc()) {
      ?>
	<div class="row" style="display:none;" id="<?php echo $row1["sid"]; ?>">
	    <div class="col-md-2"><?php echo $row1["id"]; ?> 
	        </div>
	    <div class="col-md-5 clicktest">
        	<label class="labl">
            <input type="radio" name="radioname<?php echo $row1["sid"]; ?>"  value="<?php echo $row1["ans"]; ?>"/>
             <div>  <?php  echo ($row1["qutn"]);   ?></div>
            </label>
        </div>
        <div class="col-md-5 clicktest">
            <label class="labl">
                <input type="radio" name="radioname<?php echo $row1["sid"]; ?>" value="<?php echo $row1["ans1"]; ?>" />
                <div><?php echo ($row1["qutn1"]); ?></div>
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
        <a id="previous5" style="display:none">previous5</a>
        <a id="next6" style="display:none">Next6</a>
        <a id="previous6" style="display:none">previous6</a>
        <a id="next7" style="display:none">Next7</a>
        <a id="previous7" style="display:none">previous7</a>
        <a id="next8" style="display:none">Next8</a>
        <a id="previous8" style="display:none">previous8</a>
        <a id="next9" style="display:none">Next9</a>
        <a id="previous9" style="display:none">previous9</a>
        <!--<a id="next10" style="display:none">Submit</a>-->
     <!--<input type="submit" name="submit"  value="Submit" />-->
    </form>
</body>
<script>
$( document ).ready(function() {
    var a=1;
    var count = 150;
    //$('.row').hide();
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
                    alert(count);
                }else{
                count--;
                $('#'+res).addClass('nonactive');
                alert(count);
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
   while(a < 32)
    {
        $('#'+a).show();
        a++;
    }
    }else{
        alert('complete all question');
    }
});
 $('#previous').click(function(){
     $('#next').css('display','block');
     $('#next2').css('display','none');
     $('#previous').css('display','none');
    var a=1;
     
   $('.row').hide(); 
    while(a < 16)
    {
        $('#'+a).show();
        a++;
    }
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
   while(a < 47)
    {
        $('#'+a).show();
        a++;
    }
    }else{
        alert('complete all question');
    }
});
 $('#previous2').click(function(){
      $('#next').css('display','none');
     $('#next2').css('display','block');
     $('#next3').css('display','none');
     $('#previous').css('display','block');
     $('#previous2').css('display','none');
    var a=16;
    
   $('.row').hide(); 
    while(a < 32)
    {
        $('#'+a).show();
        a++;
    }
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
   while(a < 62)
    {
        $('#'+a).show();
        a++;
    }
    }else{
        alert('complete all question');
    }
    
});
$('#previous3').click(function(){
     $('#next').css('display','none');
     $('#next3').css('display','block');
     $('#next4').css('display','none');
     $('#previous2').css('display','block');
     $('#previous3').css('display','none');
    var a=32;
   
   $('.row').hide(); 
    while(a < 47)
    {
        $('#'+a).show();
        a++;
    }
});
$('#next4').click(function(){
    
    var a=16;var b=1;var c=0;
    while(b < a)
    {
        var section = $('input[name=radioname'+b+']:checked').length;
        if(section == 1){c++;}
        b++;
    }
    if(c == 15)
    {
    $('#next5').css('display','block');
    $('#previous4').css('display','block');
    $('#previous3').css('display','none');
    
   $('.row').hide(); 
   while(a < 32)
    {
        $('#'+a).show();
        a++;
    }
    }else{
        alert('complete all question');
    }
});
$('#previous4').click(function(){
     $('#next').css('display','none');
     $('#next5').css('display','none');
     $('#next4').css('display','block');
     $('#previous4').css('display','none');
     $('#previous3').css('display','block');
    var a=47;
   
   $('.row').hide(); 
    while(a < 62)
    {
        $('#'+a).show();
        a++;
    }
});
$('#next5').click(function(){
    
    $('#next4').hide();
    $('#next6').css('display','block');
     $('#next5').css('display','none');
    $('#previous5').css('display','block');
    $('#previous4').css('display','none');
    
    var a=77;
     
   $('.row').hide(); 
    while(a < 92)
    {
        $('#'+a).show();
        a++;
    }
});
$('#previous5').click(function(){
     $('#next').css('display','none');
     $('#next6').css('display','none');
     $('#next5').css('display','block');
     $('#previous5').css('display','none');
     $('#previous4').css('display','block');
    var a=62;
   
   $('.row').hide(); 
    while(a < 77)
    {
        $('#'+a).show();
        a++;
    }
});
$('#next6').click(function(){
    
    $('#next7').css('display','block');
     $('#next6').css('display','none');
    $('#previous6').css('display','block');
    $('#previous5').css('display','none');
    
    var a=92;
     
   $('.row').hide(); 
    while(a < 107)
    {
        $('#'+a).show();
        a++;
    }
});
$('#previous6').click(function(){
     $('#next').css('display','none');
     $('#next7').css('display','none');
     $('#next6').css('display','block');
     $('#previous6').css('display','none');
     $('#previous5').css('display','block');
    var a=77;
   
   $('.row').hide(); 
    while(a < 92)
    {
        $('#'+a).show();
        a++;
    }
});
$('#next7').click(function(){
    
    $('#next8').css('display','block');
     $('#next7').css('display','none');
    $('#previous7').css('display','block');
    $('#previous6').css('display','none');
    
    var a=107;
     
   $('.row').hide(); 
    while(a < 122)
    {
        $('#'+a).show();
        a++;
    }
});
$('#previous7').click(function(){
     $('#next').css('display','none');
     $('#next8').css('display','none');
     $('#next7').css('display','block');
     $('#previous7').css('display','none');
     $('#previous6').css('display','block');
    var a=92;
   
   $('.row').hide(); 
    while(a < 107)
    {
        $('#'+a).show();
        a++;
    }
});
$('#next8').click(function(){
    
    $('#next9').css('display','block');
     $('#next8').css('display','none');
    $('#previous8').css('display','block');
    $('#previous7').css('display','none');
    
    var a=122;
     
   $('.row').hide(); 
    while(a < 137)
    {
        $('#'+a).show();
        a++;
    }
});
$('#previous8').click(function(){
     $('#next').css('display','none');
     $('#next9').css('display','none');
     $('#next8').css('display','block');
     $('#previous8').css('display','none');
     $('#previous7').css('display','block');
    var a=107;
   
   $('.row').hide(); 
    while(a < 122)
    {
        $('#'+a).show();
        a++;
    }
});
$('#next9').click(function(){
    
    $('#next10').css('display','block');
     $('#next9').css('display','none');
    $('#previous9').css('display','block');
    $('#previous8').css('display','none');
    
    var a=137;
     
   $('.row').hide(); 
    while(a < 152)
    {
        $('#'+a).show();
        a++;
    }
});
$('#previous9').click(function(){
     $('#next').css('display','none');
     $('#next10').css('display','none');
     $('#next9').css('display','block');
     $('#previous9').css('display','none');
     $('#previous8').css('display','block');
    var a=122;
   
   $('.row').hide(); 
    while(a <137 )
    {
        $('#'+a).show();
        a++;
    }
});




</script>
</html>
