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

use App\Formation;
use App\Cour;
use App\Comment;

Route::get('/', function () {
    return view('index');
});
Route::get('/home', function () {
    return view('index');
});
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

/**
 * Admin routes
 *
 */




 Route::group(['middleware' => 'auth'], function () {
   /**
    * Formateur routes
    *
    */
  Route::get('/', 'Admin\BaseController@index')->name('home');
   Route::group(['middleware'=>'role:formateur'], function () {
       Route::resource('formation', 'Admin\FormationController');
       Route::get('/formation/{id}/participants', 'Admin\FormationController@participants')->name('formation.participants');
       Route::resource('cour', 'Admin\CourController');
       Route::get('/comments', 'Admin\CommentaireController@index')->name('comments.index');
       Route::delete('/comments/{id}', 'Admin\CommentaireController@destroy')->name('comments.destroy');
       //Route::resource('commentaire', 'CommentaireController');

       Route::resource('qcms', 'Qcm\QcmsController');
       Route::resource('questions', 'Qcm\QuestionsController');
       Route::resource('questions_options', 'Qcm\QuestionsOptionsController');
       Route::resource('results', 'Qcm\ResultsController');

       /**
        * Admin routes
        *
        */
       Route::group(['middleware'=>'role:admin'], function () {
           Route::resource('users', 'Admin\UtilisateurController');
           Route::resource('categorie', 'Admin\CategeoryController');
       });
   });
   /**
    * Apprenant routes
    *
    */
   Route::get('/formations/{id}', 'BaseController@getFormation')->name('getFormation');
   Route::get('/formations/{id}/test', 'Qcm\TestsController@index')->name('test');
   Route::get('/formations/{id}/inscrire', 'Apprenant\FormationController@inscrire')->name('formation.inscrire');
   Route::get('/formations/{id}/desinscrire', 'Apprenant\FormationController@desinscrire')->name('formation.desinscrire');
   Route::get('/formations/{id}/courses/{course}', 'CourController@getCourse')->name('getCourse');
   Route::post('/cour/complete/{id}', 'CourController@complete')->name('cour.complete');
   Route::post('/cours/{id}/commentaire', 'CourController@publierCommentaire')->name('cour.commentaire.store');
   Route::get('/profile/', 'BaseController@profile')->name('profile');
   Route::get('/myresults', 'Qcm\ResultsController@myresults')->name('myresults');
   Route::get('/myresults/{id}', 'Qcm\ResultsController@myresultshow')->name('myresultshow');
   Route::resource('tests', 'Qcm\TestsController');
 });










































Route::get('/', 'BaseController@index')->name('index');

Route::get('/testing', function(){
    //  $user = Auth::user();
    //  $formation  = $user->formation()->where('id','5')->first()->pivot->progression;
    //  ddd($formation);

    // $formation = Formation::find(5);
    // $lesson = Cour::find(1);
    // $next= null;
    // $cours = $formation->cours;
    //$value = $cours->contains($cour);
    // $cours->each(function ($item, $key) {
    //     if($item->id === $cour->id)
    //         return 'the next course is'. $item[$key+1]->id;
    // });

    // foreach($formation->cours as $key=>$c){
    //     // echo $key+1 .' ';
    //     // echo count($formation->cours);
    //       if($c->id === $lesson->id && (($key+1) !== (count($formation->cours))))
    //            $next =  $formation->cours[$key+1]->id;
    //     // if(){
    //     //         echo 'not the same';
    //     // }else{
    //     //     echo 'the same';
    //     // }
    // }
    //  $foration=  Auth::user()->formation()->where('id',5)->first();
    //  $foration->pivot->progression = 100;
    //  return $foration->pivot->save();


    //return Auth::user()->cours;
    //     echo Auth::user()->cours;
    // return Auth::user()->cours()->attach(2);
    //     echo '<br>';
    //     echo Auth::user()->cours;



//$formation = Formation::find(5);

 //ddd($formation->cours->first()->id);


    // $formation = Formation::find(5);

    // return round(count($formation->cours->intersect(Auth::user()->cours))/count($formation->cours)*100);

            //  $formations = Formation::where('formateur_id', '=' ,'1');
            //  return $formations;


            //  foreach(Auth::user()->formations as $formation){
            //       foreach($formation->cours as $cour){
            //           foreach($cour->commentaires as $comment){
            //               echo $comment;
            //           }
            //       }
            //  }

            //return Auth::user()->formations;

        //    $comments = Comment::where('reponse','=','')
        //    ->whereHas('cours', function($q){
        //     $q->where('id', 'in', '2020-01-01 00:00:00');
        // })

        //    ->get();
        //    return $comments;

        //return Comment::with('cour.formation.formateur')->get();
            //return Comment::where('cour_id','in',[1,2,3])->get();

            //$comments = Comment::where('cour')

        //return Auth::user()->formations;
            // $comment = Comment::find(1);
            // return $comment->cour->formation->formateur;

});
