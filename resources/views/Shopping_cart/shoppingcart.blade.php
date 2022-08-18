<link rel="stylesheet" href="/css/shoppingcart.css">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">


<section class="h-100" style="background-color: #eee;">
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-10">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
        </div>
        <a href="{{ url('shopping_cart/addintocart') }}" class="btn btn-primary">Add into Cart</a>
        @foreach($cart as $c)
        <div class="card rounded-3 mb-4">
          <div class="card-body p-4">
            <div class="row d-flex justify-content-between align-items-center">           
              <div class="col-md-3 col-lg-3 col-xl-3">
                <p class="lead fw-normal mb-2">{{ $c['shopping_item'] }}</p>
              </div>
              <div class="col-md-3 col-lg-3 col-xl-3">
                <p class="lead fw-normal mb-2">Quanity: {{ $c['quantity'] }}</p>
              </div>
              <div class="col-md-3 col-lg-3 col-xl-3">
                <p class="lead fw-normal mb-2">Price: {{ $c['price'] }} Tk</p>
              </div>
              <a href="{{ url('/shopping_cart/delete', $c['id']) }}" class="btn btn-danger">Delete</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    <a href="{{ url('/dashboard') }}" class="btn btn-primary">Back to Home</a>
  </div>
</section>


