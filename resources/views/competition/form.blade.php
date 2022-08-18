<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

<br>
<h2 style="text-align:center">Competition Registration Form</h2><br><br>

<form action="{{ url('competition/competition.register') }}" method="POST">
    {{ csrf_field() }}

    <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Full Name" required>
    </div>
    <div class="mb-3">
    <label for="email" class="form-label">Email Address</label>
    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Mail" required>
    </div>
    <div class="mb-3">
    <label for="address" class="form-label">Full Address</label>
    <input type="text" class="form-control" name="address" id="address" placeholder="Enter Your Full Address" required>
    </div>
    <div class="mb-3">
    <label for="number" class="form-label">Phone Number</label>
    <input type="tel" class="form-control" name="phone" id="phone" placeholder="Enter Your Phone Number" required>
    </div>
    <div class="mb-3">
    <label for="season" class="form-label">Competition Season</label>
    <select class="form-select" id="season" name="season" aria-label="Default select example" required>
        <option value="0">Competition Season:</option>
        <option value="Summer">Summer</option>
        <option value="Spring">Spring</option>
        <option value="Fall">Fall</option>
    </select>
    </div>
    <div class="mb-3">
        <label for="year" class="form-label">Competition Year</label>
        <select class="form-select" id="year" name="year" aria-label="Default select example" required>
            <option value="0">Competition Year:</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
        </select>
    </div>

    <label for="place" class="form-label">Competition Place</label>
    <select class="form-select" id="place" name="place" aria-label="Default select example" required>
        <option value="0">Competition Place:</option>
        <option value="Dhaka">Dhaka</option>
        <option value="Khulna">Khulna</option>
        <option value="Rajshahi">Rajshahi</option>
        <option value="Rangamati">Rangamati</option>
    </select>
  </div>

    <br>
    <button type="submit" class="btn btn-primary" name="submit">Register in Competition</button>
    
</form>

<a href="{{ url('/dashboard') }}">Back to Home</a>