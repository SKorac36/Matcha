<?php

//include('header.php');
try {
    $array = ['musician', 'gamer', 'coder', 'cook', 'nerd'];
    $insert = serialize($array);

    $query = "UPDATE Matcha.Profiles SET tags=?";
    $sql = $conn->prepare($query);
    $sql->execute([$insert]);

    $i = 1;
    while ($i < 51) {
        $sql = $conn->prepare('INSERT INTO Matcha.searches(age_gap, distance, fame_rating, com_gap) VALUES(?,?,?,?)');
        $sql->execute([10, 25, rand(0, 50), 2]);
        $sql = $conn->prepare('INSERT INTO Matcha.online(userid,online,last_online) VALUES(?,?,?)');
        $sql->execute([$i, rand(0,1) ,date("jS F Y", strtotime("last Monday"))]);
        $i++;
    }
}
catch(PDOException $e){
    echo "Failed to populate: <br>";
    echo $e->getMessage();
}
?>