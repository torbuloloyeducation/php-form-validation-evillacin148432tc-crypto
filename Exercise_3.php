<!DOCTYPE html>
<html>
<head>
    <title>Exercise_3_Lab.php</title>
</head>
<body>

<?php
$passwordErr = "";
$password = "";
$confirm = "";

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["password"]) || empty($_POST["confirm"])) {
        $passwordErr = "Both password fields are required";
    } else {
        $password = test_input($_POST["password"]);
        $confirm = test_input($_POST["confirm"]);

        if (strlen($password) < 8) {
            $passwordErr = "Password must be at least 8 characters";
        } elseif ($password !== $confirm) {
            $passwordErr = "Passwords do not match";
        }
    }
}
?>
<br><br>
<h1>Password Form</h1>
<br>

<p>Please enter a password with at least <b>8</b> characters and confirm it correctly.</p>
<br>

<form method="post" action="">
    Password:
    <input type="password" name="password">
    <br><br><br>

    Confirm Password:
    <input type="password" name="confirm">
    <br><br><br>

    <span style="color:red;"><?php echo $passwordErr; ?></span>
    <br><br>

    <input type="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($passwordErr)) {
    echo "<p>Password successfully set!</p>";
}
?>

</body>
</html>