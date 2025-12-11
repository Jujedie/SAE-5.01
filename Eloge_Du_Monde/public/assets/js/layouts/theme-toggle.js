// Gestion du mode sombre/clair
document.addEventListener('DOMContentLoaded', function() {
    const themeToggle = document.getElementById('theme-toggle');
    const html = document.documentElement;
    const logoLight = document.getElementById('logo-light');
    const logoDark = document.getElementById('logo-dark');
    
    // Récupérer le thème sauvegardé
    const savedTheme = localStorage.getItem('theme') || 'light';
    html.setAttribute('data-theme', savedTheme);
    
    // Mettre à jour le logo selon le thème
    if (savedTheme === 'dark') {
        logoLight.style.display = 'none';
        logoDark.style.display = 'block';
    } else {
        logoLight.style.display = 'block';
        logoDark.style.display = 'none';
    }
    
    // Gérer le clic sur le bouton
    themeToggle.addEventListener('click', function() {
        const currentTheme = html.getAttribute('data-theme');
        const newTheme = currentTheme === 'light' ? 'dark' : 'light';
        
        html.setAttribute('data-theme', newTheme);
        localStorage.setItem('theme', newTheme);
        
        // Changer le logo
        if (newTheme === 'dark') {
            logoLight.style.display = 'none';
            logoDark.style.display = 'block';
        } else {
            logoLight.style.display = 'block';
            logoDark.style.display = 'none';
        }
    });
});
