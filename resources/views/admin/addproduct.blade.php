@extends('admin.layout.adminmaster')

@section('admincontent')
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              Admin Panel
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Add product</h4></div>

              <div class="card-body">
                <form method="POST" action="/admin/addproduct">
                  {{ csrf_field() }}
                
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="frist_name">Product Name</label>
                      <input id="frist_name" type="text" class="form-control" name="frist_name" autofocus>
                    </div>
                    <div class="form-group col-6">
                      <label for="last_name">Price</label>
                      <input id="last_name" type="number" class="form-control" name="last_name">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <textarea id="email"  class="form-control" name="email"> </textarea>
                    <div class="invalid-feedback">
                    </div>
                  </div>

                  

                  
                  <div class="row">
                    <div class="form-group col-6">
                      <label>Category</label>
                      <select class="form-control">
                        <option>Shoes</option>
                        <option>Tops</option>
                        <option>Bottoms</option>
                        
                      </select>
                    </div>
                    
                  </div>
                  

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">
                      Add Product
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; Stisla 2018
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script src="../dist/modules/jquery.min.js"></script>
  <script src="../dist/modules/popper.js"></script>
  <script src="../dist/modules/tooltip.js"></script>
  <script src="../dist/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="../dist/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="../dist/modules/moment.min.js"></script>
  <script src="../dist/modules/scroll-up-bar/dist/scroll-up-bar.min.js"></script>
  <script src="../dist/js/sa-functions.js"></script>
  
  <script src="../dist/js/scripts.js"></script>
  <script src="../dist/js/custom.js"></script>
  <script src="../dist/js/demo.js"></script>
</body>
</html>
@endsection