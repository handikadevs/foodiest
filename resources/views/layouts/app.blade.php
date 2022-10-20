<!DOCTYPE html>
<html lang="en" class="no-js">
	@include('layouts.header')

	<body>
		@include('layouts.navbar')

		<main class="u-main py-4" role="main">
			@guest
			@else
				@include('layouts.sidebar')
			@endguest
				<div class="u-content">
					@yield('content')
				</div>
		</main>

		<!-- Global Vendor -->
		<script src="{{ asset('cms') }}/assets/vendor/jquery/dist/jquery.min.js"></script>
		<script src="{{ asset('cms') }}/assets/vendor/jquery-migrate/jquery-migrate.min.js"></script>
		<script src="{{ asset('cms') }}/assets/vendor/popper.js/dist/umd/popper.min.js"></script>
		<script src="{{ asset('cms') }}/assets/vendor/bootstrap/bootstrap.min.js"></script>

		<!-- Plugins -->
		<script src="{{ asset('cms') }}/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
		<script src="{{ asset('cms') }}/assets/vendor/chart.js/dist/Chart.min.js"></script>

		<!-- Initialization  -->
		<script src="{{ asset('cms') }}/assets/js/sidebar-nav.js"></script>
		<script src="{{ asset('cms') }}/assets/js/main.js"></script>
		<script src="{{ asset('cms') }}/assets/js/dashboard-page-scripts.js"></script>
	</body>
</html>