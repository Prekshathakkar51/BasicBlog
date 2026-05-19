<x-layout>
    <x-slot:title>
        Edit Blog
    </x-slot:title>

    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mt-8">Edit Blog</h1>

        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">
                <form method="POST" action="/blogs/{{ $blog->id }}">
                    @csrf
                    @method('PUT')

                    <div class="form-control w-full mb-8">
                        <input type="text" name="title" placeholder="Enter Blog's title"
                            class="input input-bordered w-full resize-none @error('title') input-error @enderror"
                            maxlength="255" required value="{{ old('title' , $blog->title) }}">

                        @error('title')
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="form-control w-full">
                        <textarea name="content" placeholder="Add the content of your blog here"
                            class="textarea textarea-bordered w-full resize-none @error('content') textarea-error @enderror"
                            rows="4" required>{{ old('content' , $blog->content) }}</textarea>

                        @error('content')
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>


                    <div class="card-actions justify-between mt-4">
                        <a href="/" class="btn btn-ghost btn-sm">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary btn-sm">
                            Update Blog
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>