<!-- Footer -->
<footer>
    <div class="footer-container">
        <!-- Main Footer Content -->
        <div class="footer-grid">
            <!-- Brand Column -->
            <div>
                <div class="footer-brand">
                    <div class="footer-logo">
                        <span style="color: white; font-family: 'Playfair Display', serif;">É</span>
                    </div>
                    <div>
                        <span style="letter-spacing: 0.05em; font-size: 0.875rem;">ÉLOGE DU MONDE</span>
                    </div>
                </div>
                <p class="footer-description">
                    Créateur de voyages sur mesure haut de gamme depuis 2013.
                    Votre évasion commence ici.
                </p>
                <div class="social-links">
                    <a href="#" class="social-link" aria-label="Facebook">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                        </svg>
                    </a>
                    <a href="#" class="social-link" aria-label="Instagram">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                        </svg>
                    </a>
                    <a href="#" class="social-link" aria-label="LinkedIn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                            <rect x="2" y="9" width="4" height="12"></rect>
                            <circle cx="4" cy="4" r="2"></circle>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- L'entreprise -->
            <div class="footer-column">
                <h4>L'entreprise</h4>
                <ul class="footer-links">
                    <li><a href="#about">Qui sommes-nous ?</a></li>
                    <li><a href="#about">Nos valeurs</a></li>
                    <li><a href="#about">L'équipe</a></li>
                    <li><a href="<?= base_url('blog') ?>">Blog</a></li>
                </ul>
            </div>

            <!-- Nos services -->
            <div class="footer-column">
                <h4>Nos services</h4>
                <ul class="footer-links">
                    <li><a href="#destinations">Voyages sur mesure</a></li>
                    <li><a href="#themes">Voyages thématiques</a></li>
                    <li><a href="#destinations">Destinations</a></li>
                    <li><a href="#temoignages">Témoignages</a></li>
                </ul>
            </div>

            <!-- Informations légales -->
            <div class="footer-column">
                <h4>Informations légales</h4>
                <ul class="footer-links">
                    <li><a href="<?= base_url('mentions-legales') ?>">Mentions légales</a></li>
                    <li><a href="<?= base_url('cgv') ?>">Conditions générales</a></li>
                    <li><a href="<?= base_url('confidentialite') ?>">Politique de confidentialité</a></li>
                    <li><a href="<?= base_url('contact') ?>">Contact</a></li>
                </ul>
            </div>
        </div>

        <!-- Certifications & Info -->
        <div class="footer-divider">
            <div class="footer-certifications">
                <span>Immatriculation Atout France</span>
                <span>•</span>
                <span>Garantie financière</span>
                <span>•</span>
                <span>Assurance RC Pro</span>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="footer-bottom">
            <p>© <?= date('Y') ?> Éloge du Monde. Tous droits réservés.</p>
        </div>
    </div>
</footer>
