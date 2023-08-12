<wireui:scripts />
<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo" class="mb-0 bg-white">
            <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                width="200pt" height="110pt" viewBox="0 0 500.000000 1"
                preserveAspectRatio="xMidYMid meet">

           <g transform="translate(0.000000,300.000000) scale(0.100000,-0.100000)"
            fill="#880808" stroke="none">
           <path d="M1838 4130 c-54 -16 -96 -50 -119 -98 l-24 -47 -3 -1074 c-1 -591 1
                -1078 5 -1082 7 -7 150 79 216 131 l27 22 0 928 c0 617 3 931 10 935 29 18
                265 -54 428 -131 284 -134 532 -341 628 -524 25 -48 29 -66 29 -140 0 -75 -4
                -92 -30 -144 -16 -32 -61 -92 -99 -133 -38 -40 -66 -76 -64 -79 3 -3 82 45
                174 105 93 60 223 144 289 186 282 179 380 245 380 256 0 15 4 12 -364 206
                -325 170 -344 181 -836 440 -350 184 -431 223 -500 242 -46 13 -108 13 -147 1z"/>
           </g>
           </svg>
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 text-sm font-medium text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input placeholder="email" id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-ui-inputs.password placeholder="password" id="password" class="block w-full mt-1" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:text-opacity-50 focus:text-red-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-4 text-white bg-red-500">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
