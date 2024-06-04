
<x-guest-layout>
    <x-authentication-card>
        <img src="{{asset('img\apiit-logo.png')}}" class="mx-auto mb-6">
        <form method="POST" action="{{ route('register') }}">

            @csrf
            <div class="flex justify-end">
                <div class="w-fit border-2 border-teal-600 px-2 py-3 rounded-lg m-0.5 ml-30 mb-3.5 flex justify-end">
                    <h2 class="text-center mt-3">Register As:</h2>
                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 pr-10 focus:border-teal-500 block ml-4 p-2.5"  name="usertype" onchange="changeTab(this)">
                        <option value="student">Student</option>
                        <option value="apiit staff">APIIT management/staff</option>
                        <option value="alumni">Alumni</option>
                    </select>
                </div>
            </div>


            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-4 hidden" id="staffdiv">
                <label for="Stafftype" class="block mb-2 text-sm font-medium text-gray-900£">Select your Staff Type</label>
                <select id="Stafftype" name="stafftype" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5">
                    <option value="Academic Staff">Academic Staff</option>
                    <option value="Non-Academic Staff">Non-Academic Staff</option>
                    <option value="Apiit Management">Apiit Management</option>
                    <option value="Club Patrons">Club Patrons</option>

                </select>
            </div>

            <div class="mt-4" id="leveldiv">
                <label for="levelofstudy" class="block mb-2 text-sm font-medium text-gray-900£">Select your level of study</label>
                <select id="levelofstudy" name="levelofstudy" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5">
                    <option value="foundation">foundation</option>
                    <option value="first year">first year</option>
                    <option value="second year">second year</option>
                    <option value="final year">final year</option>
                    <option value="masters">masters</option>

                </select>
            </div>

            <div class="mt-4" id="facdiv">
                <label for="facultyofstudy" class="block mb-2 text-sm font-medium text-gray-900£">Select your Faculty of study</label>
                <select id="facultyofstudy" name="facultyofstudy" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5">
                    <option value="law">Law</option>
                    <option value="business">Business</option>
                    <option value="computing">Computing</option>

                </select>
            </div>

            <!-- identity -->
            <div id="identitydiv" class="mt-4 hidden">
                <x-input-label for="identity" :value="__('National identity card no.')" />
                <x-text-input id="identity" class="block mt-1 w-full" type="text" name="identity" :value="old('identity')"/>
                <x-input-error :messages="$errors->get('identity')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <button type='submit' class='ml-4 inline-flex items-center px-4 py-2 bg-teal-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-teal-600 focus:bg-teal-700 active:bg-teal-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'>
                    {{ __('Register') }}
                </button>
            </div>
        </form>
        <script>
            const identitydiv = document.getElementById('identitydiv');
            const leveldiv = document.getElementById('leveldiv');
            const facdiv = document.getElementById('facdiv');
            const identity = document.getElementById('identity');
            const staffdiv = document.getElementById('staffdiv');

            function changeTab(selectedOption) {
                switch (selectedOption.value) {
                    case 'student':
                        identitydiv.style.display = 'none';
                        staffdiv.style.display = 'none';
                        leveldiv.style.display = 'block';
                        facdiv.style.display = 'block';
                        break;
                    case 'apiit staff':
                        identitydiv.style.display = 'none';
                        leveldiv.style.display = 'none';
                        facdiv.style.display = 'none';
                        staffdiv.style.display = 'block';
                        break;
                    case 'alumni':
                        identitydiv.style.display = 'block';
                        leveldiv.style.display = 'none';
                        staffdiv.style.display = 'none';
                        facdiv.style.display = 'none';
                        break;
                }
            }
        </script>
    </x-authentication-card>

</x-guest-layout>
