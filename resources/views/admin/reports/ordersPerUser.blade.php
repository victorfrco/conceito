<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
</head>
<body>
<h2 align="center"> Relatório de Vendas - {{$dados['user']}}</h2>
<h4 align="center"> Período: <span style="font-weight: bold">{{$dados['dataInicial']}}</span> à <span style="font-weight: bold">{{$dados['dataFinal']}}</span></h4>

<p><span style="font-weight: bold">Quantidade de Vendas :</span> {{$dados['qtdVendas']}}</p>
<p><span style="font-weight: bold">Valor total de vendas :</span>R$ {{number_format($dados['vlrVendas'], 2, ',', '.')}}</p>
<p><span style="font-weight: bold">Valor total descontado :</span>R$ {{number_format($dados['discount'], 2, ',', '.')}}</p>
<p><span style="font-weight: bold">Valor médio de vendas :</span>R$ {{number_format($dados['avgVendas'], 2, ',', '.')}}</p>
<table class="table table-striped" style="width: max-content">
    <thead>
    <tr>
        <th width="10%">ID</th>
        <th width="15%">Status</th>
        <th width="25%">Forma de Pagamento</th>
        <th width="15%">Valor Total</th>
        <th width="15%">Desconto</th>
        <th width="20%">Data</th>
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
            <td>R$ {{number_format($venda->discount, 2, ',', '.')}}</td>
            <td>{{$venda->getDataFormatada()}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
