<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/css/addrecipe.css">


<style>{font-family: "Karma", sans-serif}</style>
</head>
<body>


<form action="recipeinsert" method="POST" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="container">
    <h1 style="text-align:center">Add a Recipe</h1>
  </div>
  <div >
   
   <select class="form-select" id="category" name="category" aria-label="Default select example" required>
    <option value="0">Select Category:</option>
    <option value="Dessert">Dessert</option>
    <option value="Breakfast">Breakfast</option>
    <option value="Lunch">Lunch</option>
    <option value="Dinner">Dinner</option>
    <option value="Appetizer">Appetizer</option>
    <option value="Salad">Salad</option>
    <option value="Main-Course">Main-Course</option>
    <option value="Snacks">Snacks</option>
    <option value="Side-Dish">Side-Dish</option>
    <option value="Beverages">Beverages</option>
    <option value="Soup">Soup</option>
    <option value="Vegetable">Vegetable</option>
    <option value="Meat">Meat</option>
    <option value="Low-Calorie">Low Calorie</option>
    <option value="Hign-Protein">Hign Protein</option>
    <option value="Budget-Friendly">Budget Friendly</option>
   </select>
  </div>

  <div class="container">

    <input type="text" placeholder="Title" name="title" id="title" value="{{ old('title') }}" required>

    <input type="text" placeholder="Caption (Optional)" name="caption" id="caption" value="{{ old('caption') }}">

    <input type="ingredients" placeholder="Ingredients" name="ingredients" id="ingredients" value="{{ old('ingredients') }}" required>
    
    <input type="number" placeholder="Estimated time (in minutes)" id="quantity" name="time" min="1" value="{{ old('time') }}" required>
    
    <input type="number" placeholder="Calories" id="quantity" name="calories" min="1" value="{{ old('cal') }}" required>
    
    <textarea type="textarea" placeholder="Recipe Description" name="description" id="description" required></textarea>

    <!-- <input type="text" class="form-control" placeholder="Titel" name="levels[level][]"> -->

    <input type="file" name="image" id="image" value="{{ old('image') }}"> 
    <!-- <input type="text" placeholder="Rename file" name="renamefile" id="renamefile" value="{{ old('renamefile') }}"> -->
    <br>
    <button type="submit" class="registerbtn">Post</button><br>
  </div>
  
  
</form>

  <div class="container signin">
    <a href="{{ url('foodblog.show') }}">Back to Blog</a><br><br>
    <a href="{{ url('dashboard') }}">Back to Home</a>
  </div>
</body>
</html>

