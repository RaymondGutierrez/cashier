
<!DOCTYPE html>
<html lang="en">
  <?php include './layout/head.php' ?>
<body>
<?php include './layout/dashboard.php' ?>



<main class="col-md-10 ml-sm-auto pt-1 px-1 ">

            <section>
            <h1 class="text-center mt-2 head fs-2">Payment</h1>
  <div class="container mt-5 ">



  <div class="row">
    <div class="col-md-12  p-4 shadow">

    
    <form id="insertStudent">
  <div class="mb-3">
    <label for="student_id" class="form-label">Student ID</label>
    <input type="text" class="form-control" id="student_id">
  </div>
  <div class="mb-3">
    <label for="student_fullname" class="form-label">Name</label>
    <input type="text" class="form-control" id="student_fullname">
  </div>
  <div class="mb-3">
    <label for="payment_for" class="form-label">Payment For</label>
    <input type="text" class="form-control" id="payment_for">
  </div>
  <div class="mb-3">
    <label for="student_amount" class="form-label">Amount</label>
    <input type="text" class="form-control" id="student_amount">
  </div>
  <div class="mb-3">
    <label for="student_remarks" class="form-label">Remarks</label>
    <input type="text" class="form-control" id="student_remarks">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
  </div>
            </section>
</main>
  





  <!-- INSERT -->




<!-- EDIT -->



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




    $(document).ready(function() {
    // READs
    const token = localStorage.getItem('jwt');
    $.ajax({
        url: 'http://localhost/christian_joshua_backend/crud/student/read.php', // URL to your PHP script
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
                        <td>${item.student_misc}</td>
                        <td>${item.student_amount}</td>
                        <td>

                        <div class="btn-group">
                           <button class="btn btn-sm btn-danger" onClick="deleteItem('${item.student_id}')">Delete Item</button>
                          <button class="btn btn-sm btn-primary" data-student=${item} onClick="EditItem('${item.student_id}','${item.student_fullname}','${item.student_misc}'.'${item.student_amount}')" data-bs-toggle="modal" data-bs-target="#modalEdit">Edit Item</button></td>
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

   // INSERT
   $('#insertStudent').on('submit', function(event) {
        event.preventDefault();

        // Get form data
        const student_id = $('#student_id').val();
        const student_fullname = $('#student_fullname').val();
        const student_misc = $('#student_misc').val(); // Ensure this input exists in your form
        const student_amount = $('#student_amount').val();
        const payment_for = $('#payment_for').val();
        const student_remarks = $('#student_remarks').val();

        // Prepare the data to be sent as JSON
        const data = JSON.stringify({
            student_id: student_id,
            student_fullname: student_fullname,
            student_misc: student_misc,
            student_amount: student_amount,
            payment_for: payment_for,
            student_remarks: student_remarks
        });

        // Send AJAX request
        $.ajax({
            url: 'http://localhost/christian_joshua_backend/crud/student/create.php',
            type: 'POST',
            contentType: 'application/json',
            data: data,
            beforeSend: function(xhr) {
                const token = localStorage.getItem('jwt');
                if (token) {
                    xhr.setRequestHeader('Authorization', 'Bearer ' + token);
                }
            },
            success: function(response) {
                console.log(response);
                if (response.status === 1) {
                    $('#tbl_tbody').append(`
                        <tr id="row${response.id}">
                            <td>${student_id}</td>
                            <td>${student_fullname}</td>
                            <td>${student_amount}</td>
                            <td>
                                <button class="btn btn-sm btn-danger" onClick="deleteItem(${response.id})">Delete Item</button>
                                <button class="btn btn-sm btn-primary" onClick="EditItem('${response.id}')" data-bs-toggle="modal" data-bs-target="#modalEdit">Edit Item</button>
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
</script>
