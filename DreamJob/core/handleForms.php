<?php  
require_once 'dbConfig.php';
require_once 'models.php';

if (isset($_POST['insertDreamJobApplicationBtn'])) {
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $gender = trim($_POST['gender']);
    $industry = trim($_POST['industry']);
    $position = trim($_POST['position']);
    $salaryExpectation = trim($_POST['salaryExpectation']);
    $workType = trim($_POST['workType']);

    $query = insertDreamJobApplication($pdo, $firstName, $lastName, $gender, $industry, $position, $salaryExpectation, $workType);

    if ($query) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Application submission failed";
    }    
}

if (isset($_POST['editDreamJobApplicationBtn'])) {
    $application_id = trim($_GET['application_id']);
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $gender = trim($_POST['gender']);
    $industry = trim($_POST['industry']);
    $position = trim($_POST['position']);
    $salaryExpectation = trim($_POST['salaryExpectation']);
    $workType = trim($_POST['workType']);

    if (!empty($application_id) && !empty($firstName) && !empty($lastName) && !empty($gender) && !empty($industry) && !empty($position) && !empty($salaryExpectation) && !empty($workType)) {
        $query = updateDreamJobApplication($pdo, $application_id, $firstName, $lastName, $gender, $industry, $position, $salaryExpectation, $workType);

        if ($query) {
            header("Location: ../index.php");
            exit();
        } else {
            echo "Update Failed!";
        }
    }
}

if (isset($_POST['deleteDreamJobApplicationBtn'])) {
    $application_id = $_GET['application_id'];
    $query = deleteDreamJobApplication($pdo, $application_id);

    if ($query) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Deletion failed";
    }
}
?>