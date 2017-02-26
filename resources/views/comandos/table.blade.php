<table class="table table-responsive" id="comandos-table">
    <thead>
        <th>Orden</th>
        <th>Fecha</th>
        <th>Mac</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($comandos as $comando)
        <tr>
            <td>{!! $comando->orden !!}</td>
            <td>{!! $comando->fecha !!}</td>
            <td>{!! $comando->mac !!}</td>
            <td>
                {!! Form::open(['route' => ['comandos.destroy', $comando->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('comandos.show', [$comando->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('comandos.edit', [$comando->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>