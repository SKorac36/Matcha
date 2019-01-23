<?php
require_once('header.php');



var_dump($_POST);
?>
<form class="form" method="post" action="search.php">
<div id="slidecontainer">

<input name="age" type="range" min="0" max="100" value="10" class="slider-pic" id="id1"> <br>
<input name="distance" type="range" min= "0" max="100" value="25" class="slider-pic" id="id2">  <br>
<input name="fame_rating" type="range" min="0" max="100" value="50" class="silder-pic" id="id3"><br>
<span>Age gap: </span> <span id="f" style="font-weight:bold;color:red"></span> <br>
<span>Distance gap: </span> <span id="e" style="font-weight:bold;color: green"></span> <br>
<span>Fame rating gap: </span> <span id="g" style="font-weight:bold;color: yellow"></span>
<script>

var slidePic = document.getElementById("id1");
    slideDis = document.getElementById("id2");
    slideFr = document.getElementById("id3")
var y = document.getElementById("f");
    x = document.getElementById("e");
    z = document.getElementById("g");
y.innerHTML = slidePic.value;
x.innerHTML = slideDis.value;
z.innerHTML = slideFr.value;
slidePic.oninput = function() {
    y.innerHTML = this.value;

}
slideDis.oninput = function() {
    x.innerHTML = this.value;

}
slideFr.oninput = function()
{
    z.innerHTML = slideFr.value;
}

</script>


</div>
<input type="submit" class="btn" name="submit" value="OK"/>
</form>