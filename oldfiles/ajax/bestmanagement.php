<?php
// ----------------------------------------------------------------------
// Original Author of file: Nicolas Mercier
// Purpose of file:
// ----------------------------------------------------------------------

foreach (glob(GLPI_ROOT . "/plugins/bestmanagement/ajax/*.php") as $file)
	include_once ($file);

function SelectTab($id_contrat)
{
	$options="";
	// cr�� un nouvel objet permettant d'envoyer une r�ponse au c�t� client
	$objResponse = new xajaxResponse();
	// on selectionne le r�capitulatif du contrat en fonction de son id
	$query="SELECT * FROM glpi_contracts WHERE id = $id_contrat";
	
	$result=$DB->query($query);
	while ($souscat = mysql_fetch_array($req))
		// on place toutes les sous-cat�gories dans des options valables pour la liste SELECT
		$options .= "<option value='" . $souscat['id'] . "'>" . $souscat["name"] . "</option>";

	// l'Ajax remplacera le innerHTML (html int�rieur) de la liste_souscat pour y mettre $options
	$objResponse->addAssign("liste_souscat","innerHTML",$options);
	// envoie la r�ponse en XML
	return $objResponse->getXML();

} // SelectTab()


?>
