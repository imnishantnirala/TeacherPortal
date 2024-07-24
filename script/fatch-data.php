<?php
require('../database_connection.php');

$studentData = mysqli_query($connect, "SELECT * FROM `student` ");
$i = 0;
$output = "";
while ($studentList = mysqli_fetch_array($studentData)) {
    $i++;
    $id = $studentList['id'];
    $firstChar = htmlspecialchars(substr($studentList['name'], 0, 1));
    $studentName = htmlspecialchars($studentList['name']);
    $studentSubject = htmlspecialchars($studentList['subject']);
    $studentMark = htmlspecialchars($studentList['mark']);

    $output .=
        '<tr>
            <th scope="row">
                <div class="d-flex">
                    <div class="bg-info nameIcon rounded-circle">' . $firstChar . '</div>
                    <div class="p-2">' . $studentName . '</div>
                </div>
            </th>
            <td>' . $studentSubject . '</td>
            <td>' . $studentMark . '</td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-dark dropdown-toggle rounded-circle" type="button" data-bs-toggle="dropdown" aria-expanded="false"></button>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#" class="dropdown-item" id="editStudent" data-studentId="' . $id . '" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-whatever="@getbootstrap">Edit</a>
                        </li>

                        <li>
                            <a href="#" class="dropdown-item" id="deleteBtn" data-studentId="' . $id . '">Delete</a>
                        </li>
                    </ul>
                </div>
            </td>
        </tr>';
}
echo $output;
