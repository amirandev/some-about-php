<?php
// Establish database connection using PDO
$db_host = "localhost";
$db_name = "example_db";
$db_username = "root";
$db_password = "";

try {
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Check if the form was submitted and the required fields are set
if (isset($_POST['username']) && isset($_POST['password'])) {
    // Retrieve username and password from the form
    $user_username = $_POST['username'];
    $user_password = $_POST['password'];

    // Prepare SQL statement with parameters
    $query = "SELECT * FROM users WHERE username = '".$user_username."' AND password = '".$user_password."'";

    // Execute the statement
    $result = $db->query($query);

    // Fetch the result
    $user = $result->fetch(PDO::FETCH_ASSOC);

    // Check if a matching user was found
    if ($user) {
        // Start a session and store user information
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        // Redirect to secured page or perform other actions
        header("Location: dashboard.php");
        exit();
    } else {
        // Display error message or redirect back to the login form
        echo "Invalid username or password";
    }
} else {
    
    echo 'Login form can be added here'
}
?>
