<section id="section-body-ajout-document">
    <section id="section-ajout-document">
        <h2 id="titre-ajout-document">Ajouter des ressources</h2>
        <div id="division-ajout-document">
            <select name="select" id="select-ajout-ressource">
                <option value="">Catégorie</option>
                <option value="">Architecture</option>
                <option value="">Histoire</option>
                <option value="">Témoignage</option>
            </select>

            <div class="popup-wrapper">
                <div class="popup-content">
                    <button class="close-button">&times;</button>
                    <form id="popup-form">
                        <label for="popup-input">Saisissez votre nom:</label>
                        <input type="text" id="popup-input">
                        <button type="submit">Soumettre</button>
                    </form>
                </div>
            </div>
            <input type="file" id="input-file-ajout-document">
            <div>
                <input type="submit" id="input-submit-ajout-document" value="Ajouter">
                <input type="submit" id="input-submit-supprimer-document" value="Annuler">
            </div>
        </div>
        <div class="checkbox-wrapper">
            <input type="checkbox" id="popup-toggle">
            <label for="popup-toggle">Ajouter une catégorie</label>
        </div>
    </section>
</section>