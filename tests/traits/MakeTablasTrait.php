<?php

use Faker\Factory as Faker;
use App\Models\Tablas;
use App\Repositories\TablasRepository;

trait MakeTablasTrait
{
    /**
     * Create fake instance of Tablas and save it in database
     *
     * @param array $tablasFields
     * @return Tablas
     */
    public function makeTablas($tablasFields = [])
    {
        /** @var TablasRepository $tablasRepo */
        $tablasRepo = App::make(TablasRepository::class);
        $theme = $this->fakeTablasData($tablasFields);
        return $tablasRepo->create($theme);
    }

    /**
     * Get fake instance of Tablas
     *
     * @param array $tablasFields
     * @return Tablas
     */
    public function fakeTablas($tablasFields = [])
    {
        return new Tablas($this->fakeTablasData($tablasFields));
    }

    /**
     * Get fake data of Tablas
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTablasData($tablasFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'deleted_at' => $fake->word
        ], $tablasFields);
    }
}
