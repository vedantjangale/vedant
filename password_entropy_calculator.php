<?php

function calculateEntropy($password) {
    $charsetSize = 72; // Size of character set (lowercase + uppercase + digits + special characters)
    $passwordLength = strlen($password);

    // Calculate entropy using the formula: log2(charsetSize) * passwordLength
    $entropy = log($charsetSize, 2) * $passwordLength;

    return $entropy;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'];

    if (!empty($password)) {
        $entropy = calculateEntropy($password);
        echo "Password Entropy: " . $entropy;
    } else {
        echo "Please enter a password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Entropy Calculator</title>
</head>
<body>
    <h1>Password Entropy Calculator</h1>
    <form method="post">
        <label for="password">Enter Password:</label>
        <input type="password" name="password" required>
        <button type="submit">Calculate Entropy</button>
    </form>
</body>
</html>
