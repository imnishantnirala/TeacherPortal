$(document).ready(function () {
    // Function to fetch data from database with AJAX
    function loadTable() {
        $.ajax({
            url: "script/fetch-data.php",
            type: "POST",
            success: function (data) {
                $("#studentDataList").html(data);
            },
            error: function () {
                showPopUp('Error fetching data from database.', 'error');
            }
        });
    }
    loadTable();

    // Function to insert data into the database
    $("#addStudent").on("click", function (e) {
        e.preventDefault();

        var name = $("#name").val();
        var subject = $("#subject").val();
        var mark = $("#mark").val();
        
        if (!name || !subject || !mark) {
            showPopUp('All fields are required.', 'error');
            return;
        }

        $.ajax({
            url: "script/insert-data.php",
            type: "POST",
            data: { name: name, subject: subject, mark: mark },
            success: function (response) {
                if (response == 1) {
                    loadTable();
                    showPopUp('Data inserted successfully!', 'success');
                } else {
                    showPopUp('Failed to insert data. Something went wrong!', 'error');
                }
                $('#addModal').modal('hide');
            },
            error: function () {
                showPopUp('Error inserting data.', 'error');
            }
        });
    });

    // Function to delete data from the database
    $(document).on("click", "#deleteBtn", function () {
        if (confirm("Do you really want to delete this record?")) {
            var studentId = $(this).data("studentid");
            
            $.ajax({
                url: "script/delete-data.php",
                type: "POST",
                data: { id: studentId },
                success: function (response) {
                    if (response == 1) {
                        loadTable();
                        showPopUp('Record deleted successfully!', 'success');
                    } else {
                        showPopUp('Failed to delete record. Something went wrong!', 'error');
                    }
                },
                error: function () {
                    showPopUp('Error deleting record.', 'error');
                }
            });
        }
    });

    // Function to fill update form values
    $(document).on("click", "#editStudent", function () {
        var studentId = $(this).data("studentid");
        
        $.ajax({
            url: "layout/updateModel.php",
            type: "POST",
            data: { id: studentId },
            success: function (data) {
                $("#editStudentForm").html(data);
            },
            error: function () {
                showPopUp('Error loading update form.', 'error');
            }
        });
    });

    // Function to save updated form values
    $(document).on("click", "#saveStudent", function (e) {
        e.preventDefault();

        var id = $("#studentId", "#editModal").val();
        var name = $("#name", "#editModal").val();
        var subject = $("#subject", "#editModal").val();
        var mark = $("#mark", "#editModal").val();
        $.ajax({
            url: "script/update-data.php",
            type: "POST",
            data: { id: id, name: name, subject: subject, mark: mark },
            success: function (response) {
                if (response == 1) {
                    loadTable();
                    showPopUp('Record updated successfully!', 'success');
                } else {
                    showPopUp('Failed to update record. Something went wrong!', 'error');
                }
                $('#editModal').modal('hide');
            },
            error: function () {
                showPopUp('Error updating record.', 'error');
            }
        });
    });

    // Function to show popup messages
    function showPopUp(message, type) {
        var alertClass = 'alert-primary';
        if (type === 'success') alertClass = 'alert-success';
        if (type === 'warning') alertClass = 'alert-warning';
        if (type === 'error') alertClass = 'alert-danger';
        
        var output = `
            <div class="alert ${alertClass} alert-dismissible fade show shadow" role="alert">
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `;
        $(".alertBox").html(output).slideDown();
    }
});