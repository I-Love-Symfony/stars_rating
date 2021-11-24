import { Controller } from 'stimulus';
import Stars from 'stars-rating';
import React from 'react';
import {render} from 'react-dom';

export default class extends Controller {
    connect() {        
        var starRating = document.querySelector('.js-star-rating');
        const half = (starRating.dataset.half == "1" || starRating.dataset.half == "true") ? true : false;
        const size = parseInt(starRating.dataset.size);
        const count = parseInt(starRating.dataset.count);
		
		const starsRate = {
			size: size,
			count: count,
			half: half,
			value: 0,
			onChange: newValue => {
				var rating = document.querySelector('.hidden-stars-rating');
                rating.value = newValue;
			}
		}		
		render(<Stars {...starsRate} />,
		document.getElementById('stars-target'));
    }
}