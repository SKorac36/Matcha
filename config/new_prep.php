<?php

function rand_array($array, $number){
    $new_array = array_fill(0, $number, NULL);
    $i = 0;
    while ($i < $number){
        $new_array[$i] = $array[rand(0, 4)];
        $new_array = array_unique($new_array);
        $i++;
    }
    return serialize($new_array);

}
try {
    $array = ['musician', 'gamer', 'coder', 'cook', 'nerd'];

    $i = 1;
    while ($i < 51) {
        $ran = rand_array($array, rand(1,5));
        $sql = $conn->prepare('UPDATE Matcha.Profiles SET tags=? WHERE (id=?)');
        $sql->execute([$ran, $i]);
        $views = rand(0,50);
        $likes = round($views / 2);
        $fr = ($views / 2) + $likes;
        $sql = $conn->prepare('INSERT INTO Matcha.searches(age_gap, distance, fame_rating, com_gap) VALUES(?,?,?,?)');
        $sql->execute([10, 25, rand(0, 50), 2]);
        $sql = $conn->prepare('UPDATE Matcha.profiles SET views=?, likes=?, fame_rating=? WHERE (id =?)');
        $sql->execute([$views, $likes, $fr, $i]);
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