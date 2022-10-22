<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class UserItem extends Component
{
    public $user;
    public $roles;
    public $role;
    public $dropdown = false;
    public $saveButton = false;
    public $changeRole = false;
    public $showDeleteModal = false;

    protected $listeners = [
        'editFlash' => 'editFlash',
        'userEdited' => 'clearEditFlash',
        'userDeleted' => 'clearDeleteFlash'
    ];

    public function mount(User $user, Collection $roles)
    {
        $this->user = $user;
        $this->role = $user->role->label;
        $this->roles = $roles;
    }

    public function render()
    {
        return view('livewire.admin.user-item');
    }

    public function changeState()
    {
        $this->changeRole = !$this->changeRole;
        $this->role = $this->user->role->label;
        $this->saveButton = false;
    }

    public function changeRole($role)
    {
        $this->role = $role;
        $this->saveButton = true;
        $this->dropdown = false;
    }

    public function edit()
    {
        $this->user->role_id = $this->roles->firstWhere('label', $this->role)->id;
        $this->user->save();
        $this->saveButton = false;
        $this->changeRole = false;

        $this->refresh();
        $this->emit('userEdited', ['id' => $this->user->id]);
    }

    public function delete()
    {
        $this->user->delete();
        $this->showDeleteModal = false;

        Session::flash('success', [
            'action' => 'Success!',
            'message' => "An user was deleted"
        ]);

        $this->refresh();
        $this->emit('userDeleted', ['id' => 1]);
    }

    public function refresh()
    {
        //
    }

    public function editFlash()
    {
        Session::flash('success', [
            'action' => 'Success!',
            'message' => "User's role was changed"
        ]);
    }

    public function clearEditFlash($params)
    {
        if($this->user->id == $params['id']) {
            $this->emitSelf('editFlash');
        }
    }

    public function clearDeleteFlash($id)
    {
        if($this->user->id == $id) {
            $this->emitSelf('editFlash');
        }
    }
}
