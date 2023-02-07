<?php
require_once "recaptchalib.php";
$secret = "6LdJJgEVAAAAAOQ6RLqNZaUal6Plx3BymkWdLqGn";
$reCaptcha = new ReCaptcha($secret);
$response = null;
$miamail = "tommaso.diotalevi@unibo.it";
$successo = $_POST['successo'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$msg = $_POST['msg'];
$messaggio = "Nome: " . $nome . "\nEmail: " . $email . "\nMessaggio: " . $msg;
$headers = "From: " . $miamail . "\r\n" . "Reply-To: " . $miamail;
// if submitted check response
if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}

if ($response != null && $response->success) {
mail($miamail,"Messaggio dal sito",$messaggio,$headers);
header("location: " . $successo);
}
else {
	echo "<b><span style='color: #ff2600;'>Please confirm the Captcha!</span></b>";
}

?>