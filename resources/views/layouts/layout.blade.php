<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TaskManager Web App')</title>
    <link rel="stylesheet" href= "{{ asset('css/styles.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
	<header class="rajdhani-regular">
	<section class="header-container">

		<section class="rajdhani-light">
			<nav class="views-menu">
				<a href="{{ route('dataview.allgrid') }}" class="menu-option" style="background-color: aliceblue;">GRID ALL VIEW</a> {{-- ELIMINATE STYLE WHEN ALL OPTIONS ARE ACTIVE --}}
				<a href="{{ route('dataview.byproject') }}" class="menu-option" style="background-color: aliceblue;">BY PROJECT VIEW</a> {{-- ELIMINATE STYLE WHEN ALL OPTIONS ARE ACTIVE --}}
				<a href="{{ route('dataview.bykind') }}" class="menu-option" style="background-color: aliceblue;">BY TASK KIND VIEW</a> {{-- ELIMINATE STYLE WHEN ALL OPTIONS ARE ACTIVE --}}
				<a href="{{ route('dataview.byprogress') }}" class="menu-option" style="background-color: aliceblue;">BY TASK PROGRESS VIEW</a> {{-- ELIMINATE STYLE WHEN ALL OPTIONS ARE ACTIVE --}}
			</nav>
		</section>

		<section class="rajdhani-light">
			<nav class="menu">
				<a href="#" class="menu-option">[ NEW PROJECT ]</a>
				<a href="{{ route('task.create') }}" class="menu-option" style="background-color: aliceblue;">[ NEW TASK ]</a> {{-- ELIMINATE STYLE WHEN ALL OPTIONS ARE ACTIVE --}}
				<a href="#" class="menu-option">[ NEW PROGRAMMER ]</a>
			</nav>
			<nav class="menu">
				<a href="#" class="menu-option">[ SEARCH->UPDATE/DELETE PROJECT ]</a>
				<a href="{{ route('task.show') }}" class="menu-option" style="background-color: aliceblue;">[ SEARCH->UPDATE/DELETE TASK ]</a> {{-- ELIMINATE STYLE WHEN ALL OPTIONS ARE ACTIVE --}}
				<a href="#" class="menu-option">[ SEARCH->UPDATE/DELETE PROGRAMMER ]</a>
			</nav>
			<nav class="menu">
				<a href="#" class="menu-option">[ FILTER BY PROJECT STATUS ]</a>
				<a href="#" class="menu-option">[ FILTER BY PROJECT MANAGER ]</a>
				<a href="#" class="menu-option">[ FILTER BY DEVELOPER ]</a>
			</nav>
		</section>

        <section style="float: right; text-align: right">
            <a href="https://github.com/frankpulido/TaskManager-Laravel.git" target="_blank" rel="noopener noreferrer" style="display: inline-block; vertical-align: middle; margin-right: 10px;">
                <img src="{{ asset('images/github.png') }}" alt="GitHub" style="width: 40px; height: 40px;">
            </a>
            <a href="https://www.linkedin.com/in/frankpulidoalvarez/" target="_blank" rel="noopener noreferrer" style="display: inline-block; vertical-align: middle; margin-right: 10px;">
                <img src="{{ asset('images/linkedin.png') }}" alt="LinkedIn" style="width: 45px; height: 45px;">
            </a>
            <a href="https://www.discord.com/users/frankpulidoalvarez" target="_blank" rel="noopener noreferrer" style="display: inline-block; vertical-align: middle; margin-right: 10px;">
                <img src="{{ asset('images/discord.png') }}" alt="Discord" style="width: 45px; height: 45px;">
            </a>
        </section>

	</section>
	</header>
	<main>
    @yield('content')
	</main>
	
</body>
</html>
