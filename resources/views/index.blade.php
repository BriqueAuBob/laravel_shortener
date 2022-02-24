<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    </head>
    <body class="bg-grid dark:bg-neutral-900 dark:text-white bg-grid h-screen overflow-hidden">
        <div class="absolute h-screen w-screen top-0 left-0 -z-1">
            <img class="relative -left-72 -top-72" src="{{ asset('images/circle.png') }}" />
            <img class="relative -right-72 -top-72" src="{{ asset('images/circle.png') }}" />
            <img class="relative left-0 top-0" src="{{ asset('images/circle.png') }}" />
        </div>
        <div class="container mx-auto h-screen flex flex-col justify-center items-center px-4">
            <h1 class="text-center text-4xl font-bold text-indigo-700 font-sans">Create Short Links!</h1>
            <h2 class="text-center text-2xl font-semibold leading-relaxed lg:w-1/3 mx-auto mt-4">This is a custom tool to create short link and send them to your best friends!</h2>
            <div class="bg-white shadow-2xl shadow-indigo-500/30 p-8 lg:w-1/2 mx-auto mt-12 rounded-xl">
                <div class="pl-6 pr-4 rounded-lg w-full bg-gray-100 flex gap-4 items-center">
                    <img class="w-8 h-8" src="{{ asset('images/link.svg') }}" />
                    <form class="flex w-full py-4" action="{{ route('links.store') }}" method="POST">
                        @csrf
                        <input
                            name="destination_url"
                            class="py-4 mr-2 focus:outline-none bg-transparent w-full text-neutral-800"
                            placeholder="Paste a link to shorten..."
                            value="{{ session('code') ? route('links.show', ['link' => session('code')]) : null }}"
                        />
                        <button class="bg-gradient-to-b from-indigo-400 to-indigo-500
                            px-8 py-3
                            rounded-xl
                            text-white text-md font-semibold
                            transition ease-in duration-500
                            transform hover:-translate-y-1
                            shadow-lg shadow-indigo-200 hover:shadow-indigo-400"
                        >Shorten</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
