<x-layout.app>
    <x-slot:title>
        Register
    </x-slot:title>

    <div class="hero min-h-[calc(100vh-16rem)]">
        <div class="hero-content flex-col">
            <div class="card w-96 bg-base-100">
                <div class="card-body">
                    <h1 class="text-3xl font-bold text-center mb-6">Create Account</h1>

                        <form id="registerForm">
                            @csrf

                            <x-form.input name="name" id="name" label="Your Name" required/>

                            <x-form.input name="email" type="email" id="email" label="Email" required/>

                            <x-form.input name="password" type="password" id="password" label="Password" required/>

                            <x-form.input name="password_confirmation" type="password" id="password_confirmation" label="Confirm Password" required/>

                            <div class="form-control mt-8">
                                <button type="submit" class="btn btn-primary btn-sm w-full">
                                    Register
                                </button>
                            </div>
                        </form>

                        <div class="divider">OR</div>
                        <p class="text-center text-sm">
                            Already have an account?
                            <a href="/login" class="link link-primary">Sign in</a>
                        </p>
                </div>
            </div>
        </div>
    </div>

</x-layout.app>