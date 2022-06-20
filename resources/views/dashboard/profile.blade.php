<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('profile') }}">
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

                        @if (Auth::user()->dj != null)
                            <!-- Genres -->
                            <div class="mt-4">
                                <x-label for="lastname" :value="__('Genres')" />

                                <select name="lastname" id="lastname">
                                    @foreach ($genres as $genre)
                                        <option value="{{ $genre->id }}">{{ $genre->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
            
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Save') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
