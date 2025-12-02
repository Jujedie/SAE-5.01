<!-- Header -->
<header id="header">
    <div class="header-container">
        <a href="<?= base_url('/') ?>" class="logo">
            <span>É</span>
        </a>

        <nav>
            <ul class="nav-links">
                <li class="nav-dropdown">
                    <a href="<?= base_url('destinations') ?>">
                        Nos destinations
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </a>
                    <div class="dropdown-menu">
                        <a href="<?= base_url('destinations?filter=continent&value=europe') ?>">Europe</a>
                        <a href="<?= base_url('destinations?filter=continent&value=asie') ?>">Asie</a>
                        <a href="<?= base_url('destinations?filter=continent&value=afrique') ?>">Afrique</a>
                        <a href="<?= base_url('destinations?filter=continent&value=ameriques') ?>">Amériques</a>
                        <a href="<?= base_url('destinations?filter=continent&value=oceanie') ?>">Océanie</a>
                    </div>
                </li>
                <li><a href="<?= base_url('creer-voyage') ?>">Créer votre voyage</a></li>
                <li><a href="<?= base_url('temoignages') ?>">Témoignages</a></li>
                <li><a href="<?= base_url('blog') ?>">Blog</a></li>
            </ul>
        </nav>

        <div class="header-actions">
            <a href="<?= base_url('compte') ?>" class="account-icon" aria-label="Mon compte">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#C9A96E" stroke-width="2">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
            </a>
            <a href="<?= base_url('connexion') ?>" class="btn-connexion">Connexion</a>
        </div>

        <button class="mobile-menu-btn" aria-label="Menu mobile">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </button>
    </div>
</header>

<script>
    // Header scroll effect
    window.addEventListener('scroll', function() {
        const header = document.getElementById('header');
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });
</script>
