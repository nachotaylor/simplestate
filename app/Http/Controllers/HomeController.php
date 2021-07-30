<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductsResource;
use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $model;

    /**
     * HomeController constructor.
     * @param Home $home
     */
    public function __construct(Home $home)
    {
        $this->model = $home;
    }

    /**
     * Return products to the view
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function home(Request $request)
    {
        try {
            $products = response()->json(new ProductsResource($this->model->getProducts($request->get('code'))));
            return view('home', ['products' => $products->getData()]);
        } catch (\Exception $exception) {
            return redirect('/')->with('error', $exception->getMessage());
        }
    }
}
