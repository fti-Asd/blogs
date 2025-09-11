<?php

namespace App\Http\Controllers\Account;

use App\Enums\UserGender;
use App\Http\Controllers\Controller;
use App\Http\Requests\Account\ProfileUpdateRequest;
use App\Models\File;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class ProfileController extends Controller
{
    //
    public function profile()
    {
        $user = Auth::guard('web')->user();

        return view('account.profile', compact('user'));
    }

    public function update(ProfileUpdateRequest $request)
    {
        $inputs = $request->validated();

        $id = Auth::guard('web')->id();

        $user = User::findOrFail($id);

        $user->first_name = $inputs['first_name'];
        $user->last_name = $inputs['last_name'];
        $user->mobile = $inputs['mobile'];
        $user->username = $inputs['username'];

        if($user->gender == UserGender::MALE->value){
            $user->military_service_status = $inputs['military_service_status'];
        }

        if ($request->has('avatar_file')) {
            $file = $request->file('avatar_file');
            $extension = $file->extension();
            $size = $file->getSize();
            $newName = $user->id . "_" . strtotime('now') . "_" . rand(0, 1000000) . "." . $extension;

            $image_resized = Image::read($file->path());
            $image_resized->resize(50, 50);

            $newPath = Storage::disk('blogs_filesystem')->putFileAs('user', $file, $newName);

            $avatar = File::create([
                'name' => $newName,
                'path' => $newPath,
                'extension' => $extension,
                'size' => $size,
            ]);

            $user->avatar_file_id = $avatar?->id;
        }

        if ($inputs['password']) {
            $user->password = Hash::make($inputs['password']);
        }

        $user->save();

        return redirect()->route('account.profile');
    }

    public function delete()
    {
        $id = Auth::guard('web')->id();

        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('index');
    }
}
