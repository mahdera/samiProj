<?php
    function sendEmail($to, $subject, $message, $from, $ccTo = null, $bcc = null){
        $message = 'Originally sent to: ' . $to . "<br />\n" . $message;
        if ($ccTo != null){
          $message = 'Originally cc\'d to: ' . $ccTo . "<br />\n" . $message;
          $ccTo = null;
        }
        if ($bcc != null){
          $message = 'Originally bcc\'d to: ' . $bcc . "<br />\n" . $message;
          $bcc = null;
        }
        //$to = self::TEST_EMAIL;
        $subject = 'TEST EMAIL: ' . $subject;
      

      $headers = "From: $from\r\n";
      if ($ccTo != NULL)
        $headers .= "CC: $ccTo\r\n";
      if ($bcc != NULL)
        $headers .= "BCC: $bcc\r\n";
      $headers .= "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
      $headers .= "Content-Transfer-Encoding: 8bit\r\n";

      // now lets send the email.
      try{
        mail($to, $subject, $message, $headers);
      }catch (Exception $ex){
        error_log($ex->getTraceAsString());
      }
    }
?>