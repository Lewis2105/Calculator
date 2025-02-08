<?php
$num1 = $_POST['num1'];
$operation = $_POST['operation'];

if (!is_numeric($num1)) {
    die("Invalid input. Please enter a numeric value for Number 1.");
}

if ($operation !== 'log') {
    $num2 = $_POST['num2'];
    if (!is_numeric($num2)) {
        die("Invalid input. Please enter a numeric value for Number 2.");
    }
}

switch ($operation) {
    case 'add':
        $result = $num1 + $num2;
        $operationSymbol = "+";
        break;
    case 'subtract':
        $result = $num1 - $num2;
        $operationSymbol = "-";
        break;
    case 'multiply':
        $result = $num1 * $num2;
        $operationSymbol = "×";
        break;
    case 'divide':
        if ($num2 == 0) {
            die("Division by zero is not allowed.");
        }
        $result = $num1 / $num2;
        $operationSymbol = "÷";
        break;
    case 'log':
        if ($num1 <= 0) {
            die("Logarithm is only defined for positive numbers.");
        }
        $result = log($num1); 
        $operationSymbol = "log";
        break;
    default:
        die("Invalid operation selected.");
}

echo "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Calculation Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .result-container {
            background-color: #ffffff;
            padding: 20px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            color:rgb(151, 106, 99);
            font-size: 24px;
            margin-bottom: 20px;
        }
        .result {
            font-size: 28px;
            font-weight: bold;
            color: #007bff;
            margin: 20px 0;
        }
        .operation {
            font-size: 20px;
            color:rgb(151, 106, 99);
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .back-link:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class='result-container'>
        <h1>Calculation Result</h1>
        <div class='operation'>
            Operation: $operationSymbol
        </div>
        <div class='result'>
            Result: $result
        </div>
        <a href='calculator.html' class='back-link'>Go Back</a>
    </div>
</body>
</html>
";
?>