<?php

namespace App\Jobs;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ConvertData2Odoo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $timeout = 60;
    public $discount_b2b_override;
    public $discount_b2b_pc;

    /**
     * Create a new job instance.
     */
    public function __construct($discount_b2b_override,$discount_b2b_pc)
    {
        $this->discount_b2b_override = $discount_b2b_override;
        $this->discount_b2b_pc = $discount_b2b_pc;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        log::debug('ConvertData2Odoo handle');
        $products = Product::getSelected();
        foreach ($products as $product)
        {
            log::debug('Convert Product #'.$product->id);
            $product->convert2odoo($this->discount_b2b_override,$this->discount_b2b_pc);
        }
    }
}
