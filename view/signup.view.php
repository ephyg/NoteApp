<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./view/css/style.css">
</head>

<body>
    <div class="signup-page">
        <form action="" method="POST" autocomplete="off">
            <h1>Sign In</h1>
            <div class="full-name">
                <div class="first-name">
                    <label for="">First Name</label>
                    <input name="firstName" class="inpt" type="text" value="<?php echo htmlspecialchars($_POST['firstName']) ?? '' ?>">
                    <p class="error">
                        <?php
                        if (isset($verify->errors['first name'])) {
                            echo $firstNameError;
                        }else{
                            echo '';
                        }
                         ?> </p>
                </div>
                <div class="last-name">
                    <label for="">Last Name</label>
                    <input name="lastName" class="inpt" type="text" value="<?php echo htmlspecialchars($_POST['lastName']) ?? '' ?>">
                    <p class="error"><?php echo $lastNameError ?? '' ?></p>
                </div>
            </div>
            <label for="">Email</label>
            <input name="email" class="inpt" type="email">
            <p class="error"><?php echo $emailError ?? '' ?></p>
            <div class="verify-passowrd">
                <div class="only-pass-section">
                    <div class="first-password">
                        <label for="">Password</label>
                        <input name="password" class="inpt" type="password">
                        <!-- <p class="error">Password lengths must be more than 6 digits</p> -->
                    </div>
                    <div class="confirm-password">
                        <label for="">Confirm</label>
                        <input name="confirm" class="inpt" type="password">
                    </div>
                </div>
                <p class="error"><?php echo $passwordError ?? '' ?></p>

            </div>
            <button type="submit" class="btn">Create Account</button>
        </form>
    </div>
</body>

</html>