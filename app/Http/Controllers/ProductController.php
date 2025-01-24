<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductSelectResourceCollection;
use App\Models\Category;
use App\Models\Product;
use App\Models\Settings;
use App\Traits\Availability;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Log;

class ProductController extends Controller
{
    use Availability;

    public $data;

    /**
     * Show resources. 
     * 
     * @return \Illuminate\View\View
     */
    public function index(Request $request): View
    {
        $hasExchangeRate = config('settings')->enableExchangeRateForItems;
        // $products = Product::all();
        $sum_cost = Product::sum('cost');
        $sum_unit_price = Product::sum('retailsale_price');
        $totalPrice = Product::select(DB::raw('SUM(cost * in_stock) as total_price'))
            ->value('total_price');
        $totalSalePrice = Product::select(DB::raw('SUM(retailsale_price * in_stock) as total_price'))
            ->value('total_price');
        // $sum_box_price = Product::sum('box_price');

        // $total_whole_cost = 0;
        // $total_whole_unit_price = 0;
        // $total_whole_box_price = 0;
        // foreach ($products as $p) {
        //     $total_whole_cost += $p->cost * $p->in_stock;
        //     $total_whole_unit_price += $p->unit_price * $p->in_stock;
        //     $total_whole_box_price += $p->box_price * $p->in_stock / 10;
        // }
        

        $this->data['categories'] = Category::orderBy('sort_order', 'ASC')->get();
        $this->data['total_cost'] = currency_format($sum_cost ?? 0);
        $this->data['whole_total_cost'] = currency_format($totalPrice ?? 0);
        $this->data['whole_unit_cost'] = currency_format($totalSalePrice ?? 0);
        // $this->data['total_whole_cost'] = currency_format($total_whole_cost, $hasExchangeRate).' ('.currency_format($sum_cost).')';

        // $this->data['total_unit_price'] = currency_format($sum_unit_price, $hasExchangeRate).' ('.currency_format($sum_unit_price).')';
        $this->data['total_unit_price'] = currency_format($sum_unit_price ?? 0);

        // $this->data['total_whole_unit_price'] = currency_format($total_whole_unit_price, $hasExchangeRate).' ('.currency_format($total_whole_unit_price).')';
        // $this->data['total_box_price'] = currency_format($sum_box_price, $hasExchangeRate).' ('.currency_format($sum_box_price).')';
        // $this->data['total_whole_box_price'] = currency_format($total_whole_box_price, $hasExchangeRate).' ('.currency_format($total_whole_box_price).')';
        // $this->data['total_in_stock'] = Product::sum('in_stock');

        return view("products.index", $this->data);
    }


