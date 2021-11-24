<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * @author Carlos Fortún <carlosfortun92@gmail.com>
 *
 * @final
 * @experimental
 */
class StarExtension extends AbstractExtension
{

    /**
     * {@inheritdoc}
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('print_stars', [$this, 'printStars'], ['is_safe' => ['html']]),
        ];
    }

    public function printStars($half = "0", $size = "40", $count = "5", array $attributes = []): string
    {
        $required = ($attributes["required"]) ? " required" : "";

        $html = '
        <div class="input-group js-star-rating" data-controller="starrate"
        data-half="'. $half .'" 
        data-size="'. $size .'" 
        data-count="'. $count .'">
        <div id="stars-target"></div>    
        </div>
        <div class="form-group">
        <input type="hidden"
        id="' . $attributes["id"] . '" name="' . $attributes["full_name"] . '"
        value="' . $attributes["attr"]["value"] . '"
        class="' . $attributes["attr"]["class"] . $required . '"/>
        </div>';

        return trim($html);
    }
}
