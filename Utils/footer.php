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
		<a href="?controller=contact&action=contact" class="nous_contacter">Nous Contacter</a>
	</div>

	<p>
		Lorem ipsum dolor sit amet, consectetur adipiscing elit, <br>
		sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
	</p>

	<div class="coordonnee">
		<div class="adresse">
			<p>
				<b class="titre_div_footer">Les Amis du Vieux Miramas</b> <br>
				Adresse : 
				Rue Mireille 
				13140 MIRAMAS
			</p>
		</div>
		<div class="numero_mail">
			<p>
				<b class="titre_div_footer">Contact :</b> <br>
				Tél : 06 14 31 62 64 <br>
				Fax: 09 85 74 93 04 <br>
				Miramas@Miramas.fr</p>
		</div>
	</div>

	<div class="createur_parent">
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