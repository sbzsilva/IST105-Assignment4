<!DOCTYPE html>
<html>
<head>
    <title>Calculation Form</title>
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
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .note {
            background-color: #e9f7ef;
            border-left: 4px solid #28a745;
            padding: 10px;
            margin: 15px 0;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Django Calculator - Assignment 4</h1>
        
        <div class="note">
            <strong>Note:</strong> Enter three numeric values below to perform calculations.
        </div>
        
        <form action="process.php" method="post">
            <div class="form-group">
                <label for="a">Value A:</label>
                <input type="number" id="a" name="a" step="any" required>
            </div>
            
            <div class="form-group">
                <label for="b">Value B:</label>
                <input type="number" id="b" name="b" step="any" required>
            </div>
            
            <div class="form-group">
                <label for="c">Value C:</label>
                <input type="number" id="c" name="c" step="any" required>
            </div>
            
            <input type="submit" value="Calculate">
        </form>
    </div>
</body>
</html>