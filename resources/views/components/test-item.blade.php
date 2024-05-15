<article class="bg-white    flex flex-col shadow my-4">
    <!-- Article Image -->
    <a href="{{route('Testimonials.show',$post)}}" class="hover:opacity-75">
        <img src="{{$post->getThumbnail()}}" alt="{{$post->title}}" class="aspect-[4/3] object-contain">
    </a>
    <div class="bg-white flex flex-col justify-start p-6">
        <div class="flex gap-4">
                <a href="#" class="text-teal-700 text-sm font-bold uppercase pb-4">
                    Alumni Testimonials
                </a>
        </div>


        <a href="{{route('Testimonials.show',$post)}}" class="text-3xl font-bold hover:text-gray-700 pb-4">
            {{$post->title}}
        </a>
            <p href="#" class="text-sm pb-3">
                By <a href="#" class="font-semibold hover:text-gray-800">{{$post->user->name}}</a>, Published on
                {{$post->getFormattedDate()}} | {{ $post->human_read_time }}
            </p>
        <a href="{{route('Testimonials.show',$post)}}" class="pb-6">
            {{$post->shortBody()}}
        </a>
        <a  href="{{route('Testimonials.show',$post)}}" class="uppercase text-gray-800 hover:text-black">Continue Reading <i
                class="fas fa-arrow-right"></i></a>
    </div>
</article>
