<x-app-layout :meta-title="$job->title" :meta-description="$job->description">
    <div class="flex">
        <section class="w-full md:w-2/3 flex flex-col px-3">

            <article class="flex flex-col shadow my-4">
                <!-- Article Image -->
                <a href="#" class="hover:opacity-75 p-5">
                    <img class="w-full" src="{{$job->getThumbnail()}}">
                </a>
                <div class="bg-white flex flex-col justify-start p-6">
                    <h1 class="text-3xl font-bold hover:text-gray-700 pb-4">
                        {{$job->title}}
                    </h1>

                    <div class="text-sm">
                        <p class="text-gray-900 leading-none">{{$job->company}}</p>
                    </div>

                    <div class="mt-4">
                        <h2 class="text-xl font-bold hover:text-gray-700 pb-4">Job Description</h2>
                        {!! $job->description !!}
                    </div>


                    <div class="mt-4">
                        <h2 class="text-xl font-bold hover:text-gray-700 pb-4">Qualifications</h2>
                        {!! $job->qualifications !!}
                    </div>

                    <div class="mt-4 flex">
                        <h2 class="text-l font-bold hover:text-gray-700 mt-2">For more info:</h2>
                        <a href="{!! $job->link !!}" class="bg-teal-600 text-white rounded py-2 px-2 mx-4"> click here</a>
                    </div>
                    <p class="mt-4 text-gray-900 leading-none">published at: {{$job->published_at}}</p>



                </div>
            </article>
        </section>

        <x-sidebar/>
    </div>
</x-app-layout>
