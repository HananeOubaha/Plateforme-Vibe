<x-guest-layout>
    <form method="POST" action="{{ route('register') }}"enctype="multipart/form-data">
        @csrf


        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <!-- Pseudo -->
        <div class="mt-4">
          <x-input-label for="pseudo" :value="__('Pseudo')" />
          <x-text-input id="pseudo" class="block mt-1 w-full" type="text" name="pseudo" :value="old('pseudo')" required />
          <x-input-error :messages="$errors->get('pseudo')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
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
        <!-- Bio -->
        <div class="mt-4">
          <x-input-label for="bio" :value="__('Bio')" />
          <textarea id="bio" name="bio" class="block mt-1 w-full">{{ old('bio') }}</textarea>
          <x-input-error :messages="$errors->get('bio')" class="mt-2" />
       </div>

<!-- Profile Photo -->
       <div class="mt-4">
         <x-input-label for="profile_photo" :value="__('Profile Photo')" />
         <input id="profile_photo" type="file" name="profile_photo" class="block mt-1 w-full">
         <x-input-error :messages="$errors->get('profile_photo')" class="mt-2" />
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

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
