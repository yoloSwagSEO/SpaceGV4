<?php

namespace App\Http\Middleware;

use App\Planet;
use Closure;

class MajRessources
{
    /**
     * Mets a jour les ressources.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    private $planet;
    private $production;

    private $metal;
    private $cristal;
    private $uradium;

    private $GlobalEnergyFactor;
    private $time;


    public function handle($request, Closure $next)
    {

        $this->planet = Planet::find($request->user()->currentPlanet);
        $this->production = Planet::find($request->user()->currentPlanet);
        $this->time = time();

        $this->calculateEnergieFactor();
        $this->calculateMetal();
        $this->calculateCristal();
        $this->calculateUradium();

        $this->planet->lastUpdate = $this->time;
        $this->planet->save();

        return $next($request);
    }

    /**
     * Calcul des gain en metal.
     *
     * ((30 x NiveauMine * 1,1^NiveauMine) * ModificateurPlanet) * FacteurEnergétique
     *
     */
    private function calculateMetal(){
        $this->metal = $this->planet->metal;

        $basicProduction = (30 * 1 * pow(1.1,1)) * $this->planet->modifMetal;
        //todo


        $productionHoraire = $basicProduction * $this->GlobalEnergyFactor;
        $ProductionSeconde = round($productionHoraire/3600,4);

        $secondToUpdate = $this->time - $this->planet->lastUpdate;

        $totalGain = $secondToUpdate * $ProductionSeconde;

        if($this->planet->metal + $totalGain > $this->planet->metalStorage){
            $totalGain = 0;
        }

        $this->planet->metal += $totalGain;

    }

    /**
     * Calcul des gain en cristal.
     *
     * ((20 x NiveauMine * 1,1^NiveauMine) * ModificateurPlanet) * FacteurEnergétique
     *
     */
    private function calculateCristal(){
        $this->cristal = $this->planet->cristal;

        $productionHoraire = ((20 * 1 * pow(1.1,1)) * $this->planet->modifCristal) * $this->GlobalEnergyFactor;
        $ProductionSeconde = round($productionHoraire/3600,4);

        $secondToUpdate = $this->time - $this->planet->lastUpdate;

        $totalGain = $secondToUpdate * $ProductionSeconde;

        if($this->planet->cristal + $totalGain > $this->planet->cristalStorage){
            $totalGain = 0;
        }

        $this->planet->cristal += $totalGain;

    }

    /**
     * Calcul des gain en uradium.
     *
     * ((10 x NiveauMine * 1,1^NiveauMine) * ModificateurPlanet) * FacteurEnergétique
     *
     */
    private function calculateUradium(){
        $this->uradium = $this->planet->uradium;

        $productionHoraire = ((10 * 1 * pow(1.1,1)) * $this->planet->modifUradium) * $this->GlobalEnergyFactor;
        $ProductionSeconde = round($productionHoraire/3600,4);

        $secondToUpdate = $this->time - $this->planet->lastUpdate;

        $totalGain = $secondToUpdate * $ProductionSeconde;

        if($this->planet->uradium + $totalGain > $this->planet->uradiumStorage){
            $totalGain = 0;
        }
        $this->planet->uradium += $totalGain;
    }

    /**
     * Calcul de la dispo énergétique
     *
     * non implémenté, simulé.
     *
     */
    private function calculateEnergieFactor(){
        $this->GlobalEnergyFactor = 1;
    }
}
