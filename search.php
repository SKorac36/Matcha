<?php
require_once('header.php');
?>

<div id="slidecontainer">

<h4>Image:</h4> 
<p style="margin-bottom:20px"><input type="range" min="1" max="100" value="50" class="slider-pic" id="id3"></p>
<span>Value:</span> <span id="f" style="font-weight:bold;color:red">26</span>

<script>

var slidePic = document.getElementById("id3");
var y = document.getElementById("f");
y.innerHTML = slidePic.value;
slidePic.oninput = function() {
    y.innerHTML = this.value;

}

</script>

</div>