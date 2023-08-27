<?php

namespace App\Services;

/**
 * Class Arbol
 * Administra el arbol de departamentos y sus estados
 * @package App\Services
 */

class Arbol
{
    private $lista = array();
    private $bloqueado = "bloqueado";
    private $rentado = "rentado";
    private $disponible = "disponible";
    private $padre = "padre";
    private $hijo = "hijo";

    public function __construct()
    {

    }

    /**
     * @param $nombre
     * @param $nivel
     * Agrega departamentos
     */
    public function agregaDepartamento($nombre, $nivel){
        $this->lista[] = array("nombre"=>$nombre, "nivel"=>$nivel, "estado"=>"");
    }

    /**
     * @param $nombre
     * Agrega en renta un departamento
     */
    public function renta($nombre){
        $lista_final = $this->lista;
        foreach ($this->lista as $indice => $lista){
            if ($lista["nombre"] == $nombre){
                $this->lista[$indice]["estado"] = $this->rentado;
            }
        }
        $this->regla();
    }

    /**
     * Reglas de negocio de la renta de departamentos
     */
    private function regla(){
        foreach ($this->lista as $indice => $lista){

            //regla 1
            if ($lista["nivel"] == $this->padre && $lista["estado"] == $this->rentado){
                foreach ($this->lista as $indice_b => $lista_b){
                    if($this->lista[$indice_b]["nivel"] == $this->hijo){
                        $this->lista[$indice_b]["estado"] = $this->bloqueado;
                    }
                }
            }

            //regla 2 y 3
            if ($lista["nivel"] == $this->hijo && $lista["estado"] == $this->rentado){
                foreach ($this->lista as $indice_c => $lista_c){
                    if($this->lista[$indice_c]["nivel"] == $this->padre){
                        $this->lista[$indice_c]["estado"] = $this->bloqueado;
                    }

                    if($this->lista[$indice_c]["nivel"] == $this->hijo && $this->lista[$indice_c]["nombre"] !== $lista["nombre"] ){
                        $this->lista[$indice_c]["estado"] = $this->disponible;
                    }
                }
            }
        }
    }

    /**
     * @return array
     * Muestra todo_ el estado actual de las habitaciones
     */
    public function verDisponibles(){
        return $this->lista;
    }
}
