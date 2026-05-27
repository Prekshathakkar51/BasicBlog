@forelse ($blogs as $blog)

    <x-blog :blog="$blog" />

@empty
    <p class="text-gray-500">No Blogs yet.</p>

@endforelse

<div class="mt-10">

    {{ $blogs->links() }}

</div>

