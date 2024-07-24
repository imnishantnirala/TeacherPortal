<?php
require('../database_connection.php');


$studentId = $_POST['id'];
$select_sql = "SELECT * FROM `student` WHERE id = {$studentId} ";
$fetch_result = mysqli_query($connect, $select_sql) or die("SQL Query Failed !");
$output = "";
if (mysqli_num_rows($fetch_result) > 0) {
    while ($studentData =  mysqli_fetch_assoc($fetch_result)) {
        $output .= '
            <form>
                <label class="form-label">Name</label>
                 <input type="hidden" name="id" id="studentId" value="'.$studentData['id'].'">
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                    <input type="text" name="name" id="name" value="'.$studentData['name'].'" class="form-control" placeholder="name" aria-label="name" required>
                </div>

                <label class="form-label">Subject</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-regular fa-message"></i></span>
                    <input type="text" name="subject" id="subject" value="'.$studentData['subject'].'" class="form-control" placeholder="Subject" aria-label="Subject" required>
                </div>

                <label class="form-label">Mark</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-regular fa-bookmark"></i></span>
                    <input type="number" name="mark" id="mark" value="'.$studentData['mark'].'" class="form-control" placeholder="Mark" aria-label="Mark" required>
                </div>


                <div class="d-flex justify-content-center mt-4">
                    <button type="submit" name="done" id="saveStudent" class="btn btn-dark rounded-0 col-5 p-2">Update</button>
                </div>

            </form>';
    }
    echo $output;
}
