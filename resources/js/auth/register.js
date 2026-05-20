import { handleAuthForm } from '../utils/authHandler.js';

handleAuthForm({
    formId: 'registerForm',
    url: '/register',
    buttonText: 'Create Account',
    loadingText: 'Creating Account...'
});