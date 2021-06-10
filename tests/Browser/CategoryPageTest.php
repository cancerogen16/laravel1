<?php

namespace Tests\Browser;

use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Throwable;

class CategoryPageTest extends DuskTestCase
{
    /**
     * @return void
     * @throws Throwable
     */
    public function testCategoriesPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/categories')
                ->assertSee('Список категорий новостей');
        });
    }

    /**
     * @return void
     * @throws Throwable
     */
    public function testCategoryCreate()
    {
        $faker = Factory::create('ru_RU');

        $title = 'Категория новостей';
        $description = $faker->realText(rand(100, 200));

        $this->browse(function ($browser) use ($description, $title) {
            $browser->visitRoute('categories.create')
                ->type('title', $title)
                ->type('description', $description)
                ->press('Сохранить')
                ->assertSee('Успешно сохранено');
        });
    }
}
