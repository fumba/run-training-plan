<html>
<head>
<title>@yield('title')</title>

<!-- Material Design fonts -->
<link rel="stylesheet" type="text/css"
	href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">
<link rel="stylesheet" type="text/css"
	href="//fonts.googleapis.com/icon?family=Material+Icons">

<!-- Bootstrap -->
<link rel="stylesheet" type="text/css"
	href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

<!-- Bootstrap Material Design -->
<link rel="stylesheet" type="text/css"
	href="/css/bootstrap-material-design.min.css">
<link rel="stylesheet" type="text/css" href="/css/ripples.min.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="/css/font-awesome.css">

<!-- Boostrap Touchspin -->
<link rel="stylesheet" href="/css/jquery.bootstrap-touchspin.css">

<!-- Custom CSS -->
<link rel="stylesheet" href="/css/custom.css">


<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
<script src="/js/jquery.bootstrap-touchspin.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">


</head>
<body>

	@include('shared.navbar') @yield('content') @include('shared.footer')


	<script
		src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>

	<script src="/js/ripples.min.js"></script>
	<script src="/js/material.min.js"></script>

	<script src="/js/custom.js"></script>

	<script>
    $(document).ready(function() {
        // This command is used to initialize some elements and make them work properly
        $.material.init();
    });

    window.setTimeout(function() {
    	$("#alert_message").fadeTo(500, 0).slideUp(500, function() {
    		$(this).remove();
    	});
    }, 2500);
</script>
</body>

</html>