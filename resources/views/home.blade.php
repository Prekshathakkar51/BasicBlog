<x-layout.app>
    <x-slot:title>
        Home
    </x-slot:title>

    <div class="max-w-2xl mx-auto">

        <h1 class="text-3xl font-bold mt-8">Create Your Blogs</h1>

        @auth
            

        <div class="card bg-base-100 shadow mt-8">
                <div class="card-body items-center text-center">
                    <div class="card-actions mt-4">
                        <a href="/blogs/create" class="btn btn-primary btn-sm">Create Your Blog</a>
                    </div>

                </div>
            </div>


        @endauth

        @guest
            <!-- LOGIN CTA -->
            <div class="card bg-base-100 shadow mt-8">
                <div class="card-body items-center text-center">
                    <div class="card-actions mt-4">
                        <a href="/login" class="btn btn-primary btn-sm">Login to Create Blog</a>
                    </div>

                </div>
            </div>

        @endguest

        <h1 class="text-3xl font-bold mt-8">Latest Blogs</h1>

        <div class="space-y-4 mt-8">
            @forelse ($blogs as $blog)

                <x-blog :blog="$blog" />

            @empty
                <p class="text-gray-500">No Blogs yet.</p>

            @endforelse
        </div>

        <div class="mt-10">
            {{ $blogs->links() }}
        </div>
    </div>
</x-layout.app>