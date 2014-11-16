<div class="row">
@if (isset($contents))
    <aside class="col-md-4">
        <section class="panel panel-default">
            <header class="panel-heading"><h3 class="panel-title">Contents</h3>: header</header>
            <div class="panel-body">{{ HTML::nav($contents) }}</div>
        </section>
    </aside>
@endif

    <section class="col-md-8">
        <header class="category-header">
            <h1>{{ $category->title }}; category ID ={{ $category->id }}</h1>
        </header>

        <article>{{ markdown($category->body) }}</article>
@if (isset($prev) || isset($next))
        <ul class="categoryr">
    @if (isset($prev))
            <li class="previous"><a href="{{ route('category', array($prev->slug)) }}">&larr; {{{ $prev->title }}}</a></li>
    @endif

    @if (isset($next))
            <li class="next"><a href="{{ route('category', array($next->slug)) }}">{{{ $next->title }}} &rarr;</a></li>
    @endif
        </ul>
@endif
    </section>
</div>


<div class="row">

<div id="menuh1">
{{-- $itemsHelper->htmlList() --}}
</div>

@if ($items->count())

<div class="table-responsive">
<table class="table table-striped table-bordered" id="DataTable">
	<thead>
		<tr>
			<th>ID</th>
			<th>make</th>
			<th>model</th>
			<th>model_number#</th>
			<th>description</th>
			<th>image</th>
			<th>Action</th>
		</tr>
	</thead>

	<tbody>
		@foreach ($items as $item)
			<tr>
				<td>{{{ $item->id }}}</td>
				<td>{{{ $item->make }}}</td>
				<td>{{{ $item->model }}}</td>
				<td>{{{ $item->model_number }}}</td>
				<td>{{{ $item->description }}}</td>
				<td>{{{ $item->image }}}</td>
				<td>
					{{ link_to_route('items.show', 'Information', array($item->id), array('class' => 'btn btn-info')) }}
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
</div> <!-- ./responsive -->

@endif




1111
{{--
@foreach ($category->items as $item)
--}}
@foreach ($items as $item)

{{ $item->make }}
22222
@endforeach
33333









</div>
