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
                    
                    <form method="POST" action="{{ route('account-update') }}">
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

                        <!-- Gender -->
                        <div class="mt-4">
                            <x-label for="gender" :value="__('Gender')" />

                            <select class="block mt-1 w-full" name="gender" id="gender">
                                <option value="">{{ __('Select an option') }}</option>
                                <option value="M" @if(Auth::user()->gender == "M") selected @endif>{{ __('Male') }}</option>
                                <option value="F" @if(Auth::user()->gender == "F") selected @endif>{{ __('Female') }}</option>
                                <option value="O" @if(Auth::user()->gender == "O") selected @endif>{{ __('Other') }}</option>
                            </select>
                        </div>

                        <!-- Birthdate-->
                        <div class="mt-4">
                            <x-label for="birthdate" :value="__('Birthdate')" />

                            <x-input id="birthdate" class="block mt-1 w-full datepicker" type="text" name="birthdate" value="{{ date('d/m/Y', strtotime(Auth::user()->birthdate)) }}" />
                        </div>

                        <!-- Telephone-->
                        <div class="mt-4">
                            <x-label for="telephone" :value="__('Telephone')" />
            
                            <x-input id="telephone" class="block mt-1 w-full" type="text" name="telephone" value="{{ Auth::user()->telephone }}"/>
                        </div>

                        <!-- Country -->
                        <div class="mt-4">
                            <x-label for="country" :value="__('Country')" />

                            <select class="block mt-1 w-full" name="country" id="country" onchange="return getCities(this.value)">
                                @foreach ($dj_account_form_data["countries"] as $country)
                                    <option value="{{ $country->id }}" @if(in_array($country->id, Auth::user()->dj->countries == null ? [] : Auth::user()->dj->countries->pluck("id")->toArray())) selected @endif>{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- City -->
                        <div class="mt-4">
                            <x-label for="city" :value="__('City')" />

                            <select class="block mt-1 w-full" name="city" id="city">
                                @if(auth()->user()->city_id == null)
                                    <option value="">{{ __('Select an option') }}</option>
                                @else 
                                    <option value="{{ Auth::user()->city_id }}">{{ Auth::user()->city->name }}</option>
                                @endif
                            </select>
                        </div>

                        <!-- Address-->
                        <div class="mt-4">
                            <x-label for="address" :value="__('Address')" />

                            <textarea name="address" id="address" cols="30" rows="10" value="{{ Auth::user()->address }}" class="form-control"></textarea>
                        </div>

                        <!-- Genres -->
                        @if(Auth::user()->dj != null)
                        <div class="mt-4">
                            <x-label for="genres" :value="__('Genres you play')" />

                            <select class="block mt-1 w-full" name="genres[]" id="genres" multiple>
                                @foreach ($dj_account_form_data["genres"] as $genre)
                                    <option value="{{ $genre->id }}" @if(in_array($genre->id, Auth::user()->dj->genres == null ? [] : Auth::user()->dj->genres->pluck("id")->toArray())) selected @endif>{{ $genre->name }}</option>
                                @endforeach
                            </select>
                        </div>
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
