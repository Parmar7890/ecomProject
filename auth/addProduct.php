
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <title>add product</title>
</head>
<body>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">add product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" id="addProductForm" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">name</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter product name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">brand</label>
                    <select type="text" class="form-control" id="brand" name="brand" placeholder="Enter email">
                    <option selected disabled value="">Choose...</option>
 
                        <option>d</option>
                        <option>d</option>
                        <option>d</option>
</select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">price</label>
                    <input type="password" class="form-control" id="price" name="price" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">tag</label>
                    <select type="text" id="tag" name="tag" class="form-control" id="" placeholder="Enter email">
                    <option selected disabled value="">Choose...</option>
                        <option>sale</option>
                        <option>new arrive</option>
                        <option>popluar</option>
</select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                      <input type="file" class="custom-file-input" id="image" name="file">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
    </section>


    <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>
  <script src="../plugins/toastr/toastr.min.js"></script>


  <script>
   $("#addProductForm").validate({
    rules:{
        product_name:{
        required: true,
        // pattern: /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/
      },
        brand:{
        required: true,
        // pattern: /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/
      },
      price:{
        required: true,
        // pattern: /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/
      },
      slug:{
        required: true,
        // pattern: /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/
      },
      tag:{
        required: true,
        // pattern: /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/
      },
      image:{
        required: true,
        // pattern: /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/
      },
      
    },
    messages:{
      product_name:{
        required: "product name is required",
        // pattern: "Please enter a valid email address"

        
      },
      brand:{
        required: "brand is required",
        // pattern: "Please enter a valid email address"

        
      },
      price:{
        required: "price is required",
        // pattern: "Please enter a valid email address"

        
      },
      slug:{
        required: "slug is required",
        // pattern: "Please enter a valid email address"

        
      },
      tag:{
        required: "tag is required",
        // pattern: "Please enter a valid email address"

        
      },
      image:{
        required: "image is required",
        // pattern: "Please enter a valid email address"

        
      },
    }
  });
  $(document).ready(function () {
    $("#submit").click(function (e) {
        e.preventDefault();

        var formData = new FormData();
        formData.append("product_name", $("#product_name").val());
        formData.append("brand", $("#brand").val());
        formData.append("price", $("#price").val());
        formData.append("slug", $("#slug").val());
        formData.append("tag", $("#tag").val());
        formData.append('action', 'insertData');
        var image = $("#image")[0].files[0];
        formData.append("image", image);
       
        for (var pair of formData.entries()) {
        console.log(pair[0] + ', ' + pair[1]);
    }

    $.ajax({
    url: "../backend/productController.php",
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
   
            // response = JSON.parse(response);
            // if (response.status == 200) {
            //     toastr.success(response.message);
            //     setTimeout(function () {
                    // window.location.href = '../productData.php';
            //     }, 2000);
            // } else {
            //     toastr.error(response.message);
            
        // } 
    }
});

    })
});


 
  </script>
</body>
</html>