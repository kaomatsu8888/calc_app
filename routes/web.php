<?php

use App\Http\Controllers\CalcController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Route::<HTTPメソッド>('<アドレス>', クロージャ);
Route::get('/route/hello', function () {
    return '<h1>Hello from Route!</h1>';
});

// view/hello.blade.phpを表示
Route::get('/view/hello', function () {
    return view('message.hello');
});

// view/var.blade.phpを表示
Route::get('/view/var', function () {
    return view('message.var', ['variable' => 'Hello from web.php']);
});

// view/word.blade.phpを表示
Route::get('/view/word/{msg}', function ($msg) {
    return view('message.word', ['msg' => $msg]);
});

// view/word2.blade.phpを表示
Route::get('/view/word/{name}/{msg}', function ($name, $msg) {
    return view('message.word2', [
        'name' => $name,
        'msg' => $msg
    ]);
});

// 四則演算 $num1, $operation, $num2を受け取り、view/calc.blade.phpを表示
Route::get('calcs/{num1}/{operation}/{num2}', function ($num1, $operation, $num2) {
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
    }
    // view/calc.blade.phpを表示
    return view('message.calc', [
        'operation' => $operation,  // 演算子
        'num1' => $num1,    // 左辺
        'num2' => $num2,    // 右辺
        'result' => $result // 結果
    ]);
});

// CalcControllerのcalcメソッドを呼び出す
Route::get('calcs/{num1}/{operation}/{num2}', [CalcController::class, 'result']);
