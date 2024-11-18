<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/sgpproject/sgpproject/conn.php');

if (isset($_GET['id']) && isset($_GET['category'])) {
    $id = $_GET['id'];
    $category = $_GET['category'];

    // Use prepared statements to prevent SQL injection
    $stmt = $con->prepare("DELETE FROM exercise WHERE id = ?");
    $stmt->bind_param("i", $id); // "i" indicates the parameter type is integer

    if ($stmt->execute()) {
        header('Location: viewbycategory.php?category=' . urlencode($category));
        exit;
    } else {
        header('Location: viewbycategory.php?category=' . urlencode($category) . '&error=delete_failed');
        exit;
    }

    $stmt->close(); // Close the statement
} else {
    // Redirect if id or category is not set
    header('Location: viewbycategory.php?error=invalid_request');
    exit;
}
?>
