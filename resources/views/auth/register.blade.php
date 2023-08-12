<wireui:scripts />
<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo" class="mb-0 bg-white">
            <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                width="100pt" height="60pt" viewBox="0 0 500.000000 1"
                preserveAspectRatio="xMidYMid meet">

           <g transform="translate(0.000000,320.000000) scale(0.100000,-0.100000)"
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

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="first_name" value="{{ __('First Name') }}" />
                <x-input id="first_name" class="block w-full mt-1" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="name" />
            </div>
            <div>
                <x-label for="middle_name" value="{{ __('Middle Name') }}" />
                <x-input id="middle_name" class="block w-full mt-1" type="text" name="middle_name" :value="old('middle_name')" autofocus autocomplete="name" />
            </div>
            <div>
                <x-label for="last_name" value="{{ __('Last Name') }}" />
                <x-input id="last_name" class="block w-full mt-1" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-ui-inputs.password id="password" class="block w-full mt-1" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-ui-inputs.password id="password_confirmation" class="block w-full mt-1" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4 bg-red-600">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
