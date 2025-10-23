<?php 
// Initialize variables (so page loads cleanly before any form submission)
$name = $age = $color = "";
$x = $y = $area = $perimeter = 0;
$celsius = $fahrenheit = 0;
$a = $b = 0;
$net_salary = 0;
$bmi = 0;
$z = "";
$balance = 0;
$average = 0;
$grade = "";
$php_amount = 0;
$distance = $fuel_needed = $travel_cost = 0;

// Form 1: Introduction
if (isset($_POST["intro_submit"])) {
  $name = $_POST["name"];
  $age = $_POST["age"];
  $color = $_POST["color"];
}

// Form 2: Simple Math
if (isset($_POST["math_submit"])) {
  $x = $_POST["x"];
  $y = $_POST["y"];
}

// Form 3: Rectangle
if (isset($_POST["rect_submit"])) {
  $length = $_POST["length"];
  $width = $_POST["width"];
  $area = $length * $width;
  $perimeter = 2 * ($length + $width);
}

// Form 4: Temperature
if (isset($_POST["temp_submit"])) {
  $celsius = $_POST["celsius"];
  $fahrenheit = ($celsius * 9/5) + 32;
}

// Form 5: Swap
if (isset($_POST["swap_submit"])) {
  $a = $_POST["a"];
  $b = $_POST["b"];
  $temp = $a;
  $a = $b;
  $b = $temp;
}

// Form 6: Salary
if (isset($_POST["salary_submit"])) {
  $basic_salary = $_POST["basic_salary"];
  $allowance = $_POST["allowance"];
  $deduction = $_POST["deduction"];
  $net_salary = $basic_salary + $allowance - $deduction;
}

// Form 7: BMI
if (isset($_POST["bmi_submit"])) {
  $kg = $_POST["kg"];
  $m = $_POST["m"];
  $bmi = $kg / ($m * $m);
}

// Form 8: String
if (isset($_POST["string_submit"])) {
  $z = $_POST["string_input"];
}

// Form 9: Bank
if (isset($_POST["bank_submit"])) {
  $balance = $_POST["balance"];
  $deposit = $_POST["deposit"];
  $withdraw = $_POST["withdraw"];
  $balance = $balance + $deposit - $withdraw;
}

// Form 10: Grades
if (isset($_POST["grade_submit"])) {
  $math = $_POST["math"];
  $english = $_POST["english"];
  $science = $_POST["science"];
  $average = ($math + $english + $science) / 3;
  if ($average >= 90) {
    $grade = "A";
  } elseif ($average >= 80) {
    $grade = "B";
  } elseif ($average >= 75) {
    $grade = "C";
  } else {
    $grade = "F";
  }
}

// Form 11: Currency
if (isset($_POST["currency_submit"])) {
  $php_amount = $_POST["php_amount"];
  $usd = 0.018;
  $eur = 0.016;
  $jpy = 2.67;
}

