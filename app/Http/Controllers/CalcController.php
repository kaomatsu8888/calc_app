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
                // 0での除算を防ぐ
                if ($num2 != 0) {
                    $result = $num1 / $num2;
                } else {
                    return "エラー: 0で除算はできません。";
                }
                break;
            default:
                return "エラー: 未知の操作です。";
        }
        // 結果を返す
        return view('message.calc', ['result' => $result]);
    }
}
