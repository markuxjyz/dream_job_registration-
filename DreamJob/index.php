<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dream Job Application</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to the Dream Job Registration System</h1>
        <form action="core/handleForms.php" method="POST">
            <p><label for="firstName">First Name</label> <input type="text" name="firstName" required></p>
            <p><label for="lastName">Last Name</label> <input type="text" name="lastName" required></p>
            <p><label for="gender">Gender</label> <input type="text" name="gender" required></p>
            <p><label for="industry">Industry</label> <input type="text" name="industry" required></p>
            <p><label for="position">Position</label> <input type="text" name="position" required></p>
            <p><label for="salaryExpectation">Salary Expectation</label> <input type="number" name="salaryExpectation" required></p>
            <p><label for="workType">Work Type</label>
                <select name="workType" required>
                    <option value="Full-time">Full-time</option>
                    <option value="Part-time">Part-time</option>
                    <option value="Freelance">Freelance</option>
                </select>
            </p>
            <input type="submit" name="insertDreamJobApplicationBtn" value="Apply">
        </form>

        <table>
            <tr>
                <th>Application ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Industry</th>
                <th>Position</th>
                <th>Salary Expectation</th>
                <th>Work Type</th>
                <th>Date Applied</th>
                <th>Action</th>
            </tr>
        
            <?php $seeAllDreamJobApplications = seeAllDreamJobApplications($pdo); ?>
            <?php foreach ($seeAllDreamJobApplications as $row) { ?>
                <tr>
                    <td><?php echo $row['application_id']; ?></td>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['industry']; ?></td>
                    <td><?php echo $row['position']; ?></td>
                    <td><?php echo $row['salary_expectation']; ?></td>
                    <td><?php echo $row['work_type']; ?></td>
                    <td><?php echo $row['date_applied']; ?></td>
                    <td>
                        <a href="editdreamjob.php?application_id=<?php echo $row['application_id']; ?>">Edit</a>
                        <a href="deletedreamjob.php?application_id=<?php echo $row['application_id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>