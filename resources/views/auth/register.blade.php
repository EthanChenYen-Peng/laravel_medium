<x-master>
  <div class="container mx-auto">
    <div class="flex flex-wrap justify-center">
      <div class="w-full max-w-sm">
        <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">

          <div class="px-6 py-3 mb-0 font-semibold text-black bg-green-200">
            {{ __('Register') }}
          </div>

          <form class="w-full p-6" method="POST" action="{{ route('register') }}">
            @csrf

            <div class="flex flex-wrap mb-6">
              <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                {{ __('Name') }}:
              </label>

              <input id="name" type="text" class="form-input w-full @error('name')  border-red-500 @enderror"
                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

              @error('name')
              <p class="text-red-500 text-xs italic mt-4">
                {{ $message }}
              </p>
              @enderror
            </div>

            <div class="flex flex-wrap mb-6">
              <label for="username" class="block text-gray-700 text-sm font-bold mb-2">
                {{ __('User name') }}:
              </label>

              <input id="username" type="text" class="form-input w-full @error('username')  border-red-500 @enderror"
                name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

              @error('username')
              <p class="text-red-500 text-xs italic mt-4">
                {{ $message }}
              </p>
              @enderror
            </div>

            <div class="flex flex-wrap mb-6">
              <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                {{ __('E-Mail Address') }}:
              </label>

              <input id="email" type="email" class="form-input w-full @error('email') border-red-500 @enderror"
                name="email" value="{{ old('email') }}" required autocomplete="email">

              @error('email')
              <p class="text-red-500 text-xs italic mt-4">
                {{ $message }}
              </p>
              @enderror
            </div>

            <div class="flex flex-wrap mb-6">
              <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
                {{ __('Password') }}:
              </label>

              <input id="password" type="password" class="form-input w-full @error('password') border-red-500 @enderror"
                name="password" required autocomplete="new-password">

              @error('password')
              <p class="text-red-500 text-xs italic mt-4">
                {{ $message }}
              </p>
              @enderror
            </div>

            <div class="flex flex-wrap mb-6">
              <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2">
                {{ __('Confirm Password') }}:
              </label>

              <input id="password-confirm" type="password" class="form-input w-full" name="password_confirmation"
                required autocomplete="new-password">
            </div>

            <div class="flex flex-wrap">
              <button type="submit"
                class="px-4 py-2 font-bold text-black bg-green-200 rounded hover:bg-green-400 focus:outline-none focus:shadow-outline">
                {{ __('Register') }}
              </button>

              <p class="w-full text-xs text-center text-gray-700 mt-8 -mb-4">
                {{ __('Already have an account?') }}
                <a class="text-green-500 hover:text-green-700 no-underline" href="{{ route('login') }}">
                  {{ __('Login') }}
                </a>
              </p>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</x-master>