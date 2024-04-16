<?php
require_once 'Employee.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if any checkboxes are selected
    if(isset($_POST['delete'])) {
        $employee = new Employee();
        $deleted_count = 0;

        // Loop through selected checkboxes
        foreach($_POST['delete'] as $id) {
            $result = $employee->deleteEmployee($id);
            if ($result) {
                $deleted_count++;
            }
        }

        // Display success message
        if ($result) {
            header("Location: index.php?status=success"); // Redirect to home page with success status
            exit();
        } else {
            header("Location: index.php?status=error"); // Redirect to home page with error status
            exit();
        }}
}

// Fetch all employees
$employee = new Employee();
$result = $employee->getEmployees();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Employee</title>
</head>
<body>
    <h2>Delete Employee</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table border="1">
            <tr>
                <th>Select</th>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Designation</th>
                <th>Salary</th>
            </tr>
            <?php
            // Display employees in a table with checkboxes for selection
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td><input type='checkbox' name='delete[]' value='" . $row['id'] . "'></td>";
                echo "<td>".$row["id"]."</td>";
                echo "<td>".$row["name"]."</td>";
                echo "<td>".$row["email"]."</td>";
                echo "<td>".$row["designation"]."</td>";
                echo "<td>".$row["salary"]."</td>";
                echo "</tr>";
            }
            ?>
        </table>
        <input type="submit" value="Delete Selected Employees">
    </form>
   
    <ul>
        <li><a href="index.php">Home Employee</a></li>
    </ul>
</body>
</html>
