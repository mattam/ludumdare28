@extends('layouts.scaffold')

@section('main')

<h1>Show Dice</h1>

<p>{{ link_to_route('dices.index', 'Return to all dices') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Rolled</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $dice->rolled }}}</td>
                    <td>{{ link_to_route('dices.edit', 'Edit', array($dice->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('dices.destroy', $dice->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
