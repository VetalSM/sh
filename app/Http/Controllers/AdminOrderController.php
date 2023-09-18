<?php

namespace App\Http\Controllers;

use App\Models\ExpenseRate;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index($locale, Order $order)
    {
        return view('admin.products.order.index', [
            'order' => $order
        ]);
    }

    public function create($locale, order $order)
    {
        return view('admin.products.order.create', ['order' => $order]);
    }

    public function store()
    {

        $total = request()->weight * request()->quantity;
        $productTotal = request()->price * request()->quantity;
        foreach (\App\Models\Product::all() as $product)
            if (request()->product_id == $product->id) {
                Order::create(array_merge($this->validateOrder(), [
                        'product_total' => $productTotal,
                        'product' => $product->title,
                        'total' => $total,
                        'product_status' => $product->status,
                        'category_id' => $product->category_id

                    ]
                ));
                foreach (\App\Models\Order::all() as $order)
                    if (request()->created == $order->created) {
                        $attributes['comment'] = request()->comment;
                        $order->update($attributes);
                    }
            }
        return redirect()->back()->with('message', 'Operation Successful !');
//        return redirect('/'.app()->getLocale().'/admin/products/orders')->with('success', 'price created');
    }

//
    public function edit($locale, Order $order)
    {

//        foreach (Order::all() as $ordeR){
//            if ($ordeR->created === $order->created){

        return view('admin.products.order.edit', ['order' => $order]);
//            }
//        }


    }

