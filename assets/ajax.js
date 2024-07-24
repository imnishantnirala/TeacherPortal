$(document).ready(function () {
    // this code For fatch data from data base with ajax 
    function loadTable() {
        $.ajax({
            url: "script/fatch-data.php",
            type: "POST",
            success: function (contact_data) {
                $("#studentDataList").html(contact_data);
                // console.log('student data : ', contact_data);
            }
        });
    };
    loadTable();

    //this code for insert data into Database  
    $("#addStudent").on("click", function (e) {
        e.preventDefault();
        var name = $("#name").val();
        var subject = $("#subject").val();
        var mark = $("#mark").val();
        
        if (name == "" || subject == "" || mark == "") {
            showPopUp('All fields are required.', 'error');
        } else {
            $.ajax({
                url: "script/insert-data.php",
                type: "POST",
                data: { name: name, subject: subject, mark: mark },
                success: function (response) {
                    if (response == 1) {
                        loadTable();
                        showPopUp('Insert Data SuccessFull !', 'success');
                    } else {
                        showPopUp('Cant Update Record Something Went Wrong !', 'error');
                    }
                    $('#addModal').modal('hide');
                }
            });
        }
    });

    // this code for delete data from Database 
    $(document).on("click", "#deleteBtn", function () {
        if (confirm("Do You Really want to delete this record ?")) {
            var studentId = $(this).data("studentid");
            $.ajax({
                url: "script/delete-data.php",
                type: "POST",
                data: { id: studentId },
                success: function (response) {
                    if (response == 1) {
                        loadTable();
                        showPopUp('Delete SuccessFull !', 'success');
                    } else {
                        showPopUp('Cant Update Record Something Went Wrong !', 'error');
                    }
                }
            });
        }
    });

    // Fill Update form value
    $(document).on("click", "#editStudent", function (e) {
        var studentId = $(this).data("studentid");
        console.log(' studentId : ', studentId);
        $.ajax({
            url: "layout/updateModel.php",
            type: "POST",
            data: { id: studentId },
            success: function (data) {
                $("#editStudentForm").html(data);
            }
        });
    });

    // Save Update form
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
            success: function (data) {
                if (data == 1) {
                    loadTable();
                    showPopUp('Update SuccessFull !', 'success');
                } else {
                    showPopUp('Cant Update Record Something Went Wrong !', 'error');
                }
                $('#editModal').modal('hide');
            }
        });
    });


    function showPopUp(message, type) {
        var alert = 'alert-primary';
        if(type == 'success') alert = 'alert-success';
        if(type == 'warning') alert = 'alert-warning';
        if(type == 'error') alert = 'alert-danger';
        

        var output = `
            <div class="alert `+alert+`  alert-dismissible fade show shadow" role="alert">
                `+ message +`
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `;
        $(".alertBox").html(output).slideDown();
    }
    

});