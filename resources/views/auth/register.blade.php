




<x-app-layout>
    <main class="main">
  
     <section class="pt-150 pb-150">
         <div class="container">
             <div class="row">
                 <div class="col-lg-10 m-auto">
                     <div class="row">
                         <div class="col-lg-5">
                             <div class="login_wrap widget-taber-content p-30 background-white border-radius-10 mb-md-5 mb-lg-0 mb-sm-5">
                                 <div class="padding_eight_all bg-white">
                                     <div class="heading_s1">
                                         <h3 class="mb-30">Sign Up</h3>
                                     </div>
                                     <x-validation-errors class="mb-4" />

                                     <form method="POST" action="{{ route('register') }}">
                                         @csrf
                                     
                                         <div>
                                             <x-label for="name" value="{{ __('Full Name') }}" />
                                             <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                         </div>
                                     
                                         @error('name')
                                             <div class="error">{{ $message }}</div>
                                         @enderror
                                     
                                         <div class="mt-4">
                                             <x-label for="email" value="{{ __('Email') }}" />
                                             <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                         </div>
                                     
                                         @error('email')
                                             <div class="error">{{ $message }}</div>
                                         @enderror
                                     
                                         <div class="mt-4">
                                             <x-label for="tel" value="{{ __('Phone') }}" />
                                             <x-input id="tel" class="block mt-1 w-full" type="number" name="tel" :value="old('tel')" required autocomplete="+2332343421" />
                                         </div>
                                     
                                         @error('tel')
                                             <div class="error">{{ $message }}</div>
                                         @enderror
                                     
                                         <div class="mt-4">
                                             <x-label for="gender" value="{{ __('Gender') }}" />
                                             <select id="gender" class="form-select"  name="gender">
                                                 <option>Male</option>
                                                 <option>Female</option>
                                             </select>
                                         </div>

                                         
                                     
                                         @error('gender')
                                             <div class="error">{{ $message }}</div>
                                         @enderror
                                     
                                         <div class="mt-4">
                                             <x-label for="country" value="{{ __('Country') }}" />
                                             <select class="form-select" id="country" name="country">
                                                 <option>select country</option>
                                                 <option>Nigeria</option>
                                                 <!-- Add your country options here -->
                                             </select>
                                         </div>
                                     
                                         @error('country')
                                             <div class="error">{{ $message }}</div>
                                         @enderror
                                     
                                         <div class="mt-4">
                                             <x-label for="password" value="{{ __('Password') }}" />
                                             <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                                         </div>
                                     
                                         @error('password')
                                             <div class="error">{{ $message }}</div>
                                         @enderror
                                     
                                         <div class="mt-4">
                                             <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                             <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                                         </div>
                                     
                                         @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                             <div class="mt-4">
                                                 <x-label for="terms">
                                                     <div class="flex items-center">
                                                         <x-checkbox name="terms" id="terms" required />
                                     
                                                         <div class="ml-2">
                                                             {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                                     'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                                                     'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                                             ]) !!}
                                                         </div>
                                                     </div>
                                                 </x-label>
                                             </div>
                                         @endif
                                     
                                         <div class="flex items-center justify-end mt-4">
                                   
                                             <x-button class="ml-4">
                                                 {{ __('Register') }}
                                             </x-button>
                                         </div>
                                     </form>
                                     
                                     
                                     <div class="flex justify-between">
                                         <p class="mr-auto">
                                             <a class="text-muted" href="{{ route('login') }}">Login</a>
                                         </p>
                                         <p class="ml-auto">
                                             <a class="text-muted" href="#">Forgot password?</a>
                                         </p>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-1"></div>
                         <div class="col-lg-6">
                            <img src="assets/imgs/login.png">
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
 </main>

 @include('footer')

</x-app-layout>




