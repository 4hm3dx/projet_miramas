<footer>
	<hr class="hr_footer">
	<div class="inscription_contact">
		<a href="?controller=newsLetters&action=newsLetters">
			<div class="button_suscribe">
				<button class="button_suscribe">
					<p>S'inscrire/Se désinscrire a notre News Letters</p>
					<svg stroke-width="4" stroke="currentColor" viewBox="0 0 24 24" fill="none" class="h-6 w-6"
						xmlns="http://www.w3.org/2000/svg">
						<path d="M14 5l7 7m0 0l-7 7m7-7H3" stroke-linejoin="round" stroke-linecap="round"></path>
					</svg>
				</button>
			</div>
		</a>
	<a href="?controller=contact&action=contact" class="nous_contacter">Contact</a>
	</div>

	<p>
		Lorem ipsum dolor sit amet, consectetur adipiscing elit, <br>
		sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
	</p>

	<div class="coordonnee">
		<div class="adresse">
			<p>
				<b class="titre_div_footer">Les Amis du Vieux Miramas, Office de tourisme</b> <br>
				Adresse : avenue Falabrègues <br>
				Tél. : 04 90 58 08 24 <br>
				Horaires d’ouverture : <br>
				du lundi au vendredi de 8h30 à 12h et de 13h30 à 17h
			</p>
		</div>
		<div class="numero_mail">
			<p>
				<b class="titre_div_footer">Contact :</b> <br>
				Tél : 06 14 31 62 64 <br>
				<b>Point d’accueil saisonnier</b> <br>
				Adresse : <br>
				Rue Mistral – Miramas-le-Vieux <br>
				Horaires d’ouverture : <br>
				du mardi au dimanche de 16h à 20h30 (juillet et août)	
			</p>
		</div>
	</div>

	<div class="createur_parent">
		<a href="?controller=home&action=mentions_legals">Mentions legals</a>
		<p class="createur">Alexis Serbelloni || Ahmed Madani</p>
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