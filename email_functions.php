<?php
    
    function reset_password_email($email, $username, $id)
    {
        $subject = "Password reset";
        $header = "From: team@matcha.co.za";
        $txt = "Dear $username
        
        You have indicated that you would like to reset your password,
        if you would like to reset your password please follow this link:
        http://localhost:8080/Matcha/reset.php?id=$id&reset=true
        
        If you have not indicated that you want to reset your password, please ignore this message.
        ";
        mail($email, $subject, $txt, $header);

    }
    function password_reset_email($email, $new)
    {

		$subject = "New fassword";
		$header = "From: team@matcha.co.za";
		$txt = "Your new password is: ". $new. "
		
				You can change your password by going to the settings.
				
				Regards
				Matcha";

        mail($email,$subject,$txt,$header);
    }

    function account_verification_email($email, $username, $id, $code)
    {
        $subject = "Verification code";
        $header = "From: team@matcha.co.za";
        $txt = "Dear $username
        
        Welcome to Matcha, follow this link to verify your account:

            http://localhost:8080/Matcha/verify_account.php?id=$id&code=$code
            
        Enjoy your stay.
        ";

        mail($email, $subject, $txt, $header);
    }
?>