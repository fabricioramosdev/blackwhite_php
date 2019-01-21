<?php

if (!function_exists('uf')) {

    function uf() {


        $estados = array(
            "AC" => "Acre",
            "AL" => "Alagoas",
            "AM" => "Amazonas",
            "AP" => "Amapá",
            "BA" => "Bahia",
            "CE" => "Ceará",
            "DF" => "Distrito Federal",
            "ES" => "Espírito Santo",
            "GO" => "Goiás",
            "MA" => "Maranhão",
            "MT" => "Mato Grosso",
            "MS" => "Mato Grosso do Sul",
            "MG" => "Minas Gerais",
            "PA" => "Pará",
            "PB" => "Paraíba",
            "PR" => "Paraná",
            "PE" => "Pernambuco",
            "PI" => "Piauí",
            "RJ" => "Rio de Janeiro",
            "RN" => "Rio Grande do Norte",
            "RO" => "Rondônia",
            "RS" => "Rio Grande do Sul",
            "RR" => "Roraima",
            "SC" => "Santa Catarina",
            "SE" => "Sergipe",
            "SP" => "São Paulo",
            "TO" => "Tocantins");

        return $estados;
    }

}



if (!function_exists('sexo')) {

    function sexo() {

        $sexo = array(
            "M" => "Masculino",
            "F" => "Feminino",
            "O" => "Outro"
        );
        return $sexo;
    }

}


if (!function_exists('array_meses')) {

    function array_meses() {

        $meses = array(
            "01" => "Janeiro",
            "02" => "Fevereiro",
            "03" => "Março",
            "04" => "Abril",
            "05" => "Maio",
            "06" => "Junho",
            "07" => "Julho",
            "08" => "Agosto",
            "09" => "Setembro",
            "10" => "Outubro",
            "11" => "Novembro",
            "12" => "Dezembro"
        );


        return $meses;
    }

}

if (!function_exists('getmes')) {

    function getmes($mes) {

        switch ($mes) {
            case "01": return 'Janeiro';
                break;
            case "02": return 'Fevereiro';
                break;
            case "03": return 'Março';
                break;
            case "04": return 'Abril';
                break;
            case "05": return 'Maio';
                break;
            case "06": return 'Junho';
                break;
            case "07": return 'Julho';
                break;
            case "08": return 'Agosto';
                break;
            case "09": return 'Setembro';
                break;
            case "10": return 'Outubro';
                break;
            case "11": return 'Novembro';
                break;
            case "12": return 'Dezembro';
                break;
            default: return '';
        }
    }

}
