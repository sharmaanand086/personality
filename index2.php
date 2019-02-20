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
<script src="https://code.jquery.com/jquery-3.3.1.js"  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="  crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<style>
  
</style>
</head>
<body>


<div class="container">
    <form action="" method="post">
         <?php
    $sql1 = "SELECT * FROM questions1";
    $result1 = $conn->query($sql1);
    $totalrow=mysqli_num_rows($result1);
    //var_dump($totalrow);
   // $row=0;
    while($row1 = $result1->fetch_assoc()) {
    //if($row >=0 && $row < 16){
      ?>
            <div class="row ">
                   <div class="col-md-6 clicktest"  name="<?php echo $row1["ans"]; ?>" style="color:rgb(25,20,20);" >
                     <p class="sentence" ><?php echo $row1["qutn"]; ?></p> 
                   </div>
                   <div class="col-md-6 clicktest" name="<?php echo $row1["ans1"]; ?>" style="color:rgb(25,20,20);">
                    <p  class="sentence" ><?php echo $row1["qutn1"]; ?></p> 
                   </div> 
                
            </div>
        <?php
        //}
       // $row++;
        }
        ?>  
     <input type="submit" name="submit" value="Next" />
    </form>
</div>

</body>
<script type="text/javascript">
	var values = [];
	var count = 0;
$( function() {
  $('.clicktest').click( function() {
     var text_style=$(this).css('background-color' ,'aquamarine');
      var link_name = $(this).attr('name');
    //alert(link_name);
  } );
} );

</script>
</html>
