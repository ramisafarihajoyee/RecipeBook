<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

<br>
<h2 style="text-align:center">Product Add in Cart</h2><br><br>

<form action="{{ url('shopping_cart/addintocart.add') }}" method="POST">
    {{ csrf_field() }}

    <div class="mb-3">
    <label for="name" class="form-label">Product Name</label>
    <input type="text" class="form-control" name="name" id="name" required>
    </div>
    <div class="mb-3">
    <label for="quantity" class="form-label">Quantity</label>
    <input type="number" class="form-control" name="quantity" id="quantity">
    </div>
    <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="text" class="form-control" name="price" id="price">
    </div>
    <br>
    
    <button type="submit" class="btn btn-primary" name="submit">Add in Cart</button>
    
</form>

<a href="{{ url('shopping_cart/shoppingcart') }}">Back to Shopping Cart</a>