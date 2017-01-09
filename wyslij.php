<html> <body> 
<form action="odbierz.php" method="POST" ENCTYPE="multipart/form-data">
<input type="file" name="plik"/>
<input type="submit" value="Wyślij plik"/> </form> </body> </html>

<?php
$dh = opendir($_COOKIE["user"]);
$i=1;
while (($file = readdir($dh)) !== false) {
    if($file != "." && $file != ".." && $file != "index.php" && $file != ".htaccess" && $file != "error_log" && $file != "cgi-bin") {
        echo "<a href='$path/$file'>$file</a><br /><br />";
        $i++;
    }
}
closedir($dh);


$servername = "";
$username1 = "";
$password2 = "";
$dbname = "";
$conn = new mysqli($servername, $username1, $password2, $dbname);
if ($conn->connect_error) {
die("Nieudane połączenie: " . $conn->connect_error);
}
mysqli_select_db($conn,'21775641_7');
$name = $_COOKIE["user"];
$query = "SELECT proba FROM logi where user='$name' and proba='niepomyslna' order by data desc limit 3";
$result = $conn->query($query);
if ($result->num_rows == 3) {
    $message = 'wykryto 3 nieudane próby logowania';

    echo "<SCRIPT>
    alert('$message');
    </SCRIPT>";

    }
$query2 = "DELETE FROM logi where user='$name' and proba='niepomyslna'";
if ($conn->query($query2) == TRUE) {
    
   echo "";
} else {
   echo "Błąd " . $sql . "<br>" . $conn->error;
}
?> 