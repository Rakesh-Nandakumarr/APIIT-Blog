<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 flex bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="pt-2 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
                <a href="{{route('home')}}" class="bg-teal-600 text-white rounded py-2 px-4 mx-2">Click to Continue</a>
            </div>
        </div>
    </div>
</x-app-layout>
