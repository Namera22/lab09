<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Listings</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
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

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <h1>Used Car Listings</h1>

    <?php
    // Step 1: Connect to the database
    require_once "settings.php";
    $dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);

    if ($dbconn) {

        // Step 2: Create the SQL query
        $query = "SELECT * FROM cars";

        // Step 3: Execute the query
        $result = mysqli_query($dbconn, $query);

        // Step 4: Did it work?
        if ($result) {

            if (mysqli_num_rows($result) > 0) {
                echo "<table>";
                echo "<tr>
                        <th>Car ID</th>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Price ($)</th>
                        <th>Year (YOM)</th>
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
                echo "<p>There are no cars to display.</p>";
            }

        } else {
            echo "<p>Query failed.</p>";
        }

        // Step 5: Close the connection
        mysqli_close($dbconn);

    } else {
        echo "<p>Unable to connect to the db.</p>";
    }
    ?>

</body>

</html>