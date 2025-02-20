<!DOCTYPE html>
<html lang="nl-NL">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta name="description" content="{{$description}}" />
		<title>{{$title}}</title>
		<link rel="stylesheet" href="/css/index.css">
		<link rel="icon" type="image/xml+svg" href="/images/favicon.svg">
		@if(isset($head)) {!! $head !!} @endif
	</head>
	<body>
		<nav>
			<div><a href="{{route("home")}}" @if( Route::currentRouteName() == "home") data-huidig @endif >Home</a></div>
			<div><a href="{{route("profile")}}" @if( Route::currentRouteName() == "profile") data-huidig @endif >Profiel</a></div>
			<div><a href="{{route("faq.index")}}" @if( Route::currentRouteName() == "faq" || Route::currentRouteName() == "faq.create" || Route::currentRouteName() == "faq.edit" ) data-huidig @endif >FAQ</a></div>
			<div><a href="{{route("dashboard")}}" @if( Route::currentRouteName() == "dashboard") data-huidig @endif >Dashboard</a></div>
			<div><a href="{{route("posts.index")}}" @if( Route::currentRouteName() == "posts.index" ||  Route::currentRouteName() == "post" || Route::currentRouteName() == "posts.create") data-huidig @endif >Blog</a></div>
		</nav>
		<main>
            {{ $slot }}
		</main>
	</body>
</html>
