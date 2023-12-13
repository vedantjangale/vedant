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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Ensure full viewport height */
            margin: 0; /* Remove default body margin */
        }
    </style>
</head>
<body>
<div class="card text-center bg-dark mb-3" style="max-width: 18rem;">
<div class="card text-center">
  <div class="card-header">
  Password Entropy Calculator
  </div>
  <div class="card-body">
    <h5 class="card-title">Enter Password</h5>
    </div>
    <div class="col-auto">
    <label for="inputPassword2" class="visually-hidden">Password</label>
    <input type="password" class="text-center-form-control" id="password" placeholder="Password" oninput="calculateEntropy()"aria-describedby="passwordHelpBlock">
  </div> 
    
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

