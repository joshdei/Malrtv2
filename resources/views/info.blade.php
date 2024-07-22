
<x-app-layout>
    
    <main class="main">
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                 
                    <div class="col-lg-9">
                        <div class="product-detail accordion-detail">
                          
                            @include('proinfo')
                          
                            

                        @include("newproducts")                          
                        </div>
                    </div>

                   @include('primary-sidebar')
               
                </div>
            </div>
        </section>
    </main>

 
   @include('footer')


</x-app-layout>