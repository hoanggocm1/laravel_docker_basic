<?php

namespace App\Http\Services;


class UploadService
{
    public function store($request) //Ham này upload image product 
    {
        if ($request->hasFile('file')) {
            try {
                $fullimage = $request->file('file')->getClientOriginalName();
                $truocimage = current(explode('.', $fullimage));
                $sauimage = $request->file('file')->getClientOriginalExtension();
                $name =  $truocimage . rand(0, 999) . '.' . $sauimage;
                $pathFull = 'uploads/products/' . date("Y-m-d");
                $path = $request->file('file')->storeAs(
                    'public/' . $pathFull,
                    $name
                );
                $fullUrl = '/storage/' . $pathFull . '/' . $name;
                return ([
                    'fullUrl' => $fullUrl,
                    'name' => $name
                ]);
            } catch (\Exception $error) {
                return false;
            }
        }
    }

    public function stores($request) //Ham này upload images product 
    {

        if ($request->hasFile('files')) {
            try {
                $images = $request->file('files');
                $dem = count($images);
                for ($i = 0; $i < $dem; $i++) {


                    $fullimage = $images[$i]->getClientOriginalName();
                    $truocimage = current(explode('.', $fullimage));
                    $sauimage = $images[$i]->getClientOriginalExtension();
                    $name[$i] =  $truocimage . rand(0, 999) . '.' . $sauimage;

                    $pathFull = 'uploads/product-images/' . date("Y-m-d");

                    $path = $images[$i]->storeAs(
                        'public/' . $pathFull,
                        $name[$i]
                    );
                    $fullUrl[$i] = '/storage/' . $pathFull . '/' . $name[$i];
                }

                return ([
                    'fullUrl' => $fullUrl,
                    'name' => $name,
                    'dem' => $dem
                ]);
            } catch (\Exception $error) {
                return false;
            }
        }
    }
}
