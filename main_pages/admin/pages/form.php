<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/form.css">
    <title>Dynamic Form</title>
</head>
<body>
    <div class="container">
        <h1>Form</h1>
        <form action="handle_form.php" method="POST">
            <div class="form-group">
                <label>Province:</label>
                <input type="text" name="province" required>
            </div>
            <div class="form-group">
                <label>City/Municipality:</label>
                <input type="text" name="city" required>
            </div>
            <div class="form-group">
                <label>Barangay:</label>
                <input type="text" name="barangay" required>
            </div>
            <div class="form-group">
                <label>Sitio/Zone:</label>
                <input type="text" name="sitio_zone_purok" required>
            </div>
            <div class="form-group">
                <label>House Number:</label>
                <input type="text" name="house_number" required>
            </div>
            <div class="form-group">
                <label>Estimated Family Income:</label>
                <input type="number" name="estimated_family_income" required>
            </div>
            <div class="form-group">
                <label>Other Notes:</label>
                <textarea name="notes" rows="4" cols="50"></textarea>
            </div>
            <table id="dynamicTable">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Household <br> Members</th>
                        <th>Relationship <br> to Head</th>
                        <th>Birthdate</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Civil <br> Status</th>
                        <th>Person w/ <br> Disability</th>
                        <th>Ethnicity</th>
                        <th>Religion</th>
                        <th>Highest <br> Grade/Year <br> Completed</th>
                        <th>Currently <br> Attending <br> School?</th>
                        <th>Level <br> Enrolled</th>
                        <th>Reasons for <br> Not Attending <br> School</th>
                        <th>Can Read/Write <br> Simple Message <br> in any Language?</th>
                        <th>Occupation</th>
                        <th>Work</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><input type="text" name="household_members[]"></td>
                        <td><input type="text" name="relationship_to_head[]"></td>
                        <td><input type="date" name="birthdate[]"></td>
                        <td><input type="number" name="age[]"></td>
                        <td><input type="text" name="gender[]"></td>
                        <td><input type="text" name="civil_status[]"></td>
                        <td><input type="text" name="disability[]"></td>
                        <td><input type="text" name="ethnicity[]"></td>
                        <td><input type="text" name="religion[]"></td>
                        <td><input type="text" name="highest_grade[]"></td>
                        <td><input type="text" name="attending_school[]"></td>
                        <td><input type="text" name="level_enrolled[]"></td>
                        <td><input type="text" name="reasons_not_attending[]"></td>
                        <td><input type="text" name="can_read_write[]"></td>
                        <td><input type="text" name="occupation[]"></td>
                        <td><input type="text" name="work[]"></td>
                        <td><input type="text" name="status[]"></td>
                    </tr>
                </tbody>
            </table>
            <button type="button" class="btn btn-add" onclick="addRow()">Add Row</button>
            <br><br>
            <button type="submit" class="btn btn-save">Save</button>
            <button type="reset" class="btn btn-cancel">Cancel</button>
        </form>
    </div>

    <script>
        function addRow() {
            const table = document.getElementById('dynamicTable').getElementsByTagName('tbody')[0];
            const newRow = table.rows[0].cloneNode(true);
            const rowCount = table.rows.length + 1;
            newRow.cells[0].innerText = rowCount;
            const inputs = newRow.getElementsByTagName('input');
            for (let i = 0; i < inputs.length; i++) {
                inputs[i].value = '';
            }
            table.appendChild(newRow);
        }

        function deleteRow(button) {
            const row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
            updateRowNumbers();
        }

        function updateRowNumbers() {
            const table = document.getElementById('dynamicTable').getElementsByTagName('tbody')[0];
            const rows = table.rows;
            for (let i = 0; i < rows.length; i++) {
                rows[i].cells[0].innerText = i + 1;
            }
        }
    </script>
</body>
</html>
