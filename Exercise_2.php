<!DOCTYPE html>
<html>
<head>
    <title>Exercise_2_Lab.php</title>
</head>
<body>

<?php
$website = "";
$websiteErr = "";

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["website"])) {
        $website = test_input($_POST["website"]);
        if (!filter_var($website, FILTER_VALIDATE_URL)) {
            $websiteErr = "Invalid URL format";
        }
    }
}
?>

<br><br>
<h1>Website Form</h1>
<br>

<p> Discription this following type is invalid for website:</p>
<p><b>Invalid website examples:</b></p>
<ul>
  <li>google</li>
  <li>example</li>
  <li>www.facebook</li>
  <li>://missing.com</li>
  <li>facebook .com</li>
  <li>12345</li>
</ul>
<br>

<form method="post" action="">
    Website: 
    <input type="text" name="website" value="<?php echo $website; ?>">
    <span style="color:red;"> <?php echo $websiteErr; ?></span>
    <br><br><br>
    <input type="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($websiteErr)) {
        if (!empty($website)) {
            echo "<p>Your website is: <b>$website</b></p>";
        } else {
            echo "<p>No website provided.</p>";
        }
    }
}
?>

</body>
</html>