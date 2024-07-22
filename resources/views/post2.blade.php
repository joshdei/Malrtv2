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




  <div class="main-container">
      <div class="pd-ltr-20 xs-pd-20-10">
          <div class="min-height-200px">
              
          
  
              <!-- horizontal Basic Forms Start -->
              <div class="pd-20 card-box mb-30">
                  <div class="clearfix">
                      <div class="pull-left">
                          <h4 class="text-blue h4">Post Goods</h4>
                      </div>
                      
                  </div>
                      <form method="POST" action="{{ url('createpro') }}" enctype="multipart/form-data">
                          @csrf
                          <input type="hidden" name="usersid" value="{{ Auth::user()->id }}" >
               
                      <div class="form-group">
                          <label>Product Name</label>
                          <input
                              class="form-control"
                              type="text"
                              placeholder="33987598734958734"
                              name="productname"
                          />
                      </div>
                      <div class="form-group">
                          <label>New Price</label>
                          <input
                              class="form-control"
                              type="number"
                              name="newprice"
                          />
                      </div>
                      
                      <div class="form-group">
                          <label>Old Price</label>
                          <input
                              class="form-control"
                              type="number"
                              name="oldprice"
                          />
                      </div>


                   

                      <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Type of Product:</label>
                        <div class="col-sm-12 col-md-10">
                          <select id="product-type" name="producttype" class="custom-select col-12">
                            <option selected="">Choose...</option>
                            <option value="clothing">Clothing</option>
                            <option value="electronics">Electronics</option>
                            <option value="books">Books</option>
                            <option value="furniture">Furniture</option>
                            <option value="beauty">Beauty</option>
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
                        @error('image')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label>Product Video</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="provideo" />
                            <label class="custom-file-label">Video file</label>
                        </div>
                        @error('provideo')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    
  
                      <div class="input-group mb-0">
                          <!--
                          use code for form submit
                          <input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
                      -->
                          <button class="btn btn-primary btn-lg btn-block">Upgrade</button>
                      
                      </div>
                  </form>
                  
              </div>
              <!-- horizontal Basic Forms End -->
  
      
      
      </div>
  </div>
  
  <!-- welcome modal end -->
  <!-- js -->
  <script src="vendors/scripts/core.js"></script>
  <script src="vendors/scripts/script.min.js"></script>
  <script src="vendors/scripts/process.js"></script>
  <script src="vendors/scripts/layout-settings.js"></script>
  <!-- Google Tag Manager (noscript) -->
  <noscript
      ><iframe
          src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS"
          height="0"
          width="0"
          style="display: none; visibility: hidden"
      ></iframe
  ></noscript>
  <!-- End Google Tag Manager (noscript) -->
  </body>
  </html>
  
  
  </x-app-layout>
  
                                                                @else
                                                                 @endif
                                                            @else
                                                                <!-- User is not authenticated -->
                                                               @include('update');
                                                            @endif