<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/','LoginController@getLogin');
Route::post('/login','LoginController@postLogin');

Route::get('/noPermission',function(){
	return view('noPermission');
});


Route::group(['middleware'=>['authen']],function(){

    Route::get('/dashboard',['as'=>'dashboard','uses'=>'DashboardController@dashboard']);
    Route::get('/logout','LoginController@getLogout');
    
    });


Route::group(['middleware'=>['authen','roles'],'roles'=>['Admin']],function(){

    
    Route::get('/gestion/cours',function(){
        return view('cours.gestionCours');
     });
    //////////////////////////////////Classe/////////////////////////////////////////////
     Route::get('/gestion/cours','CoursController@getMangeCouress');
     Route::post('/gestion/cours/ajouter-annee',['as'=>'postInsertYear','uses'=>'CoursController@postInsertYear']);
     Route::post('/gestion/cours/ajouter-matiere',['as'=>'postInsertProgram','uses'=>'CoursController@postInsertProgram']);
     Route::post('/gestion/cours/ajouter-niveau',['as'=>'postInsertLevel','uses'=>'CoursController@postInsertLevel']);
     Route::get('/gestion/cours/ListeNiveau',['as'=>'showLevel','uses'=>'CoursController@showLevel']);
     Route::post('/gestion/cours/ajouter-periode',['as'=>'postInsertshift','uses'=>'CoursController@postInsertshift']);
     Route::post('/gestion/cours/ajouter-time',['as'=>'postInserttime','uses'=>'CoursController@postInserttime']);
     Route::post('/mange/cours/ajouter-group',['as'=>'postInsertgroup','uses'=>'CoursController@postInsertgroup']);
     
     
     //////////////////////////////////Eleve/////////////////////////////////////////////
     Route::get('/eleve/getRigister',['as'=>'getRegisterationEleve','uses'=>'EleveController@getRegisterationEleve']);
     Route::post('/gestion/cours/ajouter-group',['as'=>'postRegisterationSEleve','uses'=>'EleveController@postRegisterationSEleve']);



     Route::get('/gestion/prof/add-prof',['as'=>'getRegisterationProf','uses'=>'ProfController@getRegisterationProf']);
    //  Route::get('/gestion/prof/getProf',['as'=>'createProf','uses'=>'ProfController@createProf']);

   
     Route::get('/gestion/eleveList',function(){
        return view('eleves.eleveList');
     });


});
