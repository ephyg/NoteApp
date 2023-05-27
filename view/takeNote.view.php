<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/view/css/style.css">
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
                <form method="POST">
                    <button type="submit" name="logout">
                        <img src="../Assets/Vector.svg" alt="">
                    </button>
                </form>
            </div>
        </div>
        <div class="note-lists">
            <a href="/addNote">
                <div class="add-new-note">
                    <img src="../Assets/Vectoradd.svg" alt="">
                    <h3>Add new Note</h3>
                </div>
            </a>
            <?php for ($i = 0; $i < count($items); $i++) { ?>
                <div class="note">
                    <h2><?php echo $items[$i]['title'] ?></h2>
                    <p> <?php
                        if (strlen($items[$i]['note']) > 155) {
                            $String = $items[$i]['note'];
                            $NoteDisplay = substr($String, 0, 170);
                            echo $NoteDisplay . "  ...";
                        } else {
                            echo $items[$i]['note'];
                        }
                        ?> </p>
                    <p class="date"><?php echo $items[$i]['time'] ?></p>
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>