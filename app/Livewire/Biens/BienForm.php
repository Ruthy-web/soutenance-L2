<?php

namespace App\Livewire\Biens;

use App\Models\Bien;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;
use Livewire\Component;

#[Layout('layouts.simple')]
class BienForm extends Component
{
    use WithFileUploads;

    public ?Bien $bien = null;

    public string $titre = '';
    public string $description = '';
    public string $localisation = '';
    public ?float $latitude = null;
    public ?float $longitude = null;
    public ?int $surface = null;
    public ?int $chambres = null;
    public ?int $salles_bain = null;
    public string $type = '';
    public ?int $prix = null;
    public $image = null; // Livewire temporary upload

    protected function rules(): array
    {
        return [
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'localisation' => 'required|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'surface' => 'required|integer|min:1',
            'chambres' => 'required|integer|min:0',
            'salles_bain' => 'required|integer|min:0',
            'type' => 'required|string|max:100',
            'prix' => 'nullable|integer|min:0',
            'image' => 'nullable|image|max:4096',
        ];
    }

    public function mount(?int $id = null): void
    {
        if ($id) {
            $this->bien = Bien::findOrFail($id);
            $this->fill($this->bien->only([
                'titre','description','localisation','latitude','longitude','surface','chambres','salles_bain','type','prix'
            ]));
        }
    }

    public function save()
    {
        $data = $this->validate();

        if ($this->image) {
            $path = $this->image->store('biens', 'public');
            $data['image_path'] = $path;
        }

        if ($this->bien) {
            $this->bien->update($data);
            session()->flash('success', 'Bien mis à jour.');
        } else {
            $this->bien = Bien::create($data);
            session()->flash('success', 'Bien créé.');
        }

        return redirect()->route('biens.index');
    }

    public function render()
    {
        return view('livewire.biens.form');
    }
}


