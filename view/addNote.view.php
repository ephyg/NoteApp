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
                    <h2>John Doe</h2>
                    <h3>johndoe@gmail.com</h3>
                </div>
                <button type="submit" name="logout">
                    <img src="../Assets/Vector.svg" alt="">
                </button>
            </div>
        </div>
        <form class="addNote" method="POST" action="/addNote">
            <label for="title">Title</label>
            <input type="text" name="title" class="inpt" id="title" required>
            <p class="error">add title</p>
            <label for="content">Content</label>
            <textarea name="content" class="inpt" id="content" required></textarea>
            <p class="error">add a content</p>
            <input type="submit" class="inpt" value="Save">
            <button class="btn">Cancel</button>
        </form>
    </div>
    </div>
</body>

</html>