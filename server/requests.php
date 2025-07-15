<?php

session_start();

include("../common/db.php");

$createTableSQL = "CREATE TABLE IF NOT EXISTS `users` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `address` TEXT
)";
if ($conn->query($createTableSQL) === FALSE) {
    die("❌ Failed to create table: " . $conn->error);
}

if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];

    $user = $conn->prepare("INSERT INTO `users`(`id`, `username`, `email`, `password`, `address`) 
    VALUES (NULL, ?, ?, ?, ?)");

    $user->bind_param("ssss", $username, $email, $password, $address);

    $result = $user->execute();

    if ($result) {
        $_SESSION["user"] = ["username" => $username, "email" => $email, "user_id" => $user->insert_id];
        header("location: /discussion");
    } else {
        echo "❌ New user not registered";
    }
} else if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = "";
    $user_id = 0;
    $query = "select * from users where email = '$email' and password = '$password'";
    $result = $conn->query($query);
    if ($result->num_rows == 1) {
        foreach ($result as $row) {
            $username = $row['username'];
            $user_id = $row['id'];
        }
        $_SESSION["user"] = ["username" => $username, "email" => $email, "user_id" => $user_id];
        header("location: /discussion");
    } else {
        echo "❌ New user not registered";
    }
} else if (isset($_GET["logout"])) {
    session_unset();
    header("location: /discussion");
} else if (isset($_POST["ask"])) {
    $title = $_POST['title'] ?? "";
    $description = $_POST['description'] ?? "";
    $category_id = $_POST['category'] ?? "";
    $user_id = $_SESSION['user']['user_id'] ?? null;

    if (empty($title) || empty($description) || empty($category_id) || !$user_id) {
        echo "❌ All fields are required!";
        exit;
    }

    $askQues = $conn->prepare("INSERT INTO `questions` (`id`, `title`, `description`, `category_id`, `user_id`) 
    VALUES (NULL, ?, ?, ?, ?)");

    $askQues->bind_param("ssii", $title, $description, $category_id, $user_id);

    $result = $askQues->execute();

    if ($result) {
        header("location: /discussion");
        exit;
    } else {
        echo "❌ Question not added: " . $askQues->error;
    }
} else if (isset($_POST["answer"])) {
    $answer = $_POST['answer'] ?? "";
    $question_id = isset($_POST['question_id']) ? (int) $_POST['question_id'] : null;
    $user_id = $_SESSION['user']['user_id'] ?? null;

    if (empty($answer) || empty($question_id) || !$user_id) {
        echo "❌ All fields are required!";
        exit;
    }

    $newAns = $conn->prepare("INSERT INTO `answers` (`id`, `answer`, `question_id`, `user_id`) 
    VALUES (NULL, ?, ?, ?)");

    $newAns->bind_param("sii", $answer, $question_id, $user_id);

    $result = $newAns->execute();

    if ($result) {
        header("location: /discussion?q-id=$question_id");
        exit;
    } else {
        echo "❌ Answer not added: " . $newAns->error;
    }
}

?>