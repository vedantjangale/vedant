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
    <input type="password" class="text-center-form-control" id="password" placeholder="Password"oninput="calculateEntropy()"aria-describedby="passwordHelpBlock">
  </div> 
  <p id="entropy-display">Password Entropy: <span id="entropy-value">0</span></p>
<script>
  function calculateEntropy() {
            var password = document.getElementById("password").value;
            var charsetSize = getCharsetSize(password);
            var entropy = password.length * Math.log2(charsetSize);
            document.getElementById("entropy-value").textContent = entropy.toFixed(2);
        }

        function getCharsetSize(password) {
            var charset = 0;
            if (/[a-z]/.test(password)) {
                charset += 26; // lowercase letters
            }
            if (/[A-Z]/.test(password)) {
                charset += 50; // uppercase letters
            }
            if (/[0-9]/.test(password)) {
                charset += 10; // numbers
            }
            if (/[!-\/:-@\[-`\{-~]/.test(password)) {
                charset += 32; // special characters
            }

            return charset > 0 ? charset : 1; // avoid division by zero
        }
    </script>
</body>
</html>
