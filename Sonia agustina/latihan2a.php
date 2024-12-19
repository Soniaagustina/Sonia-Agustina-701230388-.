
 <?php
// Define the number of rows and columns
$rows = 15;
$columns = 5;

// Start the table
echo "<table border='1' cellpadding='10'>";

// Create the header row with dynamic column names
echo "<tr>";
for ($col = 1; $col <= $columns; $col++) {
    echo "<th>Kolom $col</th>";
}
echo "</tr>";

// Loop through each row
for ($row = 1; $row <= $rows; $row++) {
    echo "<tr>"; 

    // Loop through each column in the row
    for ($col = 1; $col <= $columns; $col++) {
        echo "<td>Baris $row Kolom $col</td>";
    }

    echo "</tr>";
}

// End the table
echo "</table>";
?>


