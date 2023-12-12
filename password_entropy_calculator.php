<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'];

    if (!empty($password)) {
        $charsetSize = 72; // Size of character set (lowercase + uppercase + digits + special characters)
        $passwordLength = strlen($password);

        // Calculate entropy using the formula: log2(charsetSize) * passwordLength
        $entropy = log($charsetSize, 2) * $passwordLength;

        echo "Password Entropy: " . number_format($entropy, 2);
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
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
    </style>
</head>
<body>

    <h1>Password Entropy Calculator</h1>
    
    <label for="password">Enter Password:</label>
    <input type="password" id="password" oninput="calculateEntropy()">
    
    <p id="entropy-display">Password Entropy: <span id="entropy-value">0</span></p>

    <script>
        function calculateEntropy() {
            var password = document.getElementById("password").value;
            var charsetSize = 72; // Size of character set (lowercase + uppercase + digits + special characters)
            var passwordLength = password.length;

            // Calculate entropy using the formula: log2(charsetSize) * passwordLength
            var entropy = Math.log2(charsetSize) * passwordLength;

            document.getElementById("entropy-value").textContent = entropy.toFixed(2);
        }
    </script>

</body>
</html>
