
<?php
session_start();
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$Router = [
    '/' => './controller/login.php',
    '/login' => './controller/login.php',
    '/signup' => './controller/signUp.php',
    '/takeNote' => './controller/takeNote.php',
    '/addNote' => './controller/addNote.php',
    '/editDelete' => './controller/editDelete.php',
];

if (array_key_exists($uri, $Router)) {
    require $Router[$uri];
}
?>
