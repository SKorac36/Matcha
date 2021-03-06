<?php
require_once('header.php');

check_logged_in();
check_profile($_SESSION['uid'], $conn);
$query = "SELECT tags FROM Matcha.Profiles WHERE id=?";
$sql = $conn->prepare($query);
$sql->execute([$_SESSION['uid']]);
$tags = $sql->fetch();
$max = count($tags) + 1;
if (isset($_POST['submit']))
{
    $userid = $_SESSION['uid'];
    $age_gap = $_POST['age'];
    $distance = $_POST['distance'];
    $fame_rating = $_POST['fame_rating'];
    $com_gap = $_POST['com_gap'];
    $query = "UPDATE Matcha.Searches SET age_gap=?, distance=?, fame_rating=?, com_gap=? WHERE id=?";
    $sql = $conn->prepare($query);
    $sql->execute([$age_gap, $distance, $fame_rating, $com_gap, $userid]);
    alert('Redirecting you to your searches', 'browse_profiles.php');
}

?>
<head>
    <title>User Setup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel= "stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<div id="main">
<form class="form" method="post" action="search.php">
<div class="slidecontainer">
<input name="age" type="range" min="0" max="100" value="0" class="slider" id="id1"> <br>
<input name="distance" type="range" min= "0" max="300" value="0" class="slider" id="id2">  <br>
<input name="fame_rating" type="range" min="0" max="100" value="0" class="slider" id="id3"><br>

<?php
echo '<input name="com_gap" type= "range" min="0" max="'.$max.'" value="0" class="slider" id="id4"><br>'?>
<span>Age gap: </span> <span id="f" style="font-weight:bold;color:red"></span> <br>
<span>Distance gap: </span> <span id="e" style="font-weight:bold;color: green"></span> <br>
<span>Fame rating gap: </span> <span id="g" style="font-weight:bold;color: yellow"></span> <br>
<span>Minimum number of common tags: </span> <span id="h" style="font-weight:bold; color:orange"></span>
<script>

var slidePic = document.getElementById("id1");
    slideDis = document.getElementById("id2");
    slideFr = document.getElementById("id3");
    slideCom = document.getElementById("id4");
var y = document.getElementById("f");
    x = document.getElementById("e");
    z = document.getElementById("g");
    w = document.getElementById("h");
y.innerHTML = slidePic.value;
x.innerHTML = slideDis.value;
z.innerHTML = slideFr.value;
w.innerHTML = slideCom.value;
slidePic.oninput = function(){
    y.innerHTML = this.value;

}
slideDis.oninput = function(){
    x.innerHTML = this.value;

}
slideFr.oninput = function(){
    z.innerHTML = this.value;
}
slideCom.oninput = function(){
    w.innerHTML = this.value 

}

</script>


</div>
<input type="submit" class="btn" name="submit" value="OK"/>
</form>
</div>
<?php

    include('footer.php');
?>