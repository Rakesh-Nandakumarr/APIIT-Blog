<x-app-layout>
    <main class="container max-w-6xl mx-auto py-6">
        <div class="bg-white shadow-md rounded-lg overflow-hidden flex justify-between">
            

            <div class="p-6">
                <h2 class="text-4xl font-bold mb-4">{{ $event->title }}</h2>

                <div class="text-teal-600 mb-6 ml-2">
                    <span>{{ $event->category->title}}</span>
                </div>
                <p class="text-lg text-gray-700 mb-6">{{ $event->description }}</p>
                <div class="text-gray-600 mb-6">
                    <span>{{ $event->start_date->format('M d, Y h:i A') }} - {{ $event->end_date->format('M d, Y h:i A') }}</span>
                </div>

            </div>

            @if($event->thumbnail)
                <img class="w-auto h-72 object-cover" src="{{ $event->getThumbnail() }}" alt="{{ $event->title }}">
            @endif
        </div>
        
    </main>
</x-app-layout>