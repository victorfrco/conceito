<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
</head>
<body>
<h2 align="center"> Relatório Diário - Sintético</h2>
<h4 align="center"> Data: {{$dados['data']}}</h4>

<p><span style="font-weight: bold">Produto mais vendido* :</span> {{$dados['maisVendido']->nome}} ({{ $dados['maisVendido']->qtd }})</p>
<p><span style="font-weight: bold">Valor médio de vendas* :</span>R$ {{number_format((float)$dados['valorMedio'], 2, '.', '')}}</p>
<h5 style="font-weight: bold">Vendas - Geral</h5>
<table class="table table-striped" style="width: max-content">
    <thead>
    <tr>
        <th width="40%">Status</th>
        <th width="40%">Quantidade</th>
        <th width="20%">Valor Total</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th>Total</th>
        <td>{{$dados['totalDeVendas']}}</td>
        <td>R$ {{number_format((float)$dados['vlrTotalDeVendas'], 2, '.', '')}}</td>
    </tr>
    <tr>
        <th>Finalizadas</th>
        <td>{{$dados['totalDeVendasFinalizadas']}}</td>
        <td>R$ {{number_format((float)$dados['vlrTotalDeVendasFinalizadas'], 2, '.', '')}}</td>
    </tr>
    <tr>
        <th>Mesas Abertas</th>
        <td>{{$dados['totalDeMesasEmAberto']}}</td>
        <td>R$ {{number_format((float)$dados['totalDeMesasEmAberto'], 2, '.', '')}}</td>
    </tr>
    <tr>
        <th>Não Concluídas</th>
        <td>{{$dados['totalDeVendasEmAberto']}}</td>
        <td>R$ {{number_format((float)$dados['vlrTotalDeVendasEmAberto'], 2, '.', '')}}</td>
    </tr>
    <tr>
        <th>Canceladas</th>
        <td>{{$dados['totalDeVendasCanceladas']}}</td>
        <td>R$ {{number_format((float)$dados['vlrTotalDeVendasCanceladas'], 2, '.', '')}}</td>
    </tr>
    </tbody>
</table>
<br>
<h5 style="font-weight: bold">Vendas - Forma de Pagamento</h5>
<table class="table table-striped" style="width: max-content">
    <thead>
    <tr>
        <th width="40%">Forma de Pagamento</th>
        <th width="40%">Quantidade</th>
        <th width="20%">Valor Total</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th>Dinheiro</th>
        <td>{{$dados['qtdVendasDinheiro']}}</td>
        <td>R$ {{number_format((float)$dados['vlrVendasDinheiro'], 2, '.', '')}}</td>
    </tr>
    <tr>
        <th>Débito</th>
        <td>{{$dados['qtdVendasDebito']}}</td>
        <td>R$ {{number_format((float)$dados['vlrVendasDebito'], 2, '.', '')}}</td>
    </tr>
    <tr>
        <th>Crédito</th>
        <td>{{$dados['qtdVendasCredito']}}</td>
        <td>R$ {{number_format((float)$dados['vlrVendasCredito'], 2, '.', '')}}</td>
    </tr>
    </tbody>
</table>
<br>
<h5 style="font-weight: bold">Vendas por Usuário</h5>
<table class="table table-striped" style="width: max-content">
    <thead>
    <tr>
        <th width="40%">Usuário</th>
        <th width="40%">Quantidade</th>
        <th width="20%">Valor Total</th>
    </tr>
    </thead>
    <tbody>
    @foreach($dados['vendasPorUsuario'] as $venda)
    <tr>
        <th>{{$venda->user_id}}</th>
        <td>{{$venda->qtd}}</td>
        <td>R$ {{number_format((float)$venda->vlr, 2, '.', '')}}</td>
    </tr>
    @endforeach
    </tbody>
</table>
<footer>   * Contabilizadas somente as vendas concluídas(pagas)</footer>
</body>
<style>
</style>
