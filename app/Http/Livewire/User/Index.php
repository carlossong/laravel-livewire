<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $listeners = ['delete'];

    public function render()
    {
        $roles = User::with(['roles']);
        $users = User::paginate(5);
        return view('livewire.user.index', compact('users', 'roles'));
    }

    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'title' => 'Essa ação não poderá ser revertida',
            'text' => '',
            'id' => $id,
        ]);
    }

    public function delete($id)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        User::where('id', $id)->delete();

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Usuário removido com sucesso!',
            'text' => '',
        ]);
    }

}
