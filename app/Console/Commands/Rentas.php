<?php

namespace App\Console\Commands;

use App\Services\Arbol;
use Illuminate\Console\Command;

/**
 * Class Rentas
 * @package App\Console\Commands
 * Programa en consola para la administración de rentas
 */

class Rentas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:rentas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Algoritmo de rentas';

    protected $arbol;

    public function __construct(Arbol $arbol)
    {
        $this->arbol = $arbol;
        parent::__construct();

    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Iniciando programa...');

        //Definimos la estructura y jerarquia del arbol de los departamentos.
        $this->arbol->agregaDepartamento("C", "padre");
        $this->arbol->agregaDepartamento("A", "hijo");
        $this->arbol->agregaDepartamento("B", "hijo");

        //CAMBIAR AQUI QUE DEPARTAMENTO SE RENTA
        //Acción de rentar un departamento
        $this->arbol->renta("C");


        //Visualizar en consola el estado de los departamentos
        $resultado = $this->arbol->verDisponibles();
        foreach ($resultado as $departamento){
            $this->info('Departamento: '.$departamento["nombre"].', Estado: '.$departamento["estado"]);
        }
    }

}
