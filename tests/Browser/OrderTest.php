<?php

namespace Tests\Browser;

use App\Models\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Throwable;

class OrderTest extends DuskTestCase
{
    /**
     * @return void
     * @throws Throwable
     */
    public function testOrderPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/order')
                    ->assertSee('Заказ выгрузки данных');
        });
    }

    /**
     * @return void
     * @throws Throwable
     */
    public function testOrder()
    {
        $faker = Factory::create('ru_RU');

        $user = User::factory()->create([
            'name' => $faker->name(),
            'email' => $faker->unique()->safeEmail(),
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/order')
                ->type('name', $user->name)
                ->type('phone', '+7911111111')
                ->type('email', $user->email)
                ->type('info', 'Информация')
                ->press('Отправить')
                ->assertPathIs('/order');
        });
    }
}
