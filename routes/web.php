<?php

use App\Core\Routing\Route;




Route::get('/' , 'HomeController@index') ;



Route::add( ['get' , 'post'] ,'/a' ,function(){
    echo "the form is saved successfully" ;
}) ;

// Route::get( '/a' ,function(){
//     echo "the form is saved successfully" ;
// }) ;
Route::get( '/b' ,function(){
    echo "welcome home!" ;
}) ;

// print_r(Route::routes()) ;