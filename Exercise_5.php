<!DOCTYPE html>
<html>
<head>
    <title>Exercise_5_Lab.php</title>
</head>
<body>

<?php
$count = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["count"])) {
        $count = $_POST["count"] + 1;
    } else {
        $count = 1;
    }
}
?>

<br><br>
<h1>Simple Counter</h1>
<br>

<p><b>Submission Counter:</b> This form keeps track of how many times you have submitted it.</p>
<br>
<form method="post" action="">
    <input type="hidden" name="count" value="<?php echo $count; ?>">
    <input type="submit" value="Click Me">
</form>

<br>
<p>You clicked the button. <h3> <?php echo $count; ?> times.</h3></p>


</body>
</html>