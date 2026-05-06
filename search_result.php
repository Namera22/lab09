<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }

        a {
            display: inline-block;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <h1>Search Results</h1>

    <?php
    require_once "settings.php";
    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

    if (!$conn) {
        echo "<p>Unable to connect to the database.</p>";
        exit;
    }

    if (isset($_GET['model'])) {

        // Sanitise the input to prevent SQL injection
        $model = mysqli_real_escape_string($conn, $_GET['model']);

        // LIKE with % wildcards = partial match search
        $sql = "SELECT * FROM cars WHERE model LIKE '%$model%'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr>
                    <th>ID</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Price ($)</th>
                    <th>Year</th>
                  </tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['car_id'] . "</td>";
                echo "<td>" . $row['make'] . "</td>";
                echo "<td>" . $row['model'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td>" . $row['yom'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "🚫 No matching cars found.";
        }

    } else {
        echo "Please enter a model to search.";
    }

    mysqli_close($conn);
    ?>

    <a href="search_form.php">← Search again</a>

</body>

</html>