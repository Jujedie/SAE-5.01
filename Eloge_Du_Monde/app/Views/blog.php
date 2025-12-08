<?= $this->extend('layouts/default') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/blog.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="blog-hero" style="margin-top: 5rem;">
	<div class="blog-hero-overlay">
		<div class="blog-hero-decoration top-left"></div>
		<div class="blog-hero-decoration bottom-right"></div>
	</div>
	
	<div class="blog-hero-content">
		<div class="blog-badge">
			<svg class="blog-badge-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
				<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
			</svg>
			<span>BLOG & CONSEILS</span>
		</div>
		
		<h1 class="blog-hero-title playfair">Inspirations & Guides</h1>
		
		<p class="blog-hero-description">
			Conseils d'experts, guides de destinations et astuces pour préparer votre prochain voyage
		</p>
	</div>
</section>

<!-- Blog Posts Section -->
<section class="blog-posts-section">
	<div class="blog-container">
		<div class="blog-content">
			<!-- Filters -->
			<div class="blog-filters">
				<span class="filter-label">Filtrer par :</span>
				<div class="filter-buttons">
					<button class="filter-btn active" data-filter="all">Tous les articles</button>
					<button class="filter-btn" data-filter="Destinations">Destinations</button>
					<button class="filter-btn" data-filter="Budgets">Budgets</button>
					<button class="filter-btn" data-filter="Guides">Guides</button>
					<button class="filter-btn" data-filter="Conseils">Conseils</button>
				</div>
				<p class="filter-count" id="filterCount">8 articles</p>
			</div>

			<!-- Blog Posts -->
			<div class="blog-posts" id="blogPosts">
				<!-- Post 1 -->
				<article class="blog-post" data-tag="Destinations">
					<div class="post-header">
						<div class="post-date">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
								<line x1="16" y1="2" x2="16" y2="6"></line>
								<line x1="8" y1="2" x2="8" y2="6"></line>
								<line x1="3" y1="10" x2="21" y2="10"></line>
							</svg>
							<span>1 novembre 2024</span>
						</div>
						<span class="post-tag">Destinations</span>
					</div>
					
					<h2 class="post-title playfair">Comment bien préparer son premier voyage aux Maldives</h2>
					
					<div class="post-image">
						<img src="<?= base_url('assets/images/blog1.jpeg') ?>" alt="Maldives">
					</div>
					
					<div class="post-content">
						<p class="post-excerpt">Les Maldives représentent la destination rêvée pour de nombreux voyageurs en quête de paradis tropical. Mais comment s'assurer que votre séjour soit à la hauteur de vos attentes ? Voici nos conseils d'experts pour préparer au mieux votre voyage.</p>
						<div class="post-full-content" style="display: none;">
							<p>Tout d'abord, le choix de la période est crucial. La meilleure saison s'étend de novembre à avril, pendant la saison sèche. Les températures sont idéales (28-30°C) et les conditions de plongée optimales. Évitez la mousson de mai à octobre si possible.</p>
							<p>Concernant l'hébergement, les Maldives offrent un large éventail d'options. Les resorts sur îles privées garantissent intimité et exclusivité, avec des villas sur pilotis directement au-dessus de l'eau. Pour les budgets plus modestes, les guest houses sur îles locales permettent une immersion culturelle authentique tout en restant abordables.</p>
							<p>Ne négligez pas les formalités : visa gratuit à l'arrivée pour 30 jours, passeport valide 6 mois, et vaccination contre l'hépatite A recommandée. Prévoyez également un budget pour les transferts en hydravion ou speedboat, souvent nécessaires pour rejoindre votre resort.</p>
							<p>Enfin, côté activités : la plongée et le snorkeling sont incontournables pour admirer la vie marine exceptionnelle (raies mantas, requins-baleines, tortues). Pensez à réserver vos excursions à l'avance, surtout en haute saison.</p>
						</div>
						<button class="read-more-btn" data-post="1">Lire la suite</button>
					</div>
					
					<div class="post-footer">
						<button class="post-action">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
							</svg>
							<span>124</span>
						</button>
						<button class="post-action">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
							</svg>
							<span>18 commentaires</span>
						</button>
					</div>
				</article>

				<!-- Post 2 -->
				<article class="blog-post" data-tag="Destinations">
					<div class="post-header">
						<div class="post-date">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
								<line x1="16" y1="2" x2="16" y2="6"></line>
								<line x1="8" y1="2" x2="8" y2="6"></line>
								<line x1="3" y1="10" x2="21" y2="10"></line>
							</svg>
							<span>28 octobre 2024</span>
						</div>
						<span class="post-tag">Destinations</span>
					</div>
					
					<h2 class="post-title playfair">Le Japon en automne : pourquoi c'est la meilleure période</h2>
					
					<div class="post-image">
						<img src="<?= base_url('assets/images/blog2.jpeg') ?>" alt="Japon">
					</div>
					
					<div class="post-content">
						<p class="post-excerpt">L'automne japonais, ou 'momiji' (紅葉), est une période magique qui attire des millions de visiteurs chaque année. Découvrez pourquoi cette saison est si spéciale et comment en profiter pleinement.</p>
						<div class="post-full-content" style="display: none;">
							<p>Les couleurs automnales transforment le Japon entre fin septembre et début décembre. Les érables japonais se parent de rouge flamboyant, créant des paysages d'une beauté saisissante. Kyoto, avec ses temples millénaires entourés de jardins, offre les plus beaux spectacles. Le temple Tofuku-ji et le pavillon d'or sont particulièrement photogéniques.</p>
							<p>Au-delà des couleurs, l'automne offre des températures agréables (15-22°C) idéales pour la visite. Contrairement à l'été étouffant et humide, ou l'hiver parfois rigoureux, cette saison permet de marcher confortablement toute la journée.</p>
							<p>C'est aussi la saison des festivals traditionnels : le Jidai Matsuri à Kyoto (22 octobre) célèbre l'histoire de la ville avec des costumes d'époque, tandis que les matsuri d'automne dans les villages ruraux offrent une immersion culturelle authentique.</p>
							<p>Côté gastronomie, l'automne est la saison des châtaignes, champignons matsutake, et kakis. Les wagashi (pâtisseries traditionnelles) se parent de motifs automnaux. C'est le moment idéal pour une expérience culinaire raffinée.</p>
						</div>
						<button class="read-more-btn" data-post="2">Lire la suite</button>
					</div>
					
					<div class="post-footer">
						<button class="post-action">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
							</svg>
							<span>156</span>
						</button>
						<button class="post-action">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
							</svg>
							<span>24 commentaires</span>
						</button>
					</div>
				</article>

				<!-- Post 3 -->
				<article class="blog-post" data-tag="Budgets">
					<div class="post-header">
						<div class="post-date">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
								<line x1="16" y1="2" x2="16" y2="6"></line>
								<line x1="8" y1="2" x2="8" y2="6"></line>
								<line x1="3" y1="10" x2="21" y2="10"></line>
							</svg>
							<span>22 octobre 2024</span>
						</div>
						<span class="post-tag">Budgets</span>
					</div>
					
					<h2 class="post-title playfair">Voyage sur mesure : quel budget prévoir ?</h2>
					
					<div class="post-content">
						<p class="post-excerpt">La question du budget est souvent la première qui nous est posée. Contrairement aux idées reçues, un voyage sur mesure n'est pas forcément plus coûteux qu'un voyage organisé classique. Explications.</p>
						<div class="post-full-content" style="display: none;">
							<p>Pour un séjour d'une semaine en Europe (Grèce, Italie, Espagne), comptez entre 1500€ et 2500€ par personne. Ce tarif inclut généralement les vols, hébergements en hôtels 3-4 étoiles, certains repas et transferts. Les activités et excursions sont souvent en supplément.</p>
							<p>Les destinations lointaines comme l'Asie du Sud-Est offrent un excellent rapport qualité-prix. Un voyage de deux semaines en Thaïlande ou au Vietnam peut se faire à partir de 2000€ par personne, vol inclus. Le coût de la vie sur place étant faible, votre budget activités et restaurants sera confortable.</p>
							<p>Pour les destinations premium (Maldives, Polynésie, safaris africains), les budgets démarrent généralement à 3000€ pour une semaine et peuvent atteindre 5000€+ selon le niveau de confort souhaité. Les resorts de luxe et lodges exclusifs justifient ces tarifs par des expériences uniques.</p>
							<p>Notre approche sur mesure vous permet d'optimiser votre budget en fonction de vos priorités : privilégier l'hébergement de charme ou multiplier les activités, voyager hors saison pour bénéficier de meilleurs tarifs, ou encore combiner plusieurs destinations pour un voyage plus complet.</p>
						</div>
						<button class="read-more-btn" data-post="3">Lire la suite</button>
					</div>
					
					<div class="post-footer">
						<button class="post-action">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
							</svg>
							<span>98</span>
						</button>
						<button class="post-action">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
							</svg>
							<span>31 commentaires</span>
						</button>
					</div>
				</article>

				<!-- Post 4 -->
				<article class="blog-post" data-tag="Guides">
					<div class="post-header">
						<div class="post-date">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
								<line x1="16" y1="2" x2="16" y2="6"></line>
								<line x1="8" y1="2" x2="8" y2="6"></line>
								<line x1="3" y1="10" x2="21" y2="10"></line>
							</svg>
							<span>15 octobre 2024</span>
						</div>
						<span class="post-tag">Guides</span>
					</div>
					
					<h2 class="post-title playfair">Trek et randonnée : nos 5 destinations incontournables</h2>
					
					<div class="post-image">
						<img src="<?= base_url('assets/images/blog4.jpeg') ?>" alt="Trek">
					</div>
					
					<div class="post-content">
						<p class="post-excerpt">Pour les amoureux de nature et de grands espaces, voici notre sélection des destinations de trek les plus spectaculaires, adaptées à différents niveaux.</p>
						<div class="post-full-content" style="display: none;">
							<p><strong>1. La Patagonie (Chili/Argentine)</strong> - Le trek du W dans le parc Torres del Paine est un incontournable. 5 jours de marche face aux glaciers, lacs turquoise et montagnes majestueuses. Niveau modéré, accessible aux randonneurs réguliers. Meilleure période : novembre à mars.</p>
							<p><strong>2. Le Népal</strong> - L'Everest Base Camp Trek reste un rêve pour beaucoup. 12-14 jours de trek à travers villages sherpas et monastères bouddhistes. L'altitude (jusqu'à 5364m) demande une bonne acclimatation. Pour les trekkeurs expérimentés.</p>
							<p><strong>3. L'Islande</strong> - Le Laugavegur Trail (55km, 4 jours) traverse des paysages volcaniques surréalistes entre sources chaudes, glaciers et déserts de lave. Niveau modéré, praticable en été.</p>
							<p><strong>4. Le Pérou</strong> - Le chemin de l'Inca vers Machu Picchu est mythique. 4 jours à travers ruines incas et forêt de nuages. Permis limités, réservation obligatoire plusieurs mois à l'avance.</p>
							<p><strong>5. La Nouvelle-Zélande</strong> - Les Great Walks offrent des treks exceptionnels dans des décors de Seigneur des Anneaux. Le Milford Track (4 jours) est particulièrement réputé.</p>
							<p>Nous organisons tous ces treks avec guides locaux, porteurs, et hébergements confortables.</p>
						</div>
						<button class="read-more-btn" data-post="4">Lire la suite</button>
					</div>
					
					<div class="post-footer">
						<button class="post-action">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
							</svg>
							<span>187</span>
						</button>
						<button class="post-action">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
							</svg>
							<span>42 commentaires</span>
						</button>
					</div>
				</article>

				<!-- Post 5 -->
				<article class="blog-post" data-tag="Conseils">
					<div class="post-header">
						<div class="post-date">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
								<line x1="16" y1="2" x2="16" y2="6"></line>
								<line x1="8" y1="2" x2="8" y2="6"></line>
								<line x1="3" y1="10" x2="21" y2="10"></line>
							</svg>
							<span>10 octobre 2024</span>
						</div>
						<span class="post-tag">Conseils</span>
					</div>
					
					<h2 class="post-title playfair">Assurance voyage : ce qu'il faut absolument savoir</h2>
					
					<div class="post-content">
						<p class="post-excerpt">L'assurance voyage est souvent négligée lors de la préparation d'un séjour. Pourtant, elle peut vous éviter bien des tracas et dépenses imprévues. Voici ce que vous devez savoir.</p>
						<div class="post-full-content" style="display: none;">
							<p>Les garanties essentielles incluent : l'assistance rapatriement (prise en charge des frais médicaux à l'étranger et retour en France si nécessaire), la responsabilité civile (dommages causés à des tiers), l'annulation de voyage (remboursement en cas d'empêchement de dernière minute), et la perte/vol de bagages.</p>
							<p>Pour les destinations hors Europe, l'assurance est indispensable. Les frais médicaux aux États-Unis, par exemple, peuvent atteindre des sommes astronomiques. Une simple consultation d'urgence peut coûter plusieurs milliers de dollars.</p>
							<p>Vérifiez votre carte bancaire : certaines cartes premium offrent des garanties voyage automatiques, mais attention aux conditions et plafonds. Elles ne couvrent souvent que partiellement et sous conditions strictes (paiement du voyage avec la carte, durée limitée...).</p>
							<p>Pour les activités à risque (plongée, ski, trek en altitude), une extension de garantie spécifique est nécessaire. Les assurances standard excluent généralement ces activités.</p>
							<p>Nous recommandons systématiquement à nos clients de souscrire une assurance adaptée à leur voyage. Le coût (environ 3-5% du prix du voyage) est dérisoire comparé aux risques couverts.</p>
						</div>
						<button class="read-more-btn" data-post="5">Lire la suite</button>
					</div>
					
					<div class="post-footer">
						<button class="post-action">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
							</svg>
							<span>72</span>
						</button>
						<button class="post-action">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
							</svg>
							<span>15 commentaires</span>
						</button>
					</div>
				</article>

				<!-- Post 6 -->
				<article class="blog-post" data-tag="Destinations">
					<div class="post-header">
						<div class="post-date">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
								<line x1="16" y1="2" x2="16" y2="6"></line>
								<line x1="8" y1="2" x2="8" y2="6"></line>
								<line x1="3" y1="10" x2="21" y2="10"></line>
							</svg>
							<span>5 octobre 2024</span>
						</div>
						<span class="post-tag">Destinations</span>
					</div>
					
					<h2 class="post-title playfair">Safari en Afrique : Kenya, Tanzanie ou Afrique du Sud ?</h2>
					
					<div class="post-content">
						<p class="post-excerpt">Réaliser un safari est souvent le voyage d'une vie. Mais quelle destination choisir ? Voici notre comparatif des trois pays phares pour observer la faune africaine.</p>
						<div class="post-full-content" style="display: none;">
							<p>Le Kenya est la destination safari par excellence. Le Masai Mara offre les plus grandes concentrations d'animaux, notamment lors de la Grande Migration (juillet-octobre) où des millions de gnous traversent la rivière Mara. Les lodges sont variés, du camp de toile authentique au lodge de luxe. Budget moyen : 3000-4000€ pour 8 jours.</p>
							<p>La Tanzanie, voisine du Kenya, abrite le Serengeti (continuité du Masai Mara) et le cratère du Ngorongoro, véritable arche de Noé naturelle. Moins touristique que le Kenya, elle offre une expérience plus sauvage. À combiner avec Zanzibar pour la détente balnéaire. Budget similaire au Kenya.</p>
							<p>L'Afrique du Sud propose une approche différente : le parc Kruger est immense et permet des safaris en voiture autonome (moins cher) ou avec guide. L'avantage ? On peut combiner safari, vignobles du Cap, et découverte de Cape Town. Accessible dès 2500€ pour 10 jours.</p>
							<p>Notre conseil : pour une première expérience, le Kenya offre la garantie de voir les Big Five. Pour un voyage plus complet, l'Afrique du Sud permet de varier les expériences. Les plus aventureux opteront pour la Tanzanie.</p>
						</div>
						<button class="read-more-btn" data-post="6">Lire la suite</button>
					</div>
					
					<div class="post-footer">
						<button class="post-action">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
							</svg>
							<span>203</span>
						</button>
						<button class="post-action">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
							</svg>
							<span>38 commentaires</span>
						</button>
					</div>
				</article>

				<!-- Post 7 -->
				<article class="blog-post" data-tag="Conseils">
					<div class="post-header">
						<div class="post-date">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
								<line x1="16" y1="2" x2="16" y2="6"></line>
								<line x1="8" y1="2" x2="8" y2="6"></line>
								<line x1="3" y1="10" x2="21" y2="10"></line>
							</svg>
							<span>28 septembre 2024</span>
						</div>
						<span class="post-tag">Conseils</span>
					</div>
					
					<h2 class="post-title playfair">Voyage en famille : nos destinations préférées</h2>
					
					<div class="post-content">
						<p class="post-excerpt">Voyager avec des enfants demande une organisation spécifique. Voici nos destinations favorites qui combinent plaisir pour les petits et les grands.</p>
						<div class="post-full-content" style="display: none;">
							<p>Le Portugal est parfait pour un premier voyage en famille. Plages de l'Algarve, découverte de Lisbonne et ses tramways, châteaux de Sintra... Les distances sont courtes, la nourriture adaptée aux enfants, et les Portugais très accueillants. Budget accessible : 2000€ pour une semaine à quatre.</p>
							<p>Le Japon peut surprendre comme destination famille, mais c'est un coup de cœur garanti ! Les enfants adorent les temples, les trains ultra-rapides, les distributeurs automatiques partout, et bien sûr les quartiers manga à Tokyo. Très sécurisé et organisé. Comptez 4000€ pour deux semaines à quatre.</p>
							<p>La Crète combine histoire (palais de Knossos), plages paradisiaques, et gastronomie méditerranéenne. Les Crétois adorent les enfants. Location de villa avec piscine recommandée pour plus de liberté. Budget : 2500€ la semaine à quatre.</p>
							<p>Pour plus d'aventure, le Costa Rica est idéal dès 8-10 ans. Observation des animaux (paresseux, singes, toucans), tyroliennes dans la jungle, plages sauvages... Un voyage qui marque ! Comptez 5000€ pour deux semaines à quatre.</p>
							<p>Nous adaptons tous nos circuits famille avec des activités variées, des hébergements spacieux, et un rythme souple.</p>
						</div>
						<button class="read-more-btn" data-post="7">Lire la suite</button>
					</div>
					
					<div class="post-footer">
						<button class="post-action">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
							</svg>
							<span>145</span>
						</button>
						<button class="post-action">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
							</svg>
							<span>27 commentaires</span>
						</button>
					</div>
				</article>

				<!-- Post 8 -->
				<article class="blog-post" data-tag="Conseils">
					<div class="post-header">
						<div class="post-date">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
								<line x1="16" y1="2" x2="16" y2="6"></line>
								<line x1="8" y1="2" x2="8" y2="6"></line>
								<line x1="3" y1="10" x2="21" y2="10"></line>
							</svg>
							<span>20 septembre 2024</span>
						</div>
						<span class="post-tag">Conseils</span>
					</div>
					
					<h2 class="post-title playfair">Lune de miel : 5 erreurs à éviter</h2>
					
					<div class="post-image">
						<img src="<?= base_url('assets/images/blog4.jpeg') ?>" alt="Lune de miel">
					</div>
					
					<div class="post-content">
						<p class="post-excerpt">Votre lune de miel doit être parfaite. Fort de notre expérience avec des centaines de couples, voici les erreurs courantes à éviter absolument.</p>
						<div class="post-full-content" style="display: none;">
							<p><strong>Erreur n°1 :</strong> Partir trop vite après le mariage. Prévoyez au moins 2-3 jours de repos après la cérémonie. Vous serez épuisés émotionnellement et physiquement. Mieux vaut reporter le départ ou prévoir une nuit de transition.</p>
							<p><strong>Erreur n°2 :</strong> Surcharger l'itinéraire. Votre lune de miel n'est pas le moment de visiter 15 villes en 10 jours. Privilégiez 2-3 lieux maximum et prenez le temps de vous reposer et de profiter en couple.</p>
							<p><strong>Erreur n°3 :</strong> Négliger le budget. Entre le mariage et les frais associés, les finances sont souvent tendues. Fixez un budget réaliste et respectez-le. Un voyage moins lointain mais sans stress vaut mieux qu'une lune de miel avec des inquiétudes financières.</p>
							<p><strong>Erreur n°4 :</strong> Choisir une destination uniquement pour Instagram. Oui, les Maldives sont photogéniques, mais si vous aimez l'aventure et la culture, vous risquez de vous ennuyer au bout de 3 jours sur une île. Choisissez selon VOS vraies envies.</p>
							<p><strong>Erreur n°5 :</strong> Oublier de mentionner que c'est votre lune de miel. Les hôtels et restaurants offrent souvent des attentions spéciales (surclassement, champagne, décorations). Nous nous assurons que tous vos prestataires sont informés.</p>
							<p>Nous organisons votre lune de miel selon vos envies réelles, pas selon les tendances.</p>
						</div>
						<button class="read-more-btn" data-post="8">Lire la suite</button>
					</div>
					
					<div class="post-footer">
						<button class="post-action">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
							</svg>
							<span>178</span>
						</button>
						<button class="post-action">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
							</svg>
							<span>34 commentaires</span>
						</button>
					</div>
				</article>
			</div>

			<!-- Load More -->
			<div class="load-more">
				<button class="btn btn-outline">Charger plus d'articles</button>
			</div>
		</div>
	</div>
</section>

<!-- CTA Section -->
<section class="blog-cta">
	<div class="blog-cta-container">
		<svg class="cta-icon" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
			<path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
			<line x1="7" y1="7" x2="7.01" y2="7"></line>
		</svg>
		
		<h2 class="cta-title playfair">Besoin de conseils personnalisés ?</h2>
		
		<p class="cta-description">
			Nos experts voyages sont à votre disposition pour vous accompagner dans 
			la préparation de votre séjour sur mesure.
		</p>
		
		<a href="<?= base_url('contact') ?>" class="btn btn-primary">Prendre rendez-vous</a>
	</div>
</section>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="<?= base_url('assets/js/blog.js') ?>"></script>
<?= $this->endSection() ?>
