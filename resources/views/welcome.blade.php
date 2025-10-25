<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        @vite('resources/css/app.css')


    </head>
    <body class="container mx-auto min-h-screen bg-slate-950 relative">
        {{-- <div class="relative h-screen "> --}}
            <!-- Background Pattern -->
            <div class="absolute inset-0 ">
                <div class="relative h-full w-full bg-slate-950 [&>div]:absolute [&>div]:bottom-0 [&>div]:left-[-20%] [&>div]:right-0 [&>div]:top-[-10%] [&>div]:h-[500px] [&>div]:w-[500px] [&>div]:rounded-full [&>div]:bg-[radial-gradient(circle_farthest-side,rgba(255,0,182,.15),rgba(255,255,255,0))]">
            </div>
            </div>

            {{-- <div class="bg-red-400 text-white ">
                <h1>Esto es una prueba</h1>
            </div> --}}

            <!-- Hero Content -->
            {{-- <div class="relative z-10 flex h-full flex-col items-center justify-center px-4">
                <div class="max-w-3xl text-center">
                <h1 class="mb-8 text-4xl font-bold tracking-tight sm:text-6xl lg:text-7xl text-white">
                    Your Next Great
                    <span class="text-sky-400">Project</span>
                </h1>
                <p class="mx-auto mb-8 max-w-2xl text-lg text-slate-300">
                    Build modern and beautiful websites with this collection of stunning background patterns.
                    Perfect for landing pages, apps, and dashboards.
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <button class="rounded-lg px-6 py-3 font-medium bg-sky-400 text-slate-900 hover:bg-sky-300">
                    Get Started
                    </button>
                    <button class="rounded-lg border px-6 py-3 font-medium border-slate-700 bg-slate-800 text-white hover:bg-slate-700">
                    Learn More
                    </button>
                </div>
                </div>
            </div> --}}
            <header class="relative z-10 col-span-2  p-5 text-white">
                <h1 class="text-4xl font-bold">{{ config('app.name', 'Laravel') }}</h1>

            </header>
        {{-- </div> --}}
        <main class="col-span-2 w-full px-4 bg-orange-200">
            <div class="w-full h-32 bg-gray-200" id="banner"></div>
            <h1 class="text-3xl font-bold mt-8">Contáctanos</h1>
            <hr class="my-4 border-gray-300">

            <div class="mt-5 w-full">
                <form action="/submit_contact" method="post" class="grid grid-cols-12 gap-6">
                <div class="col-span-12  bg-blue-200">
                    <div class="flex flex-col">
                            <label for="name" class="font-medium text-gray-700 mb-1">Nombre:</label>
                            <input type="text" id="name" name="name" required class="border border-gray-300 p-2 rounded-lg">
                        </div>
                    </div>

                    <div class="col-span-12 ">
                    <div class="flex flex-col">
                            <label for="email" class="font-medium text-gray-700 mb-1">Correo Electrónico:</label>
                            <input type="email" id="email" name="email" required class="border border-gray-300 p-2 rounded-md">
                        </div>
                    </div>

                    <div class="col-span-12 ">
                    <div class="flex flex-col">
                            <label for="message" class="font-medium text-gray-700 mb-1">Mensaje:</label>
                            <textarea id="message" name="message" rows="4" required class="border border-gray-300 p-2 rounded-lg"></textarea>
                        </div>
                    </div>

                    <button type="submit" class="col-span-12 mt-4 bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg">
                        Enviar
                    </button>
                </form>
            </div>
        </main>
    </body>
</html>
