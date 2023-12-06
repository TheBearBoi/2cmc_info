<?php

namespace App\View\Components\Card;

use App\Models\Card;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

/**
 * Component for generating a primary image element of the card,
 * that will transform when clicked, if the card transforms.
 *
 * @package App\View\Components\Card
 */
class PrimaryImage extends Component
{
    public Card $card;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($card)
    {
        $this->card = $card;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('components.card.primary-image');
    }
}
