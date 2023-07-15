<?php

use App\Core\Routing\Route;




Route::get( '/null') ;

Route::post( '/formSaver' ,function(){
    echo "the form is saved successfully" ;
}) ;
Route::put( '/' ,function(){
    echo "welcome home!" ;
}) ;

print_r(Route::routes()) ;