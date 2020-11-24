<?php

namespace App\Http\Controllers;

use App\Models\ImageUploader;
use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile(User $user)
    {
        $notes = null;

        if ($user->isOwner()) {
            $notes = $user->notes()->orderBy('status_id', 'ASC')->latest()->paginate(config('constants.max_notes_profile'));
        } else {
            $notes = $user->notes()->public()->latest()->paginate(config('constants.max_notes_profile'));
        }

        return view('user.profile', compact('user', 'notes'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('q');

        $notes = Auth::user()->notes()->where('title', 'LIKE', '%' . $keyword . '%')->latest()->paginate(config('constants.max_notes_profile'));

        return view('user.search', compact('notes', 'keyword'));
    }

    public function settings()
    {
        $user = Auth::user();

        return view('user.settings', compact('user'));
    }

    public function changePassword()
    {
        return view('user.change-password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->get('password'));
        $user->save();

        flash(__('Password changed successfully'));

        return redirect('/user/settings');
    }

    public function updateSettings(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'email' => [
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'avatar' => [
                'mimes:jpeg,jpg,png,gif'
            ],
        ]);

        if ($request->get('email') != $user->email) {
            $user->email = $request->get('email');
            $user->email_verified_at = null;
            $user->sendEmailVerificationNotification();
        }

        if ($request->has('avatar')) {
            $imageUploader = new ImageUploader();
            $user->avatar = $imageUploader->saveUploadedFile($request->file('avatar'));
        }

        $user->save();

        flash(__('Settings update'));

        return view('user.settings', [
            'user' => Auth::user()
        ]);
    }

}
