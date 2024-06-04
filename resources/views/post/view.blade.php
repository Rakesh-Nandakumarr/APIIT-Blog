<x-app-layout :meta-title="$post->meta_title ?: $post->title" :meta-description="$post->meta_description">
    <div x-data="{ isShrunk: false }" @scroll.window="isShrunk = window.scrollY > 200" class="relative">

        <!-- Post Section -->
        <div class="container mx-auto px-4 py-8">
            <section class="w-full md:w-2/3 mx-auto">
                @if($post->thumbnail)
                <div x-data="{ isShrunk: false }" @scroll.window="isShrunk = window.scrollY > 200" class="px-10 rounded-lg">
                    <img :style="isShrunk ? 'height: 128px;' : 'height: 512px;'" class="w-full object-cover transition-all duration-300" src="{{ $post->getThumbnail() }}" alt="{{ $post->title }}">
                </div>
                @endif

                <article class="bg-white rounded-lg shadow-lg overflow-hidden mb-8">
                    <div class="p-6">
                        <div class="flex flex-wrap gap-2 mb-4">
                            @foreach($post->categories as $category)
                                <a href="#" class="text-blue-600 text-sm font-semibold uppercase bg-gray-100 rounded-full px-3 py-1">
                                    {{$category->title}}
                                </a>
                            @endforeach
                        </div>
                        <h1 class="text-4xl font-bold text-gray-800 mb-4">
                            {{$post->title}}
                        </h1>
                        <p class="text-sm text-gray-500 mb-6">
                            By <a href="#" class="font-semibold text-gray-600 hover:text-gray-800">{{ $post->user->name }}</a>, Published on
                            {{ $post->getFormattedDate() }} | {{ $post->human_read_time }}
                        </p>
                        <div class="text-gray-700 leading-relaxed">
                            {!! $post->body !!}
                        </div>

                        <div class="mt-6">
                            <livewire:like-button :key="$post->id" :$post />
                        </div>
                    </div>
                </article>

                <div class="flex justify-between space-x-4">
                    @if($prev)
                        <a href="{{ route('view', $prev) }}" class="block w-full bg-white shadow-lg hover:shadow-xl transition-shadow duration-300 p-6 rounded-lg">
                            <p class="text-lg text-blue-800 font-bold flex items-center">
                                <i class="fas fa-arrow-left pr-2"></i>
                                Previous
                            </p>
                            <p class="text-gray-600 mt-2">{{ \Illuminate\Support\Str::words($prev->title, 5) }}</p>
                        </a>
                    @endif
                    @if($next)
                        <a href="{{ route('view', $next) }}" class="block w-full bg-white shadow-lg hover:shadow-xl transition-shadow duration-300 p-6 rounded-lg text-right">
                            <p class="text-lg text-blue-800 font-bold flex items-center justify-end">
                                Next
                                <i class="fas fa-arrow-right pl-2"></i>
                            </p>
                            <p class="text-gray-600 mt-2">{{ \Illuminate\Support\Str::words($next->title, 5) }}</p>
                        </a>
                    @endif
                </div>

                <div class="mt-8">
                    <livewire:comments :model="$post"/>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
