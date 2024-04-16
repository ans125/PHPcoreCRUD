<?php
require_once 'Employee.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Loop through each submitted employee data
    foreach ($_POST['id'] as $key => $id) {
        $name = $_POST['name'][$key];
        $email = $_POST['email'][$key];
        $designation = $_POST['designation'][$key];
        $salary = $_POST['salary'][$key];
        
        $employee = new Employee();
        $result = $employee->updateEmployee($name, $email, $designation, $salary, $id);
        
        // Display appropriate message
        if ($result) {
            echo "Employee with ID $id updated successfully!<br>";
        } else {
            echo "Error updating employee with ID $id.<br>";
        }
    }
}

$employee = new Employee();
$result = $employee->getEmployees();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
</head>
<body>
    <h2>Edit Employee</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Designation</th>
                <th>Salary</th>
                <th>Action</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['id']); ?></td>
                <td><input type="text" name="name[]" value="<?php echo htmlspecialchars($row['name']); ?>" required></td>
                <td><input type="email" name="email[]" value="<?php echo htmlspecialchars($row['email']); ?>" required></td>
                <td><input type="text" name="designation[]" value="<?php echo htmlspecialchars($row['designation']); ?>" required></td>
                <td><input type="number" name="salary[]" value="<?php echo htmlspecialchars($row['salary']); ?>" required></td>
                <td><button type="submit" name="id[]" value="<?php echo htmlspecialchars($row['id']); ?>">Update</button></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </form>

    <ul>
        <li><a href="index.php">Home Employee</a></li>
    </ul>
</body>
</html>
