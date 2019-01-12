@extends('auth.main')

@section('content')

<div class="flex justify-center items-center mt-8 w-1/2 rounded">
    <div class="w-1/2 rounded">
        <div class="w-full flex justify-center items-center bg-tolet-yellow rounded">
          <img src="/img/tolet.jpg" class="h-48 w-48 rounded-full my-2">
        </div>
        <div class="w-full flex justify-center items-center bg-blue-lighter">
          <h3 class="uppercase leading-normal tracking-wide text-xl text-white py-4">{{ __('Reset Password') }}</h3>
        </div>
        <div class="w-full flex justify-center items-center bg-white">
          <form method="POST" action="{{ route('password.email') }}" class="bg-white rounded px-2 pt-2 pb-2 mb-4 w-5/6">
              @csrf
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="my-2 flex justify-center">
              <label class="block text-teal-darker text-2xl font-bold mb-2" for="password">
                {{ __('E-Mail Address') }}
              </label>              
            </div>
            <div class="mt-8 flex flex-col justify-around">
                <div class="my-2 bg-grey-lightest border-2 blue-lighter rounded">
                    <input class="outline-0 py-6 text-black text-2xl font-semi-bold text-center {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" type="email" required>
                </div>

                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                
                <button type="submit" class="btn bg-green text-white font-bold">
                    {{ __('Reset Password') }}
                </button>

          </form>
        </div>
    </div>
</div>
@endsection
