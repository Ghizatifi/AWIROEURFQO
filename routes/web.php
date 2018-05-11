<?php
use Cornford\Googlmapper\Facades\MapperFacade;
use Illuminate\Support\Facades\Route;

// Route::get('/contactB',function ()
// {
// 	Mapper::map(
// 		53.381,
// 		-1.47,
// 		[
// 			'zoom'=>16,
// 			'draggable'=>true,
// 			'marker'=>false,
// 			'eventAfterLoad'=>
// 			'circleListner(maps[0].shapes[0].circle_0);'
// 		]
// 	);
// 	return view('welcome');
// });
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

Route::get('/dashboard',['as'=>'dashboard','uses'=>'DashboardController@dashboard']);
// Route::get('/welcome',['as'=>'index','uses'=>'MapController@index']);

////////////////////////////////////////////////Front
Route::get('/index',function(){
	return view('FrontEnd.index');
});
Route::get('/apropos',function(){
	return view('FrontEnd.apropos');
});

// Route::get('/contactB',function(){
// 	return view('FrontEnd.contact');
// });
Route::group(['middleware'=>['authen']],function(){

    //Route::get('/dashboard',['as'=>'dashboard','uses'=>'DashboardController@dashboard']);
    Route::get('/logout','LoginController@getLogout');
    Route::get('/dashboard',['as'=>'dashboard','uses'=>'DashboardController@dashboard']);

    });


