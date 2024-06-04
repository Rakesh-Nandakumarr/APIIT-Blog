<x-app-layout meta-title="Events Calendar">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-8 text-center">Events</h1>

        <div x-data="{ currentTab: 'upcoming' }" class="mb-8">
            <div class="flex justify-center mb-4">
                <button :class="{ 'bg-teal-500 text-white': currentTab === 'upcoming' }" @click="currentTab = 'upcoming'" class="px-4 py-2 mr-2 bg-gray-200 rounded">Upcoming</button>
                <button :class="{ 'bg-teal-500 text-white': currentTab === 'ongoing' }" @click="currentTab = 'ongoing'" class="px-4 py-2 mr-2 bg-gray-200 rounded">Ongoing</button>
                <button :class="{ 'bg-teal-500 text-white': currentTab === 'previous' }" @click="currentTab = 'previous'" class="px-4 py-2 bg-gray-200 rounded">Previous</button>
            </div>

            <div x-show="currentTab === 'upcoming'">
                <h2 class="text-2xl font-bold mb-4">Upcoming Events</h2>
                @forelse($upcomingEvents as $event)
                    <div class="bg-white shadow-md rounded-lg p-4 mb-4">
                        <h3 class="text-xl font-bold">{{ $event->title }}</h3>
                        <p class="text-gray-600">{{ \Illuminate\Support\Str::limit($event->description, 150, '...') }}</p>
                        @if($event->thumbnail)
                            <img src="{{ $event->thumbnail }}" alt="{{ $event->title }}" class="w-full h-48 object-cover mt-2 mb-2">
                        @endif
                        <p class="text-gray-500">Starts: {{ $event->start_date->format('M d, Y h:i A') }}</p>
                    </div>
                @empty
                    <p class="text-gray-600">No upcoming events.</p>
                @endforelse
            </div>

            <div x-show="currentTab === 'ongoing'">
                <h2 class="text-2xl font-bold mb-4">Ongoing Events</h2>
                @forelse($ongoingEvents as $event)
                    <div class="bg-white shadow-md rounded-lg p-4 mb-4">
                        <h3 class="text-xl font-bold">{{ $event->title }}</h3>
                        <p class="text-gray-600">{{ \Illuminate\Support\Str::limit($event->description, 150, '...') }}</p>
                        @if($event->thumbnail)
                            <img src="{{ $event->thumbnail }}" alt="{{ $event->title }}" class="w-full h-48 object-cover mt-2 mb-2">
                        @endif
                        <p class="text-gray-500">Ends: {{ $event->end_date->format('M d, Y h:i A') }}</p>
                    </div>
                @empty
                    <p class="text-gray-600">No ongoing events.</p>
                @endforelse
            </div>

            <div x-show="currentTab === 'previous'">
                <h2 class="text-2xl font-bold mb-4">Previous Events</h2>
                @forelse($previousEvents as $event)
                    <div class="bg-white shadow-md rounded-lg p-4 mb-4">
                        <h3 class="text-xl font-bold">{{ $event->title }}</h3>
                        <p class="text-gray-600">{{ \Illuminate\Support\Str::limit($event->description, 150, '...') }}</p>
                        @if($event->thumbnail)
                            <img src="{{ $event->thumbnail }}" alt="{{ $event->title }}" class="w-full h-48 object-cover mt-2 mb-2">
                        @endif
                        <p class="text-gray-500">Ended: {{ $event->end_date->format('M d, Y h:i A') }}</p>
                    </div>
                @empty
                    <p class="text-gray-600">No previous events.</p>
                @endforelse
            </div>
        </div>
    </div>
    <div class="container max-w-4xl mx-auto py-6">
    
        @livewire('calendar')
        @auth()
        @if ((Auth::user()->stafftype == 'Apiit Management') || (Auth::user()->stafftype == 'Club Patrons') || (Auth::user()->usertype == 'admin'))
        <a href="/calendar/events" class="bg-teal-600 text-white rounded py-2 px-4 mx-auto">Add Events</a>
        @endif
        @endauth
    </div>
        
</x-app-layout>
