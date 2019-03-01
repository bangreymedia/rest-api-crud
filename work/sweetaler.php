<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <title>Bootstrap Sweet Alert Example</title>
</head>
<body>
  <h3>Bootstrap SweetAlert Example</h3>
  <a class="btn btn-success btn-lg btnSweetalert">Click Here</a>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  
  <script>
    "use strict"; /* Start of use strict */
    (function () {
      function14();
    })();
    
    function function14() {
      $('.btnSweetalert').on("click", function () {
        swal({
          title: "Are you sure you want to delete this record?",
          text: "After you delete this record you will not able to get this!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes",
          cancelButtonText: "No",
          closeOnConfirm: false,
          closeOnCancel: false},
          function (isConfirm) {
            if (isConfirm) {
              /* Do your Stuffs */
              swal("Success!", "Item has been deleted successfully", "success");
              
            } else {
              swal("Cancelled", "Something went wrong. Please try again.)", "error");
            }
          });
      });
    }
  </script>
</body>
</html>