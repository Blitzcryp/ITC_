<?php

function json_encode_i_guess($inputData , $indent = 0, $from_array = false)
{
    $_myself = __FUNCTION__;
    $_escape = function ($str) {
        return preg_replace("!([\b\t\n\r\f\"\\'])!", "\\\\\\1", $str);
    };

    $JsonOutput = '';

    foreach ($inputData as $key => $value) {
        $JsonOutput .= str_repeat("\t", $indent + 1);
        $JsonOutput .= "\"" . $_escape((string) $key) . "\": ";

        if (is_object($value) || is_array($value)) {
            $JsonOutput .= "\n";
            $JsonOutput .= $_myself($value, $indent + 1);
        } elseif (is_bool($value)) {
            $JsonOutput .= $value ? 'true' : 'false';
        } elseif (is_null($value)) {
            $JsonOutput .= 'null';
        } elseif (is_string($value)) {
            $JsonOutput .= "\"" . $_escape($value) . "\"";
        } else {
            $JsonOutput .= $value;
        }

        $JsonOutput .= ",\n";
    }

    if (!empty($JsonOutput)) {
        $JsonOutput = substr($JsonOutput, 0, -2);
    }

    $JsonOutput = str_repeat("\t", $indent) . "{\n" . $JsonOutput;
    $JsonOutput .= "\n" . str_repeat("\t", $indent) . "}";

    return $JsonOutput;
}

$interviewArray = array(
    "0" => array(
        "Id" => 1,
        "Name" => "Produs 1",
    ),
    "1" => array(
        "Id" => 2,
        "Name" => "Produs 2",
    ),
    "2" => array(
        "Id" => 3,
        "Name" => "Produs 3",
    ),
    "3" => array(
        "Id" => 4,
        "Name" => "Produs 4",
    ),
    "4" => array(
        "Id" => 5,
        "Name" => "Produs 5",
    ),
    "5" => array(
        "Id" => 6,
        "Name" => "Produs 6",
    ));

if(isset($_GET['functionCall']))
{
    switch ($_GET['functionCall']) {
        case 'json_encode':
            echo(json_encode_i_guess($interviewArray));
            break;
        
        default:
            echo("Nothing set");
            break;
    }
}

?>