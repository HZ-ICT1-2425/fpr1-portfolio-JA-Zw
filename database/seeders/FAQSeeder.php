<?php

namespace Database\Seeders;

use App\Models\FAQ;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FAQSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private array $data = [
        ["question" => "Hoe print ik op de hz?", "answer" => "Ga naar <a href=\"https://hz.mynetpay.nl/\">https://hz.mynetpay.nl/</a>. Log daar in met je schoolaccount (zonder @hz.nl).<br>Je kan een bestand uploaden bij <i>WebPrint</i> of de printer installeren bij <i>MobilityPrint</i>.<br><b>Let op! Om te printen moet je printtegoed hebben.</b><br>Voor meer informatie, ga naar het <a href=\"https://hzuniversity.topdesk.net/tas/public/ssp/content/detail/service?unid=bd81be42f243450e95e510949a496145\">selfservice-portaal</a>."],
        ["question" => "Hoe bestel ik iets op de HZ-webshop?", "answer" => "Ga naar <a href=\"https://webshop.hz.nl/\">https://webshop.hz.nl/</a>. Log in. Zoek daarna het produkt dat je wil kopen, selecteer de optie die je wil (bijv. kleur, maat, aantal) en druk dan op <i>Toevoegen aan winkelwagen</i>. Ga daarna naar <i>WINKELWAGEN</i> bovenin. Druk dan op afrekenen. Kies je betaalwijze. Druk op <i>Volgende</i> en volg de instructies op je scherm."],
        ["question" => "Hoe reserveer ik een projectruimte?", "answer" => "Ga naar <a href=\"https://hzuniversity.topdesk.net/\">het selfservice-portaal</a>. Ga naar <i>Reserveren</i> &gt; <i>Reserveer een vergader of project ruimte</i> (ja, met taalfout). Druk op <i>Reserveer een ruimte</i>. Selecteer daar welke ruimte en wanner (door over de tabel te slepen). Klik op volgende. Vul daar in wat je in moet vullen en bevestig de reservering."],
        ["question" => "Hoe scan ik iets?", "answer" => "Ga naar een scanner/printer. Log in (met pas of gebruikersnaam en wachtwoord). Druk op <i>Scan</i>. Als je dubbelzijdig wil scannen ga je naar de instellingen en zet je de <i>duplex mode</i> op <i>2-sided</i>. Leg je papieren waar ze horen en druk op <i>Start</i>. Log daarna weer uit (rechtsboven)."],
        ["question" => "Waar zet ik m'n auto?", "answer" => "Het is niet mogelijk om direct bij de HZ aan Het Groene Woud te parkeren. Op het terrein is 1 speciale parkeerplaats voor mensen met een beperking en/of chronische aandoening beschikbaar.<br>In de parkeergarage aan de Kousteensedijk zijn een aantal plekken voor bezoekers, medewerkers en studenten van Het Groene Woud. Deze parkeergarage bevindt zich op 8 minuten loopafstand van de HZ. Op vertoon van je inrijkaart kun je dan bij de servicebalie van het JRCZ een uitrijkaart krijgen."]
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->data as $item) {
            FAQ::create($item);
        }
    }
}
