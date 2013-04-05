<?php
include 'plugins/sendgrid-php/SendGrid_loader.php';
$sendgrid = new SendGrid('datenightworks', 'dnw*123pass');

$partnerEmail = $_POST["partnerEmail"];
$directorEmail = 'dev@jakeleboeuf.com';

$mail = new SendGrid\Mail();
$mail->
  addTo($partnerEmail)->
  setFrom($directorEmail)->
  setSubject('Welcome to Date Night')->
  setText('Welcome to Date Night! Visit subdomain.datenightworks.com/partners/?edit=profile to complete your profile!')->
  setHtml('<strong>Welcome to Date Night!</strong> Visit <a href="datenightworks.com/partners/?edit=profile">subdomain.datenightworks.com/partners/?edit=profile</a> to complete your profile!');


$sendgrid->
smtp->
  send($mail);