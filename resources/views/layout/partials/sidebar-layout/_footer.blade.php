@if(config('app.env') === 'local')


	<div id="kt_app_footer" class="app-footer" style="background-color: #808000">
		<div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
			<div class="text-white order-2 order-md-1">
				<label class="fw-bold fs-4">Copyright &copy; 2016, Kobelco Compressors (Thailand) Limited. ALL RIGHT RESERVED.</label>
			</div>
		</div>
	</div>
@else


	<div id="kt_app_footer" class="app-footer" style="background-color: #4d94ff">
		<div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
			<div class="text-white order-2 order-md-1">
				<label class="fw-bold fs-4">Copyright &copy; 2016, Kobelco Compressors (Thailand) Limited. ALL RIGHT RESERVED.</label>
			</div>
		</div>
	</div>

@endif