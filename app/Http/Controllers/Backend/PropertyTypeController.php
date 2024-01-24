<?php

namespace App\Http\Controllers\Backend;

use App\Models\Amenities;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropertyTypeController extends Controller
{
    public function AllType()
    {
        $types = PropertyType::latest()->get();
        return view('backend.type.all_type', compact('types'));
    }//End Method

    public function AddType()
    {
        return view('backend.type.add_type');
    }//End Method

    public function StoreType(Request $request){

        // Validation
        $request->validate([
            'type_name' => 'required|unique:property_types|max:200',
            'type_icon' => 'required',
        ]);

        // Insert Data
        PropertyType::insert([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon,
        ]);

        // Notification
        $notification = array(
            'message' => 'Property Type Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.type')->with($notification);

    }//End Method

    public function EditType($id)
    {
        $types = PropertyType::findOrFail($id);
        return view('backend.type.edit_type', compact('types'));
    }//End Method


    public function UpdateType(Request $request, $id)
    {
        $pid = $request->id;

        // Update Data
        PropertyType::findOrFail($pid)->update([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon,
        ]);

        // Notification
        $notification = array(
            'message' => 'Property Type Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.type')->with($notification);

    }//End Method

    public function DeleteType($id)
    {
        $types = PropertyType::findOrFail($id);
        $types->delete();

        // Notification
        $notification = array(
            'message' => 'Property Type Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }//End Method

    ///////////////////  Amenities All Methods   ////////////////

    public function AllAmenitie()
    {
        $amenities = Amenities::latest()->get();
        return view('backend.amenities.all_amenities', compact('amenities'));
    }//End Method

    public function AddAmenitie()
    {
        return view('backend.amenities.add_amenities');
    }//End Method

    public function StoreAmenitie(Request $request){

        // Insert Data
        Amenities::insert([
            'amenities_name' => $request->amenities_name,
        ]);

        // Notification
        $notification = array(
            'message' => 'Amenities Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.amenitie')->with($notification);

    }//End Method

    public function EditAmenitie($id)
    {
        $amenities = Amenities::findOrFail($id);
        return view('backend.amenities.edit_amenities', compact('amenities'));
    }//End Method

    public function UpdateAmenitie(Request $request)
    {
        
        $ame_id = $request->id;

        Amenities::findOrFail($ame_id)->update([
            'amenities_name' => $request->amenities_name,
        ]);

        // Notification
        $notification = array(
            'message' => 'Amenities Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.amenitie')->with($notification);

    }//End Method

    public function DeleteAmenitie($id)
    {
        Amenities::findOrFail($id)->delete();

        // Notification
        $notification = array(
            'message' => 'Amenities Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }//End Method

}
