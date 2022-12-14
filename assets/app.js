/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// You can specify which plugins you need
import { Tooltip, Toast, Popover } from 'bootstrap';

// start the Stimulus application
import './bootstrap';

// Import Custom CSS for TypeWrite Texte
import './customtypewrite';

// Import Search Bar
import liveSearch from "./searchBar";

// Konami JS
import './konami.js';

setTimeout(5000, document.getElementById('searchBox').addEventListener(
    'keyup',
    liveSearch
)
);