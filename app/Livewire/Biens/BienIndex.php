<?php

namespace App\Livewire\Biens;

use App\Models\Bien;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.simple')]
class BienIndex extends Component
{
    use WithPagination;

    #[Url]
    public string $q = '';

    public function updatingQ()
    {
        $this->resetPage();
    }

    public function delete(int $id): void
    {
        Bien::findOrFail($id)->delete();
        session()->flash('success', 'Bien supprimé.');
    }

    public function render()
    {
        $query = Bien::query();
        if ($this->q !== '') {
            $query->where(function ($q) {
                $q->where('titre', 'like', "%{$this->q}%")
                  ->orWhere('localisation', 'like', "%{$this->q}%");
            });
        }
        $biens = $query->latest()->paginate(10);

        return view('livewire.biens.index', compact('biens'));
    }
}


