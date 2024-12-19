<?php

// Function to check if a number is prime
function is_prime($num) {
    if ($num < 2) {
        return false;
    }
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}

// Loop through numbers 1 to 20
for ($i = 1; $i <= 20; $i++) {
    $result = "Angka $i adalah bilangan";

    // Check if the number is odd or even
    if ($i % 2 == 0) {
        $result .= " genap";
    } else {
        $result .= " ganjil";
    }

    // Check if the number is prime
    if (is_prime($i)) {
        $result .= " dan sekaligus bilangan prima";
    }

    // Output the result
    echo $result . "<br>";
}
?>