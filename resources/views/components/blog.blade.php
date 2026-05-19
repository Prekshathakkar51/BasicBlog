@props(['blog'])

<div class="card bg-base-100 shadow">
    <div class="card-body">
        <div class="flex space-x-3">
            <div class="min-w-0">
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

                <p class="mt-2">
                    {{ $blog->content }}
                </p>


                @can('update', $blog)
                    <div class="flex gap-1 mt-3">
                        <a href="/blogs/{{ $blog->id }}/edit" class="btn btn-ghost btn-xs">
                            Edit
                        </a>
                        <form method="POST" action="/blogs/{{ $blog->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this blog?')"
                                class="btn btn-ghost btn-xs text-error">
                                Delete
                            </button>
                        </form>
                    </div>
                @endcan
            </div>
        </div>
    </div>
</div>