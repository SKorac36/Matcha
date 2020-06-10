<?php
    
    function reset_password_email($email, $username, $id)
    {
        $to = $email;
        $subject = "Password reset";
        $header = "From: team@matcha.co.za";
        $txt = "Dear $username
        
        You have indicated that you would like to reset your password,
        if you would like to reset your password please follow this link:
        http://localhost:8080/Matcha/reset.php?id=$id&reset=true
        
        If you have not indicated that you want to reset your password, please ignore this message.
        ";
        mail($to, $subject, $txt, $header);

    }
    function password_reset_email($email, $new)
    {
        $to = $email;
		$subject = "New Password";
		$header = "From: team@matcha.co.za";
		$txt = "Your new password is: ". $new. "
		
				You can change your password by going to the settings.
				
				Regards
				Matcha";

        mail($to,$subject,$txt,$header);
    }
?>