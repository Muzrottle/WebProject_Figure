{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}


<x-guest-layout>
    <section class="signin-page account">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-md-offset-3">
              <div class="block text-center">
                <a class="logo" href="/">
                  <img src="images/logo.png" width="150" height="50">
                </a>
                <h2 class="text-center">Welcome Back</h2>
                <x-jet-validation-errors class="mb-4" />
                <form class="text-left clearfix" method="POST" action="{{ route('login') }}" >
                    @csrf
                  <div class="form-group">
                    <input type="email" class="form-control" name="email"  placeholder="Email" :value="old('email')" required autofocus>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required autocomplete="current-password">
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-main text-center" >Login</button>
                  </div>
                </form>
                <p class="mt-20">New in this site ?<a href="{{ route('register') }}"> Create New Account</a></p>
                <p><a href="{{ route('password.request') }}"> Forgot your password?</a></p>
              </div>
            </div>
          </div>
        </div>
      </section>
</x-guest-layout>