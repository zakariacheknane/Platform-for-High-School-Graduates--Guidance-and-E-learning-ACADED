
<nav x-data="{ open: false }" class="w3-top w3-white" style="margin-top:120px;">
    <div class="navmenu">
        <div class="flex justify-between h-16" id="menu">
            <div class="flex" style="margin-top:20px;">
                

                <!-- Navigation Links -->
                <div  >
                    <div  style="font-size:16pt;width:300px;margin-top:-10px;padding:10px;float:left;">
            <div class="flex items-center px-4" >
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class=" text-gray-800" style="font-size:12pt;">{{ Auth::user()->name }}</div>
                    <div class=" text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div></div></div>
                
            
                  @can('manage-users')
                      <x-jet-nav-link  style="font-size:13pt;width:170px;margin:10px;padding:10px;border-right:solid;" href="{{route('profile.show')}}" :active="request()->routeIs('profile.show')">
                        {{ __('Parametres de profile') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link style="font-size:13pt;width:120px;margin:10px;padding:10px;border-right:solid;" href="{{ route('admin.users.teachers') }}" :active="request()->routeIs('admin.users.teachers')">
                        {{ __('Professeurs') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link style="font-size:13pt;width:120px;margin:10px;padding:10px;border-right:solid;" href="{{ route('admin.users.students') }}" :active="request()->routeIs('admin.users.students')">
                        {{ __('Etudiants') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link style="font-size:13pt;width:80px;margin:10px;padding:10px;border-right:solid;" href="{{ route('admin.cours.allcours') }}" :active="request()->routeIs('admin.cours.allcours')">
                        {{ __(' Cours') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link style="font-size:13pt;width:120px;margin:10px;padding:10px;border-right:solid;" href="{{ route('admin.orientation.allorient') }}" :active="request()->routeIs('admin.orientation.allorient')">
                        {{ __(' Orientation') }}
                    </x-jet-nav-link>
                   <x-jet-nav-link style="font-size:13pt;width:150px;padding:10px;margin:10px;border-right:solid;" href="{{ route('admin.comment') }}" :active="request()->routeIs('admin.comment')">
                        {{ __('Commentaires') }}
                    </x-jet-nav-link>
                 
                   
                    
                    @endif

                    @if (auth()->user()->role_id == 2)
                        <x-jet-nav-link style="font-size:13pt;width:180px;padding:10px;margin:10px;border-right:solid;" href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                            {{ __('Parametres de profile') }}
                        </x-jet-nav-link>
                      
                    @endif

                    @if (auth()->user()->role_id == 3)
                    <x-jet-nav-link style="font-size:13pt;width:180px;padding:10px;margin:10px;border-right:solid;" href="{{route('profile.show')}}" :active="request()->routeIs('profile.show')">
                        {{ __('Parametres de profile') }}
                    </x-jet-nav-link>
                        <x-jet-nav-link style="font-size:13pt;width:120px;padding:10px;margin:10px;border-right:solid;" href="{{ route('teacher.mycourses') }}" :active="request()->routeIs('teacher.mycourses')">
                            {{ __('Mes cours') }}
                        </x-jet-nav-link>
                    @endif
</div></div>


                <!-- Settings Dropdown -->
                <div style="margin-right:100px;">
                    <x-jet-dropdown  width="70">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">


                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                         @click.prevent="$root.submit();">
                                    {{ __('Deconnexion') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                </div>
            </div>


            </div>
        </div>
    </div>
</nav>


