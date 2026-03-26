<!DOCTYPE html>
<html>
<head>
    <title>Exercise_4_Lab.php</title>
</head>
<body>

<?php
$termsErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST["terms"])) {
        $termsErr = "You must agree to the terms and conditions";
    }
}
?>

<br><br>
<h1>Terms and Conditions</h1>
<br>

<p>Please agree to the terms and conditions before submitting.</p>
<form method="post" action="">
    <input type="checkbox" name="terms"> I agree to the terms and conditions
    <br>
    <span style="color:red;"><?php echo $termsErr; ?></span>
    <br><br><br>

    <input type="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($termsErr)) {
    echo "<p>You have successfully agreed to the terms.</p>";
}
?>

</body>
</html>