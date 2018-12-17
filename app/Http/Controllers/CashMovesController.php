<?php

namespace App\Http\Controllers;

use App\CashMoves;
use App\Models\Cash;
use Illuminate\Http\Request;

class CashMovesController extends Controller
{
    public static function buscaValoresDebito($id){
        $cashMoves = \DB::select("select case when sum(cm.debit) IS null then 0 ELSE SUM(cm.debit) end - case when sum(o.discount) IS null then 0 else sum(o.discount) end  as valor from cash_moves cm join orders o on o.id = cm.order_id where cm.type = 3 and cm.debit is not null and cm.cash_id = ".$id);
        return 'R$ '.number_format($cashMoves[0]->valor, 2,',', '.');
//        $cashMoves = CashMoves::all()->where('cash_id','=', $id)->where('type','=',CashMoves::getTIPOVENDA())->sum('debit');
//        return 'R$ '.number_format($cashMoves[0]->valor, 2,',', '.');
    }

    public static function buscaValoresCredito($id){
        $cashMoves = \DB::select("select case when sum(cm.credit) IS null then 0 ELSE SUM(cm.credit) end - case when sum(o.discount) IS null then 0 else sum(o.discount) end  as valor from cash_moves cm join orders o on o.id = cm.order_id where cm.type = 3 and cm.credit is not null and cm.cash_id = ".$id);
        return 'R$ '.number_format($cashMoves[0]->valor, 2,',', '.');
//        $cashMoves = CashMoves::all()->where('cash_id','=', $id)->where('type','=',CashMoves::getTIPOVENDA())->sum('credit');
//        return 'R$ '.number_format($cashMoves, 2,',', '.');
    }

    public static function buscaValoresDinheiro($id){
        $cashMoves = \DB::select("select case when sum(cm.money) IS null then 0 ELSE SUM(cm.money) end - case when sum(o.discount) IS null then 0 else sum(o.discount) end  as valor from cash_moves cm join orders o on o.id = cm.order_id where cm.type = 3 and cm.money is not null and cm.cash_id = ".$id);
//        $cashMoves = CashMoves::all()->where('cash_id','=', $id)->where('type','=',CashMoves::getTIPOVENDA())->sum('money');
        return 'R$ '.number_format($cashMoves[0]->valor, 2,',', '.');
    }

    public static function buscaValoresEntradas($id){
        $cashMoves = CashMoves::all()->where('cash_id','=', $id)->where('type','=',CashMoves::getTIPOENTRADA())->sum('total');
        return 'R$ '.number_format($cashMoves, 2,',', '.');
    }

    public static function buscaValoresSaidas($id){
//        $cashMoves = \DB::select("select sum(cm.debit) - sum(o.discount) as valor from cash_moves cm join orders o on o.id = cm.order_id where cm.type = 3 and cm.debit is not null");
//        dd($cashMoves[0]->valor);
        $cashMoves = CashMoves::all()->where('cash_id','=', $id)->whereIn('type',[CashMoves::getTIPOSAIDA(),CashMoves::getTIPODESCONTO()])->sum('total');
        return 'R$ '.number_format($cashMoves, 2,',', '.');
    }

    public static function buscaValorTotal($id){


//        $debito = \DB::select("select case when sum(cm.debit) IS null then 0 ELSE SUM(cm.debit) end - case when sum(o.discount) IS null then 0 else sum(o.discount) end  as valor from cash_moves cm join orders o on o.id = cm.order_id where cm.type = 3 and cm.debit is not null and cm.cash_id = ".$id)[0]->valor;
//        $credito = \DB::select("select case when sum(cm.debit) IS null then 0 ELSE SUM(cm.debit) end - case when sum(o.discount) IS null then 0 else sum(o.discount) end  as valor from cash_moves cm join orders o on o.id = cm.order_id where cm.type = 3 and cm.debit is not null and cm.cash_id = ".$id)[0]->valor;
//        $dinheiro = \DB::select("select case when sum(cm.debit) IS null then 0 ELSE SUM(cm.debit) end - case when sum(o.discount) IS null then 0 else sum(o.discount) end  as valor from cash_moves cm join orders o on o.id = cm.order_id where cm.type = 3 and cm.debit is not null and cm.cash_id = ".$id)[0]->valor;
//        $entradas = CashMoves::all()->where('cash_id','=', $id)->where('type','=',CashMoves::getTIPOENTRADA())->sum('total');
//        $saidas = CashMoves::all()->where('cash_id','=', $id)->whereIn('type',[CashMoves::getTIPOSAIDA(),CashMoves::getTIPODESCONTO()])->sum('total');
//
//        $total = $debito + $credito + $dinheiro + $entradas - $saidas;
        $dinheiro = \DB::select("select case when sum(cm.money) IS null then 0 ELSE SUM(cm.money) end - case when sum(o.discount) IS null then 0 else sum(o.discount) end  as valor from cash_moves cm join orders o on o.id = cm.order_id where cm.type = 3 and cm.money is not null and cm.cash_id = ".$id);
        $saidas = CashMoves::all()->where('cash_id','=', $id)->whereIn('type',[CashMoves::getTIPOSAIDA(),CashMoves::getTIPODESCONTO()])->sum('total');

        return 'R$ '.number_format($dinheiro[0]->valor - $saidas, 2,',', '.');
    }

}

