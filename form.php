<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
<div id="message"></div>
  <h2>Stacked form</h2>
  <form id="userForm">
  <div class="mb-3 mt-3">
      <label for="email">Name:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="name" required>
    </div>
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
    </div>
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" required>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  <button type="submit" id="load_data" class="btn btn-success">Load Data</button>

  <div id="userList"></div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
      // ---------------------------------data insert query---------------------//
        $('#userForm').submit(function(event) {
            event.preventDefault();
            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: 'insert.php', // The PHP script to handle data insertion
                data: formData,
                success: function(response) {
                $('#message').html(response);
                $('#userForm').trigger('reset');
                }
            });
        });

        // -------------------------data fetch query------------------------------------//
        function fetchUsers() {
            $.ajax({
                type: 'POST',
                url: 'fetch.php', // The PHP script to fetch data
                success: function(response) {
                    $('#userList').html(response);
                }
            });
        }
        // fetchUsers(); // Call the function when the page loads

           $("#load_data").on("click",function(){
            fetchUsers(); // Call the function when the page loads
           });
    });
</script>


</body>
</html>
