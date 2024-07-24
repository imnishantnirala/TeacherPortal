    <!-- Model Btn -->
    <button type="button" class="btn btn btn-dark rounded-0 col-2 p-3 mt-5" data-bs-toggle="modal" data-bs-target="#addModal" data-bs-whatever="@getbootstrap">Add</button>

    <!-- add Model -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-5">
                <div class="modal-body">
                    <form>
                        <label class="form-label">Name</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                            <input type="text" name="name"  id="name" class="form-control" placeholder="name" aria-label="name" required>
                        </div>

                        <label class="form-label">Subject</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-regular fa-message"></i></span>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject" aria-label="Subject" required>
                        </div>

                        <label class="form-label">Mark</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-regular fa-bookmark"></i></span>
                            <input type="number" name="mark" id="mark" class="form-control" placeholder="Mark" aria-label="Mark" required>
                        </div>


                        <div class="d-flex justify-content-center mt-4">
                            <button type="submit" name="done" id="addStudent" class="btn btn-dark rounded-0 col-5 p-2">Add</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- edit Model -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-5">
                <div class="modal-body">
                    <div id="editStudentForm"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- For Alert and Messages -->
    <div class="alertBox position-absolute"></div>