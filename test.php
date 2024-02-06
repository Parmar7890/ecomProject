<?php 
// try{
//   $conn = new PDO("mysql:host=localhost;dbname=db_auth", 'root', '');
//   $sql = $conn->prepare("SELECT * FROM tbl_product");
//   $sql->execute();
//   $result = $sql->fetchAll(PDO::FETCH_ASSOC);
//   // echo "<pre>";
//   // print_r($result);

// }catch(PDOException $e) {
//   echo "error" . $e->getMessage();
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
  <title>test</title>
</head>
<style>
  .showHideColumn{
    cursor:pointer;
    color:blue;
  }
</style>
<body>
  <button type="submit" id="sortBtn">toggle</button>
<form id="form1">
   
        <table id="datatable">
          <thead>
             
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>BRAND</th>
                    <th>PRICE</th>
                    <th>SLUG</th>
                    <th>TAG</th>
                    <th>IMAGE</th>
                    <th>CREATE AT</th>
                  </tr>
                </thead>
    
            <tfoot>
                <tr>
                  <th>ID</th>
                  <th>NAME</th>
                  <th>BRAND</th>
                  <th>PRICE</th>
                  <th>SLUG</th>
                  <th>TAG</th>
                  <th>IMAGE</th> 
                  <th>CREATE AT</th>
                </tr>
            </tfoot>
        </table>
    <!-- </div> -->
</form>

<script src="./plugins/jquery/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<script>
 var dateDivs = [];




  $(document).ready(function(){
    
    $.ajax({
      type: "POST",
      url: "./testBackend.php",
      dataType:'json',
      success: function (data){

        var dataTableInstance = $("#datatable").dataTable({
          data:data,
          // 'paging':false,
          'sort':false,
          // 'searching':false,
          columns:[
            {'data':'id'},
            {'data':'name'},
            {'data':'brand'},
            {'data':'price',
              'render': function (salary) {
                return "$ " + salary
              }
            },
            {'data':'slug'},
            {'data':'tag'},
            {'data':'image',
            'searchable':false,
              'sortable':false,
              'render':function (website){
                if(!website){
                  return 'NA';
                }else{

                  return '<a href='+website+'>'+website+'</a>';
                }
              }
            },
             {'data':'date'},
          ],
      
        });

        $("#sortBtn").on('click',function() {
          // alert("hj");
          sorting();
        })

        function sorting(e){
          // alert("hello");
          // e.preventDefault();  
        
        dataTableInstance.api().rows().every(function (rowIdx, tableLoop, rowLoop) {
          var rowData = this.data();
          dateDivs.push(rowData.date);
          
        });
       
      
          // console.log(dateDivs);
    
    // Convert the div content to Date objects
    const dates = Array.from(dateDivs, div => {
        const parts = div.split(/[\/: ]/); 
        // console.log(parts);
        const formattedDate = `${parts[0]}/${parts[1]}/${parts[2]} ${parts[3]}:${parts[4]}:${parts[5]} ${parts[6]}`;
        // console.log(formattedDate);
        return new Date(formattedDate);
    });
  
    let ascendingOrder = true;

    // Function to update the divs with sorted dates
    function updateDivs(sortedDates) {
      sortedDates.forEach((date, index) => {
        const hours = date.getHours() % 12 || 12; // Get hours in 12-hour format
        const ampm = date.getHours() >= 12 ? 'PM' : 'AM'; // Determine AM or PM
        const formattedDate = `${(date.getMonth() + 1).toString().padStart(2, '0')}/${date.getDate().toString().padStart(2, '0')}/${date.getFullYear()} ${hours.toString().padStart(2, '0')}:${date.getMinutes().toString().padStart(2, '0')}:${date.getSeconds().toString().padStart(2, '0')} ${ampm}`;
        dateDivs[index].textContent = formattedDate;
        console.log(formattedDate);
      });
    }

    // Event listener for sorting button
    document.getElementById('sortBtn').addEventListener('click', function() {
      const sortedDates = dates.slice().sort((a, b) => {
        if (ascendingOrder) {
          return a - b;
        } else {
          return b - a;
        }
      });
      updateDivs(sortedDates);
      ascendingOrder = !ascendingOrder;
      // Change button text based on sorting order
      // this.textContent = ascendingOrder ? 'Sort Ascending' : 'Sort Descending';
    });
    document.getElementById('sortBtn').addEventListener('click', function() {
        dataTableInstance.api().order([7, 'asc']).draw(); // assuming 'date' is the 7th column
      });
  }


        $("#datatable thead th").each(function () {
          var title = $("#datatable tfoot th").eq($(this).index()).text();
          $(this).html('<input type="text" placeholder="search ' + title + '"/>');
        });
        dataTableInstance.api().columns().every(function () {
          var datatableColumn = this;
       
          var searchTextBoxes = $(this.header()).find('input');
          $(this.header()).find('input').on('keyup change',function () {
            datatableColumn.search(this.value).draw();
          });

          searchTextBoxes.on('click',function(e){
    e.stopPropagation();
});

        })
      }
    })
  });
</script>
</body>
</html>



