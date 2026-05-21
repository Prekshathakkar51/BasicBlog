<!DOCTYPE html>
<html lang="en" data-theme="lofi">

<head>

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

@livewireScripts 
</body>

</html>