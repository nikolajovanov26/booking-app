<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProfilePicture extends Component
{
    use WithFileUploads;

    public $show = false;
    public $imagePath;
    public $image;
    public $hasImage;
    public $profile;

    public function render()
    {
        return view('livewire.profile.edit-profile-picture');
    }

    public function mount()
    {
        $this->profile = Auth::user()->profile;
        $this->imagePath = Storage::disk('profile_pictures')->url($this->profile->user_id . DIRECTORY_SEPARATOR .$this->profile->profile_picture);
        $this->hasImage = !is_null($this->profile->profile_picture);
    }

    public function save()
    {
        $this->validate([
            'image' => 'image|max:1024', // 1MB Max
        ]);

        $name = Carbon::now()->timestamp . '-profile_picture.'. last(explode('.',  $this->image->getClientOriginalName()));

        Storage::disk('profile_pictures')->putFileAs(Auth::user()->id, $this->image, $name);

        if (!is_null($this->profile->profile_picture)) {
            Storage::disk('profile_pictures')->delete(Auth::user()->id . DIRECTORY_SEPARATOR . $this->profile->profile_picture);
        }

        $this->profile->profile_picture = $name;
        $this->profile->save();
        $this->update();
    }

    public function update()
    {
        $this->show = false;
        $this->image = null;
        $this->imagePath = Storage::disk('profile_pictures')->url($this->profile->user_id . DIRECTORY_SEPARATOR .$this->profile->profile_picture);
        $this->hasImage = !is_null($this->profile->profile_picture);
    }


}