// Form 12: Travel
if (isset($_POST["travel_submit"])) {
  $distance = $_POST["distance"];
  $fuel_consumption = $_POST["fuel_consumption"];
  $fuel_price = $_POST["fuel_price"];
  $fuel_needed = $distance / $fuel_consumption;  
  $travel_cost = $fuel_needed * $fuel_price;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>PHP Activities with Forms</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <h1>PHP Activities with Forms</h1>
  <div class="container">

    <!-- 1. Introduction -->
    <div class="card">
      <h2>1. Introduction</h2>
      <form method="POST">
        <input type="text" name="name" placeholder="Enter your name" required>
        <input type="number" name="age" placeholder="Age" required>
        <input type="text" name="color" placeholder="Favorite color" required>
        <button name="intro_submit">Submit</button>
      </form>
      <?php if (isset($_POST["intro_submit"])): ?>
        <p>Hi, I'm <?= $name ?>, I am <?= $age ?> years old, and my favorite color is <?= $color ?>.</p>
      <?php endif; ?>
    </div>

    <!-- 2. Simple Math -->
    <div class="card">
      <h2>2. Simple Math</h2>
      <form method="POST">
        <input type="number" name="x" placeholder="Enter x" required>
        <input type="number" name="y" placeholder="Enter y" required>
        <button name="math_submit">Calculate</button>
      </form>
      <?php if (isset($_POST["math_submit"])): ?>
        <p>Sum: <?= $x + $y ?><br>
        Difference: <?= $x - $y ?><br>
        Product: <?= $x * $y ?><br>
        Quotient: <?= number_format($x / $y, 2) ?></p>
      <?php endif; ?>
    </div>

    <!-- 3. Rectangle -->
    <div class="card">
      <h2>3. Rectangle</h2>
      <form method="POST">
        <input type="number" name="length" placeholder="Length" required>
        <input type="number" name="width" placeholder="Width" required>
        <button name="rect_submit">Calculate</button>
      </form>
      <?php if (isset($_POST["rect_submit"])): ?>
        <p>Area = <?= $area ?><br>
        Perimeter = <?= $perimeter ?></p>
      <?php endif; ?>
    </div>

    <!-- 4. Temperature -->
    <div class="card">
      <h2>4. Temperature Converter</h2>
      <form method="POST">
        <input type="number" name="celsius" placeholder="Enter °C" required>
        <button name="temp_submit">Convert</button>
      </form>
      <?php if (isset($_POST["temp_submit"])): ?>
        <p><?= $celsius ?> °C = <?= $fahrenheit ?> °F</p>
      <?php endif; ?>
    </div>

    <!-- 5. Swap -->
    <div class="card">
      <h2>5. Swap Variables</h2>
      <form method="POST">
        <input type="number" name="a" placeholder="a" required>
        <input type="number" name="b" placeholder="b" required>
        <button name="swap_submit">Swap</button>
      </form>
      <?php if (isset($_POST["swap_submit"])): ?>
        <p>a = <?= $a ?>, b = <?= $b ?></p>
      <?php endif; ?>
    </div>

    <!-- 6. Salary -->
    <div class="card">
      <h2>6. Net Salary</h2>
      <form method="POST">
        <input type="number" name="basic_salary" placeholder="Basic Salary" required>
        <input type="number" name="allowance" placeholder="Allowance" required>
        <input type="number" name="deduction" placeholder="Deduction" required>
        <button name="salary_submit">Compute</button>
      </form>
      <?php if (isset($_POST["salary_submit"])): ?>
        <p>₱<?= number_format($net_salary) ?></p>
      <?php endif; ?>
    </div>

    <!-- 7. BMI -->
    <div class="card">
      <h2>7. BMI</h2>
      <form method="POST">
        <input type="number" step="0.01" name="kg" placeholder="Weight (kg)" required>
        <input type="number" step="0.01" name="m" placeholder="Height (m)" required>
        <button name="bmi_submit">Calculate</button>
      </form>
      <?php if (isset($_POST["bmi_submit"])): ?>
        <p>Your BMI: <?= number_format($bmi, 2) ?></p>
      <?php endif; ?>
    </div>

    <!-- 8. String -->
    <div class="card">
      <h2>8. String Manipulation</h2>
      <form method="POST">
        <input type="text" name="string_input" placeholder="Enter text" required>
        <button name="string_submit">Analyze</button>
      </form>
      <?php if (isset($_POST["string_submit"])): ?>
        <p>Characters: <?= strlen($z) ?><br>
        Words: <?= str_word_count($z) ?><br>
        Uppercase: <?= strtoupper($z) ?><br>
        Lowercase: <?= strtolower($z) ?></p>
      <?php endif; ?>
    </div>

    <!-- 9. Bank -->
    <div class="card">
      <h2>9. Bank Account</h2>
      <form method="POST">
        <input type="number" name="balance" placeholder="Current balance" required>
        <input type="number" name="deposit" placeholder="Deposit" required>
        <input type="number" name="withdraw" placeholder="Withdraw" required>
        <button name="bank_submit">Update</button>
      </form>
      <?php if (isset($_POST["bank_submit"])): ?>
        <p>Final Balance: ₱<?= number_format($balance) ?></p>
      <?php endif; ?>
    </div>

    <!-- 10. Grades -->
    <div class="card">
      <h2>10. Grading System</h2>
      <form method="POST">
        <input type="number" name="math" placeholder="Math" required>
        <input type="number" name="english" placeholder="English" required>
        <input type="number" name="science" placeholder="Science" required>
        <button name="grade_submit">Compute</button>
      </form>
      <?php if (isset($_POST["grade_submit"])): ?>
        <p>Average: <?= number_format($average, 2) ?><br>
        Grade: <?= $grade ?></p>
      <?php endif; ?>
    </div>

    <!-- 11. Currency -->
    <div class="card">
      <h2>11. Currency Converter</h2>
      <form method="POST">
        <input type="number" name="php_amount" placeholder="PHP Amount" required>
        <button name="currency_submit">Convert</button>
      </form>
      <?php if (isset($_POST["currency_submit"])): ?>
        <p>₱<?= $php_amount ?> = $<?= $php_amount * 0.018 ?> USD<br>
        ₱<?= $php_amount ?> = €<?= $php_amount * 0.016 ?> EUR<br>
        ₱<?= $php_amount ?> = ¥<?= $php_amount * 2.67 ?> JPY</p>
      <?php endif; ?>
    </div>

    <!-- 12. Travel -->
    <div class="card">
      <h2>12. Travel Cost</h2>
      <form method="POST">
        <input type="number" name="distance" placeholder="Distance (km)" required>
        <input type="number" name="fuel_consumption" placeholder="Fuel Efficiency (km/L)" required>
        <input type="number" name="fuel_price" placeholder="Fuel Price (₱/L)" required>
        <button name="travel_submit">Calculate</button>
      </form>
      <?php if (isset($_POST["travel_submit"])): ?>
        <p>Fuel Needed: <?= number_format($fuel_needed, 2) ?> L<br>
        Travel Cost: ₱<?= number_format($travel_cost, 2) ?></p>
      <?php endif; ?>
    </div>

  </div>
</body>
</html>
