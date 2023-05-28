<?php require('./Model/Database.php') ?>
<?php require('validator.php') ?>

<?php
require('function.php');

if (!isset($_SESSION['user']) ?? false) {
    header('Location: /login');
};

if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: /login');
    die();
}
if (isset($_POST['cancel'])) {
    header('Location: /takeNote');
    die();
}

$SessionEmail = $_SESSION['user']['email'];
$SessionName = $_SESSION['user']['firstName'];
$title = $_POST['title'];
$content = $_POST['content'];

$db = new DBconnection();
$userQuery = "select * from User where email= ?";
$User = $db->Query($userQuery, [$SessionEmail]);

// dd($_SERVER);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $verify = new Validator();
    $titleValidation = $verify->validateTitle($title);
    $titleError = $verify->errors['title'];
    $contentValidation = $verify->validateContent($content);
    $contentError = $verify->errors['content'];
    if (!isset($titleError) and !isset($contentError)) {
        $currentTime = date('Y-m-d H:i');
        $query = "INSERT INTO `Notes` (`id`, `title`, `note`, `time`, `user_email`) VALUES (NULL, '$title', '$content', '$currentTime', '$SessionEmail')";
        $db->ReadOrInsert($query);
        header('Location:/takeNote');
    }
}
?>

<?php require('./view/addNote.view.php'); ?>
