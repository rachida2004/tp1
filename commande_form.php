<?php include 'header.php'; ?>
<h2>Formulaire de commande</h2>

<form action="commande.php" method="POST">
  <input type="text" name="nom" placeholder="Nom" required>
  <input type="text" name="prenom" placeholder="Prénom" required>
  <input type="tel" name="telephone" placeholder="Téléphone" required>
  <input type="text" name="lieu" placeholder="Lieu de livraison" required>

  <label>Type de vinaigre :</label>
  <select name="libelle" id="produit" required>
    <option value="" disabled selected>Choisir un produit</option>
    <option value="Pincée Rouge|4000">Pincée Rouge – 0,75 L – 4 000 FCFA/L</option>
    <option value="Pincée Blanc|3500">Pincée Blanc – 0,75 L – 3 500 FCFA/L</option>
    <option value="Simple Blanc 0,35L|2000">Simple Blanc – 0,35 L – 2 000 FCFA/L</option>
    <option value="Simple Blanc 0,5L|3000">Simple Blanc – 0,5 L – 3 000 FCFA/L</option>
    <option value="Simple Blanc 1L|5250">Simple Blanc – 1 L – 5 250 FCFA/L</option>
  </select>

  <label>Quantité (L) :</label>
  <input type="number" name="quantite" id="quantite" step="0.01" min="0.01" required>

  <label>Prix total (FCFA) :</label>
  <input type="number" name="prix" id="prix" readonly>

  <label>Mode de paiement :</label>
  <select name="mode_paiement" required>
    <option value="Espèces">Espèces</option>
    <option value="Mobile Money">Mobile Money</option>
    <option value="Carte bancaire">Carte bancaire</option>
    <option value="Autre">Autre</option>
  </select>

  <button type="submit">Valider la commande</button>
</form>

<script>
const produitSelect = document.getElementById('produit');
const quantiteInput = document.getElementById('quantite');
const prixInput = document.getElementById('prix');

function calculerPrix() {
  const valeur = produitSelect.value;
  const qte = parseFloat(quantiteInput.value);
  if(valeur && !isNaN(qte)) {
    const prixUnitaire = parseFloat(valeur.split('|')[1]);
    prixInput.value = prixUnitaire * qte;
  } else {
    prixInput.value = '';
  }
}

produitSelect.addEventListener('change', calculerPrix);
quantiteInput.addEventListener('input', calculerPrix);
</script>

<?php include 'pied_de_page.php'; ?>
