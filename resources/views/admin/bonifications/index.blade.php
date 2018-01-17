@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Últimas Bonificações</h2>
        </div>
        <div class="row">
            {!! Table::withContents($bonifications->items())
            ->withAttributes([
                'style' => 'font-size: 13px'
             ]) !!}
        </div>
        <br>
        {!! Button::primary('Nova Marca')->asLinkTo(route('admin.brands.create')) !!}
    </div>
@endsection