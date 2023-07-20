<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>
<body>
    <div>
        <h3>Search button</h3>
        <form class="searchform" action="search.php" method="post">
            <label for ="search">Search for users:</label>
            <input type="text" name="usersearch" id="search" placeholder="Search...">
            <button>Search</button>
        </form>
    </div>
    <div>
        <h1>Sign Up</h1>
    <form action="includes/formhandler.inc.php" method="post">
        <input type="text" name="username" placeholder="Username">
        <br>
        <input type="email" name="email" placeholder="E-mail">
        <br>
        <input type="password" name="password" placeholder="Password">
        <br>
        <button type="submit" name="submit">Submit</button>
    </form>
    </div>
    <br>
    <div>
        <h3>Change Account</h3>
        <form action="includes/userchange.inc.php" method="post">
            <input type="text" name="username" placeholder="Username">
            <br>
            <input type="email" name="email" placeholder="E-mail">
            <br>
            <input type="password" name="password" placeholder="Password">
            <br>
            <button type="submit" name="submit">Update</button>
        </form>
    </div>
    <div>
        <h3>Delete Account</h3>
        <form action="includes/userdelete.inc.php" method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <br>
            <button type="submit" name="submit">Delete</button>
        </form>
    </div>
    <div>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
    </form>
    </div>
</body>
</html>