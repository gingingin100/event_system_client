<?php
    require 'db.php';
    header('Content-Type: application/json');
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method === 'POST' && isset($_GET['register'])) {
        $data = json_decode(file_get_contents('php://input'), true);

        if (!isset($data['email']) || !isset($data['password'])) {
            echo json_encode(["error" => "Missing fields"]);
            exit;
        }
        $email = $data['email'];
        $password = password_hash($data['password'], PASSWORD_BCRYPT);
        $api_key = substr(md5(uniqid(mt_rand(), true)), 0, 12);
        $stmt = $conn->prepare("INSERT INTO users (email, password, api_key) VALUES (?, ?,?)");
        $stmt->bind_param("sss", $email, $password, $api_key);
        $stmt->execute();
        echo json_encode(["message" => "User registered", "api_key" => $api_key]);
    }
    if ($method === 'POST' && isset($_GET['login'])) {
        $data = json_decode(file_get_contents('php://input'), true);
        $email = $data['email'];
        $password = $data['password'];
        $stmt = $conn->prepare("SELECT password, api_key FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($hash, $api_key);
        $stmt->fetch();
        if (password_verify($password, $hash)) {
            echo json_encode(["message" => "Login successful", "api_key" => $api_key]);
        } else {
            echo json_encode(["error" => "Invalid credentials"]);
        }
    }
?>