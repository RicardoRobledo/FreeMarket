<x-guest-layout>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <div class="container">
            <x-slot name="logo">

        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ session('status') }}
        </div>
        @endif
        <div class="container">
            
            <div class="row justify-content-center mt-5">
                <div class="col-lg-6">
                    <div class="card text-dark">
                        <div class="card-header">
                            <h3 class="text-center">Log in</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div>
                                    <label for="email" value="{{ __('Email') }}">Email</label>
                                    <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                </div>

                                <div class="mt-4">
                                    <label for="password" value="{{ __('Password') }}" >Password</label>
                                    <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                                </div>


                                <div class="flex items-center justify-end mt-4">
                                    @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">You don't have an account?</a>
                                    @endif

                                    <button class="btn btn-primary">
                                        {{ __('Log in') }}
                                    </button>
                                </div>
                                <div class="flex items-center justify-end mt-4">
                                    {!! app('captcha')->display(['add-js' => false]) !!}
                                </div>
                            </form>
                            {!! app('captcha')->displayJs() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
        
</x-guest-layout>