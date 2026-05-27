<!DOCTYPE html>
<html lang="en" data-theme="lofi" >

<head>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <x-layout.head />

</head>

<body class="min-h-screen flex flex-col bg-base-200 font-sans"> 

    <x-layout.navbar />

    <x-layout.toast />

    <x-layout.delete-modal />

    <main class="flex-1 container mx-auto px-4 py-8">
        {{ $slot }}
    </main>

    <x-layout.footer />
    <x-layout.toast />

    <script src="{{ asset('js/blog-paginate-main.js') }}"></script>

    <script src="{{ asset('js/live-search.js') }}"></script>


    @livewireScripts
</body>

</html>