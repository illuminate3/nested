@extends(Config::get('vedette.vedette_views.layout'))

@section('title')
@parent
	{{ Config::get('vedette.vedette_html.separator') }}
	{{ trans('lingos::general.command.create') }}
@stop

@section('styles')
@stop

@section('scripts')
@stop

@section('inline-scripts')
@stop

@section('content')
<div class="row">
<h1>
	<p class="pull-right">
	{{ Bootstrap::linkIcon(
		'rooms.index',
		trans('lingos::button.back'),
		'chevron-left fa-fw',
		array('class' => 'btn btn-default')
	) }}
	</p>
	<i class="fa fa-edit fa-lg"></i>
	{{ trans('lingos::general.command.create') }}
	<hr>
</h1>
</div>


@if ($errors->any())
	{{ Bootstrap::danger( implode('', $errors->all(':message<br>')), true) }}

	<div class="alert alert-danger">
		<ul>
			{{ implode('', $errors->all('<li class="error">:message</li>')) }}
		</ul>
	</div>
@endif


<div class="row">
{{ Form::open(array('route' => 'rooms.store', 'class' => 'form-horizontal')) }}

{{-- Form::open(
	[
		'route' => array('rooms.store'),
		'job_title' => 'form'
	]
) --}}


<div class="form-group">
	<label for="inputZone" class="col-sm-2 control-label">User:</label>
	<div class="col-sm-10">
		{{
			Form::select(
				'user_id',
				$users,
				null,
				array(
					'class' => 'form-control chosen-select'
				)
			)
		}}
	</div>
</div>

<div class="form-group">
	<label for="inputZone" class="col-sm-2 control-label">Site:</label>
	<div class="col-sm-10">
		{{
			Form::select(
				'site_id',
				$sites,
				null,
				array(
					'class' => 'form-control chosen-select'
				)
			)
		}}
	</div>
</div>
{{--
        <div class="form-group">
            {{ Form::label('site_id', 'Site_id:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::input('number', 'site_id', Input::old('site_id'), array('class'=>'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('user_id', 'User_id:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::input('number', 'user_id', Input::old('user_id'), array('class'=>'form-control')) }}
            </div>
        </div>
--}}
        <div class="form-group">
            {{ Form::label('name', 'Name:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('name', Input::old('name'), array('class'=>'form-control', 'placeholder'=>'Name')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('description', 'Description:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('description', Input::old('description'), array('class'=>'form-control', 'placeholder'=>'Description')) }}
            </div>
        </div>


	<hr>

	{{ Bootstrap::submit(
		trans('lingos::button.save'),
		[
			'class' => 'btn btn-success btn-block'
		]
	) }}

	<div class="row">
		<div class="col-sm-6">
		{{ Bootstrap::linkIcon(
			'rooms.index',
			trans('lingos::button.cancel'),
			'times fa-fw',
			[
				'class' => 'btn btn-default btn-block'
			]
		) }}
		</div>
		<div class="col-sm-6">
		{{ Bootstrap::reset(
			trans('lingos::button.reset'),
			[
				'class' => 'btn btn-default btn-block'
			]
		) }}
		</div>
	</div>

{{ Form::close() }}

</div>
@stop
