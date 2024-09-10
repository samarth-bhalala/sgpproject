<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');
session_start();

// Retrieve all users
$result_users = $con->query("SELECT * FROM signup");

// Retrieve all contact us messages
$result_contact_us = $con->query("SELECT * FROM contactus");

$result_exercises = $con->query("SELECT * FROM `exercises`");
if (!$result_exercises) {
    echo "Error: " . $con->error;
}

// Display users table
echo "<h2>Users</h2>";
echo "<table>";
echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Actions</th></tr>";
while ($user = $result_users->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $user['id'] . "</td>";
    echo "<td>" . $user['username'] . "</td>";
    echo "<td>" . $user['email'] . "</td>";
    echo "<td><a href='edit_user.php?id=" . $user['id'] . "'>Edit</a> | <a href='delete_user.php?id=" . $user['id'] . "'>Delete</a></td>";
    echo "</tr>";
}
echo "</table>";

// Display contact us messages table
echo "<h2>Contact Us Messages</h2>";
echo "<table>";
echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Message</th><th>Actions</th></tr>";
while ($contact_us = $result_contact_us->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $contact_us['id'] . "</td>";
    echo "<td>" . $contact_us['username'] . "</td>";
    echo "<td>" . $contact_us['email'] . "</td>";
    echo "<td>" . $contact_us['message'] . "</td>";
    echo "<td><a href='edit_contact_us.php?id=" . $contact_us['id'] . "'>Edit</a> | <a href='delete_contact_us.php?id=" . $contact_us['id'] . "'>Delete</a></td>";
    echo "</tr>";
}
echo "</table>";

// Display exercises table
echo "<h2>Exercises</h2>";
echo "<table>";
echo "<tr><th>ID</th><th>Name</th><th>Description</th><th>Actions</th></tr>";
while ($exercise = $result_exercises->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $exercise['id'] . "</td>";
    echo "<td>" . $exercise['exerciseName'] . "</td>";
    echo "<td>" . $exercise['exerciseDescription'] . "</td>";
    echo "<td>" . $exercise['gender'] . "</td>";
    echo "<td>" . $exercise['category'] . "</td>";
    echo "<td>" . $exercise['subCategory'] . "</td>";
    echo "<td>" . $exercise['level'] . "</td>";
    echo "<td><a href='editexercise.php?id=" . $exercise['id'] . "'>Edit</a> | <a href='deleteexercise.php?id=" . $exercise['id'] . "'>Delete</a></td>";
    echo "</tr>";
}
echo "</table>";

?>