Route::group(['middleware'=>['authen','roles'],'roles'=>['Admin']],function(){


    // Route::get('/gestion/cours',function(){
    //     return view('programm.gestionProgramm');
    //  });
    //////////////////////////////////Classe/////////////////////////////////////////////
     Route::get('/gestion/cours','ProgrammController@getMangeCouress');
     Route::post('/gestion/cours/ajouter-annee',['as'=>'postInsertYear','uses'=>'ProgrammController@postInsertYear']);
		 Route::post('/gestion/cours/ajouter-matiere',['as'=>'postInsertMat','uses'=>'ProgrammController@postInsertMat']);
		 Route::post('/gestion/cours/ajouter-programe',['as'=>'postInsertProgram','uses'=>'ProgrammController@postInsertProgram']);
     Route::post('/gestion/cours/ajouter-niveau',['as'=>'postInsertLevel','uses'=>'ProgrammController@postInsertLevel']);
     Route::get('/gestion/cours/ListeNiveau',['as'=>'showLevel','uses'=>'ProgrammController@showLevel']);
     Route::post('/mange/cours/ajouter-group',['as'=>'postInsertgroup','uses'=>'ProgrammController@postInsertgroup']);
     Route::get('/gestion/cours/ListeGroup',['as'=>'showGroup','uses'=>'ProgrammController@showGroup']);

     Route::post('/mange/courese/Insert-classe',['as'=>'createclasses','uses'=>'ProgrammController@createclasses']);

     Route::get('/mange/courese/classe-Info',['as'=>'showClassInformation','uses'=>'ProgrammController@showClassInformation']);
		 Route::get('/mange/courese/classInfo',['as'=>'classInformation','uses'=>'ProgrammController@classInformation']);
		 Route::get('/mange/courese/classList',['as'=>'viewClasses','uses'=>'ProgrammController@viewClasses']);

		 Route::post('/mange/courese/delet-Class',['as'=>'deletClass','uses'=>'ProgrammController@deletClass']);
		 Route::get('/mange/courese/classe-edite',['as'=>'editeClass','uses'=>'ProgrammController@editeClass']);
		 Route::post('/mange/courese/update-Class',['as'=>'updateClass','uses'=>'ProgrammController@updateClass']);
//////////////////////////////////////matiere//////////////////////////////////
Route::get('/gestion/matiere','MatController@getMatiere');
Route::post('/gestion/matiere/affectaion',['as'=>'creatematprogramme','uses'=>'MatController@creatematprogramme']);
Route::get('/gestion/matiere/Liste',['as'=>'viewMatiere','uses'=>'MatController@viewMatiere']);

     //////////////////////////////////Eleve/////////////////////////////////////////////
     Route::post('/eleve/getRigister',['as'=>'RegisterEleve','uses'=>'EleveController@RegisterEleve']);
     Route::post('/gestion/cours/ajouter-group',['as'=>'postRegisterationSEleve','uses'=>'EleveController@postRegisterationSEleve']);
     Route::get('/gestion/eleve','EleveController@getUnivInfo');
     Route::get('/gestion/eleveList','EleveController@view');
		 Route::get('/gestion/eleveList/absence','absenceController@view');

    // Route::get('/gestion/eleve/info',['as'=>'view','uses'=>'EleveController@view']);
		 Route::get('/gestion/eleve/search',['as'=>'studentInfo','uses'=>'EleveController@studentInfo']);

///////////////////////////////////////////////////////////////////
		 Route::post('/gestion/prof/add-prof',['as'=>'getRegisterationProf','uses'=>'ProfController@getRegisterationProf']);
    Route::get('/gestion/prof/getProf',['as'=>'view','uses'=>'ProfController@view']);
    Route::delete('/matiere/deleteProf/{id}','ProfController@destroy');


     Route::get('/gestion/prof/add-prof',function(){
        return view('professeur.profRegister');
     });

		 // Route::get('/edit/prof/{id_prof}',['as'=>'edit','uses'=>'ProfController@edit']);
		 // Route::post('/update/prof/{id_prof}',['as'=>'update','uses'=>'ProfController@update']);
Route::resource('profs','ProfController');

     //Route::get('/matiere/getMatInfo','MatController@getMatInfo');
    Route::post('/matiere/getRigister',['as'=>'matRegister','uses'=>'MatController@matRegister']);
    Route::get('/matiere/ListMatiere','MatController@getMatInfo');
    Route::post('/matiere/ListMatiere','MatController@getMatInfo');
    Route::get('/matiere/search',['as'=>'MatInfo','uses'=>'MatiereController@MatInfo']);
    Route::delete('/matiere/deleteMat/{id}','MatController@destroy');

    Route::get('/edit/mat/{id}','MatController@edit');
    Route::post('/edit/mat/{id}','MatController@updateMate');

    Route::get('/edit/eleve/{id}','EleveController@edit');
    Route::post('/update/eleve/{id}',['as'=>'update','uses'=>'EleveController@update']);

////////////////////////////////////////////////////////////////////
    //Route::get('contact','EmailController@contact');
    Route::get('contact', 'EmailController@getContact');
    Route::post('contact', 'EmailController@postContact');
    /////////////////////////////////////////////////////////

		Route::get('contactB', ['as'=>'getContactB','uses'=>'EmailController@getContactB']);
    Route::post('contactB', 'EmailController@postContactB');
    /////////////////////////////////////////////////////////

		Route::get('/gestion/eleve/payment',['as'=>'getFeePayment','uses'=>'PayementController@getFeePayment']);
		Route::get('eleve/payment',['as'=>'showStudentPayment','uses'=>'PayementController@showStudentPayment']);
		Route::get('eleve/go/to/payment/{id_eleve}',['as'=>'goPayment','uses'=>'PayementController@goPayment']);
		Route::post('eleve/go/to/payment/save',['as'=>'savePayment','uses'=>'PayementController@savePayment']);
		Route::post('frais/create',['as'=>'createFrais','uses'=>'PayementController@createFrais']);
		Route::get('frais/eleve/pay',['as'=>'pay','uses'=>'PayementController@pay']);
		Route::post('frais/eleve/exstra/pay',['as'=>'exstraPay','uses'=>'PayementController@exstraPay']);
		Route::get('frais/eleve/print/invoice/{receiptId}',['as'=>'printInvoice','uses'=>'PayementController@printInvoice']);
		Route::get('frais/eleve/transaction/dalete/{id_transaction}',['as'=>'deleteTransaction','uses'=>'PayementController@deleteTransaction']);


		////////////////////////////////////////////Les rapports////////////////////////

Route::get('etudiant/rapport/listeEtudiant',['as'=>'getListEtudiant','uses'=>'RapportController@getListEtudiant']);
Route::get('etudiant/rapport/InfoEtudiant',['as'=>'EtudiantList','uses'=>'RapportController@EtudiantList']);
Route::get('report/etudiant-multi-class',['as'=>'getEtudiantListMulitiClass','uses'=>'RapportController@getEtudiantListMulitiClass']);
Route::get('report/etudiant-multi-class-show',['as'=>'showEtudiantMultiClass','uses'=>'RapportController@showEtudiantMultiClass']);
Route::get('rapport/etudiant-Enorrl',['as'=>'NewStudentRegister','uses'=>'RapportController@NewStudentRegister']);
		///////////////////////////////////////////////////////////////////////////
		Route::get('emplois/create',['as'=>'createEmplois','uses'=>'EmploisController@createEmplois']);
		Route::get('emplois/display',['as'=>'displayEmplois','uses'=>'EmploisController@displayEmplois']);
		Route::post('/emplois/Insert-prog',['as'=>'createprog','uses'=>'EmploisController@createprog']);



	///////////////////////////////////////////////////
				Route::get('/agenda', function () {
				    return view('events.events');
				});

	Route::resource('events', 'EventController',['only' => ['index', 'store', 'update', 'destroy']]);

});
