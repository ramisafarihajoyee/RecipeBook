<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/css/dashboard.css">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

<br><br>
@foreach ( $note as $n )
<form action="{{ url('notebook/note.edit', $n['id']) }}" method="POST">
{{ csrf_field() }}

    <div class="row mb-3">
        <label for="title" class="col-sm-2 col-form-label" style="text-align:center">Title:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="title" name="title" value="{{ $n['title'] }}">
        </div>
    </div>
    <div class="row mb-3">
        <label for="description" class="col-sm-2 col-form-label" style="text-align:center">Description:</label>
        <div class="col-sm-8">
            <textarea class="form-control" rows="20" id="description" name="description">{{ $n['description'] }}</textarea>
        </div>
    </div>
    <div class="col-md-12 text-center">
        <button type="submit" name="submit" class="btn btn-success">Save</button>
        <a href="{{ url('/dashboard') }}" class="btn btn-primary">Back to Home</a>
    </div>

</form>
@endforeach

</body>
</html>