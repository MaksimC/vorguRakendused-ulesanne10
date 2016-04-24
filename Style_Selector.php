<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ulesanne 10 - Posting back to form</title>
</head>

<body>

<?php
// define variables and set to empty values
$userText = $textColor = $backColor = $borderType = $borderWeight = $borderRadius = $borderColor = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userText = test_input($_POST["userText"]);
    $textColor = test_input($_POST["textColor"]);
    $backColor = test_input($_POST["backColor"]);
    $borderType = test_input($_POST["borderType"]);
    $borderWeight = test_input($_POST["borderWeight"]);
    $borderRadius = test_input($_POST["borderRadius"]);
    $borderColor = test_input($_POST["borderColor"]);
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<?php
echo "<h2>Your Input:</h2>";

echo "<p style='width = 30%; color: $textColor; background-color: $backColor; border-style: $borderType;
        border-width: $borderWeight px; border-radius: $borderRadius %; border-color: $borderColor' >".$userText."</p>";
echo "<br>";

?>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="styleSelector" style="background-color: burlywood; width: 30%">

    <fieldset id="textStyles">
        <legend>Text Settings:</legend>
        <textarea name="userText" cols="20" rows="4"><?php print $userText?></textarea> <br><br>
        <input type="color" class="colorInput" name="textColor" value="<?php print$textColor?>"> Text Color <br><br>
        <input type="color" class="colorInput" name="backColor" value="<?php print$backColor?>"> Background color <br><br>
        <br><br>
    </fieldset> <br>

    <fieldset id="borderLane">
        <legend>Borderlane Settings:</legend>
        <select name="borderType">
            <option value="dotted" selected="<?php print$borderType?>">dotted</option>
            <option value="dashed" selected="<?php print$borderType?>">dashed</option>
            <option value="solid" selected="<?php print$borderType?>">solid</option>
            <option value="double" selected="<?php print$borderType?>">double</option>
            <option value="groove" selected="<?php print$borderType?>">groove</option>
            <option value="ridge" selected="<?php print$borderType?>">ridge</option>
            <option value="inset" selected="<?php print$borderType?>">inset</option>
            <option value="outset" selected="<?php print$borderType?>">outset</option>
        </select> Borderlane style<br><br>
        <input  type="number" class="numberInput" name="borderWeight" min="0" max="20" step="1" value="<?php print$borderWeight?>"> Borderlane weight (0 - 20 px) <br><br>
        <input  type="number" class="numberInput" name="borderRadius" max="100" step="1" value="<?php print$borderRadius?>"> Bordelane radius (0 - 100 px) <br><br>
        <input  type="color" class="colorInput" name="borderColor" value="<?php print$borderColor?>"> Borderlane color <br><br>
    </fieldset> <br>

    <input type="submit" id="button" value="Submit">

</form>



<p>
    <a href="http://validator.w3.org/check?uri=referer">
        <img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" />
    </a>
</p>

</body>

</html>