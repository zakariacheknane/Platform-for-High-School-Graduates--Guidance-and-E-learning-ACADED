<x-guest-layout>
    <x-jet-authentication-card>
      

        <x-jet-validation-errors class="mb-4" />
        
        <div class="w3-container " style="height:50px;  margin-top:20px;margin-bottom:20px;">
    <h5 style="margin-top:10px;">INSCRIVEZ-VOUS</h5>
  </div>

        <form class="w3-container" method="POST" action="{{ route('register') }}" x-data="{role_id: 2}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Nom et prenom:') }}" />
                <x-jet-input id="name"  class="w3-input w3-border" style="margin-top:15px; " type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div >
                <x-jet-label for="email" value="{{ __('E-mail') }}" />
                <x-jet-input id="email" class="w3-input w3-border" style="margin-top:15px; " type="email" name="email" :value="old('email')" required />
            </div>

            <div >
                <x-jet-label for="password" value="{{ __('Mot de passe') }}" />
                <x-jet-input id="password" class="w3-input w3-border" style="margin-top:15px; " type="password" name="password" required autocomplete="new-password" />
            </div>

            <div >
                <x-jet-label for="password_confirmation" value="{{ __('Confirmer le mot de passe') }}" />
                <x-jet-input id="password_confirmation" class="w3-input w3-border" style="margin-top:15px; " type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div >
                <x-jet-label for="role_id" value="{{ __('Sinscrire autant que:') }}" />
                <select name="role_id" x-model="role_id" class="w3-input w3-border" style="margin-top:15px;">
                    <option value="2">Etudiant</option>
                    <option value="3">Professeur</option>
                </select>
            </div>

            <div  x-show="role_id == 2">
                <x-jet-label for="student_filiere" value="{{ __('Filiere') }}" />
                <x-jet-input id="student_filiere" class="w3-input w3-border" style="margin-top:15px; "  type="text" :value="old('student_filiere')" name="student_filiere" />
            </div>

            <div  x-show="role_id == 2">
                <x-jet-label for="student_etablissement" value="{{ __('Etablissement') }}" />
                <x-jet-input id="student_etablissement" class="w3-input w3-border" style="margin-top:15px; " type="text" :value="old('student_etablissement')" name="student_etablissement" />
   
            <div  x-show="role_id == 3">
                <x-jet-label for="teacher_speciality" value="{{ __('Specialite') }}" />
                <x-jet-input id="teacher_speciality" class="w3-input w3-border" style="margin-top:15px; " type="text" :value="old('teacher_speciality')" name="teacher_speciality" />
            </div>
            <div  x-show="role_id == 3">
                <x-jet-label for="teacher_N°PPR" value="{{ __('N°PPR') }}" />
                <x-jet-input id="teacher_N°PPR" class="w3-input w3-border" style="margin-top:15px; " type="text" :value="old('teacher_N°PPR')" name="teacher_N°PPR" />
            </div>

       

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div >
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div >
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="w3-container" style="margin-top:15px">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Deja inscris?') }}
                </a>

                <x-jet-button style="margin-top:15px;width:400px;background-color:#ab3793;border-radius:30px; border-style:solid;
                                  border-width:3px;">
                   <h2 style="font-family: 'Signika', sans-serif;font-size:10pt;margin-left:130px;">{{ __('S\'inscrire') }}</h2>
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>