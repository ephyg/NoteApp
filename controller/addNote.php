<?php require('./view/addNote.view.php') ?>
<?php require('./Model/Database.php') ?>

<?php


if (!isset($_SESSION['user']) ?? false) {
    header('Location: /login');
};

// dd($_POST['logout']);
$SessionEmail = $_SESSION['user']['email'];

$title = $_POST['title'];
$content = $_POST['content'];


if (isset($_POST['title']) & isset($_POST['content']))
    $currentTime = date('Y-m-d H:i');
echo ($currentTime);
$query = "INSERT INTO `Notes` (`id`, `title`, `note`, `time`, `user_email`) VALUES (NULL, '$title', '$content', '$currentTime', '$SessionEmail')";
$db = new DBconnection();
$db->ReadOrInsert($query);
header('Location:/takeNote')
?>