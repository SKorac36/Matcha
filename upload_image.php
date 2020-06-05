
<?php
    include 'config/connect.php';
    include 'header.php';
if (isset($_SESSION) && !empty($_SESSION['uid']))
{
    $query = "SELECT COUNT(userid) FROM Matcha.Images WHERE userid=?";
    $sql = $conn->prepare($query);
    $sql->execute([$_SESSION['uid']]);
    $tmp = $sql->fetch();
    $count = (int)($tmp[0]);
    $img_dir = "imgs/";
    $img_name = basename($_FILES['file']['name']);
    $new_name = uniqid();
    $img_file_type = ".". strtolower(pathinfo($img_dir . $_FILES['file']['name'], PATHINFO_EXTENSION));
    $target = $img_dir . $new_name . $img_file_type;
    if ($count >= 5)
        alert("You can only have five images", "upload_images.php");
//        var_dump($count);
    if (!file_exists("./imgs"))
        mkdir("./imgs");
    if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
        $query = $conn->prepare("INSERT INTO Matcha.images (userid, path) VALUES (?,?)");
        $query->execute([$_SESSION['uid'], $target]);
        alert("Image uploaded successfully.", "upload_images.php");
    }
    // else
    //     alert("No image selected, please choose one.", "upload_images.php");
}
