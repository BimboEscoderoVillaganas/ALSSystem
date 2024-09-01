<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $province = $_POST['province'];
    $city = $_POST['city'];
    $barangay = $_POST['barangay'];
    $sitio_zone_purok = $_POST['sitio_zone_purok'];
    $house_number = $_POST['house_number'];
    $estimated_family_income = $_POST['estimated_family_income'];
    $notes = $_POST['notes'];

    $household_members = $_POST['household_members'];
    $relationship_to_head = $_POST['relationship_to_head'];
    $birthdate = $_POST['birthdate'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $civil_status = $_POST['civil_status'];
    $disability = $_POST['disability'];
    $ethnicity = $_POST['ethnicity'];
    $religion = $_POST['religion'];
    $highest_grade = $_POST['highest_grade'];
    $attending_school = $_POST['attending_school'];
    $level_enrolled = $_POST['level_enrolled'];
    $reasons_not_attending = $_POST['reasons_not_attending'];
    $can_read_write = $_POST['can_read_write'];
    $occupation = $_POST['occupation'];
    $work = $_POST['work'];
    $status = $_POST['status'];

    // Database connection
    
    include '../../../src/db/db_connection.php';

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into database
    for ($i = 0; $i < count($household_members); $i++) {
        $sql = "INSERT INTO osy_tbl (encoder_id, date_encoded, year, province, city_municipality, barangay, sitio_zone_purok, housenumber, estimated_family_income, household_members, relationship_to_head, birthdate, age, gender, civil_status, person_with_disability, ethnicity, religion, highest_grade_completed, currently_attending_school, grade_level_enrolled, reasons_for_not_attending_school, can_read_write_simple_messages_inanylanguage, occupation, work, status)
        VALUES (NULL, NOW(), YEAR(CURDATE()), '$province', '$city', '$barangay', '$sitio_zone_purok', '$house_number', '$estimated_family_income', '$household_members[$i]', '$relationship_to_head[$i]', '$birthdate[$i]', '$age[$i]', '$gender[$i]', '$civil_status[$i]', '$disability[$i]', '$ethnicity[$i]', '$religion[$i]', '$highest_grade[$i]', '$attending_school[$i]', '$level_enrolled[$i]', '$reasons_not_attending[$i]', '$can_read_write[$i]', '$occupation[$i]', '$work[$i]', '$status[$i]')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>