    /**
     * Show resources.
     * 
     * @return \Illuminate\View\View
     */
    public function create(): View
    {

        return view("products.create", [
            'categories' => Category::orderBy('sort_order', 'ASC')->get(),
        ]);
    }
    /**
     * Show resources.
     * 
     * @return \Illuminate\View\View
     */
    public function edit(Product $product): View
    {
        return view("products.edit", [
            'product' => $product,
            'categories' => Category::orderBy('sort_order', 'ASC')->get(),
        ]);
    }
    /**
     * Delete resources.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
        return Redirect::back()->with("success", __("Deleted"));
    }
    /**
     * Delete resources.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function imageDestroy(Product $product): RedirectResponse
    {
        $product->deleteImage();
        return Redirect::back()->with("success", __("Image Removed"));
    }

    /**
     * Show resources.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            // 'sale_price' => ['nullable', 'numeric', 'min:0'],
            'wholesale_price' => ['nullable', 'numeric', 'min:0'],
            'retailsale_price' => ['nullable', 'numeric', 'min:0'],
            'cost' => ['nullable', 'numeric', 'min:0'],
            'sort_order' => ['nullable', 'numeric', 'min:0'],
            'image' => ['nullable', 'mimes:jpeg,jpg,png', 'max:2024'],
            'description' => ['nullable', 'string', 'max:2000'],
            // 'barcode' => ['nullable', 'string', 'max:43'],
            'wholesale_barcode' => ['nullable', 'string', 'max:43'],
            'retail_barcode' => ['nullable', 'string', 'max:43'],
            // 'sku' => ['nullable', 'string', 'max:64'],
            'wholesale_sku' => ['nullable', 'string', 'max:64'],
            'retail_sku' => ['nullable', 'string', 'max:64'],
            'status' => ['required', 'string'],
            'in_stock' => ['nullable', 'numeric'],
            'category' => ['required', 'string'],
            'length' => ['nullable', 'numeric', 'min:0'],
            'width' => ['nullable', 'numeric', 'min:0'],
            'color' => ['nullable', 'string', 'max:200'],
            'size' => ['nullable', 'string', 'max:200'],
            'age' => ['nullable', 'string', 'max:200'],
        ]);

        $product = Product::create([
            'name' => $request->name,
            'sort_order' => $request->sort_order ?? 1,
            'is_active' => $this->isAvailable($request->status),
            // 'sale_price' => $request->sale_price ?? 0,
            'wholesale_price' => $request->wholesale_price ?? 0,
            'retailsale_price' => $request->retailsale_price ?? 0,
            'cost' => $request->cost ?? 0,
            'description' => $request->description,
            // 'barcode' => $request->barcode,
            'wholesale_barcode' => $request->wholesale_barcode,
            'retail_barcode' => $request->retail_barcode,
            // 'sku' => $request->sku,
            'wholesale_sku' => $request->wholesale_sku,
            'retail_sku' => $request->retail_sku,
            'category_id' => $request->category,
            'in_stock' => $request->in_stock ?? 0,
            'track_stock' => $request->has('track_stock'),
            'color' => $request->color,
            'age' => $request->age,
            'size' => $request->size,
            'continue_selling_when_out_of_stock' => $request->has('continue_selling_when_out_of_stock'),
        ]);

        if ($request->has('image')) {
            $product->updateImage($request->image);
        }
        return Redirect::back()->with("success", __("Created"));
    }

    /**
     * update resources.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            // 'sale_price' => ['nullable', 'numeric', 'min:0'],
            'wholesale_price' => ['nullable', 'numeric', 'min:0'],
            'retailsale_price' => ['nullable', 'numeric', 'min:0'],
            'cost' => ['nullable', 'numeric', 'min:0'],
            'sort_order' => ['nullable', 'numeric', 'min:0'],
            'image' => ['mimes:jpeg,jpg,png', 'max:20240'],
            'description' => ['nullable', 'string', 'max:2000'],
            // 'barcode' => ['nullable', 'string', 'max:43'],
            'wholesale_barcode' => ['nullable', 'string', 'max:43'],
            'retail_barcode' => ['nullable', 'string', 'max:43'],
            // 'sku' => ['nullable', 'string', 'max:64'],
            'wholesale_sku' => ['nullable', 'string', 'max:64'],
            'retail_sku' => ['nullable', 'string', 'max:64'],
            'status' => ['required', 'string'],
            'in_stock' => ['nullable', 'numeric'],
            'category' => ['required', 'string'],
            'color' => ['nullable', 'string', 'max:200'],
            'size' => ['nullable', 'string', 'max:200'],
            'age' => ['nullable', 'string', 'max:200'],
        ]);

        Log::info("message",['dfdfd',$request->image]);
        
        $product->update([
            'name' => $request->name,
            'sort_order' => $request->sort_order ?? 1,
            'is_active' => $this->isAvailable($request->status),
            // 'sale_price' => $request->sale_price ?? 0,
            'wholesale_price' => $request->wholesale_price ?? 0,
            'retailsale_price' => $request->retailsale_price ?? 0,
            'cost' => $request->cost ?? 0,
            'description' => $request->description,
            // 'barcode' => $request->barcode,
            'wholesale_barcode' => $request->wholesale_barcode,
            'retail_barcode' => $request->retail_barcode,
            // 'sku' => $request->sku,
            'wholesale_sku' => $request->wholesale_sku,
            'retail_sku' => $request->retail_sku,
            'category_id' => $request->category,
            'in_stock' => $request->in_stock ?? 0,
            'track_stock' => $request->has('track_stock'),
            'continue_selling_when_out_of_stock' => $request->has('continue_selling_when_out_of_stock'),
            'color' => $request->color,
            'age' => $request->age,
            'size' => $request->size,

        ]);
        if ($request->has('image')) {
            $product->updateImage($request->image);
        }
        return Redirect::back()->with("success", __("Updated"));
    }


    public function search(Request $request)
    {
        $query = trim($request->get('query'));
        if (is_null($query)) {
            return $this->jsonResponse(['data' => []]);
        }
        $products = Product::search($query)->latest()->take(10)->get();
        return $this->jsonResponse(['data' => new ProductSelectResourceCollection($products)]);
    }
}