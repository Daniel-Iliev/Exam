<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="PHP Exam Project">
  <meta name="author" content="Daniel Iliev">

  <title>Games - PHP Exam Project</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/the-big-picture.css" rel="stylesheet">

</head>

<body style="color:white">
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
        <p> The Search results for<b> {{ $query }} </b> are :</p>
    <h2>Games</h2>
    <table class="table table-striped" style="color:white">
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
                <td>@foreach(json_decode($game->genres, true) as $key => $value)
                    {{ $value['name'] }}
                    @endforeach</td>
                <td><a href="{{$game->image}}" target=_blank><image src="{{$game->image}}" width=100px  height=100px></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @elseif(isset($games))
    <div class="container">
    <h2>Games</h2>
    <table class="table table-striped" style="color:white">
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
                <td>@foreach(json_decode($game->genres, true) as $key => $value)
                    {{ $value['name'] }}
                    @endforeach</td>
                <td><a href="{{$game->image}}" target=_blank><image src="{{$game->image}}" width=100px  height=100px></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>{{$message}}</p>
    @endif
</div>
</body>
</html>



@if(isset($details))
    @foreach($details as $game)
							<div class="box">
								<image src="{{$game->image}}" width=100px  height=100px>
								<div class="inner">
									<h3>{{$game->name}}</h3>
									<p>{{$game->manufacturer}}</p>
									<p>{{$game->year_released}}</p>
                                    @foreach(json_decode($game->genres, true) as $key => $value)
                                    <p>{{ $value['name'] }}</p> 
                                     @endforeach
								</div>
							</div>
                        @endforeach
@endif





                        <div class="container">
    @if(isset($details))
        <p> The Search results for<b> {{ $query }} </b> are :</p>
    <h2>Games</h2>
    <table class="table table-striped" style="color:white">
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
                <td>@foreach(json_decode($game->genres, true) as $key => $value)
                    {{ $value['name'] }}
                    @endforeach</td>
                <td><a href="{{$game->image}}" target=_blank><image src="{{$game->image}}" width=100px  height=100px></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @elseif(isset($games))
    <div class="container">
    <h2>Games</h2>
    <table class="table table-striped" style="color:white">
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
                <td>@foreach(json_decode($game->genres, true) as $key => $value)
                    {{ $value['name'] }}
                    @endforeach</td>
                <td><a href="{{$game->image}}" target=_blank><image src="{{$game->image}}" width=100px  height=100px></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>{{$message}}</p>
    @endif
</div>
        </div>
    </div>