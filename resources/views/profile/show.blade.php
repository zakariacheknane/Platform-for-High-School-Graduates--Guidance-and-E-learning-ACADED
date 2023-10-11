<x-app-layout>
<body style="margin-top:300px;">


    
<div>
    <div >
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <table class="table-auto">

  <!-- component -->
<div class="container mx-auto px-4 sm:px-8">
    <div class="py-8">
        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

@if (Laravel\Fortify\Features::canUpdateProfileInformation())
    @livewire('profile.update-profile-information-form')

    <x-jet-section-border />
@endif

@if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
    <div class="mt-10 sm:mt-0">
        @livewire('profile.update-password-form')
    </div>

    <x-jet-section-border />
@endif

@if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
    <div class="mt-10 sm:mt-0">
        @livewire('profile.two-factor-authentication-form')
    </div>

    <x-jet-section-border />
@endif



@if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
    <x-jet-section-border />

    <div class="mt-10 sm:mt-0">
        @livewire('profile.delete-user-form')
    </div>
@endif
</div> 
            </div>
        </div>
    </div>
</div>
</table>
        </div>
    </div>
</x-app-layout>
</body>
<style>
    a{
      font-family:righteous;
      font-size:18pt;
      text-decoration:none;
      color:#adc1e0;
    }
    </style>

