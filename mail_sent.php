<?php        
        $to = 'technologygroups09@gmail.com'; 
        require 'mailer/Send_Mail.php';
        $subject = "Test Mail";

        $body = "Test of mail sending";
        Send_Mail($to,$subject,$body);                    
?>
