<?php
require_once 'Employee.php';
$employee = new Employee();
$result = $employee->getEmployees();
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Employees</title>
</head>
<body>
    <h2>Employees List</h2>
    <table border='1'>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Designation</th>
            <th>Salary</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["id"]."</td>";
                echo "<td>".$row["name"]."</td>";
                echo "<td>".$row["email"]."</td>";
                echo "<td>".$row["designation"]."</td>";
                echo "<td>".$row["salary"]."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No employees found</td></tr>";
        }
        ?>
    </table>
    <ul>
        <li><a href="index.php">Home Employee</a></li>
    </ul>
</body>
</html>
