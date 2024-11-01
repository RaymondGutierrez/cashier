
<!DOCTYPE html>
<html lang="en">
  <?php include './layout/head.php' ?>
<body>
<?php include './layout/dashboard.php' ?>



<main class="col-md-10 ml-sm-auto pt-1 px-1 ">

            <section>
            <h1 class="text-center mt-2 head fs-2">Student Balance</h1>
  <div class="container mt-5 ">



  <div class="row">
    <div class="col-md-12  p-4 shadow">

    
    <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#myModal">
  Payment
</button>

    <table class="table table-striped">
    <thead>
      <tr>
        <th>Student ID</th>
        <th>Student Name</th>
        <th>Grade Level</th>
        <th>Amount</th>
        <th>Date</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="tbl_tbody">
      
    </tbody>
  </table>
    </div>
  </div>
            </section>
</main>
  





  <!-- INSERT -->

<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Payment</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <div class="container mt-5">
    <form id="insertStudent">
        <div class="form-group">
            <label for="student_id">Student ID</label>
            <input type="text" class="form-control" id="student_id">
        </div>
        <div class="form-group">
            <label for="student_fullname">Fullname</label>
            <input type="text" class="form-control" id="student_fullname" >
        </div>
        <div class="form-group">
            <label for="student_current_year">Grade Level</label>
            <input type="text" class="form-control" id="student_current_year" >
        </div>
        <div class="form-group">
            <label for="payment_for">Description</label>
            <input type="text" class="form-control" id="payment_for" >
        </div>
        <div class="form-group">
            <label for="student_remarks">Remarks</label>
            <input type="text" class="form-control" id="student_remarks" >
        </div>
        <div class="form-group">
            <label for="student_amount">Amount</label>
            <input type="text" class="form-control" id="student_amount" >
        </div>
        
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
    <div id="responseMessage" class="mt-3"></div>
</div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>


<!-- EDIT -->

<div class="modal" id="modalEdit">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Student</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <div class="container mt-5">
    <h2>Insert New Item</h2>
    <form id="insertStudent">
        <div class="form-group">
            <label for="student_id">Student ID</label>
            <input type="text" class="form-control" id="edit_student_id">
        </div>
        <div class="form-group">
            <label for="student_fullname">Fullname</label>
            <input type="text" class="form-control" id="edit_student_fullname" >
        </div>
        <button type="button" onclick="saveEdit()" class="btn btn-primary mt-2">Submit</button>
    </form>
    <div id="responseMessage" class="mt-3"></div>
</div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- Add a modal dialog for deletion confirmation -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this item?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
      </div>
    </div>
  </div>
</div>

 
</div>




 
</body>
</html>


<script src="./js/jquery/jquery.min.js"></script>
<script>

