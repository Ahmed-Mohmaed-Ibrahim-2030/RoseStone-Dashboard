<?php


use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Category\subCategoryController;
use App\Http\Controllers\courseController;
use Illuminate\Support\Facades\Route;

Route::resource('Category',CategoryController::class)->middleware('auth');

Route::resource('SubCategory',SubCategoryController::class)->middleware('auth');
Route::post('storeSubCategory/{category}',[CategoryController::class,'storeSubCategory'])->name('storeSubCategory')->middleware('auth');
Route::get('createSubCategory/{category}',[CategoryController::class,'createSubCategory'])->name('createSubCategory')->middleware('auth');
Route::get('Category/SubCategory/{category}',[CategoryController::class,'getSubCategories'])->name('getSubCategories')->middleware('auth');

//Route::get('getCourseBySubCategoryId/{subcategory}',[courseController::class,'getCourseBySubCategoryId'])->name('getCourseBySubCategoryId')->middleware('auth');
//Route::get('unreviewedCourses',[courseController::class,'getUnreviewedCourse'])->name('UnreviewedCourses')->middleware('auth');
//Route::get('review/{course}',[courseController::class,'review'])->name('review')->middleware('auth');

