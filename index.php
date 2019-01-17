<?php

require_once('header.php');
echo hash('whirlpool', '1234$ABCs');
?>
<html>
<div id="wrapper">
<h1>Home</h1>
</div>
<?php
include('footer.php');
?>
</html>