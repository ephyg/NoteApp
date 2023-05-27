
<?php
session_start();
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$Router = [
    '/' => './controller/login.php',
    '/login' => './controller/login.php',
    '/signup' => './controller/signUp.php',
    '/takeNote' => './controller/takeNote.php',
    '/addNote' => './controller/addNote.php',
];

if (array_key_exists($uri, $Router)) {
    require $Router[$uri];
}




// try {
//     $id = 6;
//     $db = new DBconnection();
//     $query = "select * from Notes where id= ?";
//     $items = $db->Query($query, [$id]);
//     // for ($i = 0; $i < count($items); $i++) {
//     //     echo '<li>' . ($items[$i]['note']) . '</li>';
//     // };
// } catch (PDOException $e) {
//     echo 'connection-failed: ' . $e->getMessage();
// }
?>
