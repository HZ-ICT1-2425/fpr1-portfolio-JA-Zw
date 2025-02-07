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
	</head>
	<body>
		<nav>
			<div><a href="/" @if( Route::currentRouteName() == "home") data-huidig @endif >Home</a></div>
			<div><a href="/profile" @if( Route::currentRouteName() == "profile") data-huidig @endif >Profiel</a></div>
			<div><a href="/faq" @if( Route::currentRouteName() == "faq") data-huidig @endif >FAQ</a></div>
			<div><a href="/dashboard" @if( Route::currentRouteName() == "dashboard") data-huidig @endif >Dashboard</a></div>
			<div><a href="/posts" @if( Route::currentRouteName() == "posts" ||  Route::currentRouteName() == "post") data-huidig @endif >Blog</a></div>
		</nav>
		<main>
            {{ $slot }}
		</main>
	</body>
</html>
