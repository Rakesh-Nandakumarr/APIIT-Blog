<x-app-layout :meta-title="'Apiit Blog - ' . 'Alumni Testimonials'"
              :meta-description="'Posts filtered by category ' . 'Alumni Testimonials'">
    <div class="mb-8 max-w-screen-xl mx-auto">
        <h2 class="text-lg sm:text-xl font-bold text-teal-500 uppercase pb-1 border-b-2 border-red-500 mb-3">
            Testimonials
        </h2>

        <!-- Posts Section -->
        <section class="w-full md:w-2/3  px-3">
                @foreach($posts as $post)
                    <x-test-item :post="$post"/>
                @endforeach
        </section>

    </div>
</x-app-layout>
