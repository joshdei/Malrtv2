
<x-app-layout>
       
    <main class="main single-page">
                  
        <section id="testimonials" class="section-padding">
            <div class="container pt-25">
                <div class="row mb-50">
                    <div class="col-lg-12 col-md-12 text-center">
                        <h6 class="mt-0 mb-10 text-uppercase  text-brand font-sm wow fadeIn animated"></h6>
                        <h2 class="mb-15 text-grey-1 wow fadeIn animated">Your order <br> is on the way</h2>
                        <div class="row mt-30">
                            <div class="col-12 text-center">
                                <p class="wow fadeIn animated">
                                    <a class="btn btn-brand text-white btn-shadow-brand hover-up btn-lg" href="{{route('admin')}}">Order more</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
              
            </div>
        </section>
      
    </main>
  

  @include('footer')



</x-app-layout>