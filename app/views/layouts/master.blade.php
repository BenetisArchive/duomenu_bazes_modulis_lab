<!doctype html>
<html>
	<head>
		{{ HTML::style('css/bootstrap.min.css') }}
		{{ HTML::style('css/bootstrap-theme.min.css') }}
		{{ HTML::style('css/style.css') }}
	</head>
    <body>
    	<nav class="navbar navbar-default">
			@section('navigation')
			<ul class="nav navbar-nav">
	        	<li><a href="/savininkai/">Savininkai</a></li>
	    		<li><a href="/gamintojai/">Gamintojai</a></li>
                <li><a href="/automodeliai/">Auto modeliai</a></li>
                <li><a href="/tech_apziura/">Technine apziura</a></li>
                <li><a href="/registruoti_auto/">Registruoti automobiliai</a></li>
                <li><a href="/imokos/">Imokos</a></li>
                <li><a href="/imokos_uz_auto/">Imokos uz auto</a></li>
	    		<li><a href="/imokosataskaita/">Imoku ataskaita</a></li>
    		</ul>
        	@show
    	</nav>
        <div class="container">
            @yield('content')
        </div>
    </body>
    	{{ HTML::script('js/bootstrap.min.js') }}
    	{{ HTML::script('js/gui.js') }}
</html>