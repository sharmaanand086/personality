<?php
require_once('class.phpmailer.php');
include('pdf.php');
include('pdfcontent.php');
$name 		= 	$_POST['name'];
$email		= 	$_POST['email'];
$phone 		= 	$_POST['phone'];
$html_code = ' ';
$html_code .='<html>
  <head>
<style>#items {
    clear: both;
    width: 100%;
    margin: 10px 0 0 0;
    border: 1px solid black;
}
body{width:80%;}
tr
{
    width:100%;
}
.itemrow{
border-right: 1px solid black;
    border-bottom: 1px solid black;}
.itemrow1{
border-right: 1px solid black;
border-top: 1px solid black;
border-left: 1px solid black;
  }
  footer {
                position: fixed; 
                bottom: -30px; 
                left: 0px; 
                right: 0px;
                height: 60px; 

                /** Extra personal styles **/
               /** background-color: #03a9f4;**/
                color: #ccc;
                text-align: center;
                line-height: 35px;
                letter-spacing:28px;
                font-size:30px;
                padding-bottom:40px;
            }
  </style>
  </head>
  <body cz-shortcut-listen="true" style="">
  <footer>
          <img src="img/pdf_logo.jpg" style="width:50%;margin:0px;">
        </footer>
  <table id="mainTable" style="width:100%;">
    	<tbody>
    	 <tr >
    	 <td>
                <img src="img/2019-02-21.jpg" style="width:1500%;margin:0px;"></td>
                <td style="padding-left:450px; text-align:right;">Two</td>
        </tr>
        </tbody>
  </table>
  <table id="mainTable" style="width: 730px;border:none;margin-top:3%;" cellspacing="0">
    	<tbody>
        <tr style="background:#ff6f0d;width:730px;height: 100px;margin:30px 0px;" >
                <td><h5 style="font-family: Tahoma, Arial, Verdana,sans-serif;margin:20px 0px 20px;padding-left:20px;color:#fff;font-size:22px;">Name :
                <span style="font-family: Tahoma, Arial, Verdana,sans-serif;margin:0px 0px 20px;color:#fff;font-size:22px;padding-left:0px;margin-left:0;"> '.$name.'</span></h5></td>
                
                
        </tr>
  </tbody>
  </table>
  ';
  
$abc = array();
$a=1;
while($a < 145)
{
 $abc1 = $_POST['radioname'.$a];
 $a++;
 array_push($abc, $abc1 );
}
$vals = array_count_values($abc);
$value = max($vals);
foreach ($vals as $row => $value1) {
		
		if($value1 == $value)
		{
			if($row == 1){
		        $html_code .= $type1;
		    }
		    if($row == 2){
		        $html_code .= $type2;
		    }
		    if($row == 3){
		        $html_code .= $type3;
		    }
		    if($row == 4){
		        $html_code .= $type4;
		    }
		    if($row == 5){
		        $html_code .= $type5;
		    }
		    if($row == 6){
		        $html_code .= $type6;
		    }
		    if($row == 7){
		        $html_code .= $type7;
		    }
		    if($value == 8){
		        $html_code .= $type8;
		    }
		    if($row == 9){
		        $html_code .= $type9;
		    }
		}
}


$html_code .='</body></html>';
 $file_name = $name . '.pdf';
 //$html_code = ' ';
// $html_code .= fetch_customer_data($connect);
 $pdf = new Pdf();
 $pdf->load_html($html_code);
 $pdf->render();
 $file = $pdf->output();
 $dir = "invoicepdf"; 
 file_put_contents($file_name , $file);
 move_uploaded_file($file_name, "$dir".$file);
 
 
 $mail = new PHPMailer(true); // the true param means it will throw exceptions on     errors, which we need to catch
	$mail->IsSMTP(); // telling the class to use SMTP
	$mail->Host = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxx';  // Specify main and backup server
	$mail->Port = '26';
	$mail->SMTPAuth = 'true';                               // Enable SMTP authentication
	$mail->Username = 'xxxxxxxxxxxxxx';                            // SMTP username
	$mail->Password = 'xxxxxxxxxxxx';                           // SMTP password
	$mail->SMTPSecure = 'SSL/TLS';
	try 
	{
		 
		//$mail->AddAddress('abc@gmail.com', '');	 
         $mail->AddAttachment($file_name);    
		 $mail->Subject = 'personality Assessment By Arfeen Khan';
		 $mail->Body = 'Below is the result of '.$name.', for Personality Assessment Quiz. 
		 ';
                 $mail->IsHTML(true);
		 $mail->Send();
				// window.location.href = 'http://magicconversion.com/test/invoice_sample.php';
			} 
			catch (phpmailerException $e) 
			{
				echo $e->errorMessage(); //Pretty error messages from PHPMailer
			} 
			catch (Exception $e) 
			{
				echo $e->getMessage(); //Boring error messages from anything else!
			}
?>
 <script>window.location.href="http://arfeenkhan.com/personality-assessment/thankyou.php";</script> 
