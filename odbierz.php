<?php 
$uploads_dir = '/$_COOKIE["user"]';
header('Refresh: 3;url=wyslij.php');
if (is_uploaded_file($_FILES['plik']['tmp_name'])) {
echo 'Odebrano plik: '.$_FILES['plik']['name'].'<br/>'; 
move_uploaded_file($_FILES['plik']['tmp_name'], $_SERVER['z7'].$_COOKIE["user"]."/".$_FILES['plik']['name']); } 
else {echo 'Błąd przy przesyłaniu danych!';}
?>
