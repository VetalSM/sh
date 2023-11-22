<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Models\StatusJob;
use Illuminate\Console\Command;

class UpdateProductStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = ' update:product-status
';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'обновление статуса товара';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {

        foreach (Product::all() as $product) {
            foreach (StatusJob::where('product_id', $product->id)->get() as $status) {
                if ($status->price_status == 'active') {
                    if ($product->id === $status->product_id) {
                        if ($status->status_start != 0 && $status->work_start != 1 && $status->start_date < now()) {
                            $product->status = $status->status_start;
                            $product->prices = $status->price_start_name;
                            $status->work_start = "1";
                            $status->save();
                            $product->save();
                        }
                        if ($status->status_end != 0 && $status->work_end != 1 && $status->end_date < now()) {
                            $product->status = $status->status_end;
                            $product->prices = $status->price_end_name;
                            $status->work_end = "1";
                            $status->save();
                            $product->save();
                        }
                    }
                }
                if ($status->price_status == 'prom') {
                    if ($product->id === $status->product_id) {
                        if ($status->status_start != 0 && $status->work_start != 1 && $status->start_date < now()) {
                            $product->status = $status->status_start;
                            $product->prom_prices = $status->price_start_name;
                            $status->work_start = "1";
                            $status->save();
                            $product->save();
                        }
                        if ($status->status_end != 0 && $status->work_end != 1 && $status->end_date < now()) {
                            $product->status = $status->status_end;
                            $product->prom_prices = $status->price_end_name;
                            $status->work_end = "1";
                            $status->save();
                            $product->save();
                        }
                    }
                }
            }
        }
    }
}
