<?php  
require_once 'dbConfig.php';

function insertDreamJobApplication($pdo, $first_name, $last_name, $gender, $industry, $position, $salaryExpectation, $workType) {
    $sql = "INSERT INTO dreamjob_applications (first_name, last_name, gender, industry, position, salary_expectation, work_type) VALUES (?,?,?,?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$first_name, $last_name, $gender, $industry, $position, $salaryExpectation, $workType]);
}

function seeAllDreamJobApplications($pdo) {
    $sql = "SELECT * FROM dreamjob_applications";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(); 
}

function getApplicationByID($pdo, $application_id) {
    $sql = "SELECT * FROM dreamjob_applications WHERE application_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$application_id]);
    return $stmt->fetch(); 
}

function updateDreamJobApplication($pdo, $application_id, $first_name, $last_name, $gender, $industry, $position, $salaryExpectation, $workType) {
    $sql = "UPDATE dreamjob_applications SET first_name = ?, last_name = ?, gender = ?, industry = ?, position = ?, salary_expectation = ?, work_type = ? WHERE application_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$first_name, $last_name, $gender, $industry, $position, $salaryExpectation, $workType, $application_id]);
}

function deleteDreamJobApplication($pdo, $application_id) {
    $sql = "DELETE FROM dreamjob_applications WHERE application_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$application_id]);
}
?>