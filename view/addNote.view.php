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
    <div class="note-container">
        <div class="nav-bar">
            <h1>MyNotebook</h1>
            <div class="profile">
                <div>
                    <h2><?= $User[0]['firstName'] ?></h2>
                    <h3><?= $SessionEmail ?></h3>
                </div>
                <form action="" method="POST">
                    <button name="logout">
                        <img src="../Assets/Vector.svg" alt="">
                    </button>

                </form>
            </div>
        </div>
        <form class="addNote" method="POST" action="/addNote">
            <label for="title">Title</label>
            <input type="text" name="title" class="inpt" id="title" value="<?php echo htmlspecialchars($_POST['title']) ?? '' ?>">
            <p class="error"><?= $titleError  ?></p>
            <label for="content">Content</label>
            <textarea name="content" class="inpt" id="content"><?php echo htmlspecialchars($_POST['content']) ?? '' ?></textarea>
            <p class="error"><?= $contentError ?></p>
            <input type="submit" class="inpt" value="Save">
            <button name="cancel" class="btn">Cancel</button>
        </form>
    </div>
    </div>
</body>

</html>