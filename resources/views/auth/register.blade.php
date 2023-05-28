<style>
    body, html {
        height: 100%;
        margin: 0;
        padding: 0;
    }
    
    .cc {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        background-image: url('/home/images/back.jpg');
        background-size: cover;
        background-position: center;
    }

    .cc form {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 5px;
        width: 400px;
        max-width: 100%;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
    }

    .cc form input[type="email"],
    .cc form input[type="password"],
    .cc form input[type="name"],
    .cc form input[type="phone"],
    .cc form input[type=""]
     {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .cc form button {
        display: block;
        width: 100%;
        padding: 10px;
        background-color: #4a5568;
        color: #ffffff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .cc form .form-group {
        display: grid;
        grid-template-columns: 1fr;
        grid-gap: 10px;
    }
</style>

<div class="cc">
<form method="POST" action="{{ route('register') }}">
            @csrf

          

            <div class="form-group">
            <label for="name" >Name</label>
            <x-input id="name"  type="text" name="name" :value="old('name')" />
        </div>
            <div class="form-group">
            <label for="phone" >PHONE</label>
            <x-input id="phone"  type="text" name="phone" :value="old('phone')" />
        </div>
            <div class="form-group">
            <label for="email" >Address</label>
            <x-input id="address"  type="text" name="address" :value="old('address')" />
        </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>






            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
</div>