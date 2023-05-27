<?php require('./Model/Database.php') ?>
<?php require('validator.php') ?>

<?php



$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];
if (isset($_SESSION['user']) ?? false) {
    header('Location: /takeNote');
    die();
};

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $verify = new Validator();
    // $verify->setEmpty();
    // Validate FirstName
    $validateFirstName = $verify->validateName($firstName, "first name");
    $firstNameError = $verify->errors['first name'];

    // Validate LastName
    $validateLastName = $verify->validateName($lastName, "last name");
    $lastNameError = $verify->getErrors()['last name'];

    // Validate email
    $validateEmail = $verify->validateEmail($email);
    $emailError;
    if (isset($validateEmail)) {
        $emailError = $verify->getErrors()['email'];
    } else {
        $validateEmailExist = $verify->emailExist($email);
        $emailError = $verify->getErrors()['email'];
    }


    // For Password
    $validateConfirmPassword = $verify->validatePassword($confirm);
    $validatePassword = $verify->validatePassword($Password);
    $passwordError;

    if (isset($validatePassword)) {
        $passwordError = $verify->getErrors()['password'];
    } else {
        $verifyMatchPasswod = $verify->matchAnotherPassword($password, $confirm);
        $passwordError = $verify->getErrors()['password'];
    }
    echo ($firstNameError . '<br>' . $lastNameError . '<br>' . $emailError . '<br>' . $passwordError);

    if (!isset($firstNameError) and !isset($lastNameError) and !isset($emailError) and !isset($passwordError)) {
        $password = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO `User` (`firstName`, `lastName`, `email`, `password`) VALUES ('$firstName', '$lastName', '$email', '$password')";
        $db->Insert($query);

        echo "registered";
        $_SESSION['user'] = [
            'email' => $email,
            'firstName' => $firstName
        ];
        // header('Location: /takeNote');
    }
}
require('./view/signup.view.php');

?>


