<?php

namespace App\Http\ViewComposers;

use App\Order;
use Illuminate\View\View;

class GlobalsComposer
{
    public $orders;
    /**
     * Create a global composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->orders = Order::where('status', 0)->count();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('orders', $this->orders);
    }
}