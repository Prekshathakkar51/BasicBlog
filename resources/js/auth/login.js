import { handleAuthForm } from '../utils/authHandler.js';

handleAuthForm({
    formId: 'loginForm',
    url: '/login',
    buttonText: 'Sign In',
    loadingText: 'Signing In...'
});