<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan2c</title>
    <style>
        .ganjil {
            background-color: #003;
            color: #fff;
        }
        .genap {
            background-color: #999;
        }
        div {
            display: inline-block;
            width: 30px;
            height: 30px;
            border: 1px solid black;
            text-align: center;
        }
    </style>
</head>
<body>

<?php
// Define the number of rows
$rows = 5;

// Outer loop for each row
for ($i = 1; $i <= $rows; $i++) {
    // Apply the 'ganjil' class for odd rows and 'genap' class for even rows
    $class = ($i % 2 == 0) ? "genap" : "ganjil";
    
    // Inner loop for each column in the current row
    for ($j = 1; $j <= $i; $j++) {
        echo "<div class='$class'>$j</div>";
    }
    // Move to the next line after each row
    echo "<br>";
}
?>

</body>
</html>