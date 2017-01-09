<?php
 
$username = $_POST['username'];
$password = $_POST['password'];

$usernamer = $_POST['usernamer'];
$passwordr = $_POST['passwordr'];

if($usernamer&&$passwordr){
$servername = "";
$username1 = "";
$password2 = "";
$dbname = "";
$conn = new mysqli($servername, $username1, $password2, $dbname);
if ($conn->connect_error) {
die("Nieudane połączenie: " . $conn->connect_error);
}
$sql = "INSERT INTO users (user, password) VALUES ('$usernamer', '$passwordr') ";
if (!file_exists($usernamer)) {
    mkdir($usernamer, 0777, true);
}
header('Location: index.php');
if ($conn->query($sql) == TRUE) {
    
   echo "";
} else {
   echo "Błąd " . $sql . "<br>" . $conn->error;
}
 
}

if($username&&$password)
{
$servername = "";
$username1 = "";
$password2 = "";
$dbname = "";
$conn = new mysqli($servername, $username1, $password2, $dbname);
if ($conn->connect_error) {
die("Nieudane połączenie: " . $conn->connect_error);
}
mysqli_select_db($conn,'users');

$query = "SELECT * FROM users WHERE user='$username'";
$result = $conn->query($query);
$num_rows = mysqli_num_rows($result);
if ($num_rows==1) {
    $query2 = "SELECT * FROM users WHERE password='$password'";
    $result2 = $conn->query($query2);
    $num_rows2 = mysqli_num_rows($result2);
    if($num_rows2==1){
            $sql2 = "INSERT INTO logi (user, proba) VALUES ('$username', 'pomyslna') ";
            if ($conn->query($sql2) == TRUE) {    
                echo "";
            } else {
            echo "Błąd " . $sql . "<br>" . $conn->error;
            }
        $cookie_name = "user";
        setcookie($cookie_name, $username, time()+3600, "", "serwer1664473.home.pl", 0);
        header('Location: wyslij.php');
    }
    elseif($num_rows2==0){
        
        $sql3 = "INSERT INTO logi (user, proba) VALUES ('$username', 'niepomyslna') ";
            if ($conn->query($sql3) == TRUE) {    
        echo "";
        } else {
        echo "Błąd " . $sql . "<br>" . $conn->error;
        }
        echo "zle haslo";
    }
}
else {
    echo "zly uzytkownik";
}
}


?>