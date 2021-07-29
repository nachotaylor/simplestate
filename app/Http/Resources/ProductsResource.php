<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;


class ProductsResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $sold = $price = 0;
        return [
            'products' => $this->resource->map(function ($item) use (&$sold, &$price) {
                $sold += $item->sold_quantity;
                $price += $item->price;
                return [
                    'id' => $item->id,
                    'title' => $item->title,
                    'price' => $item->price,
                    'sold_quantity' => $item->sold_quantity,
                    'img' => $item->thumbnail
                ];
            }),
            'sold' => $sold,
            'price' => $price,
        ];
    }
}
