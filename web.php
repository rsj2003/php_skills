<?php
use src\Core\Route;

// Route::reg([
//   ["get","/main@MainController@page/main"],
// ]);

if(ss()) {
  Route::reg([
    ["get","/@MainController@main"],
  ]);
}else {
  Route::reg([
    ["get","/@MainController@login"],
    ["get","/login@MainController@login_page"],
  ]);
}