<?php

require_once('header.php');

if (!isset($_SESSION) || empty($_SESSION['uid']))
    header("location: " . "create_account.php");
?>
<html>
<div id="main">
<form class="form" id="upload" method="POST" action="upload_image.php" enctype="multipart/form-data">
    Upload images. Maximum 5!
<input type="file" name="file" id="file" accept="image/*>"<br>
<input type="submit" value="Click to upload" name="submit">
</form>
</div>
    <?php
        require_once('footer.php');
    ?>

</html>