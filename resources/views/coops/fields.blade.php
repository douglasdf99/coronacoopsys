<!-- Cnpj Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cnpj', 'Cnpj:') !!}
    {!! Form::text('cnpj', null, ['class' => 'form-control']) !!}
</div>

<!-- Razao Field -->
<div class="form-group col-sm-6">
    {!! Form::label('razao', 'Razao:') !!}
    {!! Form::text('razao', null, ['class' => 'form-control']) !!}
</div>

<!-- Matriz Field -->
<div class="form-group col-sm-6">
    {!! Form::label('matriz', 'Matriz:') !!}
    {!! Form::text('matriz', null, ['class' => 'form-control']) !!}
</div>

<!-- Site Field -->
<div class="form-group col-sm-6">
    {!! Form::label('site', 'Site:') !!}
    {!! Form::text('site', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Logo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('logo', 'Logo:') !!}
    {!! Form::text('logo', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefone', 'Telefone:') !!}
    {!! Form::text('telefone', null, ['class' => 'form-control']) !!}
</div>

<!-- Whatsapp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('whatsapp', 'Whatsapp:') !!}
    {!! Form::text('whatsapp', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado', 'Estado:') !!}
    {!! Form::text('estado', null, ['class' => 'form-control']) !!}
</div>

<!-- Cidade Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cidade', 'Cidade:') !!}
    {!! Form::text('cidade', null, ['class' => 'form-control']) !!}
</div>

<!-- Numero Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numero', 'Numero:') !!}
    {!! Form::text('numero', null, ['class' => 'form-control']) !!}
</div>

<!-- Complemento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('complemento', 'Complemento:') !!}
    {!! Form::text('complemento', null, ['class' => 'form-control']) !!}
</div>

<!-- Bairro Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bairro', 'Bairro:') !!}
    {!! Form::text('bairro', null, ['class' => 'form-control']) !!}
</div>

<!-- Compartilhamento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('compartilhamento', 'Compartilhamento:') !!}
    {!! Form::number('compartilhamento', null, ['class' => 'form-control']) !!}
</div>

<!-- Sell Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sell', 'Sell:') !!}
    {!! Form::number('sell', null, ['class' => 'form-control']) !!}
</div>

<!-- Ramo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ramo_id', 'Ramo Id:') !!}
    {!! Form::number('ramo_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Catalogo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('catalogo', 'Catalogo:') !!}
    {!! Form::text('catalogo', null, ['class' => 'form-control']) !!}
</div>

<!-- Ativo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ativo', 'Ativo:') !!}
    {!! Form::number('ativo', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('coops.index') }}" class="btn btn-default">Cancel</a>
</div>
