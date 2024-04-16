<!DOCTYPE html>
<html>
<head>
    <title>Search Employee</title>
</head>
<body>
    <h2>Search Employee</h2>
    <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label>Search by:</label>
        <select name="search_by">
            <option value="id">ID</option>
            <option value="name">Name</option>
            <option value="email">Email</option>
            <option value="designation">Designation</option>
            <option value="salary">Salary</option>
        </select>
        <br>
        Enter Keyword: <input type="text" name="keyword" required><br>
        <input type="submit" value="Search">
    </form>

    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['search_by']) && isset($_GET['keyword'])) {
        $search_by = $_GET['search_by'];
        $keyword = $_GET['keyword'];

        // Include Employee class
        require_once 'Employee.php';

        // Create an instance of Employee class
        $employee = new Employee();

        // Search for employees based on criteria
        $result = $employee->searchEmployees($search_by, $keyword);

        if ($result->num_rows > 0) {
            // Display search results
            echo "<h3>Search Results</h3>";
            while ($row = $result->fetch_assoc()) {
                echo "ID: " . $row['id'] . "<br>";
                echo "Name: " . $row['name'] . "<br>";
                echo "Email: " . $row['email'] . "<br>";
                echo "Designation: " . $row['designation'] . "<br>";
                echo "Salary: " . $row['salary'] . "<br><br>";
            }
        } else {
            // If no results found
            echo "No employees found matching the search criteria.";
        }
    }
    ?>
    
    <ul>
        <li><a href="index.php">Home Employee</a></li>
    </ul>
</body>
</html>
