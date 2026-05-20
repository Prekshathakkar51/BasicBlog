import './bootstrap';

import $ from 'jquery';

window.$ = $;
window.jQuery = $;

import './blogs/delete-blog';

import './auth/login';
import './auth/register';

import './blogs/image-preview'

import { showToast } from './utils/toast.js';

document.addEventListener('DOMContentLoaded', () => {
    if (window.flashToast) {
        showToast(window.flashToast.message, window.flashToast.type);
    }
});