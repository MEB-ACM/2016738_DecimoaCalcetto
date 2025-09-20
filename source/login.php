<?php
require 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        header("Location: login.html?error=empty");
        exit;
    }

    $stmt = $conn->prepare("SELECT id, name, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id, $name, $hashed);
        $stmt->fetch();

        if (password_verify($password, $hashed)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['user_name'] = $name;
            #CHANGE THIS LINE 
            header("Location: http://localhost:5500/source/frontend/login.html?login=success");
            exit;
        } else {
            header("Location: http://localhost:5500/source/frontend/login.html?error=password");
            exit;
        }
    } else {
        header("Location: http://localhost:5500/source/frontend/login.html?error=email");
        exit;
    }

    $stmt->close();
    $conn->close();
}
?>
