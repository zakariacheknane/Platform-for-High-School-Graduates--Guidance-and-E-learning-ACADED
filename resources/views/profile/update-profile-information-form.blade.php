<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Informations de profile') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Mettez à jour les informations de profil et l\'adresse e-mail de votre compte.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Nom et prenom') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('E-mail') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>
        @if (auth()->user()->role_id == 2)
        <div  class="col-span-6 sm:col-span-4">
                <x-jet-label for="student_filiere" value="{{ __('Filiere') }}" />
                <x-jet-input id="student_filiere" class="mt-1 block w-full"    type="text"  wire:model.defer="state.student_filiere" autocomplete="student_filiere"  />
            </div>

            <div  class="col-span-6 sm:col-span-4">
                <x-jet-label for="student_etablissement" value="{{ __('Etablissement') }}" />
                <x-jet-input id="student_etablissement" class="mt-1 block w-full"  type="text"  wire:model.defer="state.student_etablissement" autocomplete="student_etablissement" /></div>
                @endif
                @if (auth()->user()->role_id == 3)
            <div  class="col-span-6 sm:col-span-4">
                <x-jet-label for="teacher_speciality" value="{{ __('Specialite') }}" />
                <x-jet-input id="teacher_speciality" class="mt-1 block w-full"  type="text"  wire:model.defer="state.teacher_speciality" autocomplete="teacher_speciality"   />
            </div>
            <div  class="col-span-6 sm:col-span-4">
                <x-jet-label for="teacher_N°PPR" value="{{ __('N°PPR') }}" />
                <x-jet-input id="teacher_N°PPR" class="mt-1 block w-full"  type="text"  wire:model.defer="state.teacher_N°PPR" autocomplete="teacher_N°PPR"  />
            </div>
            @endif

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Sauvegarder') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
