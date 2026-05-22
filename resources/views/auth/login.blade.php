<x-layout.app>
    <x-slot:title>
        Sign In
    </x-slot:title>

    <div class="hero min-h-[calc(100vh-16rem)]">
        <div class="hero-content flex-col">
            <div class="card w-96 bg-base-100">
                <div class="card-body">
                    <h1 class="text-3xl font-bold text-center mb-6">Welcome Back</h1>

                    <form id="loginForm">
                        {{-- <form id="loginForm" method="POST" action="/login"> --}}
                            @csrf

                            <x-form.input name="email" id="email" type="email" label="Email" required autofocus />

                            <x-form.input name="password" id="password" type="password" label="Password" required />


                            <div class="form-control mt-4">
                                <label class="label cursor-pointer justify-start">
                                    <input type="checkbox" name="remember" class="checkbox">
                                    <span class="label-text ml-2">Remember me</span>
                                </label>
                            </div>


                            <div class="form-control mt-8">
                                <button type="submit" class="btn btn-primary btn-sm w-full">
                                    Sign In
                                </button>
                            </div>
                        </form>

                        <div class="divider">OR</div>
                        <p class="text-center text-sm">
                            Don't have an account?
                            <a href="/register" class="link link-primary">Register</a>
                        </p>

                        {{-- <div id="toast-container" class="toast toast-top toast-center z-50"></div> --}}
                </div>
            </div>
            {{--
        </div>
        <div id="toast-container" class="toast toast-top toast-center z-50"></div>
    </div> --}}

    {{-- <div id="toast-container" class="fixed top-5 right-5 z-50">
    </div> --}}

</x-layout.app>