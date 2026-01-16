/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');

document.addEventListener('DOMContentLoaded', function() {
    const urlInput = document.getElementById('url-input');
    const copyBtn = document.getElementById('copyBtn');

    if (copyBtn) {
        copyBtn.addEventListener('click', function() {
            const urlToCopy = shortenedLink ? shortenedLink.href : '';

            navigator.clipboard.writeText(urlToCopy).then(() => {
                copyBtn.innerHTML = '<i class="fas fa-check"></i> Copié !';
                copyBtn.classList.add('copied');

                setTimeout(() => {
                    copyBtn.innerHTML = '<i class="far fa-copy"></i> Copier à nouveau';
                    copyBtn.classList.remove('copied');
                }, 3000);
            }).catch(err => {
                console.error('Erreur lors de la copie: ', err);
                alert('Impossible de copier le lien. Veuillez le sélectionner manuellement.');
            });
        });
    }
});
