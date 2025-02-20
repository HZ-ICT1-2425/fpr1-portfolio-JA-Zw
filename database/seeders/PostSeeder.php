<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    private array $data = [
        ["title"=>"Studiekeuze", "slug"=>"skc", /*"description"=>"Een blogpost over dat ICT was gekozen.",*/ "preview"=>"Nou, ik heb voor HBO-ICT gekozen", "body"=>"
				<p>Nou, ik heb voor HBO-ICT gekozen. Daarvoor was ik ook een keer bij de hz langs geweest op een open dag.</p>
				<p><b>Wat zie je jezelf na het voltooien van de opleiding gaan doen? Welk beroep of functie heeft je interesse? Waarom? Wat hoop je over vier jaar geleerd te hebben?</b><br><ul><li>Geen idee</li><li>Geen idee</li><li>Omdat ik geen idee heb</li><li>ICT</li></ul></p>"],
        ["title"=>"SWOT-analyse", "slug"=>"swot", /*"description"=>"Een blogpost met de antwoorden van een SWOT-analyse.",*/ "preview"=>"Een SWOT-analyse is wat onzin die we moesten invullen", "body"=>"<p>Een SWOT-analyse is wat onzin die we moesten invullen.</p>
				<p><b>Wat zijn je sterke punten?</b><br>Kan acceptabel samenwerken</p>
				<p><b>Wat zijn je valkuilen?</b><br>Werk het best alleen</p>
				<p><b>Welke kansen zie je?</b> &amp; <b>Welke risico's zie je?</b><br>Deze laatste twee zijn nog steeds niet duidelijk. Ze waren niet goed uitgelegd.</p>"],
        ["title"=>"Ervaring", "slug"=>"ervaring", /*"description"=>"Een blogpost over mijn ervaring in programmeren.",*/ "preview"=>"Ik heb mijn pws bij informatica gedaan", "body"=>"<p>Ik heb mijn pws bij informatica gedaan. Verder kan je ook naar mijn <a href=\"https://github.com/adriaan1313/\">persoonlijke github</a> kijken als je dat per sé wil, maar dat is niet echt een goed idee.</p>"],
        ["title"=>"Feedback", "slug"=>"feedback", /*"description"=>"Een blogpost over de feedback van een enquete.",*/ "preview"=>"De feedback van Daan de Waard heeft erg weinig entertjes", "body"=>"
				<h1>Feedback</h1>
				<p>De feedback van Daan de Waard heeft erg weinig entertjes, dus ik hoop dat het te lezen is.</p>
				<hr>
				<div class=\"bericht\">
					<p>Hoi Adriaan. Welkom bij de HZ HBO-ICT opleiding en bedankt voor het invullen van de Wie-ben-ik vragenlijst. Ik heb je antwoorden doorgenomen en het viel mij op dat je antwoorden laten weten dat je nog niet weet wie je bent en wat je uiteindelijk wilt gaan doen. Dat is geen probleem. Er is tijdens de opleiding genoeg tijd om jezelf te ontplooien, en we gaan je daarbij uiteraard helpen. Het is wel goed om daar zo snel mogelijk mee te beginnen. Als je beter weet wat je wilt draagt dat in mijn ervaring bij aan de motivatie om de benodigde tijd en aandacht daarin te investeren. Dus wellicht is het een goed idee om vooraf eens te onderzoeken wat aan ICT je interesseert. Praat er eens met mensen uit het vakgebied over. Wellicht ken jij of iemand anders uit je omgeving iemand.</p>
					<p>Voor de rest wens ik je een goede zomer en zien we je volgend jaar. Als er nog iets is wat we voor je kunnen betekenen neem dan gerust weer contact op.</p>
					<p>Groet,</p>
					<p>Daan de Waard</p>
				</div>"],
        ["title"=>"Het vak ICT", "slug"=>"vak", /*"description"=>"Een blogpost over het vak ICT.",*/ "preview"=>"ICT is een belangrijk vak", "body"=>"
				<p>ICT is een belangrijk vak, een groot deel van de wereld vertrouwt erop dat computers blijven weken.</p>
				<p>Als de computers uitvallen bij een bank, is dat catastrofaal. Het vertrouwen in de bank zal verdwijnen. Dit is een vrij extreem geval, maar als het systeem van de NS kapot gaat ligt het hele land stil voor een dag.</p>
				<p>Dit is allemaal heel belangrijk, maar ICT is ook leuk, denk aan videospellen (nee, niet videospelen) en het internet. Je kan gewoon in Nederland, thuis zitten praten met iemand in Slovenie over een album wat twee minuten eerder uit is gekomen in de VS. (Nou, het praten zou ook via de telefoon kunnen zijn gegaan, zelfs zonder internet voor de uitvinding van VOIP, maar dan zouden we niet naar het album kunnen luisteren.) </p>"],
        ["title" => "Een lijst van Honden", "slug"=>"hond", "preview" => "Ach, ja", "body" => "Ach, ja. In de opdracht eerder dit jaar moest er geen 6e post zijn, dus deze is er nu, en het onderwerp is dus anders."]
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->data as $item) {
            Post::create($item);
        }
    }
}
