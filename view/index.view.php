<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NoteApp</title>
    <link rel="stylesheet" href="./view/css/style.css">
</head>

<body>
    <div class="login-page">
        <form action="/" method="POST" autocomplete="off">
            <h1>Login</h1>
            <label for="email" class="lbl">Email</label>
            <input type="email" name="Email" class="inpt">
            <p class="error">
                <?= $EmailError ?>
            </p>
            <label for="password" class="lbl">Password</label>
            <input type="password" name="Password" class="inpt">
            <p class="error"><?= $PasswordError ?></p>
            <button class="btn">Login</button>
            <a href="/signup">Create Account</a>
        </form>
    </div>
</body>

</html>