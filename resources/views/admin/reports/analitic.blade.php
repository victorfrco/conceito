<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
</head>
<body>
<h2 align="center"> Relatório Entradas e Saídas - Analítico</h2>
<h4 align="center"> Data: {{$dados['data']}}</h4>

<p><span style="font-weight: bold">Entradas (produtos distintos):</span> {{$dados['entradas']->count()}} </p>
<p><span style="font-weight: bold">Saídas (produtos e/ou valores distintos):</span> {{$dados['saidas']->count()}} </p>
<h4 style="font-weight: bold" align="center">ENTRADAS</h4>
<table class="table table-condensed" style="width: max-content">
    <thead>
    <tr>
        <th width="10%">Id</th>
        <th width="30%">Produto</th>
        <th width="15%">Qtd</th>
        <th width="15%">Valor Unit.</th>
        <th width="15%">Valor Total</th>
    </tr>
    </thead>
    <tbody>
    @foreach($dados['entradas'] as $entrada)
        <tr>
            <th>{{$entrada->id}}</th>
            <td>{{$entrada->name}}</td>
            <td>{{$entrada->qtd}}</td>
            <td>R$ {{number_format($entrada->vlrUnit, 2, ',', '.')}}</td>
            <td>R$ {{number_format($entrada->total, 2, ',', '.')}}</td>
        </tr>
    @endforeach
    </tbody>
</table>


<h4 style="font-weight: bold;" align="center">SAÍDAS</h4>
<table class="table table-condensed" style="width: max-content">
    <thead>
    <tr>
        <th width="10%">Id</th>
        <th width="30%">Produto</th>
        <th width="15%">Qtd</th>
        <th width="15%">Valor Unit.</th>
        <th width="15%">Valor Total</th>
    </tr>
    </thead>
    <tbody>
    @foreach($dados['saidas'] as $entrada)
        <tr>
            <th>{{$entrada->id}}</th>
            <td>{{$entrada->name}}</td>
            <td>{{$entrada->qtd}}</td>
            <td>R$ {{number_format($entrada->vlrUnit, 2, ',', '.')}}</td>
            <td>R$ {{number_format($entrada->total, 2, ',', '.')}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>


<style>
</style>
