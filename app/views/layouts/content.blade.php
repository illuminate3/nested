@if (Session::has('message'))
	<div class="row">
		{{ Session::get('message') }}
	</div>
@endif
@if (Session::has('success'))
	<div class="row">
		{{ Session::get('success') }}
	</div>
@endif

{{-- Display some alerts --}}
@foreach (array('error', 'warning', 'success') as $key)
	@if (Session::has($key))
	<div class="alert alert-dismissable alert-{{ $key === 'error' ? 'danger' : $key }}">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		{{ Session::get($key) }}
	</div>
	@endif
@endforeach


@if (isset($breadcrumbs) && !empty($breadcrumbs))
<div class="row">
	<ul class="breadcrumb">
	@foreach ($breadcrumbs as $label => $url)
		@if (is_numeric($label))
			<li class="active">{{{ $url }}}</li>
		@else
			<li><a href="{{ $url }}">{{{ $label }}}</a></li>
		@endif
	@endforeach
	</ul>
	<hr>
</div>
@endif


@yield('content')
{{ $content }}

{{-- $items --}}

@if (isset($menu2))
	{{ HTML::navclean($menu2) }}
@endif
