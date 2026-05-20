<x-layout>
    <x-slot:title>
        Home
    </x-slot:title>

    <div class="max-w-2xl mx-auto">

        <h1 class="text-3xl font-bold mt-8">Create Your Blogs</h1>

        @auth
            <div class="card bg-base-100 shadow mt-8">
                <div class="card-body">
                    <form method="POST" action="/blogs" enctype="multipart/form-data">
                        @csrf
                        <div class="form-control w-full mb-8">
                            <input type="text" name="title" placeholder="Enter Blog's title"
                                class="input input-bordered w-full resize-none @error('title') input-error @enderror"
                                maxlength="255" required value="{{ old('title') }}">

                            @error('title')
                                <div class="label">
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <div class="form-control w-full">
                            <textarea name="content" placeholder="Add the content of your blog here"
                                class="textarea textarea-bordered w-full resize-none @error('content') textarea-error @enderror"
                                rows="4" required>{{ old('content') }}</textarea>

                            @error('content')
                                <div class="label">
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <div class="form-control w-full mt-6">
                            <input type="file" name="image"
                                class="file-input file-input-bordered w-full @error('image') file-input-error @enderror">

                            @error('image')
                                <div class="label">
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>


                        <div class="mt-4 flex items-center justify-end">
                            <button type="submit" class="btn btn-primary btn-sm">
                                Post Your Blog
                            </button>
                        </div>
                    </form>
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
</x-layout>