<?php
require_once 'db_connection.php';

require_once 'Employee.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employee = new Employee();
    $result = $employee->addEmployee($_POST['name'], $_POST['email'], $_POST['designation'], $_POST['salary']);
    // Add Employee (create)
if ($result) {
    header("Location: index.php?status=success"); // Redirect to home page with success status
    exit();
} else {
    header("Location: index.php?status=error"); // Redirect to home page with error status
    exit();
}

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Employee</title>
</head>
<body>
    <h2>Add Employee</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Name: <input type="text" name="name" required><br>
        Email: <input type="email" name="email" required><br>
        Designation: <input type="text" name="designation" required><br>
        Salary: <input type="number" name="salary" required><br>
        <input type="submit" value="Add Employee">
    </form>

    <ul>
        <li><a href="index.php">Home Employee</a></li>
    </ul></body>
</html>
