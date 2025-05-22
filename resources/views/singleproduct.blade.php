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

      
      


              <form action={{route('esewa2')}} method="POST">
                @csrf
                <input type="hidden" value={{$products->id}} name="product_id">
                <input type="hidden" name="user_id" value='1'>
                <input type="hidden" value={{$products->product_price}} name="product_amount">
                
                {{-- <input type="hidden" id="amount" name="amount" value={{$products->product_price}} required>
                <input type="hidden" id="tax_amount" name="tax_amount" value ="0" required>
                <input type="hidden" id="total_amount" name="total_amount" value=110 required>
                <input type="hidden" id="transaction_uuid" name="transaction_uuid" value="12-df"required>
                <input type="hidden" id="product_code" name="product_code" value ="EPAYTEST" required>
                <input type="hidden" id="product_service_charge" name="product_service_charge" value="0" required>
                <input type="hidden" id="product_delivery_charge" name="product_delivery_charge" value="0" required>
                <input type="hidden" id="success_url" name="success_url" value="https://developer.esewa.com.np/success" required>
                <input type="hidden" id="failure_url" name="failure_url" value="https://developer.esewa.com.np/failure" required>
                <input type="hidden" id="signed_field_names" name="signed_field_names" value="total_amount,transaction_uuid,product_code" required>
                <input type="text" id="signature" name="signature" value={{$signature}} required> --}}
                <input type="submit" value="Pay with Esewa">
              
              </form>
             
              {{-- <form method="POST" action="https://rc-epay.esewa.com.np/api/epay/main/v2/form">
                 @foreach($form_data as $key => $value)
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                 @endforeach
                <button type="submit">Pay with eSewa</button>
                </form> --}}

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