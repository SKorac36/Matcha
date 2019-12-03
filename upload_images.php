<?php

require_once('header.php');

if (isset($_SESSION) && !empty($_SESSION['uid']))
{
    $query = "SELECT COUNT(*) FROM Matcha.Images WHERE userid=?";
    $sql = $conn->prepare($query);
    $sql->execute([$_SESSION['uid']]);
    $count = $sql->fetch();
    if ($count == 5)
        alert("You can have a maximum of only 5 images", "index.php");
}
else
    header("location: " . "create_account.php");
?>
<html>
<div id="main">
<form class="form" id="upload" method="POST" action="upload_image.php" enctype="multipart/form-data">
    Upload images. Maximum 5!
<input type="file" name="file" id="file"> <br>
<input type="submit" value="Click to upload" name="submit">
</form>
</div>
    <?php
        require_once('footer.php');
    ?>

</html>