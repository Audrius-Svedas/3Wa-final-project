<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Helpers\PhotoHelper;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(PhotoHelper $photoHelper) {
        // $this->middleware('auth')->except('index');
        $this->middleware('adminRole')->except('index', 'show');
        $this->photoHelper = $photoHelper;
    }

    public function index()
    {

        $categories = Product::distinct()->get(['category']);
        $products = Product::paginate(12);

        return view('index', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createProduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validator($request);
      $path = $request->file('imageUrl')->storePublicly('public/photos');

      $post = [
        'manufacturer' => $request->get('manufacturer'),
        'model' => $request->get('model'),
        'quantity' => $request->get('quantity'),
        'category' => $request->get('category'),
        'frame_size' => $request->get('frame_size'),
        'frame' => $request->get('frame'),
        'fork' => $request->get('fork'),
        'gear_shifters' => $request->get('gear_shifters'),
        'front_delailleur' => $request->get('front_delailleur'),
        'rear_delailleur' => $request->get('rear_delailleur'),
        'brakes' => $request->get('brakes'),
        'gears_amount' => $request->get('gears_amount'),
        'wheel_size' => $request->get('wheel_size'),
        'weight' => $request->get('weight'),
        'price' => $request->get('price'),
        'description' => $request->get('description'),
        'imageUrl' => $path
      ];

    Product::create($post);

    return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $product = Product::findOrFail($id);
      return view('editProduct', [
        'product' => $product
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validator($request);

      $path = $request->file('imageUrl')->storePublicly('public/photos');

      $post = [
        'manufacturer' => $request->get('manufacturer'),
        'model' => $request->get('model'),
        'quantity' => $request->get('quantity'),
        'category' => $request->get('category'),
        'frame_size' => $request->get('frame_size'),
        'frame' => $request->get('frame'),
        'fork' => $request->get('fork'),
        'gear_shifters' => $request->get('gear_shifters'),
        'front_delailleur' => $request->get('front_delailleur'),
        'rear_delailleur' => $request->get('rear_delailleur'),
        'brakes' => $request->get('brakes'),
        'gears_amount' => $request->get('gears_amount'),
        'wheel_size' => $request->get('wheel_size'),
        'weight' => $request->get('weight'),
        'price' => $request->get('price'),
        'description' => $request->get('description'),
        'imageUrl' => $path
      ];

      $product = Product::findOrFail($id);
      $this->deletePhotoFromFS($product);
      $product->update($post);
      return redirect()->to('/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $product = Product::findOrFail($id);
      $this->deletePhotoFromFS($product);
      $product->delete();
      return redirect()->route('index');
    }

    public function deletePhotoFromFS($product) {
      $path = storage_path('app/' . $product->imageUrl);

      if (file_exists($path)){
          unlink($path);
      }
    }

    protected function validator($data)
    {

        return $data->validate([
            'manufacturer' => 'required|string|max:20',
            'model' => 'required|string|max:20',
            'quantity' => 'required|integer|max:2',
            'category' => 'required|string|max:20',
            'frame_size' => 'required|numeric|max:4',
            'frame' => 'required|string|max:20',
            'fork' => 'required|string|max:20',
            'gear_shifters' => 'required|string|max:20',
            'front_delailleur' => 'required|string|max:20',
            'rear_delailleur' => 'required|string|max:20',
            'brakes' => 'required|string|max:20',
            'gears_amount' => 'required|integer|max:2',
            'wheel_size' => 'required|numeric|max:4',
            'weight' => 'required|numeric|max:5',
            'price' => 'required|numeric|max:7',
            'description' => 'required|string|max:255',
            'imageUrl' => 'required|mimes:jpeg,bmp,png|max:6000'
          ]);
    }
}
