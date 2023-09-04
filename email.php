<?php

require_once 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;

header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

header('Content-Type: application/json');

$ret = [
    'result' => 'OK',
];

$data = json_decode(file_get_contents('php://input'), true);
// error_log(getenv("SMTP_PASSWORD"));
print json_encode($ret);


$mail = new PHPMailer();

// Settings
$mail->IsSMTP();
$mail->CharSet = 'UTF-8';

$mail->Host       = "send.one.com";    // SMTP server example
$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Port       = 465;  
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;                  // set the SMTP port for the GMAIL server
$mail->Username   = "estimate@entreprisebelair.com";            // SMTP account username example
$mail->Password   = getenv("SMTP_PASSWORD");            // SMTP account password example

// Content
$mail->setFrom('estimate@entreprisebelair.com');   
$mail->addAddress('neevalex@gmail.com');

$mail->isHTML(true);                       // Set email format to HTML


// 'action' : 'callus'
// ({'action' : 'shedulecall', email: cfData, pdf: pdfRows, date: date.toDateString() + ' | ' + time.getHours() + ':' + time.getMinutes()});

if( $data['action']=='callus' ) {
    $mail->Subject = 'Client wants to have a call ASAP ('.$data['email']['name'].')';
    $mail->Body    = '<b>Client data:</b> '.PHP_EOL.''.PHP_EOL.' Name: '.$data['email']['name'].''.PHP_EOL.'Phone: '.$data['email']['phone'].''.PHP_EOL.'Email: '.$data['email']['email'].''.PHP_EOL.'Address: '.$data['email']['address'].''.PHP_EOL.''.''.PHP_EOL.'Urgency: '.$data['email']['urgent'].''.PHP_EOL.''.PHP_EOL.''.PHP_EOL.''.'PDF Data '.PHP_EOL.' <pre language="js">'.json_encode($data['pdf']).'</pre>';
}

if( $data['action']=='shedulecall' ) {
    $mail->Subject = 'Client wants to shedule a call ('.$data['email']['name'].')';
    $mail->Body    = '<b>Client data:</b> '.PHP_EOL.''.PHP_EOL.' Name: '.$data['email']['name'].''.PHP_EOL.'Phone: '.$data['email']['phone'].''.PHP_EOL.'Email: '.$data['email']['email'].''.PHP_EOL.'Address: '.$data['email']['address'].''.PHP_EOL.''.''.PHP_EOL.'Urgency: '.$data['email']['urgent'].''.PHP_EOL.' Time: '.$data['date'].''.PHP_EOL.''.PHP_EOL.''.PHP_EOL.''.'PDF Data '.PHP_EOL.' <pre language="js">'.json_encode($data['pdf']).'</pre>';
}

if( $data['action']=='send' ) {
    $mail->Subject = 'New submission from entreprisebelair.com ('.$data['email']['name'].')';
    $mail->Body    = '<b>Client data:</b> '.PHP_EOL.''.PHP_EOL.' Name: '.$data['email']['name'].''.PHP_EOL.'Phone: '.$data['email']['phone'].''.PHP_EOL.'Email: '.$data['email']['email'].''.PHP_EOL.'Address: '.$data['email']['address'].''.PHP_EOL.''.''.PHP_EOL.'Urgency: '.$data['email']['urgent'].''.PHP_EOL.''.PHP_EOL.''.PHP_EOL.''.'PDF Data '.PHP_EOL.' <pre language="js">'.json_encode($data['pdf']).'</pre>';
}


//error_log(json_encode($data['pdf']));
//error_log(json_encode($mail->Body));

$apiToken = getenv("TELEGRAM_KEY"); 
 
$t_data = [ 
 'chat_id' => '@belairestimate', 
 'text' => $mail->Subject.' ::: '.$mail->Body
];
 
if( strlen(json_encode($data['pdf'])) > 10) {
    $mail->send();
    $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($t_data).'&parse_mode=html' );
}



