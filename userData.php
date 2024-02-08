<?php  
session_start();

// if(!isset($_SESSION["id"])){
// echo "not now";
// header("Location:./auth/login1.php");
// // exit();
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="./plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
 
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

 
  <?php
   include_once('navbar.php');
   include_once('sidebar.php');
  
  ?>
<div class="container">
<form method="post">
        <table id="myTable">
            <!-- <div><buttton class="btn btn-primary" id="deleteBtn">delete</buttton></div> -->
            
        </table>
</form>
</div>

  <?php 
include_once('footer.php');
  ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<div><button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteBtn">delete Modal</button></div>
 <!--------------------------- /.modal start------------------>
<div class="modal fade" id="deleteBtn">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Default Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Are you sure you want to delete&hellip;</p>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="confirmDelete" class="btn btn-primary">Delete</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      <!--------------------------- /.modal end------------------>


<script src="plugins/jquery/jquery.min.js"></script>
<script src="dist/js/adminlte.js"></script>
<script src="./plugins/toastr/toastr.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="./plugins/CellEdit/js/dataTables.cellEdit.js"></script>
<script>
//  toastr.success("HI");
$(document).ready(function (){
    // var selectedIds = [];
var table = $("#myTable").DataTable({
// alert();
        ajax:{
            type:"POST",
            url: "./backend/authController.php",
            contentType:'application/json',
            dataSrc: '',
            dataType: 'json',
            // data:JSON.stringify({action:"select",'data':'hello'}),
            data: function () {
            return JSON.stringify({action:"select"});
},
        },
        order:[],
        columns:[
            {
                title: "<input type='checkbox' id='main-check'>",
                data: "null",
                defaultContent: "<input type='checkbox' class='boxCheck'>",
                orderable:false,
                
                          
        },
        
                {
                    title: "ID",
                    data: "id"            
            }, 
                {
                    title: "NAME",
                    data: "full_name"            
            }, 
                {
                    title: "EMAIL",
                    data: "email"            
            }, 
                {
                    title: "PHONE",
                    data: "phone"            
            },  
                {
                    title: "STATUS",
                    data: "status"            
            }, 
        ],
        order: [[1,'asc']]

    });
    function myCallbackFunction(updatedCell, updatedRow, oldValue) {
    $.ajax({
        type: "POST",
        url: "./backend/authcontroller.php",
        data: JSON.stringify({
            action: "updateRow",
            data: updatedRow.data()
        }),
        success: function(response) {
            response = JSON.parse(response);
            console.log(response);

            if(response["status"] == 200){
                toastr.success(response.message);
            }
        },
       
    });
}


    table.MakeCellsEditable({
        "onUpdate": myCallbackFunction,
        "columns": [2,3,4,5],
    
    });
    selectedIds = [];
    $('#myTable thead').on('click', '#main-check', function () {
        var isChecked = $(this).prop('checked');
        $('.boxCheck').prop('checked', isChecked);
        selectedIds = []; // Clear the array before selecting new IDs
        if (isChecked) {
            $('.boxCheck').each(function () {
                selectedIds.push($(this).closest('tr').find('td:eq(1)').text());
            });
        }
        console.log(selectedIds);
    });

    $('#myTable tbody').on('click', '.boxCheck', function () {
        var isChecked = $(this).prop('checked');
        var rowId = $(this).closest('tr').find('td:eq(1)').text();
        if (isChecked) {
            selectedIds.push(rowId);
        } else {
            var index = selectedIds.indexOf(rowId);
            if (index !== -1) {
                selectedIds.splice(index, 1);
            }
        }
        console.log(selectedIds);
    });

    $("#deleteBtn").click(function () {
    $.ajax({
        type: "POST",
        url: "./backend/authcontroller.php",
        data: JSON.stringify({ action: "deleteRow", data: selectedIds }),
        contentType: 'application/json', // Specify the content type
        success: function (response) {
            // console.log(response);            // if (response.status == 200) {
                response = JSON.parse(response);
                if(response["status"] == 200){

                 toastr.success(response.message);
                 table.ajax.reload();
                }else {
                   toastr.error(response.message);
               }
                
        },
        error: function (error) {
            // Handle error response
            console.error(error);
            // You might want to show an error message to the user here
        }
    });
});



});   



</script>
</body>
</html>
