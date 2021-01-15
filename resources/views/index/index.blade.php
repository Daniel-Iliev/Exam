@extends('layouts.app')

@section('content')

<form  method="GET" role="search">
    {{ csrf_field() }}
        <input type="text" name="q"
            placeholder="Search games">
            <button type="submit">Search</button>
</form>
<div class="thumbnails">
@if(isset($details))
    @foreach($details as $game)
	<div class="box">
							<a href="{{$game->image}}" class="image fit"><image onerror="this.src='../../images/err.png' "src="{{$game->image}}" width=200px  height=200px></a>
								<div class="inner">
									<h3>{{$game->name}}</h3>
									<p><b>Developer</b> : {{$game->manufacturer}}<br>
									<b>Release Date</b> : {{$game->year_released}}<br>
									@if(json_decode($game->genres))
									<b>Genres</b> : 
                                    @foreach(json_decode($game->genres, true) as $key => $value)
                                    {{ $value['name'] }} 
									 @endforeach</p>
									 @endif
								</div>
							</div>
                        @endforeach
                        @elseif(isset($games))
    @foreach($games as $game)
							<div class="box">
							<a href="{{$game->image}}" class="image fit"><image onerror="this.src='../../images/err.png' "src="{{$game->image}}" width=200px  height=200px></a>
								<div class="inner">
									<h3>{{$game->name}}</h3>
									<p><b>Developer</b> : {{$game->manufacturer}}<br>
									<b>Release Date</b> : {{$game->year_released}}<br>
									@if(json_decode($game->genres))
									<b>Genres</b> : 
                                    @foreach(json_decode($game->genres, true) as $key => $value)
                                    {{ $value['name'] }} 
									 @endforeach</p>
									 @endif
								</div>
							</div>
                        @endforeach

@else
<div class="box" >
<image src="../../images/sad.png" width=200px  height=200px><br>
							There are no results!
</div>
@endif
@endsection