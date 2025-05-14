@extends('admin.layout.adminmaster')

@section('admincontent')
      <div class="main-content">
        <section class="section">
          <h1 class="section-header">
            <div>Tables</div>
          </h1>
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All Users Data <a href={{url('/adduser')}} class="btn btn-action btn-primary">Add New User</a></h4>
                    
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Created At</th>
                          <th>Email</th>
                          <th>Action</th>
                        </tr>
                         @foreach($users as $id => $user)
                        <tr>
                          <td>{{$user -> id}}</td>
                          <td>{{$user->name}}</td>
                          <td>{{$user->created_at}}</td>
                          <td>{{$user->email}}</td>
                          <td><a href={{route('view.user', $user -> id) }} class="btn btn-action btn-secondary">Detail</a></td>
                          <td><a href={{route('delete.user', $user -> id) }} class="btn btn-action btn-danger">Delete</a></td>
                        </tr>
                        @endforeach
                        
                      </table>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <nav class="d-inline-block">
                      <ul class="pagination mb-0">
                        <li class="page-item disabled">
                          <a class="page-link" href="#" tabindex="-1"><i class="ion ion-chevron-left"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                        <li class="page-item">
                          <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                          <a class="page-link" href="#"><i class="ion ion-chevron-right"></i></a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </section>
      </div>
     @endsection