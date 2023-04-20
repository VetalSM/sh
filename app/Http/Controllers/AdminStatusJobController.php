<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StatusJob;
use Illuminate\Http\Request;

class AdminStatusJobController extends Controller
{
    public function index($locale,StatusJob $status)
    {

        return view('admin.products.job.index', [
            'statuses' => StatusJob::all()
        ]);
    }
    public function create($locale,StatusJob $status)
    {
        return view('admin.products.job.create', ['status' => $status]);
    }
    public function store()
    {

        $product_name =  Product::where('id',request()->product_id )->first('title')->title;

        StatusJob::create(array_merge($this->validateStatusJob(), [
                'product_name' => $product_name,

            ]
        ));
        return redirect('/'.app()->getLocale().'/admin/products/status_jobs')->with('success', 'price created');
    }
//
    public function edit($locale, $status)
    {

        return view('admin.products.job.edit', ['status' => StatusJob::where('id', $status)->first()]);
    }
//
    public function update($locale, $status)
    {

$status = StatusJob::where('id', $status)->first();
        $attributes = $this->validateStatusJob($status);
        $attributes['product_name'] = Product::where('id',request()->product_id )->first('title')->title;

        $status->update($attributes);

        return redirect('/'.app()->getLocale().'/admin/products/status_jobs')->with('success', 'Product Updated!');
    }

    public function destroy($locale, $status)
    {
        $status = StatusJob::where('id', $status)->first();
        $status->delete();

        return redirect('/'.app()->getLocale().'/admin/products/status_jobs')->with('success', 'Price Deleted!');
    }

    protected function validateStatusJob(?StatusJob $status = null): array
    {
        $status ??= new StatusJob();

        return request()->validate([
            'product_name' => '',
            'product_id' => '',
            'price_start_name' => '',
            'price_end_name' => '',
            'status_start' => '',
            'status_end' => '',
            'start_date' => '',
            'end_date' => '',
        ]);
    }
}
