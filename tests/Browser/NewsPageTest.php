<?php

namespace Tests\Browser;

use App\Models\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Str;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Throwable;

class NewsPageTest extends DuskTestCase
{
    /**
     * @return void
     * @throws Throwable
     */
    public function testNewsPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/news')
                    ->assertSee('Новости');
        });
    }

    /**
     * @return void
     * @throws Throwable
     */
    public function testNewsCreate()
    {
        $faker = Factory::create('ru_RU');

        $title = 'Новость';
        $excerpt = $faker->realText(rand(10, 30));
        $description = $faker->realText(rand(100, 200));

        $this->browse(function ($browser) use ($description, $excerpt, $title) {
            $browser->visitRoute('news.create')
                ->type('title', $title)
                ->select('category_id')
                ->type('excerpt', $excerpt)
                ->type('description', $description)
                ->select('status')
                ->press('Сохранить')
                ->assertSee('Успешно сохранено');
        });
    }
}
