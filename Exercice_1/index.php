<?php

require "Form.php";

$form = new Form();

echo $form->create("#", "get");
echo $form->input("name","text", "Name");
echo $form->input("email","email", "Email");
echo $form->input("password", "password","Password");
echo $form->textarea("message", "Message");
echo $form->select("genre", ["masculin" => "Masculin", "feminin" => "Féminin"], "Genre");
echo $form->checkbox("voiture", ["volvo" => "Volvo", "ferrari" => "Ferrari"]);
echo $form->radio("Fromage", ["gouda" => "Gouda", "chavroux" => "Chavroux", "roquefort" => "Roquefort"]);
echo $form->submit("Send");
echo $form->end();

?>