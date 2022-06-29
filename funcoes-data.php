<?php
session_start();

function dataConvertidaPortugues($data){
    $ano= substr($data, -10,4);
    $mes= substr($data, -5,2);
    $dia= substr($data, -2,2);
    return $dia."/".$mes."/".$ano;
}

function retornaDia($data){
    $dia= substr($data, -2,2);
    return $dia;
}

function retornaMes($data){
    $mes= substr($data, -5,2);
    return $mes;
}

function retornaAno($data){
    $ano= substr($data, -10,4);
    return $ano;
}

function verificaAnoBissexto($ano){
    $resto = $ano % 4;
    if($resto == 0){
        $resto2 = $ano % 100;
        if($resto2 == 0){
            return false;
        }else{
            return true;
        }
    }else{
        $resto3 = $ano % 400;
        if($resto3 == 0){
            return true;
        }else{
            return false;
        }
    }
}
/***** ESTA FUNÇÃO INCREMENTA MÊS A MÊS UMA DATA ATÉ CHEGAR NUMA DATA FINAL JÁ PREVENDO MESES QUE NÃO TêM 31 DIAS E ANOS BISSEXTOS *****/
function incrementaMesAMes($dataInicio, $dataFim){
    $datas = array();
    $dia = retornaDia($dataInicio);
    
    $data1text = $dataInicio;
    $data2text = $dataFim;
    
    $date1 = new DateTime($data1text);
    $date2 = new DateTime($data2text);
    //Calculando a diferença entre os meses
    $meses = ((int)$date2->format('m') - (int)$date1->format('m'))
    //    e somando com a diferença de anos multiplacado por 12
    + (((int)$date2->format('y') - (int)$date1->format('y')) * 12);

    $i = 1;
    $d = new DateTime();
    $mesInicio = retornaMes($dataInicio);
    $anoInicio = retornaAno($dataInicio);
    $d->setDate($anoInicio, $mesInicio, $dia);
    $chave = 1;

    $meses++;
    while($i <= $meses){
        if( ($dia > 28) && ($d->format('m') == 01) && ($chave == 1) ){
            $datas[] = $d->format('Y-m-d');
            $chave = 0;
        }else if( ($dia == 31) && ($d->format('m') == 03) && ($chave == 1) ){
            $datas[] = $d->format('Y-m-d');
            $chave = 0;
        }else if( ($dia == 31) && ($d->format('m') == 05) && ($chave == 1) ){
            $datas[] = $d->format('Y-m-d');
            $chave = 0;
        }else if( ($dia == 31) && ($d->format('m') == 8) && ($chave == 1) ){
            $datas[] = $d->format('Y-m-d');
            $chave = 0;
        }else if( ($dia == 31) && ($d->format('m') == 10) && ($chave == 1) ){
            $datas[] = $d->format('Y-m-d');
            $chave = 0;
        }
        else{
            if($chave == 1){
                $datas[] = $d->format('Y-m-d');
                $d->add(new DateInterval("P1M"));
            }
            if($chave == 0){
                $chave = 1;
            }
        }
        
        if($chave == 1){
            
        }else if($chave == 0){
            if( ($dia > 28) && ($d->format('m') == 01) ){
                if (verificaAnoBissexto($d->format('Y'))){
                    $datas[] = $d->format('Y')."-02-29";
                }else{
                    $datas[] = $d->format('Y')."-02-28";
                }
                $d->add(new DateInterval("P2M"));
            }else if( ($dia == 31) && ($d->format('m') == 03) ){
                $datas[] = $d->format('Y')."-04-30";
                $d->add(new DateInterval("P2M"));
            }else if( ($dia == 31) && ($d->format('m') == 05) ){
                $datas[] = $d->format('Y')."-06-30";
                $d->add(new DateInterval("P2M"));
            }else if( ($dia == 31) && ($d->format('m') == 8) ){
                $datas[] = $d->format('Y')."-09-30";
                $d->add(new DateInterval("P2M"));
            }else if( ($dia == 31) && ($d->format('m') == 10) ){
                $datas[] = $d->format('Y')."-11-30";
                $d->add(new DateInterval("P2M"));
            }
        }

        $i++;
    }

    return $datas;
}

/**Esta função necessita de uma data de vencimento (inicial) e do ano e mês do  último pagamento de uma dívida, por exemplo.
 * Ela retorna o dia da data do último vencimento dessa dívida. Não simplesmente poderia pegar o dia da data inicial de vencimento porque o dia 
 * pode variar de acordo com o mês de vencimento.
*/
function retornaDiaDaDataDoUltimoVencimento($dataVencimento, $mes, $ano){
    $dia = retornaDia($dataVencimento);

    $diaTratado = $dia;
    if( ($dia > 28) && ($mes == 02) ){
        if( verificaAnoBissexto($ano) ){
            $diaTratado = 29;
        }else{
            $diaTratado = 28;
        }
    }else if( ($dia == 31) && ($mes == 04) ){
        $diaTratado = 30;
    }else if( ($dia == 31) && ($mes == 06) ){
        $diaTratado = 30;
    }else if( ($dia == 31) && ($mes == 9) ){
        $diaTratado = 30;
    }else if( ($dia == 31) && ($mes == 11) ){
        $diaTratado = 30;
    }

    return $diaTratado;
}

?>