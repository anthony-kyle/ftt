<?php

use App\Models\Job;
use App\Models\JobNote;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index', [
        'users' => User::all()
    ]);
});

Route::prefix('/users')->group(function () {
    Route::get('{user}', function (User $user) {
        return view('user', ['user' => $user->load('jobs')]);
    });
});

Route::prefix('/jobs')->group(function () {
    Route::get('{job:code}', function (Job $job) {
        return view('job', ['job' => $job->load('notes'), 'statuses' => ['scheduled', 'active', 'invoicing', 'to priced', 'completed']]);
    });

    Route::post('{job:code}/note', function (Request $request, Job $job) {
        $note = $request->input('note');
        if ($note) JobNote::create(['job_id' => $job->id, 'note' => $note]);
        return redirect('/jobs/' . $job->code);
    });

    Route::post('{job:code}/note/{jobnote}', function (Request $request, Job $job, JobNote $jobnote) {
        $note = $request->input('note');
        if ($note) $jobnote->update(['note' => $note]);
        return redirect('/jobs/' . $job->code);
    });

    Route::patch('{job:code}/status', function (Request $request, Job $job) {
        $status = $request->input('status');
        if ($status) $job->update(['status' => $status]);
        return true;
    });

    Route::delete('{job:code}/note/{jobnote}', function (Job $job, JobNote $jobnote) {
        $jobnote->delete();
        return true;
    });
});
