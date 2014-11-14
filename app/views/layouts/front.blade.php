@extends('layouts.master')

@section('menu')
    @if (isset($menu))
    <ul class="nav navbar-nav">
        @foreach ($menu as $item)
        <li @if(isset($item['active']) && $item['active'])class="active"@endif>
            <a href="{{ $item['url'] }}">{{ $item['label'] }}</a>
        </li>
        @endforeach
    </ul>
    @endif

    <ul class="nav navbar-nav pull-right">
{{--
        <li>
            <a href="{{ route('pages.index') }}"><span class="glyphicon glyphicon-wrench"></span> Manage Pages</a>
        </li>
--}}
        <li>
            <a href="{{ route('items.index') }}"><span class="glyphicon glyphicon-wrench"></span> Items</a>
        </li>
        <li>
            <a href="{{ route('asset.index') }}"><span class="glyphicon glyphicon-wrench"></span> Assets</a>
        </li>
        <li>
            <a href="{{ route('asset_statuses.index') }}"><span class="glyphicon glyphicon-wrench"></span> asset_statuses</a>
        </li>
        <li>
            <a href="{{ route('rooms.index') }}"><span class="glyphicon glyphicon-wrench"></span> Rooms</a>
        </li>

        <li>
            <a href="{{ route('categories.index') }}"><span class="glyphicon glyphicon-wrench"></span> Manage Categories</a>
        </li>
    </ul>
@stop

@section('content')
	{{ $content }}



<br>

<div class="row">
	<div class="col-md-6">


Simple Menu --------------------------------------------------------
<br>
@if (isset($menu22))
	@foreach ($menu as $item)
		<a href="{{ $item['url'] }}">{{ $item['label'] }}</a>
<br>
	@endforeach
@endif

	</div>
	<div class="col-md-6">
HTML::nav(contents) --------------------------------------------------------
<br>
@if (isset($menu222))
	{{ HTML::navy($menu2) }}
@endif

	</div>
</div>

pullDown --------------------------------------------------------
<br>
{{-- HTML::pulldown($pullDown) --}}

@stop
