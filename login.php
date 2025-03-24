
<!DOCTYPE html>
<?php
include("includes/db.php");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css" type="text/css" />
    <title>User Login</title>
</head>
<body>
    <div class="header_wrapper">
        <img src="images/cotabana.jpg" width="1400px" height="90px" />
    </div>
    <div id="login">
        <h2>User Login</h2>
        <form method="post" action="login.php">
            <input type="text" name="username" placeholder="Enter username" required />
            <input type="password" name="password" placeholder="Enter Password" required />
            <input type="submit" name="login_btn" title="Click Here to Sign In" id="login-btn" value="Sign In" />
        </form>
    </div>
</body>
</html>

<?php
include("includes/db.php");

if (isset($_POST['login_btn']) && !empty($_POST['username']) && !empty($_POST['password'])) {
    // Clean user input
    $username = mysqli_real_escape_string($conn, trim($_POST['username']));
    $password = mysqli_real_escape_string($conn, trim($_POST['password']));

    // Prepare and execute query to fetch user by username
    $query = "SELECT * FROM users WHERE username = ?";
    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);

        // Check if user exists and verify password
        if ($user && password_verify($password, $user['password'])) {
            // Start session and store user details
            session_start();
            session_regenerate_id();
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['function_id'] = $user['function_id'];

            // Redirect based on user function_id
            switch ($user['function_id']) {
                case 1:
                    echo "<script>window.open('index.php', '_self');</script>";
                    break;
                case 2:
                    echo "<script>window.open('accountantpanel/index1.php', '_self');</script>";
                    break;
                case 3:
                    echo "<script>window.open('percepteur_area/index2.php', '_self');</script>";
                    break;
                default:
                    echo "<script>alert('Unknown user role'); window.open('login.php', '_self');</script>";
                    break;
            }
        } else {
            echo "<script>alert('Incorrect username or password'); window.open('login.php', '_self');</script>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Database query failed'); window.open('login.php', '_self');</script>";
    }
}
?>
