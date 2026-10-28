<!DOCTYPE html>
<html>
<head>
    <title>Fetch Details from Database</title>
</head>

<body>

    <h2>Student Details</h2>

    <?php

    // Database connection
    $conn = mysqli_connect("localhost", "root", "", "college");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // SQL query
    $sql = "SELECT * FROM students";

    // Execute query
    $result = mysqli_query($conn, $sql);

    // Check whether records exist
    if (mysqli_num_rows($result) > 0) {

        echo "<table border='1' cellpadding='10'>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Name</th>";
        echo "<th>Email</th>";
        echo "<th>Course</th>";
        echo "</tr>";

        // Fetch records
        while ($row = mysqli_fetch_assoc($result)) {

            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["course"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";

    } else {
        echo "No records found.";
    }

    // Close connection
    mysqli_close($conn);

    ?>

</body>
</html>




USE college;

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    course VARCHAR(100)
);

INSERT INTO students (name, email, course) VALUES
('Afzal', 'afzal@gmail.com', 'MCA'),
('Rahul', 'rahul@gmail.com', 'BCA'),
('Priya', 'priya@gmail.com', 'M.Sc');
