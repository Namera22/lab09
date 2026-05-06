<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Cars</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        input[type="text"] {
            padding: 8px;
            width: 250px;
            font-size: 16px;
        }

        input[type="submit"] {
            padding: 8px 16px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <h1>🔍 Search for a Car</h1>

    <form action="search_result.php" method="GET">
        <label for="model">Enter car model:</label><br><br>
        <input type="text" name="model" id="model" placeholder="e.g. Corolla">
        <input type="submit" value="Search">
    </form>

</body>

</html>