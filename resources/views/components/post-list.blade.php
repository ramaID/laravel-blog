@props(['year', 'posts'])

<div class="mx-auto px-4 sm:px-6 lg:px-8 mt-4">
    <div class="md:flex md:items-center md:justify-between mb-6">
        <div class="min-w-0 flex-1">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">{{ $year }}</h2>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-6">
        @foreach($posts as $post)
            <div class="bg-white shadow rounded-lg p-6">
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <h3 class="text-lg font-semibold text-gray-900">{{ $post->title }}</h3>
                        <p class="mt-1 text-sm text-gray-600">{{ $post->author->name }}</p>
                    </div>
                    <span class="text-xs font-medium px-2 py-1 rounded-full">
                        {{ $post->type }}
                    </span>
                </div>
                <div class="mt-4 text-sm text-gray-500">
                    <p>Published at <time datetime="{{ $post->published_at }}">{{ $post->published_at->diffForHumans() }}</time></p>
                </div>
                <div class="mt-4 text-sm text-gray-500">
                    {{-- TODO: buatkan sebuah query untuk menampilkan jumlah komentar tiap posts --}}
                    300 komentar
                </div>
                <div class="mt-4">
                    <a href="#" class="text-sm font-semibold text-indigo-600 hover:text-indigo-500">
                        View details<span class="sr-only">, {{ $post->title }}</span>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
