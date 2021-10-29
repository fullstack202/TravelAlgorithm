<?php

namespace Database\Factories;

use App\Models\Form;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Question::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $formId=Form::select('id')->get()->toArray();//dd($formId);
        return [
            'form_id'=>$formId[rand(0,count($formId)-1)]['id'],
            'is_dealbreaker'=>$this->faker->boolean,
            'question'=>$this->faker->sentence(3),
            'variants'=>['first','second','third'],
        ];
    }
}
