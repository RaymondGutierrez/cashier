
<!DOCTYPE html>
<html lang="en">
  <?php include './layout/head.php' ?>
<body>
<?php include './layout/dashboard.php' ?>



<main class="col-md-10 ml-sm-auto pt-1 px-1 ">

            <!-- Summary Cards -->
    <div class="row">
        <div class="col-md-4 summary-card">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Total Sales</h5>
                    <p class="card-text" id="totalSales">$0.00</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 summary-card">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <h5 class="card-title">Total Transactions</h5>
                    <p class="card-text" id="totalTransactions">0</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 summary-card">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Pending Transactions</h5>
                    <p class="card-text" id="pendingTransactions">0</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Transaction Table -->
  

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // JavaScript code for dashboard functionality goes here
    </script>
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
      url: 'http://localhost/christian_joshua_backend/crud/student/delete.php',
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
                url: 'http://localhost/christian_joshua_backend/crud/student/update.php',
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
                                        <button class="btn btn-sm btn-danger" onClick="deleteItem('${student_id}')">Delete Item</button>
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
            const student_misc = $('#student_misc').val();
            const student_amount = $('#student_amount').val();

            // Prepare the data to be sent as JSON
            const data = JSON.stringify({
              student_id      : student_id,
              student_fullname: student_fullname,
              student_misc      : student_misc,
              student_amount: student_amount
            });

            // Send AJAX request
            $.ajax({
                url: 'http://localhost/christian_joshua_backend/crud/student/create.php',
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
                            $('#tbl_tbody').append(`
                                <tr id="row${response.id}">
                                    <td>${student_id}</td>
                                    <td>${student_fullname}</td>
                                    <td>${student_misc}</td>
                                    <td>${student_amount}</td>
                                    <td><button class="btn btn-sm btn-danger" onClick="deleteItem(${response.id})">Delete Item</button><button class="btn btn-sm btn-primary" onClick="EditItem('${response.id}')" data-bs-toggle="modal" data-bs-target="#modalEdit">Edit Item</button></td>

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
