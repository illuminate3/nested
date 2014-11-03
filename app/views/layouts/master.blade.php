<!DOCTYPE html>
<html>
<head>
    <title>{{{ $title }}}</title>
@section('head')
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@show
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Nested Set</a>
            </div>

            <div class="container collapse navbar-collapse" id="nav-collapse">
            @yield('menu')
            </div>
        </div>
    </nav>


    <div class="container">
@if (isset($breadcrumbs) && !empty($breadcrumbs))
        <ul class="breadcrumb">
    @foreach ($breadcrumbs as $label => $url)
        @if (is_numeric($label))
            <li class="active">{{{ $url }}}</li>
        @else
            <li><a href="{{ $url }}">{{{ $label }}}</a></li>
        @endif
    @endforeach
@endif

        </ul>
        @yield('content')

@if (isset($pullDown) && !empty($pullDown))
@foreach ($pullDown as $item)
<ul>

@if ( $item->depth == 0 )
@else
	<li>
		{{ item_depth($item->depth) }}
		@if ($item->slug)
			<a href="{{ route('page', array('slug' => $item->slug)) }}">{{ $item->title }}</a>
		@endif
		--{{ $item->depth }}
	</li>
@endif

</ul>
@endforeach
@endif


{{-- $MainNavigation --}}
{{-- $FooterNavigation --}}

<div id="menuh-container">
<div id="menuh">
	<ul>
		<li><a href="#" class="top_parent">Item 1</a>
		<ul>
			<li><a href="#">Sub 1:1</a></li>
			<li><a href="#" class="parent">Sub 1:2</a>
				<ul>
				<li><a href="#">Sub 1:2:1</a></li>
				<li><a href="#">Sub 1:2:2</a></li>
				<li><a href="#">Sub 1:2:3</a></li>
				<li><a href="#">Sub 1:2:4</a></li>
				</ul>
			</li>
			<li><a href="#">Sub 1:3</a></li>
			<li><a href="#" class="parent">Sub 1:4</a>
				<ul>
				<li><a href="#">Sub 1:4:1</a></li>
				<li><a href="#">Sub 1:4:2</a></li>
				<li><a href="#">Sub 1:4:3</a></li>
				<li><a href="#">Sub 1:4:4</a></li>
				</ul>
			</li>
			<li><a href="#" class="parent">Sub 1:5</a>
				<ul>
				<li><a href="#">Sub 1:5:1</a></li>
				<li><a href="#">Sub 1:5:2</a></li>
				<li><a href="#">Sub 1:5:3</a></li>
				<li><a href="#">Sub 1:5:</a></li>
				<li><a href="#">Sub 1:5:5</a></li>
				</ul>
			</li>
		</ul>
		</li>
	</ul>
	
	<ul>	
		<li><a href="#" >Item 2</a></li>
	</ul>
		
		... repeat and alter the list as needed 
	
</div> 	<!-- end the menuh-container div -->  
</div>	<!-- end the menuh div --> 

    </div>

    <footer class="main-footer container">
        <div class="col-md-2">&copy; <a href="http://github.com/lazychaser" target="_blank">Aleksander Kalnoy</a></div>
        <div class="col-md-10">
            <p>This is a demonstration of <a href="http://github.com/lazychaser/laravel4-nestedset" target="_blank">Nested Set Model</a> for <a href="http://laravel.com" target="_blank">Laravel 4</a></p>
        </div>
    </footer>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    @yield('footer')
</body>
</html>
