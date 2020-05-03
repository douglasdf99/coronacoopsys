<div class="table-responsive">
    <table class="table" id="coops-table">
        <thead>
            <tr>
                <th>Cnpj</th>
        <th>Razao</th>
        <th>Matriz</th>
        <th>Site</th>
        <th>Email</th>
        <th>Logo</th>
        <th>Telefone</th>
        <th>Whatsapp</th>
        <th>Estado</th>
        <th>Cidade</th>
        <th>Numero</th>
        <th>Complemento</th>
        <th>Bairro</th>
        <th>Compartilhamento</th>
        <th>Sell</th>
        <th>Ramo Id</th>
        <th>Catalogo</th>
        <th>Ativo</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($coops as $coop)
            <tr>
                <td>{{ $coop->cnpj }}</td>
            <td>{{ $coop->razao }}</td>
            <td>{{ $coop->matriz }}</td>
            <td>{{ $coop->site }}</td>
            <td>{{ $coop->email }}</td>
            <td>{{ $coop->logo }}</td>
            <td>{{ $coop->telefone }}</td>
            <td>{{ $coop->whatsapp }}</td>
            <td>{{ $coop->estado }}</td>
            <td>{{ $coop->cidade }}</td>
            <td>{{ $coop->numero }}</td>
            <td>{{ $coop->complemento }}</td>
            <td>{{ $coop->bairro }}</td>
            <td>{{ $coop->compartilhamento }}</td>
            <td>{{ $coop->sell }}</td>
            <td>{{ $coop->ramo_id }}</td>
            <td>{{ $coop->catalogo }}</td>
            <td>{{ $coop->ativo }}</td>
                <td>
                    {!! Form::open(['route' => ['coops.destroy', $coop->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('coops.show', [$coop->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('coops.edit', [$coop->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
