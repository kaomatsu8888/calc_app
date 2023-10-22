<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalcController extends Controller
{
    public function result($num1, $operation, $num2)
    {
        $result = 0; // 初期値は0
        switch ($operation) {
            case 'addition':    // 足し算
                $result = $num1 + $num2;
                break;
            case 'substraction':    // 引き算
                $result = $num1 - $num2;
                break;
            case 'multiplication':  // 掛け算
                $result = $num1 * $num2;
                break;
            case 'division':    // 割り算
                $result = $num1 / $num2;
                break;
            default:
                $result = 0;
                break;
        }
        return view('message.calc', [
            'num1' => $num1,
            'operation' => $operation,
            'num2' => $num2,
            'result' => $result
        ]);
    }
}
