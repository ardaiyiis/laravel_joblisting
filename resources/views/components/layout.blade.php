<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel-JobListing</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css','resources/js/app/js'])
</head>
<body class="bg-black text-white font-hanken-grotesk pb-10">
    <div class="px-10">
        <nav class="flex justify-between items-center py-4 border-b border-white/10">
            <div>
                <a href="/">
                    <img width="92" height="29" viewBox="0 0 92 29" src="{{ Vite::asset('resources/images/balbo.png') }}" alt="">
                </a>
            </div>
            <div class="space-x-6 font-bold">
                <a href="/jobs">Jobs</a>
                <a href="/careers">Careers</a>
                <a href="/salaries">Salaries</a>
                <a href="companies">Companies</a>
            </div>
            @auth    
                <div class="space-x-6 font-bold flex">
                    <a href="/jobs/create">Post a job </a>
                    <form method="POST" action="/logout">
                        @csrf
                        @method('DELETE')
                        <a href="/logout" method="POST">Log Out</a>
                    </form>
                </div>
                
            @endauth

            @guest
                <div class="space-x-6 font-bold">
                    <a href="/register">Sign Up</a>
                    <a href="/login">Log In</a>
                </div>            
            @endguest
        </nav>
        <main class="mt-10 max-w-[986px] mx-auto">
            {{$slot}}
        </main>

    </div>
</body>
</html>