//
    public function update($locale, Order $order)
    {

        $attributes = $this->validateOrder($order);

        $attributes['product_total'] = $attributes['price'] * $attributes['quantity'];
        $attributes['total'] = $attributes['weight'] * $attributes['quantity'];
//            $attributes['thumbnail'] = request()->file('thumbnail')->storeAs('thumbnails', $thumbnailName);
//        }
//        if ($attributes['certificate'] ?? false) {
//            $attributes['certificate'] = request()->file('certificate')->store('thumbnails');
//        }
//        if ($attributes['ifra_certificate'] ?? false) {
//            $attributes['ifra_certificate'] = request()->file('ifra_certificate')->store('thumbnails');
//        }
//        if ($attributes['safety'] ?? false) {
//            $attributes['safety'] = request()->file('safety')->store('thumbnails');
//        }

        $order->update($attributes);
        return redirect()->back()->with('message', 'Operation Successful !');
//        return redirect('/'.app()->getLocale().'/admin/products/orders')->with('success', 'Product Updated!');
    }

    public function destroy($locale, Order $order)
    {

        $order->delete();
        return redirect()->back()->with('message', 'Operation Successful !');

//dd($order->created);
//        $order->delete();


    }

    protected function validateOrder(?Order $order = null): array
    {

        $order ??= new Order();

        return request()->validate([
            'tel' => '',
            'credentials' => '',
            'address' => '',
            'comment' => '',
            'product' => '',
            'price' => '',
            'currency' => '',
            'weight' => '',
            'unit' => '',
            'quantity' => '',
            'product_total' => '',
            'total' => '',
            'created' => '',
            'product_id' => '',


        ]);
    }

    public function orderText()
    {
        $orders = Order::orderBy('created', 'desc')->paginate(200)->withQueryString();
        $costs = $this->calculateMultiParameterCosts($orders);
        return view('admin.products.order.text', [
            'orders' => $orders,
            'costs' => $costs,
        ]);

    }

    public function date()
    {
        $orders = Order::orderBy('tel')->get();
        $costs = $this->calculateMultiParameterCosts($orders);
        return view('admin.products.order.sort', [
            'costs' => $costs,
            'orders' => $orders,
        ]);
    }

    public function sort($locale, Order $order)
    {

        if (request()->start === 0) {

            return view('admin.products.order.sort', [
                'orders' => Order::all()]);
        } else {
            $fromDate = request()->start;
            $toDate = request()->end;
            $start_date = date('Y-m-d 00:00:00', strtotime($fromDate));

            $end_date = date('Y-m-d 23:59:59', strtotime($toDate));
            $orders = Order::where('created_at', '>=', $start_date)
                ->where('created_at', '<=', $end_date)->get();
            $costs = $this->calculateMultiParameterCosts($orders);
            return view('admin.products.order.sort', [
                'orders' => $orders,
                'costs' => $costs,
            ]);
        }


    }

    public function payment($locale, Order $order)
    {

        foreach (\App\Models\Order::all() as $order)
            if (request()->created == $order->created) {
                $attributes['payment_status'] = request()->payment_status;
                $order->update($attributes);
            }
        return redirect()->back()->with('message', 'Operation Successful !');
    }

    public function delivery($locale, Order $order)
    {

        foreach (\App\Models\Order::all() as $order)
            if (request()->created == $order->created) {
                $attributes['delivery_status'] = request()->delivery_status;
                $order->update($attributes);
            }
        return redirect()->back()->with('message', 'Operation Successful !');
    }

    public function statistic($locale, Order $order)
    {

        if (request()->start === 0) {

            return view('admin.products.order.statistic', [
                'costs' => ExpenseRate::all(),
                'orders' => Order::all()
            ]);
        } else {
            $fromDate = request()->start;
            $toDate = request()->end;
            $start_date = date('Y-m-d 00:00:00', strtotime($fromDate));

            $end_date = date('Y-m-d 23:59:59', strtotime($toDate));

            $orders = Order::where('created_at', '>=', $start_date)
                ->where('created_at', '<=', $end_date)->get();

            $costs = $this->calculateMultiParameterCosts($orders);
            return view('admin.products.order.statistic', [
                'costs' => $costs,
                'orders' => $orders,
            ]);
        }
    }

    public function expense()
    {

        if (request()->start === 0) {
            return view('admin.products.order.expense');
        } else {
            $fromDate = request()->start;
            $toDate = request()->end;
            $start_date = date('Y-m-d 00:00:00', strtotime($fromDate));

            $end_date = date('Y-m-d 23:59:59', strtotime($toDate));

            $orders = Order::where('created_at', '>=', $start_date)
                ->where('created_at', '<=', $end_date)->get();

            $costs = $this->calculateMultiParameterCosts($orders);
            return view('admin.products.order.expense', [
                'costs' => $costs,
                'orders' => $orders,
            ]);
        }
    }

    public function priceFormation()
    {

        if (request()->start === 0) {

            return view('admin.products.order.statistic', [
                'orders' => Order::all()]);
        } else {
            $fromDate = request()->start;
            $toDate = request()->end;
            $start_date = date('Y-m-d 00:00:00', strtotime($fromDate));

            $end_date = date('Y-m-d 23:59:59', strtotime($toDate));


            return view('admin.products.order.statistic', [
                'orders' => Order::where('created_at', '>=', $start_date)
                    ->where('created_at', '<=', $end_date)->get()]);
        }
    }


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    private function calculateMultiParameterCosts($orders)
    {
        $expenseRates = ExpenseRate::all();
        $result = [];

        foreach ($orders as $order) {
            foreach ($expenseRates as $expenseRate) {
                if (
                    $order->product_status === $expenseRate->status &&
                    $order->weight == $expenseRate->weight &&
                    $order->price_name === $expenseRate->price_name &&
                    $order->category_id === $expenseRate->category_id
                ) {
                    $categoryId = $order->category_id;
                    $created = $order->created;

                    if (!isset($result[$created][$categoryId])) {
                        $result[$created][$categoryId] = [
                            'count' => [],
                            'cost' => [
                                'weight' => [],
                                'packaging' => [],
                                'other' => [],
                            ],
                            'expenses' => [
                                'weight' => [],
                                'adminExpense' => [],
                                'otherExpenses' => [],
                                'tax' => [],
                                'travel' => [],
                                'advertising' => [],
                            ],
                            'profit' => [
                                'weight' => [],
                            ],
                        ];
                    }

                    $weight = $order->weight;
                    $productTotal = $order->product_total;
                    $expenseData = &$result[$created][$categoryId]; // Ссылка на текущую категорию

                    // Обновляем данные по стоимости и расходам
                    $expenseData['cost']['weight'][$weight] = ($expenseData['cost']['weight'][$weight] ?? 0) + ($productTotal * $expenseRate->cost / 100);
                    $expenseData['count'][$weight] = ($expenseData['count'][$weight] ?? 0) + 1;
                    $expenseData['cost']['packaging'][$weight] = ($expenseData['cost']['packaging'][$weight] ?? 0) + ($productTotal * $expenseRate->packaging / 100);
                    $expenseData['cost']['other'][$weight] = ($expenseData['cost']['other'][$weight] ?? 0) + ($productTotal * (($expenseRate->cost - $expenseRate->packaging) / 100));
                    $expenseData['expenses']['weight'][$weight] = ($expenseData['expenses']['weight'][$weight] ?? 0) + ($productTotal * $expenseRate->expenses / 100);
                    $expenseData['expenses']['adminExpense'][$weight] = ($expenseData['expenses']['adminExpense'][$weight] ?? 0) + ($productTotal * $expenseRate->admin_expenses / 100);
                    $expenseData['expenses']['otherExpenses'][$weight] = ($expenseData['expenses']['otherExpenses'][$weight] ?? 0) + ($productTotal * $expenseRate->other_expenses / 100);
                    $expenseData['expenses']['tax'][$weight] = ($expenseData['expenses']['tax'][$weight] ?? 0) + ($productTotal * $expenseRate->tax / 100);
                    $expenseData['expenses']['travel'][$weight] = ($expenseData['expenses']['travel'][$weight] ?? 0) + ($productTotal * $expenseRate->travel / 100);
                    $expenseData['expenses']['advertising'][$weight] = ($expenseData['expenses']['advertising'][$weight] ?? 0) + ($productTotal * $expenseRate->advertising / 100);

                    $expenseData['profit']['weight'][$weight] = ($expenseData['profit']['weight'][$weight] ?? 0) + ($productTotal * $expenseRate->profit / 100);
                }
            }
        }

        // Вычисляем общие тоталы для каждой категории внутри $created
        foreach ($result as $created => &$createdData) {
            $totalCategory = [
                'count' => [],
                'cost' => [
                    'totalWeight' => 0,
                    'totalPackaging' => 0,
                    'totalOther' => 0,
                ],
                'expenses' => [
                    'totalExpense' => 0,
                    'totalAdmin' => 0,
                    'totalExpenses' => 0,
                    'totalTax' => 0,
                    'totalTravel' => 0,
                    'totalAdvertising' => 0,
                ],
                'profit' => [
                    'total' => 0,
                ],
            ];

            foreach ($createdData as $categoryId => &$categoryData) {
                foreach ($categoryData['count'] as $weight => $count) {
                    $totalCategory['count'][$weight] = ($totalCategory['count'][$weight] ?? 0) + $count;
                }

                $totalCategory['cost']['totalWeight'] += array_sum($categoryData['cost']['weight'] ?? []);
                $totalCategory['cost']['totalPackaging'] += array_sum($categoryData['cost']['packaging'] ?? []);
                $totalCategory['cost']['totalOther'] += array_sum($categoryData['cost']['other'] ?? []);
                $totalCategory['expenses']['totalExpense'] += array_sum($categoryData['expenses']['weight'] ?? []);
                $totalCategory['expenses']['totalAdmin'] += array_sum($categoryData['expenses']['adminExpense'] ?? []);
                $totalCategory['expenses']['totalExpenses'] += array_sum($categoryData['expenses']['otherExpenses'] ?? []);
                $totalCategory['expenses']['totalTax'] += array_sum($categoryData['expenses']['tax'] ?? []);
                $totalCategory['expenses']['totalTravel'] += array_sum($categoryData['expenses']['travel'] ?? []);
                $totalCategory['expenses']['totalAdvertising'] += array_sum($categoryData['expenses']['advertising'] ?? []);
                $totalCategory['profit']['total'] += array_sum($categoryData['profit']['weight'] ?? []);
            }

            $createdData['all_category'] = $totalCategory;
        }

        // Вычисляем общие тоталы для всех $created
        $totalAllCreated = [
            'count' => [],
            'cost' => [
                'totalWeight' => 0,
                'totalPackaging' => 0,
                'totalOther' => 0,
            ],
            'expenses' => [
                'totalExpense' => 0,
                'totalAdmin' => 0,
                'totalExpenses' => 0,
                'totalTax' => 0,
                'totalTravel' => 0,
                'totalAdvertising' => 0,
            ],
            'profit' => [
                'total' => 0,
            ],
        ];

        foreach ($result as $createdData) {
            foreach ($createdData as $categoryId => &$categoryData) {
                foreach ($categoryData['count'] as $weight => $count) {
                    $totalAllCreated['count'][$weight] = ($totalAllCreated['count'][$weight] ?? 0) + $count;
                }

                $totalAllCreated['cost']['totalWeight'] += array_sum($categoryData['cost']['weight'] ?? []);
                $totalAllCreated['cost']['totalPackaging'] += array_sum($categoryData['cost']['packaging'] ?? []);
                $totalAllCreated['cost']['totalOther'] += array_sum($categoryData['cost']['other'] ?? []);
                $totalAllCreated['expenses']['totalExpense'] += array_sum($categoryData['expenses']['weight'] ?? []);
                $totalAllCreated['expenses']['totalAdmin'] += array_sum($categoryData['expenses']['adminExpense'] ?? []);
                $totalAllCreated['expenses']['totalExpenses'] += array_sum($categoryData['expenses']['otherExpenses'] ?? []);
                $totalAllCreated['expenses']['totalTax'] += array_sum($categoryData['expenses']['tax'] ?? []);
                $totalAllCreated['expenses']['totalTravel'] += array_sum($categoryData['expenses']['travel'] ?? []);
                $totalAllCreated['expenses']['totalAdvertising'] += array_sum($categoryData['expenses']['advertising'] ?? []);
                $totalAllCreated['profit']['total'] += array_sum($categoryData['profit']['weight'] ?? []);
            }
        }

        // Исключаем all_category и all_created из общего тотала
        if (isset($totalAllCreated['count'])) {
            unset($totalAllCreated['count']);
        }
        if (isset($totalAllCreated['cost']['totalWeight'])) {
            $totalAllCreated['cost']['totalWeight'] -= $result['all_created']['cost']['totalWeight'] ?? 0;
        }
        if (isset($totalAllCreated['cost']['totalPackaging'])) {
            $totalAllCreated['cost']['totalPackaging'] -= $result['all_created']['cost']['totalPackaging'] ?? 0;
        }
        if (isset($totalAllCreated['cost']['totalOther'])) {
            $totalAllCreated['cost']['totalOther'] -= $result['all_created']['cost']['totalOther'] ?? 0;
        }
        if (isset($totalAllCreated['expenses']['totalExpense'])) {
            $totalAllCreated['expenses']['totalExpense'] -= $result['all_created']['expenses']['totalExpense'] ?? 0;
        }
        if (isset($totalAllCreated['expenses']['totalAdmin'])) {
            $totalAllCreated['expenses']['totalAdmin'] -= $result['all_created']['expenses']['totalAdmin'] ?? 0;
        }
        if (isset($totalAllCreated['expenses']['totalExpenses'])) {
            $totalAllCreated['expenses']['totalExpenses'] -= $result['all_created']['expenses']['totalExpenses'] ?? 0;
        }
        if (isset($totalAllCreated['expenses']['totalTax'])) {
            $totalAllCreated['expenses']['totalTax'] -= $result['all_created']['expenses']['totalTax'] ?? 0;
        }
        if (isset($totalAllCreated['expenses']['totalTravel'])) {
            $totalAllCreated['expenses']['totalTravel'] -= $result['all_created']['expenses']['totalTravel'] ?? 0;
        }
        if (isset($totalAllCreated['expenses']['totalAdvertising'])) {
            $totalAllCreated['expenses']['totalAdvertising'] -= $result['all_created']['expenses']['totalAdvertising'] ?? 0;
        }
        if (isset($totalAllCreated['profit']['total'])) {
            $totalAllCreated['profit']['total'] -= $result['all_created']['profit']['total'] ?? 0;
        }

        $result['all_created'] = $totalAllCreated;

        return $result;
    }
}
