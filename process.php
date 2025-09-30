<!DOCTYPE html>
<html>
<head>
    <title>Calculation Result</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            max-width: 600px; 
            margin: 40px auto; 
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .result {
            background-color: #d4edda;
            border-left: 4px solid #28a745;
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
            color: #155724;
        }
        .error {
            background-color: #f8d7da;
            border-left: 4px solid #dc3545;
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
            color: #721c24;
        }
        .input-values {
            background-color: #e2e3e5;
            border-left: 4px solid #6c757d;
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
            color: #383d41;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 10px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .instance-info {
            background-color: #cce7ff;
            border-left: 4px solid #007bff;
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
            color: #004085;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Calculation Result</h1>
        
        <?php
        // Get the values from the form
        $a = isset($_POST['a']) ? floatval($_POST['a']) : null;
        $b = isset($_POST['b']) ? floatval($_POST['b']) : null;
        $c = isset($_POST['c']) ? floatval($_POST['c']) : null;
        
        // Display input values
        echo "<div class='input-values'>";
        echo "<strong>Input Values:</strong><br>";
        echo "A: " . htmlspecialchars($a) . "<br>";
        echo "B: " . htmlspecialchars($b) . "<br>";
        echo "C: " . htmlspecialchars($c) . "<br>";
        echo "</div>";
        
        // Server information
        echo "<div class='instance-info'>";
        echo "<strong>Processed by:</strong> " . $_SERVER['SERVER_NAME'] . "<br>";
        echo "<strong>Server IP:</strong> " . $_SERVER['SERVER_ADDR'] . "<br>";
        echo "</div>";
        
        // Validate inputs
        if ($a === null || $b === null || $c === null) {
            echo "<div class='error'>";
            echo "Error: All values must be provided.";
            echo "</div>";
        } else {
            // Perform calculation using Python script
            $command = "python calculate.py " . escapeshellarg($a) . " " . escapeshellarg($b) . " " . escapeshellarg($c);
            $result = shell_exec($command);
            
            // Display result
            if ($result) {
                echo "<div class='result'>";
                echo "<strong>Calculation Result:</strong><br>";
                echo nl2br(htmlspecialchars($result));
                echo "</div>";
            } else {
                echo "<div class='error'>";
                echo "Error: Unable to perform calculation.";
                echo "</div>";
            }
        }
        ?>
        
        <a href="form.php" class="btn">Perform Another Calculation</a>
    </div>
</body>
</html>