<x-layout.app>
    <x-slot:title>
        {{ $blog->title }}
    </x-slot:title>

    <div id="blog-{{ $blog->id }}" class="max-w-4xl mx-auto py-10 px-4">

        <article class="bg-base-100 shadow-xl rounded-2xl overflow-hidden">

            @if($blog->image)
                <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image"
                    class="w-full max-h-[500px] object-cover">
            @endif

            <div class="p-8">

                <div class="flex items-center gap-2 text-sm text-base-content/60">
                    <span class="font-semibold text-base-content">
                        {{ $blog->user->name }}
                    </span>

                    <span>.</span>

                    <span>
                        {{ $blog->created_at->diffForHumans() }}
                    </span>

                    @if ($blog->updated_at->gt($blog->created_at->addSeconds(5)))
                        <span>.</span>
                        <span class="italic">edited</span>
                    @endif
                </div>

                <h1 class="text-4xl font-bold mt-5 leading-tight">
                    {{ $blog->title }}
                </h1>

                <div class="divider"></div>

                <div class="mt-6 text-lg leading-9 whitespace-pre-line break-words">
                    {!! $blog->content !!}
                </div>

                <div class="card-actions justify-end mt-4">
                @can('update', $blog)
                    <div class="flex gap-1 mt-3">
                        <a href="/blogs/{{ $blog->id }}/edit" class="btn btn-primary">
                            Edit
                        </a>
                        <form class="delete-blog-form" data-id="{{ $blog->id }}" enctype="multipart/form-data">
                           
                            <button type="submit" 
                                class="btn btn-error">
                                Delete
                            </button>
                        </form>
                    </div>
                @endcan
                </div>

                <div class="mt-10">
                    <a href="/" class="btn btn-outline">
                        ← Back to Feed
                    </a>
                </div>

            </div>
        </article>

    </div>


    </div>
</x-layout.app>