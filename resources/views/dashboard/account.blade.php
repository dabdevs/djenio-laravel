<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Account') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @include('shared.alerts')
                    
                    <form method="POST" action="{{ route('account') }}">
                        @csrf
            
                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('Email')" />
            
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ Auth::user()->email }}" readonly />
                        </div>

                        <!-- Firstname-->
                        <div class="mt-4">
                            <x-label for="firstname" :value="__('Firstname')" />
            
                            <x-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" value="{{ Auth::user()->firstname }}"/>
                        </div>

                        <!-- Lastname-->
                        <div class="mt-4">
                            <x-label for="lastname" :value="__('Lastname')" />
            
                            <x-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" value="{{ Auth::user()->lastname }}"/>
                        </div>

                        <!-- Birthdate-->
                        <div class="mt-4">
                            <x-label for="birthdate" :value="__('Birthdate')" />
            
                            <select class="block mt-1 w-25" name="day">
                                @for ($i = 0; $i < ; $i++)
                                    
                                @endfor
                            </select>
                        </div>

                        @if (Auth::user()->dj != null)

                            @if ($dj_account_form_data != null)
                                <!-- Genres -->
                                <div class="mt-4">
                                    <x-label for="genres" :value="__('Genres you play')" />

                                    <select class="block mt-1 w-full" name="genres[]" id="genres" multiple>
                                        @foreach ($dj_account_form_data["genres"] as $genre)
                                            <option value="{{ $genre->id }}" @if(in_array($genre->id, Auth::user()->dj->genres->pluck("id")->toArray())) selected @endif>{{ $genre->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                        @endif

                        
            
                        <div class="flex items-center justify-start mt-4">
                            <x-button>
                                {{ __('Save') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
