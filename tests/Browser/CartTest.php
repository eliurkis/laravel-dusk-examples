<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\Browser\Pages\HomePage;
use Tests\DuskTestCase;

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
            // Home Page
            $browser->visit(new HomePage);

            // Get Collection Name
            $collectionName = $browser->text('.thumbnail .caption a');

            // Products Page
            $browser->clickLink($collectionName)
                    ->assertSee($collectionName);

            // Get Product Name
            $productName = $browser->text('.thumbnail .caption a');

            $browser->clickLink($productName)
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
