<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
tr:nth-child(even) {
  background-color: #dddddd;
}
    body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif}
    .w3-bar-block .w3-bar-item {padding:20px}
    .bottomright {
        position: absolute;
        bottom: 8px;
        right: 16px;
        font-size: 18px;
    }

</style>
</style>
</head>
<body>

<h2 style="text-align:center">Competition Result</h2>

<!-- @foreach($result_list as $r)
    <h>{{ $r['name'] }}</h>
    <h>{{ $r['position'] }}</h>
@endforeach -->

<table>
<tr>
    <th>Name</th>
    <th>Season</th>
    <th>Year</th>
    <th>Place</th>
    <th>Position</th>
  </tr>
@foreach($result_list as $r)
  <tr>
    <td>{{ $r['name'] }}</td>
    <td>{{ $r['competition_season'] }}</td>
    <td>{{ $r['competition_year'] }}</td>
    <td>{{ $r['competition_place'] }}</td>
    <td>{{ $r['position'] }}</td>
  </tr>
@endforeach
</table>
<div class="bottomright"><a href="{{ url('/dashboard') }}">Back to Home</a></div>
</body>
</html>

