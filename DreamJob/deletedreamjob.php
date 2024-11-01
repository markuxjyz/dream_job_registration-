<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Dream Job Application</title>
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
        <h1>Are you sure you want to delete your registration?</h1>
        <p> </p>
        <p><strong>First Name:</strong> <?php echo htmlspecialchars($getApplicationById['first_name']); ?></p>
        <p><strong>Last Name:</strong> <?php echo htmlspecialchars($getApplicationById['last_name']); ?></p>
        <p><strong>Gender:</strong> <?php echo htmlspecialchars($getApplicationById['gender']); ?></p>
        <p><strong>Industry:</strong> <?php echo htmlspecialchars($getApplicationById['industry']); ?></p>
        <p><strong>Position:</strong> <?php echo htmlspecialchars($getApplicationById['position']); ?></p>
        <p><strong>Salary Expectation:</strong> <?php echo htmlspecialchars($getApplicationById['salary_expectation']); ?></p>
        <p><strong>Work Type:</strong> <?php echo htmlspecialchars($getApplicationById['work_type']); ?></p>
        
        <form action="core/handleForms.php?application_id=<?php echo $_GET['application_id']; ?>" method="POST">
            <input type="submit" name="deleteDreamJobApplicationBtn" value="Delete">
        </form>
    </div>
</body>
</html>