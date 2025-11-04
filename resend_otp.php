
<?php
	include_once "connection.php";
		
    $aid=$_SESSION['member_email'];
    $qry="select * from  member_tbl where member_email='".$aid."'";

    $result=mysqli_query($conn,$qry);
    if(mysqli_num_rows($result)>0)
    {
        $_SESSION['member_email']=$aid;
        $otp=rand(100000,999999);
        $time=time();
        $status=1;
        
        require 'phpmailer/PHPMailerAutoload.php';
        require 'phpmailer/class.phpmailer.php';
        $data=mysqli_fetch_array($result);
        $_SESSION['user_name_data']=$data['admin_name'];
        $otp=rand(100000,999999);
        $_SESSION['random_otp']=$otp;
        //$to_id = $_POST['toid'];
        //$_SESSION['forgot_email']=$aid;
        $aid=$_SESSION['member_email'];
        $subject = "Forgot Password";
        $setfrom="Vivahmilan";
        
        // Retrieve the email template required
        $message= '
				<html>
					<head>
						<title>HTML email</title>
						<style>
						</style>
					</head>
					<body>
						<div class="c-email" style="width:60%;margin:auto;border:1px solid #BAE3FF;border-radius:5px;padding:30px 30px 12px 30px;">
							<div style="text-align:center">
								Vivahmilan
							</div>
							<div class="c-email__content">
								<p style="font-size:14px;font-family:roboto;color:#383838;font-weight:bold;">Dear '.$_SESSION['user_name_data'].',</p>
								<o>You have requested to recover your password for online access to our website. We have generated a One - Time Passcode for you which will verify that you have requested access. This One - Time Passcode is time sensitive and valid for a single use.</o><br>
								<div class="c-email__code" style="text-align:center;margin-top:10px;margin-bottom:10px">
									<span style="font-size:15px;font-family:roboto;color:#388080;font-weight:bold;">'.$_SESSION['random_otp'].'</span>
								</div>
							</div>
							<hr>
							<div style="font-size:10px;font-family:roboto;color:#383838;text-align:center">
								<o>Thank you for utilising our services</o><br>
								<o>-</o><br>
								<o>Vivahmilan</o><br>
								<o>99986 75436, 99748 29964</o><br>
								<o>www.vivaahmilan123@gmail.com</o><br>
								<o>Vivahmilan User Authentication</o>
							</div>
						</div>
				</body>
				</html>
            ';
            $mail = new PHPMailer();
        
            $mail->isSMTP();
            //$mail->SMTPDebug = 2;
            $mail->Host = 'smtp.gmail.com';
            $mail-> SMTPSecure = 'tls';
            $mail-> SMTPAuth = true;
            $mail->CharSet = "UTF-8";
            $mail->Port = 587;
            $mail->Username	= 'vivaahmilan123@gmail.com';
            $mail->Password	= 'cqtebwsyvwpyrzkv';
            $mail->FromName = $setfrom;
            $mail->addAddress($aid);
            $mail->Subject = $subject;
            $mail->msgHTML($message);
            if($mail->send())
            {
                $str="insert into otp_status_tbl values(NULL,'".$otp."','".$status."','".$time."')";
                //echo $str;die;
                $sucess=mysqli_query($conn,$str);
                //echo hii;
                if($sucess)
                {
                    //echo hii;
                    echo ("<script>window.alert('OTP send sucessfully.please check your email') ; window.location.href='verify_code.php'; </script>");
                    //header('location:code.php');
                }
                else
                {
                    echo ("<script>window.alert('.....')") ;
                }
            }
	}
    else
    {
		echo "<script>alert('Invalid Email ID');</script>";
	}
?>