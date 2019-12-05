<!DOCTYPE html>
<html lang="en">
<head>
<title>E-commerce Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="{{ URL('css/backend_css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ URL('css/backend_css/bootstrap-responsive.min.css') }}" />
<link rel="stylesheet" href="{{ URL('css/backend_css/select2.css') }}" />
<link rel="stylesheet" href="{{ URL('css/backend_css/uniform.css') }}" />
<link rel="stylesheet" href="{{ URL('css/backend_css/fullcalendar.css') }}" />
<link rel="stylesheet" href="{{ URL('css/backend_css/matrix-style.css') }}" />
<link rel="stylesheet" href="{{ URL('css/backend_css/matrix-media.css') }}" />
<link rel="stylesheet" href="{{ asset('css/backend_css/sweetalert.css') }}" /> <!-- //sweetalert -->
<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css"></script> <!-- //sweetalert -->
<link href="{{ URL('css/backend_css/font-awesome.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ URL('css/backend_css/jquery.gritter.css') }}" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>


</head>
<body>

@include('layouts.adminLayout.admin_header')

@include('layouts.adminLayout.admin_sidebar')

@yield('content')

@include('layouts.adminLayout.admin_footer')



<script src="{{ URL('js/backend_js/jquery.min.js') }} "></script> 

<!-- <script src="{{ URL('js/backend_js/jquery.ui.custom.js') }} "></script> --> 
<script src="{{ URL('js/backend_js/bootstrap.min.js') }} "></script> 
<script src="{{ URL('js/backend_js/jquery.uniform.js') }} "></script> 
<script src="{{ URL('js/backend_js/select2.min.js') }} "></script> 
<script src="{{ URL('js/backend_js/jquery.validate.js') }} "></script> 
<script src="{{ URL('js/backend_js/jquery.dataTables.min.js') }} "></script> 
<script src="{{ URL('js/backend_js/matrix.js') }} "></script> 
<script src="{{ URL('js/backend_js/matrix.form_validation.js') }} "></script>
<script src="{{ URL('js/backend_js/main.js') }} "></script>
<script src="{{ URL('js/backend_js/matrix.tables.js') }}"></script>
<script src="{{ URL('js/backend_js/matrix.popover.js') }}"></script>
<!-- <script src="{{ URL('js/backend_js/matrix.popover.js') }}"></script> -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



<!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->

<script src="{{ asset('js/backend_js/sweetalert.min.js') }}"></script> <!-- //sweetalert -->x
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script><!-- //sweetalert --> 


<script type="text/javascript">
	$(document).ready(function(){
		// alert('admin_design');
			
	});
	

</script>
    
</body>
</html>
