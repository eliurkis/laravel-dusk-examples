<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\Browser\Pages\HomePage;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CartTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testAddProductToCart()
    {
        $this->browse(function (Browser $browser) {
            $productName = 'Aliquid explicabo culpa qui.';

            $browser->visit(new HomePage)
                    ->clickLink('Apple')
                    // Products Page
                    ->assertSee($productName)
                    ->clickLink($productName)
                    // Product Page
                    ->assertSee($productName)
                    ->press('Add To Cart')
                    ->assertSee('Product has been added to your cart.')
                    // Cart Page
                    ->visit('/cart')
                    ->assertSee($productName);
        });
    }
}
