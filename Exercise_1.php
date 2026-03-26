<!DOCTYPE html>
<html>
<head>
    <title>Exercise_1_Lab.php</title>
</head>
<body>

<?php
$phone = "";
$phoneErr = "";

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["phone"])) {
        $phoneErr = "Phone number is required";
    } else {
        $phone = test_input($_POST["phone"]);
        if (!preg_match("/^[+]?[0-9 \-]{7,15}$/", $phone)) {
            $phoneErr = "Invalid phone format";
        }
    }
}
?>
<br><br>
<h1>Phone Number Form</h1>
<br>

<p>Phone starts at <b>09</b> or <b> +63</b></p>
<p>Avoid using this <b>^[]?[0-9 \-]{7,15}$</b></p>
<form method="post" action="">
    Phone Number: 
    <input type="text" name="phone" value="<?php echo $phone; ?>">
    <span style="color:red;">* <?php echo $phoneErr; ?></span>
    <br><br><br>
    <input type="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($phoneErr)) {
    echo "<p>Your phone number is: <b>$phone</b></p>";
}
?>

</body>
</html>