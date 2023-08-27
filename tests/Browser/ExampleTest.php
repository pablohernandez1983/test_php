<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Support\Facades\Storage;

class ExampleTest extends DuskTestCase
{
    private $airbnb_id = "715825575916402712";

    public function testBasicExample(): void
    {
        //navegador web, accede a la url
        $this->browse(function (Browser $browser) {
            $browser->visit('https://www.airbnb.mx/rooms/'.$this->airbnb_id);
            $browser->pause(5000);
            $browser->screenshot('airbnb'); //toma una imagen
            $browser->storeSource('airbnb'); //almacena el código html
        });

        //leer el archivo html
        $html = file_get_contents(base_path()."/tests/Browser/source/airbnb.txt");
        //Expresión regular para ubicar las imagenes
        $patternRex = '/<img.*?src=[\"]+(.*?)[\"]+/m';
        $matchFound = preg_match_all($patternRex, $html, $matches);
        if($matchFound){
            $this->descarga($matches[1]);
        }
    }

    //descarga de imagenes
    public function descarga($url_images)
    {

        foreach ($url_images as $url){
            $contents = file_get_contents($url);
            $file = '/'.$this->airbnb_id."/". uniqid().".jpeg";
            Storage::disk('local')->put($file, $contents);
        }

    }
}
