<?php 
function quitarAcentos($texto){
    $conAcento  = ['À','Á','Ç','È','É','Ì','Í','Ï','Ò','Ó','Ù','Ú','Ü','Ñ'];
    $sinAcento = ['A','A','C','E','E','I','I','I','O','O','U','U','U','N'];   
    $textoSinAcento = str_replace($conAcento, $sinAcento, $texto);
    return $textoSinAcento;
}

function clasificar($frases){
    $frasesFaciles = [];
    $frasesNormales = [];
    $frasesDificiles = [];
    $abecedario = range('A','Z');
    foreach ($frases as $frase){ 
        $soloLetras = mb_strtoupper($frase,'UTF-8');
        $soloLetras = quitarAcentos($soloLetras);
        $soloLetras = preg_replace('/[^A-Z]/','',$soloLetras);

        $letrasUsadas = array_unique(mb_str_split($soloLetras));  

        $letrasAusentes = array_filter($abecedario, fn($letra) => !in_array($letra, $letrasUsadas));
        $numFaltan = count($letrasAusentes);

        $numLetras = mb_strlen($soloLetras, 'UTF-8');


        if ($numFaltan >= 13){
            if ($numLetras <= 28){
                $frasesDificiles[] = $frase;
            } else{
                $frasesNormales[] = $frase;
            }
        }elseif ($numFaltan <= 9){
            if ($numLetras >= 30){
                $frasesFaciles[] = $frase;
            }else{
                $frasesNormales[] = $frase;
            }
        }else {
            $frasesNormales[] = $frase;
        }
    }
    return [$frasesFaciles, $frasesNormales, $frasesDificiles];
}