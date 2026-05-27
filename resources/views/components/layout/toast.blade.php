<div id="toast-container"
     class="fixed top-5 right-5 z-50 space-y-3">
</div>


@if (session('success'))
    <div id="flash-success"
         data-message="{{ session('success') }}">
    </div>
@endif

@if (session('error'))
    <div id="flash-error"
         data-message="{{ session('error') }}">
    </div>
@endif

