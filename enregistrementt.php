
<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "DMR";
session_start();
$id=$_SESSION['id']+1;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "successfull connexion";
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$mail = $_POST['mail'];
$username = $_POST['pseudo'];
$password = $_POST['mdp'];

$sql = "INSERT INTO clients (Mail, Pseudo, Mdp, Nom, Prenom, ID) VALUES ('$mail', '$username', '$password', '$nom', '$prenom', '$id')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
        header('Location: profile.php');
        $_SESSION['id']=$id;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;

}

$conn->close();

?>