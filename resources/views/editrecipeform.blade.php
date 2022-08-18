<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/css/addrecipe.css">

</head>
<body>

@foreach ( $recipes as $rec )
<form action="{{ url('editform', $rec['id']) }}" method="POST" enctype="multipart/form-data">
  {{ csrf_field() }}

  <div class="container">
    <h1 style="text-align:center">Edit Recipe</h1>
  </div>
  
  <div >
   <select class="form-select" id="category" name="category" value="{{ $rec['category'] }}" aria-label="Default select example" required>
    <!-- <label for="category">Choose a car:</label> -->
    <option value="0">Select Category:</option>
    <option value="1">Dessert</option>
    <option value="2">Breakfast</option>
    <option value="3">Lunch</option>
    <option value="4">Dinner</option>
    <option value="5">Appetizer</option>
    <option value="6">Salad</option>
    <option value="7">Main-Course</option>
    <option value="8">Snacks</option>
    <option value="9">Side-Dish</option>
    <option value="10">Beverages</option>
    <option value="11">Soup</option>
    <option value="12">Vegetable</option>
    <option value="13">Meat</option>
    <option value="14">Low Calorie</option>
    <option value="15">Hign Protein</option>
    <option value="16">Budget Friendly</option>
   </select>
  </div>

  <div class="container">

    <input type="text" placeholder="Title" name="title" id="title" value="{{ $rec['title'] }}">

    <input type="text" placeholder="Caption (Optional)" name="caption" id="caption" value="{{ $rec['caption'] }}">

    <input type="ingredients" placeholder="Ingredients" name="ingredients" id="ingredients" value="{{ $rec['ingredients'] }}">
    
    <input type="number" placeholder="Estimated time (in minutes)" id="quantity" name="time" min="1" value="{{ $rec['time'] }}">
    
    <input type="number" placeholder="Calories" id="quantity" name="calories" min="1" value="{{ $rec['calories'] }}">
    
    <textarea type="textarea" placeholder="Recipe Description" name="description" id="description">{{ $rec['description'] }}</textarea>

    <input type="file" name="image" id="image" value="{{ $rec['image'] }}"> 

    <br>
    <button type="submit" class="registerbtn">Post</button><br>
  </div>
  
 
</form>
@endforeach
  <div class="container signin">
    <a href="{{ url('foodblog.show') }}">Back to Blog</a><br><br>
    <a href="{{ url('dashboard') }}">Back to Home</a>
  </div>
</body>
</html>

