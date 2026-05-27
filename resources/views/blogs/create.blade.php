<x-layout.app>

    <x-slot:title>
        Create Your Blog
    </x-slot:title>

    <div class="max-w-2xl mx-auto">

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


                        <link rel="stylesheet" href="{{ asset('css/cke.css') }}">
                        </link>

                        <div class="form-control w-full">
                            <textarea name="content" id="content" placeholder="Add the content of your blog here"
                                class="textarea textarea-bordered w-full resize-none @error('content') textarea-error @enderror"
                                rows="10">{{ old('content') }}</textarea>
                            <div>
                                <span id="content-count">0</span>/5000
                            </div>



                            @error('content')
                                <div class="label">
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <div class="form-control w-full mt-6">
                            <input type="file" id="image-input" name="image"
                                class="file-input file-input-bordered w-full @error('image') file-input-error @enderror">

                            @error('image')
                                <div class="label">
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>


                        <div class="mt-4 flex items-center justify-between">

                            <a href="/" class="btn btn-ghost btn-sm">
                                Cancel
                            </a>

                            <button type="button" id="preview-btn" class="btn btn-outline btn-sm mr-4">
                                Preview Your Blog before Creating
                            </button>

                            <button type="submit" class="btn btn-primary btn-sm">
                                Post Your Blog
                            </button>
                        </div>
                    </form>
                </div>

                <div id="preview-container"></div>

            </div>
        @endauth

        <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

        <script src="{{ asset('js/blog-preview.js') }}"></script>

        <script src="{{ asset('js/ckeEditor-charCount.js') }}"></script>


</x-layout.app>