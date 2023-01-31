<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Exception;

class UserController extends Controller
{
    const DEFAULT_PASSWORD = '123456';

    public function index()
    {
        $users = User::with(['card', 'courses'])->paginate(5);

        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $avatarFilename = $request->email . '.' . $request->file('avatar')->getClientOriginalExtension();
            $path = $this->saveAvatar($request->file('avatar'), $avatarFilename);
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make(self::DEFAULT_PASSWORD),
                'phone' => $request->phone,
                'type' => $request->type ?? 0,
                'avatar' => $path,
                'course_id' => $request->course,
            ]);
            DB::commit();

            return redirect()->route('users.index');
        } catch (Exception $e) {
            DB::rollBack();

            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    protected function saveAvatar($file, $fileName)
    {
        $pathImage = $file->storeAs('public', $fileName);
        $path = str_replace('public', '', $pathImage);
        $img = Image::make(storage_path('app/public' . $path));
        $img->resize(200, 200)->save(storage_path('app/public' . $path));

        return $path;
    }

    public function deleteAvatar($fileName)
    {
        return unlink(storage_path('app/public' . $fileName));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $user = User::find($id);
            $dataUser = $request->only([
                'name',
                'email',
                'phone',
            ]);
            if ($request->file('avatar')) {
                $imageDeleted = $this->deleteAvatar($user->avatar);
                if (!$imageDeleted) {
                    throw new Exception('Error delete old avatar');
                }
                $avatarFilename = $request->email . '.' . $request->file('avatar')->getClientOriginalExtension();
                $path = $this->saveAvatar($request->file('avatar'), $avatarFilename);
                $dataUser['path'] = $path;
            }
            $user->update($dataUser);
            DB::commit();

            return redirect()->route('users.index');
        } catch (Exception $e) {
            DB::rollBack();

            return back()->withErrors(['msg' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('users.index');
    }

    public function showCard($userId)
    {
        $card = Card::where('user_id', $userId)->first();

        return view('user.card_info', $card);
    }
    public function updateCard(Request $request, $userId)
    {
        Card::find($request->id)->update([
            'confirm' => $request->confirm,
        ]);
        return redirect()->route('users.index');
    }
}
