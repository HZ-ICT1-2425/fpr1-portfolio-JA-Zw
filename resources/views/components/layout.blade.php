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
			<div><a href="/" @if($current == "home") data-huidig @endif >Home</a></div>
			<div><a href="/profile" @if($current == "profile") data-huidig @endif >Profiel</a></div>
			<div><a href="/faq" @if($current == "faq") data-huidig @endif >FAQ</a></div>
			<div><a href="/dashboard" @if($current == "dashboard") data-huidig @endif >Dashboard</a></div>
			<div><a href="/posts" @if($current == "posts") data-huidig @endif >Blog</a></div>
		</nav>
		<main>
            {{ $slot }}
		</main>
	</body>
</html>
