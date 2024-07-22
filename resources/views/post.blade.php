
@if (auth()->check())
                                    <!-- User is authenticated -->
                                    <?php
                                    $id = auth()->user()->id;
                                    
                                    if (empty($id)) {
                                        return redirect('login'); // You cannot use 'return' like this in a Blade view.
                                    } else {
                                        $checkUser = DB::table('verifedaccounts')->where('usersid', $id)->first();
                                    }
                                    ?>
                                                                @if ($checkUser)

<x-app-layout>

      <main class="main">
       
        <section class="mt-50 mb-50">
            <div class="container">
                
                <div class="row">
                    <div class="col-12">
                        <div class="divider mt-50 mb-50"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-25">
                            <h4>Post </h4>
                        </div>


                        <form method="POST" action="{{ url('createpro') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="usersid" value="{{ Auth::user()->id }}" >
                        
                            <div class="form-group">
                                <label>Product Name</label>
                                <input class="form-control" type="text" placeholder="Product name" name="productname" />
                            </div>
                            <div class="form-group">
                                <label>New Price</label>
                                <input class="form-control" type="number" name="newprice" />
                            </div>
                        
                            <div class="form-group">
                                <label>Old Price</label>
                                <input class="form-control" type="number" name="oldprice" />
                            </div>
                        
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Type of Product:</label>
                                <div class="col-sm-12 col-md-10">
                                    <select id="product-type" name="producttype" class="form-control">
                                        <option selected="">Choose...</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>


                                    
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label>Information of Products </label>
                                <textarea class="form-control" name="information"></textarea>
                            </div>
                        
                            <div class="form-group">
                                <label>Product Picture</label>
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" />
                                    <label class="custom-file-label">Product Picture</label>
                                </div>
                            </div>
                        
                            
                        
                            <!-- Your previous form fields go here -->
                            
                          
                        
                            <div class="input-group mb-0">
                                <button class="btn btn-primary btn-lg btn-block">Post</button>
                            </div>
                        </form>
                        
                    </div>
                  
                </div>
            </div>
        </section>
    </main>

   
    @include('footer')
   
</x-app-layout>

@else
@endif
@else
<!-- User is not authenticated -->
@include('update');
@endif