<x-app-layout>
  

	
	<div class="main-container">
		<div class="xs-pd-20-10 pd-ltr-20">
			<div class="row">
	
				@foreach ($products as $product) <!-- Use a different variable name -->
	
					<div class="col-md-4 mb-20">
						<a href="#" class="card-box d-block mx-auto pd-20 text-secondary">
							<div class="img pb-30">
								<img src="{{ asset('product/' . $product->image) }}" class="h-1/5" alt="" />
							</div>
							<div class="content">
								<h3 class="h4">{{ $product->productname }}</h3>
								<p class="max-width-200">
									{{ $product->oldprice }}
								
									<a href="" class="btn btn-primary">Place Order</a>
								</p>
								
							</div>
						</a>
					</div>
				@endforeach
	
			</div>
		</div>
	</div>
	
		<!-- welcome modal start -->
	
		<!-- welcome modal end -->
		<!-- js -->
		<script src="vendors/scripts/core.js"></script>
		<script src="vendors/scripts/script.min.js"></script>
		<script src="vendors/scripts/process.js"></script>
		<script src="vendors/scripts/layout-settings.js"></script>
		<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
		<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
		<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
		<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
		<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
		<script src="vendors/scripts/dashboard3.js"></script>
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