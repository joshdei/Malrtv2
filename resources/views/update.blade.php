@if (auth()->check())
    <?php
        $id = auth()->user()->id;
        $checkUser = DB::select('select * from verifedaccounts where usersid = ?', [$id]);

        if (!empty($checkUser)) {
            return redirect()->route('admin');
        }
    ?>

    <x-app-layout>
        
        <main class="main">
                
            <section class="pt-50 pb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-10 m-auto">
                            <div class="contact-from-area padding-20-row-col wow FadeInUp">
                                <h3 class="mb-10 text-center">Upgrade to be a seller</h3>
                                <form class="contact-form-style text-center" id="contact-form" method="POST" action="{{ route('create') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="usersid" value="{{ Auth::user()->id }}" >
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="input-style mb-20">
                                                <label>NIN Number</label>
                                                <input type="number"
                                                       placeholder="33987598734958734"
                                                       name="nin"
                                                       value="{{ old('nin') }}" <!-- This will retain the old input value after a failed submission -->
                                                >
                                                @error('nin')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                
                                        <div class="col-lg-6 col-md-6">
                                            <div class="input-style mb-20">
                                                <label>Whatsapp Number</label>
                                                <input name="whatsapp"
                                                       type="number"
                                                       value="{{ old('whatsapp') }}"
                                                />
                                                @error('whatsapp')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                
                                        <div class="col-lg-6 col-md-6">
                                            <div class="input-style mb-20">
                                                <label>State</label>
                                                <input type="text"
                                                       name="state"
                                                       value="{{ old('state') }}"
                                                />
                                                @error('state')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                
                                        <div class="col-lg-6 col-md-6">
                                            <div class="input-style mb-20">
                                                <label>LGA</label>
                                                <input type="text"
                                                       name="lga"
                                                       value="{{ old('lga') }}"
                                                />
                                                @error('lga')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                
                                        <div class="col-lg-6 col-md-6">
                                            <div class="input-style mb-20">
                                                <label>Profile Picture</label>
                                                <input type="file"
                                                       name="image"
                                                />
                                                @error('image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                
                                        <div class="col-lg-6 col-md-6">
                                            <div class="input-style mb-20">
                                                <label>Nin Picture</label>
                                                <input type="file"
                                                       name="ninpic"
                                                />
                                                @error('ninpic')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                
                                        <div class="col-lg-12 col-md-12">
                                            <div class="input-style mb-20">
                                                <label>Address</label>
                                                <input type="text"
                                                       name="address"
                                                       value="{{ old('address') }}"
                                                />
                                                @error('address')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                
                                        <div class="col-lg-12 col-md-12">
                                            <button class="submit submit-auto-width" type="submit">Upgrade</button>
                                        </div>
                                    </div>
                                </form>
                                
                                <p class="form-messege"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            </main>

        </x-app-layout>
        @else
        @php
            return redirect()->route('admin');
        @endphp
    @endif