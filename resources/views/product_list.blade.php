
<x-app-layout>
    

<main class="main">
     
     <section class="product-tabs section-padding position-relative wow fadeIn animated">
      
         <div class="container">
           
             <!--End nav-tabs-->
             <div class="tab-content wow fadeIn animated" id="myTabContent">
                 <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                     <div class="row product-grid-4">

                    @include('search')
                     </div>
                     <!--End product-grid-4-->
                 </div>
               
             </div>
             <!--End tab-content-->
         </div>
     </section>
    
  
     
 </main>
   
   

@include('footer')


</x-app-layout>