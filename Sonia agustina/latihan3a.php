<?php
// Function to modify the text style
function ganti_style($tulisan, $kelas) {
    return "<span class='$kelas'>$tulisan</span>";
}

// Variables with example content
$tulisan = "Hello World! Here I come!";
$kelas = "ganti-style";

// Call the function and display the result
echo ganti_style($tulisan, $kelas);
?>

<style>
    .ganti-style {
        font-size: 28px;
        font-family: Arial, sans-serif;
        color: #1A0547;
        font-style: italic;
        font-weight: bolder;
    }
</style>