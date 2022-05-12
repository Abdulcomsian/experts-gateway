<!-- jQuery -->
<script src="{{asset('assets/js/jquery.min.js') }}"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="{{asset('assets/js/popper.min.js') }}"></script>
		<script src="{{asset('assets/js/bootstrap.min.js') }}"></script>
		<!-- Select2 JS -->
		<script src="{{asset('assets/plugins/select2/js/select2.min.js') }}"></script>
		<!-- Datetimepicker JS -->
		<script src="{{asset('assets/js/moment.min.js') }}"></script>
		<script src="{{asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
		<script src="{{asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
		<!-- Owl Carousel -->
		<script src="{{asset('assets/js/owl.carousel.min.js') }}"></script>		
		<!-- Sticky Sidebar JS -->
        <script src="{{asset('assets/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>
        <script src="{{asset('assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
		<!-- Circle Progress JS -->
		<!-- <script src="assets/js/circle-progress.min.js"></script> -->
		<!-- Custom JS -->
		<script src="{{asset('assets/js/script.js') }}"></script>
		@if(Route::is(['map-grid','map-list']))
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6adZVdzTvBpE2yBRK8cDfsss8QXChK0I"></script>
		<script src="{{asset('assets/js/map.js') }}"></script>
		@endif

		@toastr_js
		@toastr_render	