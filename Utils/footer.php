<footer>
	<hr class="hr_footer">
	<div class="inscription_contact">
		<a href="?controller=newsLetters&action=newsLetters">
			<div class="button_suscribe">
				<button class="button_suscribe">
					<p>S'inscrire/Se désinscrire de notre Newsletter</p>
					<svg stroke-width="4" stroke="currentColor" viewBox="0 0 24 24" fill="none" class="h-6 w-6"
						xmlns="http://www.w3.org/2000/svg">
						<path d="M14 5l7 7m0 0l-7 7m7-7H3" stroke-linejoin="round" stroke-linecap="round"></path>
					</svg>
				</button>
			</div>
		</a>
		<a href="?controller=contact&action=contact" class="nous_contacter">Nous Contacter</a>
	</div>
	<img src="Content/img/blason.png" alt="" class="image_footer_blason">
	<!-- <p>
		Lorem ipsum dolor sit amet, consectetur adipiscing elit, <br>
		sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
	</p> -->

	<div class="coordonnee">
		<div class="adresse">
			<p>
				<b class="titre_div_footer">Les Amis du Vieux Miramas, Office de Tourisme</b> <br>
				Adresse : Avenue Falabrègues, Miramas <br>
				Tél. : 04 90 58 08 24 <br>
				Horaires d’ouverture : <br>
				Lundi au Vendredi : 8h30 - 12h & 13h30 - 17h
			</p>
		</div>
		<div class="numero_mail">
			<p>
				<b class="titre_div_footer">Contact :</b> <br>
				Tél : 06 14 31 62 64 <br>
				<b>Point d’accueil saisonnier</b> <br>
				Adresse : <br>
				Rue Frédéric Mistral – Miramas-le-Vieux <br>
				Horaires d’ouverture : <br>
				Mardi au dimanche : 16h - 20h30 (Juillet et Août)
			</p>
		</div>
	</div>

	<div class="createur_parent">
		<a href="?controller=home&action=mentions_legals">Mentions légales</a>
	</div>
	<div class="createur">
		<a class="createur-link" href="https://www.linkedin.com/in/alexis-s-9b080a252/" target="_blank">Alexis
			Serbelloni
		</a>||<a href="https://www.linkedin.com/in/4hm3dx/" class="createur-link" target="_blank"> Ahmed Madani</a>
	</div>
</footer>




<script>
	// Récupérer le bouton
	const suscribeButton = document.querySelector('.button_suscribe');

	// Ajouter un événement 'click' au bouton
	suscribeButton.addEventListener('click', () => {
		// Afficher une alerte avec le message "Cette fonctionnalité est en cours de développement"
		alert("Cette fonctionnalité est en cours de développement");
	});
</script>