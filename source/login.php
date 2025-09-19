<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        die("⚠️ Both fields required!");
    }

    $stmt = $conn->prepare("SELECT id, name, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $name, $hashed);
        $stmt->fetch();

        if (password_verify($password, $hashed)) {
            session_start();
            $_SESSION['user_id'] = $id;
            $_SESSION['user_name'] = $name;
            echo "✅ Login successful! Welcome, " . $name;
        } else {
            echo "❌ Invalid password!";
        }
    } else {
        echo "❌ No account found with that email!";
    }

    $stmt->close();
    $conn->close();
}
?>
