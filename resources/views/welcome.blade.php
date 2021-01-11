<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Games - PHP Exam Project</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/the-big-picture.css" rel="stylesheet">
  
	<link rel="stylesheet" type="text/css" href="css/app.css">

</head>

<body>
<form action="/search" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="q"
            placeholder="Search games"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
</form>

<div class="container">
    @if(isset($details))
        <p> The Search results for your query <b> {{ $query }} </b> are :</p>
    <h2>Sample User details</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Manufacturer</th>
                <th>Year Released</th>
                <th>Genres</th>
                <th>Logo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $game)
            <tr>
                <td>{{$game->name}}</td>
                <td>{{$game->manufacturer}}</td>
                <td>{{$game->year_released}}</td>
                <td>{{$game->genres}}</td>
                <td><a href="{{$game->image}}" target=_blank><image src="{{$game->image}}" width=100px  height=100px></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="container">
    <h2>Sample User details</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Manufacturer</th>
                <th>Year Released</th>
                <th>Genres</th>
                <th>Logo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($games as $game)
            <tr>
                <td>{{$game->name}}</td>
                <td>{{$game->manufacturer}}</td>
                <td>{{$game->year_released}}</td>
                <td>{{$game->genres}}</td>
                <td><a href="{{$game->image}}" target=_blank><image src="{{$game->image}}" width=100px  height=100px></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @endif
</div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>