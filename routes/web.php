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
     Route::post('/eleve/getRigister',['as'=>'RegisterEleve','uses'=>'EleveController@RegisterEleve']);
     Route::post('/gestion/cours/ajouter-group',['as'=>'postRegisterationSEleve','uses'=>'EleveController@postRegisterationSEleve']);
     Route::get('/gestion/eleve','EleveController@getUnivInfo');
     Route::get('/gestion/eleveList','EleveController@getUnivInfo');



     Route::get('/gestion/eleve/info',['as'=>'view','uses'=>'EleveController@view']);
     Route::post('/gestion/prof/add-prof',['as'=>'getRegisterationProf','uses'=>'ProfController@getRegisterationProf']);

    Route::get('/gestion/prof/getProf',['as'=>'view','uses'=>'ProfController@view']);
    Route::delete('/matiere/deleteProf/{id}','ProfController@destroy');


     Route::get('/gestion/prof/add-prof',function(){
        return view('professeur.profRegister');
     });

     //Route::get('/matiere/getMatInfo','MatController@getMatInfo');
    Route::post('/matiere/getRigister',['as'=>'matRegister','uses'=>'MatController@matRegister']);
    Route::get('/matiere/ListMatiere','MatController@getMatInfo');
    Route::post('/matiere/ListMatiere','MatController@getMatInfo');
    Route::get('/matiere/search',['as'=>'MatInfo','uses'=>'MatiereController@MatInfo']);
    Route::delete('/matiere/deleteMat/{id}','MatController@destroy');

    Route::get('/edit/mat/{id}','MatController@edit');
    Route::post('/edit/mat/{id}','MatController@updateMate');

////////////////////////////////////////////////////////////////////
    //Route::get('contact','EmailController@contact');
    Route::get('contact', 'EmailController@getContact');
    Route::post('contact', 'EmailController@postContact');


    
});
