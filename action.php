<?php 
include('classes/db_connect.php');
require('PHPMailer/PHPMailerAutoload.php');
if(isset($_POST['submit'])){
     $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $message = $_POST['message'];
    // date_default_timezone_set('Asia/Kolkata'); 
    // $date = date("d-m-Y H:i:s");
    $sql = ("INSERT INTO book_data(name, email,mobile,message)
      VALUES ('$name','$email','$mobile','$message')");
      // use exec() because no results are returned
      $results=$con->exec($sql);
      // $results = mysqli_result($con, $sql);
      if($results!=0){
      // if($sql!=0){
                        $mail = new PHPMailer();
                        $mail->IsSMTP();
                        $mail->Host = "oldgoldenbook.in";  /*SMTP server*/

                        $mail->SMTPAuth = true;
                        //$mail->SMTPSecure = "ssl";
                        $mail->Port = 587;
                        $mail->Username = "";  /*Username*/
                        $mail->Password = "";    /**Password**/

                        $mail->From = "kirti.s@finoviti.com";    /*From address required*/
                        $mail->FromName = "Golden Book";
                        $to=$email;
                        $mail->AddAddress($to);
                        //$mail->AddReplyTo("mail@mail.com");

                        $mail->IsHTML(true);

                        $mail->Subject = "Thank You for your query";
                        //$mail->Body = nl2br("Thank You for contacting us. We will Contact you shortly.");
                        
                        //$mail->AltBody = "This is the body in plain text for non-HTML mail clients";
                         $mess = ( "<html>\r\n");
                        $mess .=( "<head>\r\n");
                        $mess .=( "<title></title>\r\n");
                        $mess .=( "</head>\r\n");
                        $mess .=( "<body>\r\n");
                        $mess .= ' 
                       <table width="660" border="0" align="center" cellpadding="30" cellspacing="1" bgcolor="#de302f" style="line-height:20px;">
                            <tr>
                                <td bgcolor="#F8E0E0" >
                                    <font face="Arial, Helvetica, sans-serif" size="2"><strong style="text-transform: capitalize;">Dear '.$name.', </strong>
                                    <p> <h3 style="color:green;">Thankyou for Registration!</h3> </p>
                                    
                                  
                                    
                                    </font>
                                </td>
                            </tr>
                        </table>
                        ';
                                $mess .=( "</body>\r\n");
                        $mess .=( "</html>\r\n");
                         $mail->Body = $mess;
                        if(!$mail->Send())
                        {
                        echo "Message could not be sent. <p>";
                        echo "Mailer Error: " . $mail->ErrorInfo;
                        exit;
                        }

                        $mail1 = new PHPMailer();

                        $mail1->IsSMTP();
                        $mail1->Host = "oldgoldenbook.in";  /*SMTP server*/

                        $mail1->SMTPAuth = true;
                        //$mail->SMTPSecure = "ssl";
                        $mail1->Port = 587;
                        $mail1->Username = " ";  /*Username*/
                        $mail1->Password = " ";    /**Password**/
                        $mail1->From = "kirti.s@finoviti.com";
                            /*From address required*/
                        $mail1->FromName = "Golden Book";
                        //$mail1->AddAttachment('img_girl.jpg','logo');
                        //$mail1->AddEmbeddedImage('img_girl.jpg','logo');

                       $mail1->AddAddress("surajsinghmdb@gmail.com");
                        $mail1->AddCC("neelanjal@finoviti.com");
                        $mail1->AddBCC("brijesh@finoviti.com");
                        $mail1->IsHTML(true);

                        $mail1->Subject = "Mail from Golden Book - Book Your 5% Offer";  
                        $message = ( "<html>\r\n");
                                $message .= ( "<head>\r\n");
                                $message .= ( "<title></title>\r\n");
                                $message .= ( "</head>\r\n");
                                $message .= ( "<body>\r\n");
                                $message .= '
                         

                        <font face="Arial, Helvetica, sans-serif" size="2">
                        <table width="600" border="0" cellspacing="0" cellpadding="1">
                            
                            <tr >
                                <td bgcolor="#CCCCC">

                                    <table width="100%" border="0" cellspacing="1" cellpadding="4"> 
                                        <tr style="color: #FFFFFF;">
                                            <td colspan="2" align="center" bgcolor="#DE3030"><font size="2" face="Arial, Helvetica, sans-serif"></font>Following Delegate is trying to get in touch with us.</td>
                                        </tr>                
                                        
                    
                                       
                                        <tr>
                                            <td width="50%" bgcolor="#FFFFFF">Contact_Person</td> 
                                            <td width="50%" bgcolor="#FFFFFF">' . $name . '</td>
                                        </tr> 
                                
                                    </table>
                                </td>
                            </tr>
                        </table>
                        </font>
                                    ';
                                $message .= ( "</body>\r\n");
                                $message .= ( "</html>\r\n");

                        $mail1->Body = $message;
                        //$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

                        if(!$mail1->Send())
                        {
                        echo "Message could not be sent. <p>";
                        echo "Mailer Error: " . $mail1->ErrorInfo;
                        exit;
                
                }else{

                     $status = 'success'; 
                    /*$statusMsg = 'Your contact request has submitted successfully.'; */
                    $statusMsg='<div class="alert alert-success"><strong>success!</strong> Your contact request has submitted successfully..</div>';

                    /*echo "<script>setTimeout(function(){
                                    window.location.href = 'https://ciidigital.in/FUTURETECH/index.html';
                                  }, 5000);
                         </script>";*/
                   // echo "<script>window.location.href='Registration-Form.php';</script>";
                    // echo "<div style'text-align: center;' ><h1 style='color:green'>Thankyou your record successfully submit!<span style='font-size:100px;'>&#128522;</span><h1>
                    // <div>";
                  echo "<script>setTimeout(function(){
                         window.location.href = 'index.php';
                                  }, 4000);
                         </script>";
                       

                }

        
      }else{
        echo "not submitted";
      }
      
}

 ?>