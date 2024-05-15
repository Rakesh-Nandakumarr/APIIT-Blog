<x-app-layout :meta-title="$post->meta_title ?: $post->title" :meta-description="$post->meta_description">
    <div class="flex">
        <!-- Post Section -->
        <section class="w-full md:w-2/3 flex flex-col px-3">

            <article class="flex flex-col shadow my-4">
                <!-- Article Image -->
                <a href="#" class="hover:opacity-75 p-5">
                    <img class="w-full" src="{{$post->getThumbnail()}}">
                </a>
                <div class="bg-white flex flex-col justify-start p-6">
                    <div class="flex gap-4">
                        Alumni Testimonials
                    </div>
                    <h1 class="text-3xl font-bold hover:text-gray-700 pb-4">
                        {{$post->title}}
                    </h1>
                    <p href="#" class="text-sm pb-8">
                        By <a href="#" class="font-semibold hover:text-gray-800">{{$post->user->name}}</a>, Published on
                        {{$post->getFormattedDate()}} | {{ $post->human_read_time }}
                    </p>
                    <div>
                        {!! $post->body !!}
                    </div>

                    <livewire:upvote-downvote :post="$post"/>
                </div>
            </article>

            <livewire:comments :post="$post"/>
        </section>

        <x-sidebar/>
    </div>
</x-app-layout>
