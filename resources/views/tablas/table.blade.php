<table class="table table-responsive" id="tablas-table">
    <thead>
        
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($tablas as $tablas)
        <tr>
            
            <td>
                {!! Form::open(['route' => ['tablas.destroy', $tablas->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('tablas.show', [$tablas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('tablas.edit', [$tablas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>