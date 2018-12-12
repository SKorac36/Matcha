<?php
    require_once('header.php');
    if (isset($_SESSION) || isset($_SESSION['uid']))
    {
        $uid = $_SESSION['uid'];
        $query = "SELECT * FROM Matcha.Profiles JOIN Matcha.users ON Matcha.profiles.id=Matcha.users.id WHERE Matcha.profiles.id=?";
        $sql = $conn->prepare($query);
        $sql->execute([$uid]);
        $profile = $sql->fetch();
        $query = "SELECT *FROM Matcha.Images WHERE id=?";
        $sql = $conn->prepare($query);
        $sql->execute([$uid]);
        $pic = $sql->fetch();
        $first_name = $profile['first_name'];
        $last_name = $profile['last_name'];
        $bio = $profile['bio'];
        $age = $profile['age'];
        $path = $pic['path'];
    }

    // var_dump($profile);
?>
<html>
<div class="container-fluid w3-light-grey">
<div align="center"><?php  
    echo '<img src="'.$path.'"</img>';
    echo '<p>'.$first_name.' '.$last_name.' '.$age.' location:<br>'.$bio.'
    </p>';
  ?>
  </div>
</div>
<?php
    include('footer.php');
?>
</html>
