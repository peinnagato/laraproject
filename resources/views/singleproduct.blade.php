@extends('layout.master')

@section('content')
    <!-- Page Content -->
    {{-- {{$id}} --}}
    <div class="page-heading products-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>new arrivals</h4>
              <h2>sixteen products</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <div class="best-features about-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Products</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="assets/images/feature-image.jpg" alt="">
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <h4>{{$products->product_name}}</h4>
              <p>{{$products->product_description}}</p>
              <p>{{$products->product_price}}</p>
              <form method="POST" action={{route('esewa')}}>
                @csrf
                <input type="hidden" value={{$products->id}} name="product_id">
                <input type="hidden" value=1 name="user_id">
                <input type="hidden" value={{$products->product_price}} name="product_amount">
                

                <input type="submit" value="Pay with Esewa" class="btn btn-primary">
              </form>
              <ul class="social-icons">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-behance"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection