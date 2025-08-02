<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Teamwork\AuthController;
use App\Http\Controllers\Teamwork\TeamController;
use App\Http\Controllers\Teamwork\TeamMemberController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
/**
 * Teamwork routes
 */
Route::group(['prefix' => 'teams', 'namespace' => 'Teamwork'], function()
{
    Route::get('/', [TeamController::class, 'index'])->name('teams.index');
    Route::get('create', [TeamController::class, 'create'])->name('teams.create');
    Route::post('teams', [TeamController::class, 'store'])->name('teams.store');
    Route::get('edit/{id}', [TeamController::class, 'edit'])->name('teams.edit');
    Route::put('edit/{id}', [TeamController::class, 'update'])->name('teams.update');
    Route::delete('destroy/{id}', [TeamController::class, 'destroy'])->name('teams.destroy');
    Route::get('switch/{id}', [TeamController::class, 'switchTeam'])->name('teams.switch');

    Route::get('members/{id}', [TeamMemberController::class, 'show'])->name('teams.members.show');
    Route::get('members/resend/{invite_id}', [TeamMemberController::class, 'resendInvite'])->name('teams.members.resend_invite');
    Route::post('members/{id}', [TeamMemberController::class, 'invite'])->name('teams.members.invite');
    Route::delete('members/{id}/{user_id}', [TeamMemberController::class, 'destroy'])->name('teams.members.destroy');

    Route::get('accept/{token}', [AuthController::class, 'acceptInvite'])->name('teams.accept_invite');
});
