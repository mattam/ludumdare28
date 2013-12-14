@extends('layouts.scaffold')

@section('main')

<h1>All Dices</h1>

<p>{{ link_to_route('dices.create', 'Add new dice') }}</p>

@if ($dices->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Rolled</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($dices as $dice)
				<tr>
					<td>{{{ $dice->rolled }}}</td>
                    <td>{{ link_to_route('dices.edit', 'Edit', array($dice->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('dices.destroy', $dice->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no dices
@endif

@stop