// DELETE
function deleteItem(student_id) {
  $('#deleteModal').modal('show');
  $('#confirmDelete').off('click').on('click', function() {
    // Send the AJAX request to delete the item
    $.ajax({
      url: 'http://localhost/backend/crud/student/delete.php',
      type: 'POST',
      data: { student_id: student_id },
      dataType: 'json',
      beforeSend: function(xhr) {
        const token = localStorage.getItem('jwt');
        xhr.setRequestHeader('Authorization', token);
      },
      success: function(response) {
        if (response.success) {
          // Remove the row from the table
          $(`#row${student_id}`).remove();
          alert('Item deleted successfully.');
        } else {
          alert('Error deleting item: ' + response.message);
        }
      },
      error: function(xhr, status, error) {
        console.error('Error:', error);
        alert('An error occurred while deleting the item.');
      }
    });
    // Close the modal
    $('#deleteModal').modal('hide');
  });
}

        //EDIT
        function EditItem(student_id,student_fullname) {
          $("#edit_student_id").val(student_id);
          $("#edit_student_fullname").val(student_fullname);


        }

      function saveEdit(){
 
            // Get form data
            const student_id = $('#edit_student_id').val();
            const student_fullname = $('#edit_student_fullname').val();

            // Prepare the data to be sent as JSON
            const data = JSON.stringify({
              student_id      : student_id,
              student_fullname: student_fullname
            });

            // Send AJAX request
            $.ajax({
                url: 'http://localhost/backend/crud/student/update.php',
                type: 'POST',
                contentType: 'application/json',
                data: data,
                beforeSend: function(xhr) {
                    const token = localStorage.getItem('jwt');
                    xhr.setRequestHeader('Authorization', token);
                },
                success: function(response) {
                  console.log(response);
                    if (response.status === 1) {
                      $(`#row${student_id}`).remove();
                            $('#tbl_tbody').append(`
                                <tr id="row${student_id}">
                                    <td>${student_id}</td>
                                    <td>${student_fullname}</td>
                                    <td> 
                                      <div class="btn-group">
                                        <button class="btn btn-sm btn-danger ms-2" onClick="deleteItem('${student_id}')">Delete Item</button>
                                        <button class="btn btn-sm btn-primary" onClick="EditItem('${student_id}',${student_fullname})"  data-bs-toggle="modal" data-bs-target="#modalEdit">Edit Item</button>
                                      </div>
                                    </td>



                                </tr>
                            `);
                            $('#responseMessage').html('<div class="alert alert-success">Item inserted successfully.</div>');
                        } else {
                            $('#responseMessage').html('<div class="alert alert-danger">Error: ' + response.message + '</div>');
                        }
                },
                error: function(xhr, status, error) {
                    $('#responseMessage').html('<div class="alert alert-danger">An error occurred while inserting the item.</div>');
                }
            });
 


      }



    $(document).ready(function() {
    // READs
    const token = localStorage.getItem('jwt');
    $.ajax({
        url: 'http://localhost/backend/crud/student/read.php', // URL to your PHP script
        type: 'GET', // Request method
        dataType: 'json', // Expected data type from server
        beforeSend: function(xhr) {
            // Set the Authorization header
            xhr.setRequestHeader('Authorization', token);
        },
        success: function(response) {
            const data = response.message;
            

            var rows = '';
            for (var i = 0; i < data.length; i++) {
                var item = data[i];
                rows += `
                    <tr id="row${item.student_id}">
                        <td>${item.student_id}</td>
                        <td>${item.student_fullname}</td>
                        <td>${item.student_current_year}</td>
                        <td>${item.student_amount}</td>
                        <td>${item.date_time_added}</td>
                        <td>

                        <div class="btn-group">
                           <button class="btn btn-sm btn-danger me-2" onClick="deleteItem('${item.student_id}')">Delete Item</button>
                          <button class="btn btn-sm btn-primary" data-student=${item} onClick="EditItem('${item.student_id}','${item.student_fullname}','${item.student_current_year}','${item.student_amount}','${item.date_time_added}')" data-bs-toggle="modal" data-bs-target="#modalEdit">Edit Item</button></td>
                        </div>
                                                
                        
                        </td>
                    </tr>
                `;
            }
            // Insert the rows into the table body
            $('#tbl_tbody').html(rows);
        },
        error: function(xhr, status, error) {
            // Handle error
            console.error('Error:', error);

            $('#tbl_list').html(JSON.stringify(response.status));
        }
    });

    $(document).ready(function() {
    // INSERT
    $('#insertStudent').on('submit', function(event) {
        event.preventDefault();

        // Get form data
        const student_id = $('#student_id').val();
        const student_fullname = $('#student_fullname').val();
        const student_current_year = $('#student_current_year').val();
        const payment_for = $('#payment_for').val();
        const student_remarks = $('#student_remarks').val();
        const student_amount = $('#student_amount').val();

        // Prepare the data to be sent as JSON
        const data = JSON.stringify({
            student_id: student_id,
            student_fullname: student_fullname,
            student_current_year: student_current_year,
            payment_for: payment_for,
            student_remarks: student_remarks,
            student_amount: student_amount
        });

        // Send AJAX request
        $.ajax({
            url: 'http://localhost/backend/crud/student/create.php',
            type: 'POST',
            contentType: 'application/json',
            data: data,
            beforeSend: function(xhr) {
                const token = localStorage.getItem('jwt');
                xhr.setRequestHeader('Authorization', token);
            },
            success: function(response) {
                console.log(response); // Log the response for debugging
                if (response.status === 1) {
                    const date_time_added = new Date().toLocaleString(); // Current date and time
                    $('#tbl_tbody').append(`
                        <tr id="row${response.id}">
                            <td>${student_id}</td>
                            <td>${student_fullname}</td>
                            <td>${student_current_year}</td>
                            <td>${student_amount}</td>
                            <td>${date_time_added}</td>
                            <td>
                                <button class="btn btn-sm btn-danger me-2" onClick="deleteItem(${response.id})">Delete Item</button>
                                <button class="btn btn-sm btn-primary me-2" onClick="EditItem('${response.id}')" data-bs-toggle="modal" data-bs-target="#modalEdit">Edit Item</button>
                            </td>
 </tr>
                    `);
                    $('#responseMessage').html('<div class="alert alert-success">Item inserted successfully.</div>');
                } else {
                    $('#responseMessage').html('<div class="alert alert-danger">Error: ' + response.message + '</div>');
                }
            },
            error: function(xhr, status, error) {
                $('#responseMessage').html('<div class="alert alert-danger">An error occurred while inserting the item.</div>');
            }
        });
    });
});

  });
</script>
