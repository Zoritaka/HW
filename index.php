<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    define("HOST", "localhost");
    define("DATABASE", "classicmodels");
    define("CHARSET", "utf8");
    define("USER", "root");
    define("PASSWORD", "");
    try {
        $pdo = new PDO("mysql:host=".HOST.";dbname=".DATABASE.";charset=".CHARSET, USER, PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $sql = "INSERT INTO messages (name, email, message) VALUES (:name, :email, :message)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);
        $stmt->execute();
        echo "Message sent successfully!";
    } catch(PDOException $e) {
        echo "Error ->: " . $e->getMessage();
    }
    $pdo = null; 
}
?>
