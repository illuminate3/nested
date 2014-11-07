<!DOCTYPE html>
<html>
<head>
		<title>{{{ $title }}}</title>
@section('head')
<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/plugins/metisMenu/metisMenu.min.css') }}">
<link rel="stylesheet"  href="{{ asset('font-awesome-4.1.0/css/font-awesome.min.css') }}" type="text/css">

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
@if (isset($menu2))
	{{ HTML::navy($menu2) }}
@endif

<br>
<br>

MainNavigation --------------------------------------------------------
{{-- $PrimaryNavigation --}}

<nav class="sidebar-nav11">
<ul class="metisMenu11">
{{-- $itemsHelper->htmlList() --}}
</ul>
</nav>

<!--
<div id='cssmenu'>
<ul>
   <li class='active'><a href='#'><span>Home</span></a></li>
   <li class='has-sub'><a href='#'><span>Products</span></a>
      <ul>
         <li><a href='#'><span>Product 1</span></a></li>
         <li><a href='#'><span>Product 2</span></a></li>
         <li class='last'><a href='#'><span>Product 3</span></a></li>
      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>About</span></a>
      <ul>
         <li><a href='#'><span>Company</span></a></li>
         <li class='last'><a href='#'><span>Contact</span></a></li>
      </ul>
   </li>
   <li class='last'><a href='#'><span>Contact</span></a></li>
</ul>
</div>
-->

<br>
<br>
Admin Categories --------------------------------------------------------
<br>
{{--
@if (isset($exploreNested) && !empty($exploreNested))
	@foreach ($exploreNested as $item)
{{ $item->id }} --- {{ $item->slug }} --{{ $item->depth }}
<br>
	@endforeach
@endif
--}}


<br>
<br>
pullDown --------------------------------------------------------
<!--
<nav class="sidebar-nav">
<ul id="metisMenu">
	<li class="active">
		<a href="#">
		<span class="sidebar-nav-item-icon fa fa-github fa-lg"></span>
		<span class="sidebar-nav-item">metisMenu</span>
		<span class="fa arrow"></span>
		</a>
		<ul class="collapse in">
			<li>
				<a href="https://github.com/onokumus/metisMenu">
				<span class="sidebar-nav-item-icon fa fa-code-fork"></span>
				LEVEL 1
				</a>
			</li>
			<li>
				<a href="#">
				<span class="sidebar-nav-item-icon fa fa-code-fork"></span>
				LEVEL 1
				<span class="fa plus-minus"></span>
				</a>
				<ul class="collapse">
					<li><a href="#">item 2.1</a></li>
					<li><a href="#">item 2.2</a></li>
					<li><a href="#">item 2.3</a></li>
					<li><a href="#">item 2.4</a></li>
				</ul>
			</li>
		</ul>
	</li>
</ul>
</nav>
-->
{{--
@if (isset($pullDown) && !empty($pullDown))
<ul id="">
	<li>
	@foreach ($pullDown as $item)
@if ($item->depth == '0')
@else
	<li>
		{{ item_depth($item->depth) }}
		@if ($item->slug)
			<a href="{{ route('page', array('slug' => $item->slug)) }}">{{ $item->title }}--{{ $item->depth }}</a>
		@endif
	</li>

@endif
	@endforeach
	</li>
</ul>
@endif
--}}
{{--
<nav class="sidebar-nav">
<ul id="menu">
<li class="active">
  <a href="#">
	<span class="sidebar-nav-item-icon fa fa-github fa-lg"></span>
	<span class="sidebar-nav-item">metisMenu</span>
	<span class="fa arrow fa-2x"></span>
  </a>
  <ul class="collapse in">
	<li>
	  <a href="https://github.com/onokumus/metisMenu">
		<span class="sidebar-nav-item-icon fa fa-code-fork"></span>
		Fork
	  </a>
	</li>
	<li>
	  <a href="https://github.com/onokumus/metisMenu">
		<span class="sidebar-nav-item-icon fa fa-star"></span>
		Star
	  </a>
	</li>
	<li>
	  <a href="https://github.com/onokumus/metisMenu/issues">
		<span class="sidebar-nav-item-icon fa fa-exclamation-triangle"></span>
		Issues
	  </a>
	</li>
  </ul>
</li>
<li>
  <a href="#">Menu 0 <span class="fa arrow"></span></a>
  <ul class="collapse">
	  <li><a href="#">item 0.1</a></li>
	  <li><a href="#">item 0.2</a></li>
	  <li><a href="http://onokumus.com">onokumus</a></li>
	  <li><a href="#">item 0.4</a></li>
  </ul>
</li>
<li>
  <a href="#">Menu 1 <span class="glyphicon arrow"></span></a>
  <ul class="collapse">
	  <li><a href="#">item 1.1</a></li>
	  <li><a href="#">item 1.2</a></li>
	  <li>
		  <a href="#">Menu 1.3 <span class="fa plus-times"></span></a>
		  <ul class="collapse">
			  <li><a href="#">item 1.3.1</a></li>
			  <li><a href="#">item 1.3.2</a></li>
			  <li><a href="#">item 1.3.3</a></li>
			  <li><a href="#">item 1.3.4</a></li>
			  <li>
				  <a href="#">Menu 1.3.5 <span class="fa plus-minus"></span></a>
				  <ul class="collapse">
					  <li><a href="#">item 1.3.5.1</a></li>
					  <li><a href="#">item 1.3.5.2</a></li>
					  <li><a href="#">item 1.3.5.3</a></li>
					  <li><a href="#">item 1.3.5.4</a></li>
					  <li>
						  <a href="#">Menu 1.3.5.5 <span class="fa plus-minus"></span></a>
						  <ul class="collapse">
							  <li><a href="#">item 1.3.5.5.1</a></li>
							  <li><a href="#">item 1.3.5.5.2</a></li>
							  <li><a href="#">item 1.3.5.5.3</a></li>
							  <li><a href="#">item 1.3.5.5.4</a></li>
						  </ul>
					  </li>
				  </ul>
			  </li>
		  </ul>
	  </li>
	  <li><a href="#">item 1.4</a></li>
	  <li>
		  <a href="#">Menu 1.5 <span class="fa plus-minus"></span></a>
		  <ul class="collapse">
			  <li><a href="#">item 1.5.1</a></li>
			  <li><a href="#">item 1.5.2</a></li>
			  <li><a href="#">item 1.5.3</a></li>
			  <li><a href="#">item 1.5.4</a></li>
		  </ul>
	  </li>
  </ul>
</li>
<li>
  <a href="#">Menu 2 <span class="glyphicon arrow"></span></a>
  <ul class="collapse">
	  <li><a href="#">item 2.1</a></li>
	  <li><a href="#">item 2.2</a></li>
	  <li><a href="#">item 2.3</a></li>
	  <li><a href="#">item 2.4</a></li>
  </ul>
</li>
</ul>
</nav>
--}}


		</div>

		<footer class="main-footer container">
		    <div class="col-md-2">&copy; <a href="http://github.com/lazychaser" target="_blank">Aleksander Kalnoy</a></div>
		    <div class="col-md-10">
		        <p>This is a demonstration of <a href="http://github.com/lazychaser/laravel4-nestedset" target="_blank">Nested Set Model</a> for <a href="http://laravel.com" target="_blank">Laravel 4</a></p>
		    </div>
		</footer>

<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/plugins/metisMenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('js/sb-admin-2.js') }}"></script>

<script>
	$(function () {
		$('#menu').metisMenu();
	});
</script>

		@yield('footer')
</body>
</html>
