< ?php 
/* testing for basic route */

Route::get('/',function(){

return View::make('hello');

});

Route::group(array('before'=> 'guest'),function){
Route::get('user/create','UserContolller@getCreate');
Route::get('user/create','UserContolller@getLogin');
?>