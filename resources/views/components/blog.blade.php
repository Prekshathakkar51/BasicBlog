@props(['blog'])

<div id="blog-{{ $blog->id }}" class="card bg-base-100 shadow-xl">
    <div class="card-body">
        <div class="flex flex-col">
            <div class="w-full">
                <div class="flex items-center gap-1">
                    <span class="text-sm font-semibold">{{ $blog->user->name }}</span>
                    <span class="text-base-content/60">·</span>
                    <span class="text-sm text-base-content/60">{{ $blog->created_at->diffForHumans() }}</span>

                    @if ($blog->updated_at->gt($blog->created_at->addSeconds(5)))
                        <span class="text-base-content/60">·</span>
                        <span class="text-sm text-base-content/60 italic">edited</span>
                    @endif
                </div>

                <p class="font-bold mt-3">
                    {{ $blog->title }}
                </p>

                @if($blog->image)

                    <div class="mt-3 w-full overflow-hidden rounded-lg">

                        <img src="{{ asset('storage/' . $blog->image) }}" class="w-full h-64 object-cover block">

                    </div>

                @endif


                {{-- <p class="mt-2">
                    {{ $blog->content }}
                </p> --}}

                <div class="mt-4">
                    <a href="/blogs/{{ $blog->id }}" class="btn btn-primary btn-sm">
                        Read Blog
                    </a>
                </div>


                @can('update', $blog)
                    <div class="flex gap-1 mt-3">
                        <a href="/blogs/{{ $blog->id }}/edit" class="btn btn-ghost btn-xs">
                            Edit
                        </a>
                        <form class="delete-blog-form" data-id="{{ $blog->id }}" enctype="multipart/form-data">
                            {{-- @csrf
                            @method('DELETE') --}}
                            <button type="submit" class="btn btn-ghost btn-xs text-error">
                                Delete
                            </button>
                        </form>
                    </div>
                @endcan
            </div>
        </div>
    </div>
</div>