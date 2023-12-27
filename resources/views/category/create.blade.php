<!DOCTYPE html>
<html>
<head>
    <title>Create Category</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
            <form action="{{ URL ('category') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" class="form-control" placeholder="Name" name="name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">category_id</label>
                      <input type="text" class="form-control" placeholder="category_id" name="category_id">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Price</label>
                      <input type="text" class="form-control" placeholder=" Price" name="price">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">desc</label>
                      <input type="text" class="form-control" placeholder="desc" name="desc">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">image</label>
                      <input type="images" class="form-control" placeholder="image" name="image">
                    </div>
                  </div>
                  <!-- /.box-body -->
     
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>
</body>
</html>