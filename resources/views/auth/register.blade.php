<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Company Fields (Hidden by Default) -->
        <div id="company-fields" style="display: none;" class="mt-4">
            <div>
                <x-input-label for="company_location" :value="__('Company Location')" />
                <x-text-input id="company_location" class="block mt-1 w-full" type="text" name="location" />
            </div>
            <div class="mt-4">
                <x-input-label for="company_description" :value="__('Company Description')" />
                <textarea id="company_description" name="description" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm"></textarea>
            </div>
        </div>
        <!-- Role Selection -->
        <div class="mt-4">
            <x-input-label :value="__('Register As:')" />
            <div class="flex items-center gap-4">
                <label class="inline-flex items-center">
                    <input type="radio" name="role" value="user" checked onclick="toggleCompanyFields(false)"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                    <span class="ms-2 text-sm text-gray-600">Job Seeker</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="role" value="company" onclick="toggleCompanyFields(true)"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                    <span class="ms-2 text-sm text-gray-600">Company</span>
                </label>
            </div>
        </div>
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required />
        </div>





        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        function toggleCompanyFields(show) {
            document.getElementById('company-fields').style.display = show ? 'block' : 'none';
        }
    </script>
</x-guest-layout>
