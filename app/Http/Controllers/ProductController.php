<?php
namespace App\Http\Controllers;

use Session;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {        
         $validated = $request->validate([
            'description' => 'required',
            'price' => 'required',
            'product_image' => 'required',
            'gender' => 'required'
        ]);

        $data = $request->all();

        if(!empty($request->file('product_image')))
        {            
            $file = $request->file('product_image');            
            $name = time().'_'.$file->getClientOriginalName();
            $request->product_image->move(base_path().'/public/products/', $name);
            $data['product_image'] = time().'_'.str_replace(' ', '_', $file->getClientOriginalName());
        } 

        $product->update($data);

        Session::flash('status', "Product Updated successfully.");
        Session::flash('status_type', 1);
        
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        Session::flash('status', "Product Deleted successfully.");
        Session::flash('status_type', 1);
        
        return redirect()->back();
    }
}
