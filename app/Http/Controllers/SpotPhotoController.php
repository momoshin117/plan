<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpotPhoto;
use App\Models\SpotMaster;
use Cloudinary; 

class SpotPhotoController extends Controller
{
    public function create()
    {
        $spot_master=SpotMaster::get();
        return view('spot_photos.create')->with([
            'spot_masters' =>$spot_master,
        ]);
    }
    
    public function store(Request $request,SpotPhoto $spot_photo)
    {
        $image_url = Cloudinary::upload($request->file('path')->getRealPath())->getSecurePath();
        
        $input=$request['spot_photo'];
        $input += ['path' => $image_url];
        $spot_photo->fill($input) ->save();
        
        return redirect('/manager/spot_photo/index');
    }
    
    public function index(){
        
        $spot_photo=SpotPhoto::with('spot_master')->get();
        
        return view('spot_photos.index') ->with([
            'spot_photos'=>$spot_photo
        ]);
    }
    
    public function delete(SpotPhoto $spot_photo)
    {
        $spot_photo->delete();
        return redirect('/manager/spot_photo/index');
    }
}
