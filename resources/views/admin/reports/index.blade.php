@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Relatório Diário</h2>
        </div>
        @php
            $users = App\User::all();
            foreach($users as $user)
            $variavel = '<option value="'.$user->id.'">'.$user->name.'</option> </select>';
            //todo

            echo Bootstrapper\Facades\Accordion::named("basic")->withContents([
         [
            'title' => 'Relatório Sintético',
             'contents' => 'Em desenvolvimento'
         ],
         [
             'title' => 'Relatório Analítico',
             'contents' => '<h4>Entradas e Saídas</h4>
                        Informe a data desejada:
                              '.Form::open(array('action' => 'ReportController@generateAnaliticReport', 'method' => 'post')).''.
                          Form::date('date').'
                            <br><br>'.
                             Form::submit('Enviar', ['class' => 'btn btn-primary']).''.
                              Form::close().'',

            'style'=>''
         ],
         [
             'title' => 'Relatório de Vendas',
             'contents' => '<h4>Periódico</h4>
                        Informe a data inicial:
                              '.Form::open(array('action' => 'ReportController@generateSellReport', 'method' => 'post')).''.
                          Form::date('dateInicial').
                          '<br>Informe a data final:<br>'.
                          Form::date('dateFinal').'
                            <br><br>'.
                             Form::submit('Enviar', ['class' => 'btn btn-primary']).''.
                              Form::close().'',

            'style'=>''
         ],
         [
             'title' => 'Relatório de Vendas Por Usuário',
             'contents' => '<h4>Periódico</h4>
                        Informe a data inicial:
                              '.Form::open(array('action' => 'ReportController@generateUserReport', 'method' => 'post')).''.
                          Form::date('dateInicial').
                          '<br>Informe a data final:<br>'.
                          Form::date('dateFinal').'
                            <br>'.'
                            <br><p style="display:inline; vertical-align: middle;font-weight: bold">Informe o vendedor: </p>
                    <select style="max-height: 50px; overflow: auto" class="selectpicker" data-live-search="true" name="user_id">
                        '.Form::submit('Enviar', ['class' => 'btn btn-primary']).''.
                              Form::close().'',

            'style'=>''
         ],
     ])
        @endphp
        <div class="row">

        </div>
    </div>
@endsection