<?php

require_once('header.php');

if (isset($_SESSION) && !empty($_SESSION['uid']))
{
    $query = "SELECT COUNT(*) FROM Matcha.Images WHERE userid=?";
    $sql = $conn->prepare($query);
    $sql->execute([$_SESSION['uid']]);
    $count = $sql->fetch();
    if ($count == 5)
        alert("You can have a maximum of only 5 images", "upload_images.php");
}
?>
<html>
<form class="form" id="upload" method="POST" action="upload_image.php" enctype="multipart/form-data">
    Upload your profile picture
<input type="file" name="file" id="file"> <br>
<input type="submit" value="Click to upload" name="submit">
</form>
</html>