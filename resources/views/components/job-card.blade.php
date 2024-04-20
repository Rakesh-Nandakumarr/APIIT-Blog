<a href="{{route('jobs.show',$job)}}" class="flex mb-4 cursor-pointer">
    <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('{{$job->getThumbnail()}}')"></div>
    <div class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal w-full">
        <div class="mb-8">
            <div class="text-gray-900 font-bold text-xl mb-2">{{$job->title}}</div>
            <p class="text-gray-700 text-base">{{$job->shortBody()}}</p>
        </div>
        <div class="text-sm">
            <p class="text-gray-900 leading-none">{{$job->company}}</p>
            <p class="text-gray-600">{{$job->published_at}}</p>
        </div>
    </div>
</a>
