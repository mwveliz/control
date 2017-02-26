<?php

use Faker\Factory as Faker;
use App\Models\Comandos;
use App\Repositories\ComandosRepository;

trait MakeComandosTrait
{
    /**
     * Create fake instance of Comandos and save it in database
     *
     * @param array $comandosFields
     * @return Comandos
     */
    public function makeComandos($comandosFields = [])
    {
        /** @var ComandosRepository $comandosRepo */
        $comandosRepo = App::make(ComandosRepository::class);
        $theme = $this->fakeComandosData($comandosFields);
        return $comandosRepo->create($theme);
    }

    /**
     * Get fake instance of Comandos
     *
     * @param array $comandosFields
     * @return Comandos
     */
    public function fakeComandos($comandosFields = [])
    {
        return new Comandos($this->fakeComandosData($comandosFields));
    }

    /**
     * Get fake data of Comandos
     *
     * @param array $postFields
     * @return array
     */
    public function fakeComandosData($comandosFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'orden' => $fake->word,
            'fecha' => $fake->word,
            'mac' => $fake->word
        ], $comandosFields);
    }
}
