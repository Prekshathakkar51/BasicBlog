<div class="card bg-base-100 shadow mt-8">

    <div class="card-body">

        <h1 class="text-3xl font-bold mb-4">
            {{ $title ?: 'No Title Added' }}
        </h1>

        <img id="preview-image" class="w-full rounded-xl mb-6 hidden">

        <div class="prose max-w-none">
            {!! $content ?: '<p>No Content Added</p>' !!}
        </div>

    </div>

</div>