<x-app-layout meta-title="Events Calendar">
    <div class="container max-w-4xl mx-auto py-6">
    
        @livewire('calendar')
        @auth()
        @if (Auth::user()->stafftype == 'Apiit Management')
        <a href="/calendar/events" class="bg-teal-600 text-white rounded py-2 px-4 mx-auto">Add Events</a>
        @endif
        @endauth
    </div>
        
</x-app-layout>