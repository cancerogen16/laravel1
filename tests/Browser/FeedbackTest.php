<?php

namespace Tests\Browser;

use App\Models\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Throwable;

class FeedbackTest extends DuskTestCase
{
    /**
     * @return void
     * @throws Throwable
     */
    public function testFeedbackPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/feedback')
                    ->assertSee('Форма обратной связи');
        });
    }

    /**
     * Отвлеченный пример браузерного теста.
     *
     * @return void
     * @throws Throwable
     */
    public function testFeedback()
    {
        $faker = Factory::create('ru_RU');

        $user = User::factory()->create([
            'name' => $faker->name(),
            'email' => $faker->unique()->safeEmail(),
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/feedback')
                ->type('name', $user->name)
                ->type('message', 'Сообщение')
                ->press('Отправить')
                ->assertPathIs('/success');
        });
    }
}
