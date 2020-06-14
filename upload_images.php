<?php

require_once('header.php');
check_logged_in();
check_profile($_SESSION['uid'], $conn);
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