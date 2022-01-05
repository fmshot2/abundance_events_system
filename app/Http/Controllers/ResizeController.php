<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Image;

class ResizeController extends Controller
{
    
    public function index()
    {
    	return view('welcome');
    }

    public function resizeImage(Request $request)
    {
	    $this->validate($request, [
            'file' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);






        if ($request->hasFile('file')) {
            $image       = $request->file('file');
            $fileInfo = $image->getClientOriginalName();
            $input['file'] = time().'.'.$image->getClientOriginalExtension();
            $filename = pathinfo($fileInfo, PATHINFO_FILENAME);
            $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
            $file_name = $filename . '-' . time() . '.' . $extension;

            //Fullsize
            $image->move(public_path('uploads/about/'), $file_name);

            $image_resize = Image::make(public_path('uploads/about/') . $file_name);
            $image_resize->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_resize->save(public_path('uploads/about/' . $file_name));

            // $service->images()->create(['image_path' => $file_name]);
            // $service->thumbnail = $service->images()->first()->image_path;
            // $service->save();
            return back()
        	->with('success','Image has successfully uploaded.')
        	->with('fileName',$input['file']);
        }




        

        $image = $request->file('file');
        $input['file'] = time().'.'.$image->getClientOriginalExtension();
        
        $destinationPath = public_path('thumbnail');

        $imgFile = Image::make($image->getRealPath());

        $imgFile->resize(150, 150, function ($constraint) {
		    $constraint->aspectRatio();
		})->save($destinationPath.'/'.$input['file']);

        $destinationPath = public_path('/uploads');
        $image->move($destinationPath, $input['file']);

        return back()
        	->with('success','Image has successfully uploaded.')
        	->with('fileName',$input['file']);
    }

}