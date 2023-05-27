<?php require('./Model/Database.php') ?>
<?php require('./function.php') ?>
<?php require('validator.php') ?>
<?php

if (isset($_SESSION['user']) ?? false) {
    header('Location: /takeNote');
    die();
};

$Email = $_POST['Email'];
$Password = $_POST['Password'];
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $verify = new Validator();
    // For Email
    $verifyEmail = $verify->validateEmail($Email);
    $EmailError = $verify->getErrors()['email'];
    // For Password
    $verifyPassword = $verify->validatePassword($Password);
    $matchPass = $verify->matchPassword($Password, $Email);
    $PasswordError = $verify->getErrors()['password'];


    if (!isset($EmailError['email']) && $matchPass) {
        $_SESSION['user'] = [
            'email' => $Email
        ];
        header('Location: /takeNote');
        die();
    }
    $makeEmpty = $verify->setEmpty();
}
?>
<?php require('./view/index.view.php') ?>
