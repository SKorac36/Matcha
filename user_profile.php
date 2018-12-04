<?php
    require_once('header.php');
    
    if (isset($_GET) && isset($_GET['id']))
        $id = (int)$_GET['id'];
    $query = "SELECT * FROM Matcha.Profiles WHERE id=?";
    $sql = $conn->prepare($query);
    $sql->execute([$id]);
    $search = $sql->fetch();
    if ($search)
        $query = "UPDATE Matcha.Profiles SET id=?, age=?, gender=?,  preference=?, bio=?";
    elseif (!$search)
        $query = "INSERT INTO Matcha.Profiles(id,age,gender,preference, bio) VALUES(?,?,?,?,?)";   
    if (isset($_SESSION) && !empty($_SESSION['uid']))
    {
        if (isset($_POST['submit']))
        {
            $gender = $_POST['Gender'];
            $pref = $_POST['Pref'];
            $bio = $_POST['bio'];
            $sql = $conn->prepare($query);
            $sql->execute([$id, 18, $gender, $pref, $bio]);
        }
    }
    var_dump($_POST);
?>
<html>
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel= "stylesheet" href="style.css"> -->
    <link rel= "stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
    <?php
        echo '<form class= "form" method="post" action="user_profile.php?id='.$id.'" align="center">'
        ?>
        <select name="Gender"><?php
            
            $male =  '';
            $female = '';
            $other = '';
            if ($gender == "Male")
                $male = 'selected';
            else if ($gender =="Female")
                $female = 'selected';
            else if ($gender == "Other")
                $other = 'selected';
        ?>
            <option value="Male" <?php echo $male ?>>Male</option>
            <option value="Female"<?php echo $female ?>>Female</option>
            <option value="Other"<?php echo $other ?>>Other</option>
        </select>
        <select name="Pref"><?php
            
            $straight =  '';
            $gay = '';
            $bisexual = '';
            $asexual = '';
            if ($pref == "Straight")
                $straight = 'selected';
            else if ($pref =="Gay")
                $gay = 'selected';
            else if ($pref =="asexual")
                $asexual = 'selected';
            else if ($pref == "bisexual")
                $bisexual = 'selected';
        ?>
            <option value="Straight"<?php echo $straight ?>>Straight</option>
            <option value="Gay"<?php echo $gay ?>>Gay</option>
            <option value="Bisexual"<?php echo $bisexual ?>>Bisexual</option>
            <option value="Asexual"<?php echo $asexual ?>>Asexual</option>
        <?php
            echo '<textarea name="bio">'.$bio.'</textarea>'
		 ?>
        <input type="submit" class="btn" name="submit" value="OK"/>
        </form>
<?php
    include('footer.php');
?>
</html>