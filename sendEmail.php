 <?php
ini_set("include_path", '/home3/r58091trad/php:' . ini_get("include_path"));
require_once "Mail.php";

// SERVER CONFIG
$host     = "server-0232.whmpanels.com";
$username = "contact@traducator-portugheza.ro";
$password = "N@3SP0+q@!=P";

$smtp = Mail::factory('smtp', array(
    'host' => $host,
    'auth' => true,
    'username' => $username,
    'password' => $password
));


//START MAIL CODE HERE
$name    = $_POST['name'];
$from   = $_POST['email'];
$message = $_POST['message'];
$subject = "[Via Website]". $_POST['subject'];

$sender = "messages-noreply@traducator-portugheza.ro";
$fromFormatted = $name. " <". $from . ">";
$to = "contact@traducator-portugheza.ro";
$date = date('r', time());

$headers = array(
    'Sender'     => $sender,
    'From'       => $fromFormatted,
    'Reply-To'   => $from,
    'To'         => $to,
    'Subject'    => $subject,
    'Date'       => $date
);

$mail    = $smtp->send($to, $headers, $message);

if (PEAR::isError($mail)) {
    echo ($mail->getMessage());
} else {
    echo (200);
}