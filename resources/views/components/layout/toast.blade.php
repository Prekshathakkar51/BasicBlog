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

{{-- @if (session('success'))

    <script>
        showToast(@json(session('success')));
    </script>

@endif


@if (session('error'))

    <script>
        showToast(@json(session('error')), 'error');
    </script>

@endif --}}




{{-- @if (session('success'))
    <script>
        window.flashToast = {
            type: 'success',
            message: @json(session('success'))
        };
    </script>
@endif

@if (session('error'))
    <script>
        window.flashToast = {
            type: 'error',
            message: @json(session('error'))
        };
    </script>
@endif --}}



{{-- @if (session('success'))
    <div class="toast toast-top toast-center">
        <div class="alert alert-success animate-fade-out">
            <svg xmlns="<http://www.w3.org/2000/svg>" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    </div>
@endif --}}