<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class CountryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Country::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $climate=['жаркий', 'умеренный', 'холодный'];
        $language=['русский', 'английский', 'немецкий', 'испанский', 'готов изучать местный'];
        $living=['высокий', 'средний', 'ниже среднего' , 'низкий'];
        $location_type=['мегаполис','небольшой город', 'у моря', 'у озера/реки', 'в горах'];
        return [
            'climate'=>$climate[rand(0,2)],
            'language'=>$language[rand(0,count($language)-1)],
            'living'=>$living[rand(0,count($living)-1)],
            'location_type'=>$location_type[rand(0,count($location_type)-1)],
            'way_home'=>$this->faker->boolean,
        ];
    }
}
