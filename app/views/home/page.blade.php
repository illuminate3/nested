<div class="row">
@if (isset($contents))
    <aside class="col-md-4">
        <section class="panel panel-default">
            <header class="panel-heading"><h3 class="panel-title">Contents</h3></header>
            <div class="panel-body">{{ HTML::nav($contents) }}</div>
        </section>
    </aside>
@endif

    <section class="col-md-8">
        <header class="page-header">
            <h1>{{ $page->title }}{{ $page->id }}</h1>
        </header>

        <article>{{ markdown($page->body) }}</article>
@if (isset($prev) || isset($next))
        <ul class="pager">
    @if (isset($prev))
            <li class="previous"><a href="{{ route('page', array($prev->slug)) }}">&larr; {{{ $prev->title }}}</a></li>
    @endif

    @if (isset($next))
            <li class="next"><a href="{{ route('page', array($next->slug)) }}">{{{ $next->title }}} &rarr;</a></li>
    @endif
        </ul>
@endif
    </section>


{{-- dd($page->sites) --}}

<div class="table-responsive">
<table class="table table-striped table-bordered" id="DataTable">
	<thead>
		<tr>
			<th>{{ trans('lingos::table.name') }}</th>
			<th>{{ trans('lingos::table.email') }}</th>
		</tr>
	</thead>

	<tbody>
		@foreach ($page->sites as $profile)
			<tr>
				<td>
					{{{ $profile->name }}}
				<td>
				<td>
					{{ $profile->description }}
				<td>
			</tr>
		@endforeach
	</tbody>
</table>
</div> <!-- ./responsive -->


</div>
