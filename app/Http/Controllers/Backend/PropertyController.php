<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Property;
use App\Models\Amenities;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use Intervention\Image\Image;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class PropertyController extends Controller
{
    public function AllProperty(){

        $property = Property::latest()->get();
        return view('backend.property.all_property', compact('property'));
    
    }// End method

    public function AddProperty(){

        $propertytype = PropertyType::latest()->get();
        $amenities = Amenities::latest()->get();
        $activeAgent = User::where('status','active')->where('role','agent')->latest()->get();

        return view('backend.property.add_property', compact('propertytype','amenities','activeAgent'));
    
    }// End method 

    // public function StoreProperty(Request $request){

    //     $amen = $request->amenities_id;
    //     $amenities = implode(',', $amen);

    //     $pcode = IdGenerator::generate(['table' => 'properties', 'field' => 'property_code' ,'length' => 5, 'prefix' =>'PC']);

    //     $image = $request->file('property_thumbnail');
    //     $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    //     Image::make($image)->resize(370,250)->save('upload/property/thambnail/'.$name_gen);
    //     $save_url = 'upload/property/thambnail/'.$name_gen;

    //     $property_id = Property::insertGetId([

    //         'property_type_id' => $request->property_type_id,
    //         'agent_id' => $request->agent_id,
    //         'property_name' => $request->property_name,
    //         'property_price' => $request->property_price,
    //         'property_size' => $request->property_size,
    //         'property_bedroom' => $request->property_bedroom,
    //         'property_bathroom' => $request->property_bathroom,
    //         'property_garage' => $request->property_garage,
    //         'property_address' => $request->property_address,
    //         'property_city' => $request->property_city,
    //         'property_state' => $request->property_state,
    //         'property_country' => $request->property_country,
    //         'property_zip' => $request->property_zip,
    //         'property_amenities' => $amenities,
    //         'property_description' => $request->property_description,
    //         'property_thumbnail' => $save_url,
    //         'created_at' => date('d-m-Y'),
    //     ]);
        
    //     $images = $request->file('property_image');
    //     foreach($images as $image){
    //         $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    //         Image::make($image)->resize(370,250)->save('upload/property/'.$name_gen);
    //         $save_url = 'upload/property/'.$name_gen;

    //         $property_image = Property::insert([

    //             'property_id' => $property_id,
    //             'property_image' => $save_url,
    //             'created_at' => date('d-m-Y'),
    //         ]);

    //     }

    //     $notification = array(
    //         'message' => 'Property Inserted Successfully',
    //         'alert-type' => 'success'
    //     );

    //     return redirect()->route('all.property')->with($notification);

        
        

    // } // End method

}
