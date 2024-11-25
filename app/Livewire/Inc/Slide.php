<?php

namespace App\Livewire\Inc;

use Livewire\Component;

class Slide extends Component
{
    public $images; // Declare the images property
    public $variant_img; // Declare the variant_img property
    public $variants; // Declare the variants property

    public function mount($images, $variant_img, $variants) // Use mount to receive the images
    {
        $this->images = $images; // Initialize images
        $this->variant_img = $variant_img; // Initialize variant image
    }

   

    protected function refreshImages()
    {
        // Logic to refresh images if necessary
        // For example, if images are dependent on the variant_img, you might want to update them here
        // $this->images = ...; // Update the images array if required
    }

    public function render()
    {
        return view('livewire.inc.slide', [
            'images' => $this->images, // Pass images to the view
            'variant_img' => $this->variant_img, // Pass the updated variant image to the view
        ]);
    }
}
