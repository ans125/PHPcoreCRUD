<!DOCTYPE html>
<html>
<head>
    <title>Employee Management System</title>
</head>
<body>
    <h1>Employee Management System</h1>
    <?php
    // Check if a status parameter is present in the URL
    if (isset($_GET['status'])) {
        // Display a message based on the status
        if ($_GET['status'] == 'success') {
            echo "<p style='color: green;'>Operation successful!</p>";
        } elseif ($_GET['status'] == 'error') {
            echo "<p style='color: red;'>Operation failed. Please try again.</p>";
        }
    }
    ?>
    <ul>
        <li><a href="add_employee.php">Add Employee</a></li>
        <li><a href="view_employee.php">View Employees</a></li>
        <li><a href="edit_employee.php">Edit Employee</a></li>
        <li><a href="delete_employee.php">Delete Employee</a></li>
        <li><a href="search_employee.php">Search Employee</a></li>
    </ul>
</body>
</html>
