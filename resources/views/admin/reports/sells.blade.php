<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
</head>
<body>
<h2 align="center"> Relatório de Vendas</h2>
<h4 align="center"> Período: <span style="font-weight: bold">{{$dados['dataInicial']}}</span> à <span
            style="font-weight: bold">{{$dados['dataFinal']}}</span></h4>

<p><span style="font-weight: bold">Quantidade de Vendas :</span> {{$dados['qtdVendas']}}</p>
<p><span style="font-weight: bold">Valor total das vendas :</span>R$ {{number_format($dados['vlrVendas'], 2, ',', '.')}}
</p>
<p><span style="font-weight: bold">Valor médio das vendas :</span>R$ {{number_format($dados['avgVendas'], 2, ',', '.')}}
</p>
<h4 align="center">Vendas Por Status</h4>
<table class="table table-striped" style="width: max-content">
    <thead>
    <tr>
        <th width="33%">Status</th>
        <th width="33%">Quantidade</th>
        <th width="34%">Valor Total</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th>Concluídas</th>
        <th>{{$dados['qtdVendasConcluidas']}}</th>
        <th>R$ {{number_format($dados['vlrVendasConcluidas'], 2, ',', '.')}}</th>
    </tr>
    <tr>
        <th>Canceladas</th>
        <th>{{$dados['qtdVendasCanceladas']}}</th>
        <th>R$ {{number_format($dados['vlrVendasCanceladas'], 2, ',', '.')}}</th>
    </tr>
    <tr>
        <th>Em aberto</th>
        <th>{{$dados['qtdVendasEmAberto']}}</th>
        <th>R$ {{number_format($dados['vlrVendasEmAberto'], 2, ',', '.')}}</th>
    </tr>
    </tbody>
</table>

<h4 align="center">Vendas Por Forma de Pagamento</h4>

<table class="table table-striped" style="width: max-content">
    <thead>
    <tr>
        <th width="33%">Status</th>
        <th width="33%">Quantidade</th>
        <th width="34%">Valor Total</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th>Dinheiro</th>
        <th>{{$dados['qtdVendasDinheiro']}}</th>
        <th>R$ {{number_format($dados['vlrVendasDinheiro'], 2, ',', '.')}}</th>
    </tr>
    <tr>
        <th>Débito</th>
        <th>{{$dados['qtdVendasDebito']}}</th>
        <th>R$ {{number_format($dados['vlrVendasDebito'], 2, ',', '.')}}</th>
    </tr>
    <tr>
        <th>Crédito</th>
        <th>{{$dados['qtdVendasCredito']}}</th>
        <th>R$ {{number_format($dados['vlrVendasCredito'], 2, ',', '.')}}</th>
    </tr>
    <tr>
        <th>Múltiplo</th>
        <th>{{$dados['qtdVendasMultiplo']}}</th>
        <th>R$ {{number_format($dados['vlrVendasMultiplo'], 2, ',', '.')}}</th>
    </tr>
    <tr>
        <th>Depósito / Transferência</th>
        <th>{{$dados['qtdVendasDeposito']}}</th>
        <th>R$ {{number_format($dados['vlrVendasDeposito'], 2, ',', '.')}}</th>
    </tr>
    </tbody>
</table>

<h4 align="center">Listagem de Vendas</h4>

<table class="table table-condensed" style="width: max-content">
    <thead>
    <tr>
        <th width="10%">ID</th>
        <th width="15%">Status</th>
        <th width="25%">Forma de Pagamento</th>
        <th width="15%">Valor Total</th>
        <th width="20%">Data</th>
        <th width="15%">Vendedor</th>
    </tr>
    </thead>
    <tbody>
    @foreach($dados['vendas'] as $venda)
        @php $venda = \App\Models\Order::find($venda->id);
        @endphp
        <tr>
            <th>{{$venda->id}}</th>
            <th>{{$venda->getStatusFormatado()}}</th>
            <td>{{$venda->getFormaDePagamento()}}</td>
            <td>R$ {{number_format($venda->absolut_total, 2, ',', '.')}}</td>
            <td>{{$venda->getDataFormatada()}}</td>
            <td>{{\App\User::find($venda->user_id) == null ? "" : \App\User::find($venda->user_id)->name}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
<style>
</style>
