<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/migrate', function(){
    \Artisan::call('migrate');
    dd('migrated!');
});


Route::post('/testfinger',function(Request $request){
    
    
    $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
    $aa=json_decode($request->name);
    $txt = $aa.'\n';
    fwrite($myfile, $txt);
    $txt = "Jane Doe\n";
    fwrite($myfile, $txt);
    fclose($myfile);
    return response()->json($request);
});