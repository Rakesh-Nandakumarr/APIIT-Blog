@Auth
@if (auth()->user()->active)
@if (auth()->user()->usertype != 'alumni')
<div class="fixed bottom-6 right-4 z-50">
    <a href="/user/posts/create" class="text-xl sm:text-xl font-bold text-white bg-teal-700 px-5 py-3 w-fit rounded-full">
        +
    </a>
</div>
@else
<div class="fixed bottom-6 right-4 z-50">
    <a href="/alumni/jobs/create" class="text-xl sm:text-xl font-bold text-white bg-teal-700 px-5 py-3 w-fit rounded-full">
        +
    </a>
</div>
@endif
@endif
@endAuth
