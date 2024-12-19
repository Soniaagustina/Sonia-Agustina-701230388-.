<?php
// Define the number of rows
$rows = 5;

// Outer loop for each row
for ($i = 1; $i <= $rows; $i++) {
    // Inner loop for each column in the current row
    for ($j = 1; $j <= $i; $j++) {
        echo "<div style='display: inline-block; width: 30px; height: 30px; border: 1px solid black; text-align: center;'>$j</div>";
    }
    // Move to the next line after each row
    echo "<br>";
}
?>