<?php

use Faker\Factory as Faker;
use App\Models\comando;
use App\Repositories\comandoRepository;

trait MakecomandoTrait
{
    /**
     * Create fake instance of comando and save it in database
     *
     * @param array $comandoFields
     * @return comando
     */
    public function makecomando($comandoFields = [])
    {
        /** @var comandoRepository $comandoRepo */
        $comandoRepo = App::make(comandoRepository::class);
        $theme = $this->fakecomandoData($comandoFields);
        return $comandoRepo->create($theme);
    }

    /**
     * Get fake instance of comando
     *
     * @param array $comandoFields
     * @return comando
     */
    public function fakecomando($comandoFields = [])
    {
        return new comando($this->fakecomandoData($comandoFields));
    }

    /**
     * Get fake data of comando
     *
     * @param array $postFields
     * @return array
     */
    public function fakecomandoData($comandoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'orden' => $fake->word,
            'fecha' => $fake->word,
            'mac' => $fake->word
        ], $comandoFields);
    }
}
