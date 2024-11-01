<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Dream Job Application</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>
<body>
    <?php 
    if (!isset($_GET['application_id'])) {
        echo "No application ID provided.";
        exit;
    }

    $getApplicationById = getApplicationByID($pdo, $_GET['application_id']);
    if (!$getApplicationById) {
        echo "No application found with that ID.";
        exit;
    }
    ?>
    
    <div class="container">
        <h1>Any Changes?</h1>
        <form action="core/handleForms.php?application_id=<?php echo $_GET['application_id']; ?>" method="POST">
            <p>
                <label for="firstName">First Name</label> 
                <input type="text" name="firstName" value="<?php echo htmlspecialchars($getApplicationById['first_name']); ?>" required>
            </p>
            <p>
                <label for="lastName">Last Name</label> 
                <input type="text" name="lastName" value="<?php echo htmlspecialchars($getApplicationById['last_name']); ?>" required>
            </p>
            <p>
                <label for="gender">Gender</label>
                <input type="text" name="gender" value="<?php echo htmlspecialchars($getApplicationById['gender']); ?>" required>
            </p>
            <p>
                <label for="industry">Industry</label>
                <input type="text" name="industry" value="<?php echo htmlspecialchars($getApplicationById['industry']); ?>" required>
            </p>
            <p>
                <label for="position">Position</label>
                <input type="text" name="position" value="<?php echo htmlspecialchars($getApplicationById['position']); ?>" required>
            </p>
            <p>
                <label for="salaryExpectation">Salary Expectation</label>
                <input type="number" name="salaryExpectation" value="<?php echo htmlspecialchars($getApplicationById['salary_expectation']); ?>" required>
            </p>
            <p>
                <label for="workType">Work Type</label>
                <select name="workType" required>
                    <option value="Full-time" <?php echo ($getApplicationById['work_type'] == 'Full-time') ? 'selected' : ''; ?>>Full-time</option>
                    <option value="Part-time" <?php echo ($getApplicationById['work_type'] == 'Part-time') ? 'selected' : ''; ?>>Part-time</option>
                    <option value="Freelance" <?php echo ($getApplicationById['work_type'] == 'Freelance') ? 'selected' : ''; ?>>Freelance</option>
                </select>
            </p>
            <p>
                <input type="submit" name="editDreamJobApplicationBtn" value="Update">
            </p>
        </form>
    </div>
</body>
</html>