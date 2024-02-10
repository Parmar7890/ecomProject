<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="./plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

 
  <?php
   include_once('navbar.php');
  //  include_once('sidebar.php');
  
  ?>
<form method="post">
  <table id="productTable">
    <div class="d-flex justify-content-end">
  <a href="./auth/addColleaction.php" id="addProductBtn" class="btn btn-info btn-sm">Add collection</a>
</div>
<div class="d-flex justify-content-end mr-2">
<a href="./userData.php"><i class="fa-solid fa-xmark" style="font-size: 24px;"></i></a>
</div>
</table>
<!-- <button type="submit" id="modal-default" onclick="confrimChange()" class="btn btn-info btn-sm">change</button> -->
<!-- <button type="submit" id="cnfBtn" class="btn btn-info btn-sm">delete</button> -->
</form>

<?php 
include_once('footer.php');
  ?>

  <aside class="control-sidebar control-sidebar-dark">

  </aside>

</div>
<button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteBtn">delete Modal</button>
<!-- <button type="submit" id="cnfBtn">deletePro</button> -->
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
<script src="./plugins/jquery/jquery.min.js"></script>

<script src="dist/js/adminlte.js"></script>

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="./plugins/CellEdit/js/dataTables.cellEdit.js"></script>
<script src="./plugins/toastr/toastr.min.js"></script>
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function(){

  var table = $("#productTable").DataTable({
      
      ajax:{
            type:"POST",
            url: "./backend/collectionController.php",
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
                
         
                                        
        } ,
        
                {
                    title: "ID",
                    data: "id",
                  
                                
            }, 
                {
                    title: "NAME",
                    data: "name",
                    orderable:false,
                                
            }, 
                
            
         
        ],
        order: [[1,'asc']]
        
    });
    selectedIds = []; 
    $("#confirmDelete").click(function(){
  $("#productTable tfoot th").each(function () {
    var title = $("#productTable thead th").eq($(this).index()).text();
    $(this).html('<input type="text" placeholder="search '+title+' ">');
  })
 


    $('#productTable thead').on('click', '#main-check', function () {
        var isChecked = $(this).prop('checked');
        $('.boxCheck').prop('checked', isChecked);
        if (isChecked) {
            $('.boxCheck').each(function () {
                selectedIds.push($(this).closest('tr').find('td:eq(1)').text());
            });
        }
        console.log(selectedIds);
    });
   
   

//  function cnfDel(){
//   $("#deleteBtn").modal("show");

//  }


   

  $.ajax({
    type:"POST",
    url:"./backend/collectionController.php",
    data: JSON.stringify({action:"deleteProduct", data:selectedIds}),
    contentType:'application/json',
      success:function(response) {
        console.log(response);
        response = JSON.parse(response); 

        console.log(response);
        if(response.status == 200){
          toastr.success(response.message);
          table.ajax.reload();
          $("#deleteBtn").modal("hide");
        }else{
          // toastr.error(response.message);
        }
      
    }

  })
})

    $('#productTable tbody').on('click', '.boxCheck', function () {
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

    function myCallbackFunction (updatedCell, updatedRow, oldValue) {
       
        console.log(updatedCell.data());
        $.ajax({
          type:"POST",
          url:"./backend/collectionController.php",
          data:JSON.stringify({
               action:"updateRow",
               data:updatedRow.data(),
          }),
          success:function(response){
            response = JSON.parse(response);
            console.log(response);
            if (oldValue != updatedCell.data()) { 
    toastr.success(response.message); 
    // $("#editChange").modal("show");
    // toastr.error(response["message"]);

}

          }
        })
    }
    table.MakeCellsEditable({
        "onUpdate": myCallbackFunction,
        "columns": [2],
    
    });

    
})


</script>
</body>
</html>
