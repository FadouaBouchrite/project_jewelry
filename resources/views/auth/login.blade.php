<style>
    body, html {
        height: 100%;
        margin: 0;
        padding: 0;
    }
    
    .cc {
        display: flex;
        display: block;
        text-align: center;
        justify-content: center;
        align-items: center;
        height: 100%;
        background-image: url('/home/images/back.jpg');
        background-size: cover;
        background-position: center;
    }

    .cc form {
     display: flex;
        display: block;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 5px;
        width: 400px;
        max-width: 100%;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
    }

    .cc form input[type="email"],
    .cc form input[type="password"] {
        display: flex;
        display: block;
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .cc form button {
        display: flex;
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
    <form class="cc" style="padding-left: 40%;padding-top:10%;" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label for="email" >Email</label>
            <x-input id="email"  type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
        </div>

        <div class="form-group">
            <label for="password" >Password</label>
            <x-input id="password" type="password" name="password" required autocomplete="current-password" />
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="flex items-center">
                <x-checkbox id="remember_me" name="remember" />
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-button class="ml-4">
                {{ __('Log in') }}
            </x-button>
        </div>
    </form>
</div>
