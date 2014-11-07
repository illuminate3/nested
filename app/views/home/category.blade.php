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



<div id="menuh1">
{{-- $itemsHelper->htmlList() --}}
</div>





</div>