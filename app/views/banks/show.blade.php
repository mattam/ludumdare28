@extends('layouts.scaffold')

@section('main')

<h1>Show Bank</h1>

<p>{{ link_to_route('banks.index', 'Return to all banks') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Dice_id</th>
				<th>User_id</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $bank->dice_id }}}</td>
					<td>{{{ $bank->user_id }}}</td>
                    <td>{{ link_to_route('banks.edit', 'Edit', array($bank->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('banks.destroy', $bank->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
