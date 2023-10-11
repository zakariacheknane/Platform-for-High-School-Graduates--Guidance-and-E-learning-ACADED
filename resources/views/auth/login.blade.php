
<div >
<x-member-layout>
    <x-jet-authentication-card>
        <x-slot name="">
            <x-jet-authentication-card-logo />
        </x-slot>

        

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        
        <div class="w3-container " style="height:50px;  margin-top:20px;">
    <h5 style="margin-top:10px;">CONNECTEZ-VOUS</h5>
  </div>

 
        <form class="w3-container" method="POST" action="{{ route('login') }}">
            @csrf 

           
                <x-jet-label  style="margin-top:15px" for="email" value="{{ __('E-mail:') }}" />
                <x-jet-input id="E-mail" class="w3-input w3-border" style="margin-top:15px; " type="email" name="email" :value="old('email')" required autofocus />
            

           
                <x-jet-label  style="margin-top:15px" for="password" value="{{ __('Mot de passe:') }}" />
                <x-jet-input id="Mot de passe" class="w3-input w3-border" style="margin-top:15px; " type="password" name="password" required autocomplete="current-password" />
          

           
                <label  style="margin-top:15px" for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Se souvenir de moi') }}</span>
                </label>
           <x-jet-validation-errors  />

            <div class="w3-container" style="margin-top:15px">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Mot de passe oublié?') }}
                    </a>
                @endif

                <x-jet-button  style="margin-top:15px;width:400px;background-color:#ab3793;border-radius:30px; border-style:solid;
                                  border-width:3px;">
                   <h2 style="font-family: 'Signika', sans-serif;font-size:10pt;margin-left:120px;">{{ __('Se connecter') }}</h2>
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-member-layout></div>


