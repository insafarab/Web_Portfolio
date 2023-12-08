<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contact_responses";

$name = $_POST["sender-name"];
$email = $_POST["sender-email"];
$message = $_POST["message"];

// Créer une connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

ini_set('display_errors', 1); error_reporting(E_ALL);

// Préparer et exécuter la requête d'insertion
$sql = "INSERT INTO contacts (name, email, message) 
VALUES ('$name', '$email', '$message')";
if ($conn->query($sql) === TRUE) {
  $conn->close();
  header("Location: form-merci.html"); // Redirection vers la page de remerciement
  exit();
} else {
  echo "Erreur: " . $sql . "<br>" . $conn->error;
}

// Fermer la connexion
$conn->close();
?>