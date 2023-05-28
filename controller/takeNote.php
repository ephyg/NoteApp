<?php require('./Model/Database.php') ?>
<?php require('./function.php') ?>
<?php

if (!isset($_SESSION['user']) ?? false) {
    header('Location: /login');
};
$SessionEmail = $_SESSION['user']['email'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_destroy();
    header('Location: /login');
    var_dump($_SESSION['user']);
    die();
}
try {
    $db = new DBconnection();
    $query = "SELECT * FROM `Notes` where user_email= ? ORDER BY `Notes`.`time` DESC;";
    $items = $db->Query($query, [$SessionEmail]);
    $userQuery = "select * from User where email= ?";
    $User = $db->Query($userQuery, [$SessionEmail]);
    
} catch (PDOException $e) {
    echo 'connection-failed: ' . $e->getMessage();
}
?>
<?php require('./view/takeNote.view.php') ?>
