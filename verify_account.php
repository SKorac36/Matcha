<?php

if(isset($_GET['id']) && isset($_GET['code']))
{
    $query = "SELECT * FROM Matcha.Users WHERE id=?";
    $sql = $conn->prepare($query);
    $sql->execute([$_GET['id']]);
    $user = $sql->fetch();
    if ($user['code'] == $_GET['code']){
        $query = "UPDATE Matcha.Users SET verified=1 WHERE id=?";
        $sql = $conn->prepare($query);
        $sql->execute([$_GET['id']]);
        alert("You have succesfully verified your account", "login.php");
    }
    alert("Youre verifcation code if faulty, please reset it. ", $index);
}
?>