<x-app-layout meta-title="Apiit Blog"
              meta-description="This is the official blog site of APIIT univerity">
@auth()
@if (auth()->user()->active == 0)
    <div class="bg-red-500 text-white p-4 text-center">
        Your account is not active. Please you will be allowed the full features after approval.
    </div>
@endif
@endAuth
    <!-- This is an example component -->
<div class="max-w-screen-xl mx-auto">

	<div id="default-carousel" class="relative" data-carousel="static">

        <div class="overflow-hidden relative h-56 rounded-lg sm:h-64 xl:h-80 2xl:h-96">
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <span class="absolute top-1/2 left-1/2 text-2xl font-semibold text-white -translate-x-1/2 -translate-y-1/2 sm:text-3xl dark:text-gray-800">First Slide</span>
                <img src="img/image1.jpg" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="img/image2.jpg" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="img/image3.jpg" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
            </div>
        </div>
        <!-- Slider indicators -->
        <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
        </div>
        <!-- Slider controls -->
        <button type="button" class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                <span class="hidden">Previous</span>
            </span>
        </button>
        <button type="button" class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                <span class="hidden">Next</span>
            </span>
        </button>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const carousel = document.querySelector('#default-carousel');
        const nextButton = carousel.querySelector('[data-carousel-next]');
        const slider = carousel.querySelector('.overflow-hidden');

        setInterval(() => {
            nextButton.click();
        }, 3500); // 3500 milliseconds

        // Function to maintain height and width ratio
        function maintainAspectRatio() {
            const width = slider.offsetWidth;
            const aspectRatio = 16 / 7; // Assuming a 16:9 aspect ratio
            const height = width / aspectRatio;
            slider.style.height = `${height}px`;
        }

        window.addEventListener('resize', maintainAspectRatio);
        maintainAspectRatio(); // Call initially

        // Adjust next button position
        const nextBtn = carousel.querySelector('[data-carousel-next]');
        nextBtn.style.right = '0';
    });
</script>
    <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
</div>

    <div class="container max-w-4xl mx-auto py-6">


        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
            <!-- Latest Post -->
            <div class="col-span-2">
                <h2 class="text-lg sm:text-xl font-bold text-teal-500 uppercase pb-1 border-b-2 border-red-500 mb-3">
                    Latest Post
                </h2>

                @if ($latestPost)
                    <x-post-item :post="$latestPost"/>
                @endif
            </div>

            <!-- Popular 3 post -->
            <div>
                <h2 class="text-lg sm:text-xl font-bold text-teal-500 uppercase pb-1 border-b-2 border-red-500 mb-3">
                    Popular Posts
                </h2>

                @foreach($popularPosts as $post)
                    <div class="grid grid-cols-4 gap-2 mb-4">
                        <a href="{{route('view', $post)}}" class="pt-1">
                            <img src="{{$post->getThumbnail()}}" alt="{{$post->title}}"/>
                        </a>
                        <div class="col-span-3">
                            <a href="{{route('view', $post)}}">
                                <h3 class="text-sm uppercase whitespace-nowrap truncate">{{$post->title}}</h3>
                            </a>
                            <div class="flex gap-4 mb-2">
                                @foreach($post->categories as $category)
                                    <a href="#" class="bg-teal-500 text-white p-1 rounded text-xs font-bold uppercase">
                                        {{$category->title}}
                                    </a>
                                @endforeach
                            </div>
                            <div class="text-xs">
                                {{$post->shortBody(10)}}
                            </div>
                            <a href="{{route('view', $post)}}" class="text-xs uppercase text-gray-800 hover:text-black">Continue
                                Reading <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>


        <!-- calender -->
        @livewire('calendar')


        <!-- Recommended posts -->
        <div class="mb-8 mt-8">
            <h2 class="text-lg sm:text-xl font-bold text-teal-500 uppercase pb-1 border-b-2 border-red-500 mb-3">
                Recommended Posts
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                @foreach($recommendedPosts as $post)
                    <x-post-item :post="$post" :show-author="false"/>
                @endforeach
            </div>
        </div>
        @Auth
        @if (auth()->user()->levelofstudy == 'second year')
                <div class="mb-8">
            <h2 class="text-lg sm:text-xl font-bold text-teal-500 uppercase pb-1 border-b-2 border-red-500 mb-3">
                Job Posts
            </h2>
            <div class="flex justify-end">
                <a href="/jobs" class="font-bold text-red-700 mb-3 cursor-pointer">Show More</a>
            </div>


                @foreach($jobpost as $job)
                    <x-job-card :job="$job" />
                @endforeach
        </div>
        @endif
        @endAuth
        <!-- Latest Categories -->

        @foreach($categories as $category)
            <div>
                <h2 class="text-lg sm:text-xl font-bold text-teal-500 uppercase pb-1 border-b-2 border-red-500 mb-3">
                    Category "{{$category->title}}"
                    <a href="{{route('by-category', $category)}}">
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </h2>

                <div class="mb-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                        @foreach($category->publishedPosts()->limit(3)->get() as $post)

                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach

    </div>

</x-app-layout>
