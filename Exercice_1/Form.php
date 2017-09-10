<?php
/**
 *	Class Form
 *  Générateur de formulaire 
 *  Auteur : Ludovic Patho. 
 */

class Form {

	/**
	 * 
	 * 
	 */
	public function __construct(){

	}


	/**
	 * Création du formulaire 
	 * @param string $action Par défaut l'action pointe sur la page courante
	 * @param string $method Par défaut POST.
	 * @return  string  renvoie le dbut de la balise form 
	 */ 
	public function create($action="#", $method="post"){

		return '<form action="'. $action .'" method="'.$method .'">';
	}

	/**
	 * fin du formulaire 
	 * @return  string  renvoie le dbut de la balise form 
	 */ 
	public function end(){

		return '</form>';
	}

	/**
	 * Créer un label pour chaque champ 
	 * @param  string $html   Récupère la balises html et le met dans une balise paragraphe
	 * @param  string $label  Si aucun argument, le label prendra le nom de la variable $name (cf: fonction input)
	 * @param  string $id     Si aucun argument, l'id prendra le nom de la variable $name (cf: fonction input)
	 * @return string        champ html 
	 */
	private function label($html, $label="", $id=""){

		return '<p><label for="'. $id .'"> '. $label .' </label> '. $html .'</p>';
	}

	/**
	 * Créer les champs input
	 * @param  string $name  Correspond au nom de l'input (obligatoire).
	 * @param  string $type  Correspond au type de l'input, tous les paramètres sont acceptés (text, url, date, tel, email ...)
	 * @param  string $label Correspond au label de l'input
	 * @param  string $id    Nom du label pour le champ Input.
	 * @param  string $value Permet de rajouter une veleur au champ Input
	 * @return string        retourne le champ input avec son label
	 */
	public function input($name, $type = "text", $label ="label", $id = "id", $value =""){
		$id = ($id == "id") ? $name : $id ;	
		$label =($label == "label") ? $name : $label ;	
		$input = '<input type="'. $type .'" name="'.$name.'" value="'. $value.'"  id="'. $id.'" required> ';
		return $this->label($input,$label,$id);
	}

	/**
	 * Créer les champs text area
	 * @param  string $name  nom du champ
	 * @param  string $label Label du champ, si pas d'argument = $name
	 * @param  string $value Pour rajouter une valeur 
	 * @param  string $id    Pour donner un id 
	 * @return string        Retourne un champ textarea avec son label
	 */
	public function textarea($name, $label="label", $value="", $id=""){
		$id = ($id == "id") ? $name : $id ;	
		$label =($label == "label") ? $name : $label ;
		$textarea = '<textarea name="'. $name .'" id="'. $id .'"  > ' . $value .'</textarea>';
		return $this->label($textarea,$label,$id);
	}

	/**
	 * Créer les balises select
	 * @param  string $name   nom de la balise select
	 * @param  array  $option Tableau associatif ! Par ex : ["masculin" => "Masculin", "feminin" => "Féminin"]
	 * @param  string $label  nom du label
	 * @return string         retourne le champ select avec son label.
	 */
	public function select($name, $option = [], $label="" ){
		$label =($label == "label") ? $name : $label ;
		$select = "<select>";
		foreach ($option as $key => $value) {
			$select .='<option value="'. $key .'">'.$value .'</option>';
		}
		$select .= "</select>";
		return $this->label($select,$label);
	}

	/**
	 * Création de check box
	 * @param  string $name   nom de la checkbox. 
	 * @param  array  $option $key représente l'attribut value alors que $value sera la valeur visible à l'écran.
	 * @return string         return checkbox avce son label.
	 * 
	 */
	public function checkbox($name, $option = []){
		$checkbox ="";
		foreach ($option as $key => $value) {
			$checkbox .= '<p><label><input type="checkbox" id="'. $key .'" name="' .$name. '[]" value="'.$key.'">' . $value . '</label></p>';			
		}
		return $checkbox;		
	}

	/**
	 * Création de radio input
	 * @param  string $name   nom de l'input radio. 
	 * @param  array  $option $key représente l'attribut value alors que $value sera la valeur visible à l'écran.
	 * @return string         return radio avce son label.
	 * 
	 */
	public function radio($name, $option = []){
		$radio ="";
		foreach ($option as $key => $value) {
			$radio .= '<p><label><input type="radio" id="'. $key .'" name="' .$name. '[]" value="'.$key.'">' . $value . '</label></p>';			
		}
		return $radio;		
	}

	/**
	 * Créer le bouton submit et ferme la balise <form>
	 * @param  string $value Valeur du bouton
	 * @return string        Retourne le bouton submit. 
	 */
	public function submit($value= "submit"){
		return '<p><button type="submit">'. $value .'</button></p>';
	}

}

?>