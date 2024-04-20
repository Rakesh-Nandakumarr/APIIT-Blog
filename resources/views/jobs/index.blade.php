<x-app-layout>
    <div class="mb-8 max-w-screen-xl mx-auto">
        <h2 class="text-lg sm:text-xl font-bold text-teal-500 uppercase pb-1 border-b-2 border-red-500 mb-3">
            Job Posts
        </h2>

        @foreach($jobpost as $job)
            <x-job-card :job="$job" />
        @endforeach
    </div>
</x-app-layout>
