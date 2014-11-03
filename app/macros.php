<?php

/**
 * Begin boostrap form group.
 * 
 * Checks whether field has errors.
 * 
 * @param string $name
 * 
 * @return string
 */
Form::macro('beginGroup', function ($name)
{
    $errors = View::shared('errors');

    $class = 'form-group';

    if ($errors->has($name)) $class .= ' has-error';

    return '<div class="'.$class.'">';
});

/**
 * End bootstrap form group.
 * 
 * Displays last error for a field if any.
 * 
 * @param string $name
 * 
 * @return string
 */
Form::macro('endGroup', function ($name)
{
    $html = '</div>';

    $errors = View::shared('errors');

    if ($errors->has($name))
    {
        $html = '<div class="col-lg-10 col-lg-offset-2"><span class="help-block">'.$errors->first($name).'</span></div>'.$html;
    }

    return $html;
});

/**
 * Simple macro for generating bootstrap icons.
 * 
 * @param string $icon
 */
HTML::macro('glyphicon', function ($icon)
{
    return '<span class="glyphicon glyphicon-'.$icon.'"></span>';
});

/**
 * Render multi-level navigation.
 *
 * @param  array  $data
 *
 * @return string
 */
HTML::macro('nav', function($data)
{
    if (empty($data)) return '';

    $html = '<ul class="nav">';

    foreach ($data as $item)
    {
        $html .= '<li';

        if (isset($item['active']) && $item['active']) $html .= ' class="active"';

        $html .= '><a href="'.$item['url'].'">';
        $html .= e($item['label']).'</a>';
        if (isset($item['items'])) $html .= HTML::nav($item['items']);
        $html .= '</li>';
    }   

    return $html.'</ul>';
});


HTML::macro('pulldown', function($data)
{
if (empty($data)) return '';

/*
$html = '<ul class="nav">';

foreach ($data as $item)
{
	$html .= '<li';

	if (isset($item['active']) && $item['active']) $html .= ' class="active"';

	$html .= '><a href="'.$item['url'].'">';
	$html .= e($item['label']).'</a>';
	if (isset($item['items'])) $html .= HTML::nav($item['items']);
	$html .= '</li>';
}
*/



foreach ($pages as $item)
{
$html .= '<li>';

$html .=
$item->id
. '' .
$item->slug;

/*
	<tr class="item">
		<td class="f-id">{{ $item->id }}</td>

		<td class="f-title">
			{{ item_depth($item->depth) }}<a href="{{ route('pages.edit', array('pages' => $item->id)) }}">{{{ $item->title}}}{{ HTML::glyphicon('edit') }}</a>
		</td>

		<td class="f-slug">
		@if ($item->slug)
			<a href="{{ route('page', array('slug' => $item->slug)) }}" target="_blank">{{ $item->slug }}</a>
		@endif
		</td>

		<td class="f-date">{{ $item->updated_at }}</td>

		<td class="f-actions">
		@if ($item->isRoot())
			<a href="{{ URL::route('pages.export') }}" class="btn btn-xs">{{ HTML::glyphicon('floppy-save') }} export</a>
		@else
			<div class="btn-group actions">
			@foreach (array('up', 'down') as $key)
				<button class="btn btn-xs btn-link" type="submit" title="Move {{$key}}" form="form-post" formaction="{{ URL::route("pages.$key", array($item->id)) }}">
					{{ HTML::glyphicon("arrow-$key") }}
				</button>
			@endforeach

				<a class="btn btn-xs" type="submit" title="Destroy" href="{{ URL::route('pages.confirm', array($item->id)) }}">
					{{ HTML::glyphicon('trash') }}
				</a>
			</div>
		@endif
		</td>
	</tr>
*/

$html .= '</li>';
}

return $html.'</ul>';


});