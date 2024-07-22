


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    

  
    <x-slot name="header">
        <h1 class="flex items-center justify mt-4">Verfiy your account</h1>
      
    
        <form method="POST" action="{{ url('verfy') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('NIN') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="user_nin" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Passport') }}" />
                <x-input id="email" class="block mt-1 w-full" type="file" name="user_passport" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="name" value="{{ __('Address') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="user_address" :value="old('tel')" required autocomplete="+2332343421" />
            </div>
            
            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-slot>

</x-app-layout>
