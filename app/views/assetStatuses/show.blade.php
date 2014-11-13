@extends(Config::get('vedette.vedette_views.layout'))

@section('title')
@parent
	{{ Config::get('vedette.vedette_html.separator') }}
	AssetStatus
@stop

@section('styles')
@stop

@section('scripts')
	<script src="{{ asset('packages/illuminate3/vedette/assets/js/restfulizer.js') }}"></script>
@stop

@section('inline-scripts')

var text_confirm_message = '{{ trans('lingos::general.ask.delete') }}';

@stop

@section('content')
<div class="row">
<h1>
	<p class="pull-right">
	{{ Bootstrap::linkIcon(
		'assetStatuses.index',
		trans('lingos::button.back'),
		'chevron-left fa-fw',
		array('class' => 'btn btn-default')
	) }}
	</p>
	<i class="fa fa-tag fa-lg"></i>
	AssetStatus
	<hr>
</h1>
</div>

<div class="row">

<div class="table-responsive">
<table class="table table-striped table-hover" id="DataTable">
	<thead>
		<tr>
			<th>Name</th>
				<th>Description</th>
			<th>{{ trans('lingos::table.actions') }}</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $assetStatus->name }}}</td>
					<td>{{{ $assetStatus->description }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('assetStatuses.destroy', $assetStatus->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('assetStatuses.edit', 'Edit', array($assetStatus->id), array('class' => 'btn btn-info')) }}
                    </td>
			<td width="25%">
				{{ Form::open(array(
					'route' => array('assetStatuses.destroy', $assetStatus->id),
					'role' => 'form',
					'method' => 'delete',
					'class' => 'form-inline'
				)) }}

					{{ Bootstrap::linkRouteIcon(
						'assetStatuses.edit',
						trans('lingos::button.edit'),
						'edit fa-fw',
						array($assetStatus->id),
						array(
							'class' => 'btn btn-success form-group',
							'title' => trans('lingos::account.command.edit')
						)
					) }}

					{{ Bootstrap::linkRouteIcon(
						'assetStatuses.destroy',
						trans('lingos::button.delete'),
						'trash-o fa-fw',
						array($assetStatus->id),
						array(
							'class' => 'btn btn-danger form-group action_confirm',
							'data-method' => 'delete',
							'title' => trans('lingos::account.command.delete')
						)
					) }}

				{{ Form::close() }}
			</td>
		</tr>
	</tbody>
</table>
</div><!-- ./responsive -->

</div>

@stop
