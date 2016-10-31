<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');
Route::get('/hello',function(){
    return 'hello';
});

Route::get('/resumeview', 'ResumeController@index');

/*Route::get('/register','Auth\AuthController@register');
Route::post('/register_act','Auth\AuthController@register_act');
Route::get('/login','Auth\AuthController@login');
Route::post('/login_act','Auth\AuthController@login_act');*/

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/company', 'CompanyController@index');

Route::get('/work', 'HomeController@work');
Route::get('/project', 'HomeController@project');
Route::get('/education', 'HomeController@education');
Route::get('/skills', 'HomeController@skills');
Route::post('/home','HomeController@base_info');
Route::get('/intention','HomeController@intention');
Route::post('/intention','HomeController@intention_add');
Route::get('/gallery','HomeController@gallery');
Route::get('/tempselect','HomeController@temp_select');
Route::post('/imgup','HomeController@imgup');
Route::get('/get_region','HomeController@get_region');
Route::get('/get_gallery','HomeController@get_gallery');
Route::get('/img_del_{id}','HomeController@img_del');
Route::get('/set_tpl_{id}','HomeController@set_tpl');

Route::get('work_add','HomeController@work_add');
Route::post('work_add','HomeController@workAdd');
Route::get('work_edit_{id}.html','HomeController@work_edit');
Route::get('work_del_{id}.html','HomeController@work_del');

Route::get('project_add','HomeController@project_add');
Route::post('project_add','HomeController@projectAdd');
Route::get('project_edit_{id}.html','HomeController@project_edit');
Route::get('project_del_{id}.html','HomeController@project_del');

Route::get('edu_add','HomeController@edu_add');
Route::post('edu_add','HomeController@eduAdd');
Route::get('edu_edit_{id}.html','HomeController@edu_edit');
Route::get('edu_del_{id}.html','HomeController@edu_del');

Route::get('skill_add','HomeController@skill_add');
Route::post('skill_add','HomeController@skillAdd');
Route::get('skill_edit_{id}.html','HomeController@skill_edit');
Route::get('skill_del_{id}.html','HomeController@skill_del');

Route::post('company_add','CompanyController@company_add');
Route::get('job','CompanyController@job');
Route::get('job_add','CompanyController@job_add');

Route::get('/public/upload_image/{file_dir}/{image_name}',  function ($file_dir,$image_name) {
    $file_size = getimagesize(public_path()."/upload_image/{$file_dir}/{$image_name}");
    $mine = $file_size['mime'];
    $file_content = file_get_contents(public_path()."/upload_image/{$file_dir}/{$image_name}");
    return $response = Response::make($file_content)->header('Content-Type', $mine);
});
Route::get('/public/stastic/img/{image_name}',  function ($image_name) {
    $file_size = getimagesize(public_path()."/stastic/img/{$image_name}");
    $mine = $file_size['mime'];
    $file_content = file_get_contents(public_path()."/stastic/img/{$image_name}");
    return $response = Response::make($file_content)->header('Content-Type', $mine);
});



