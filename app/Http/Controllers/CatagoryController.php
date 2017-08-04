<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catagory;
use Redirect;
use DB;

class CatagoryController extends Controller {

    public function addCatagory() {
        return view('Admin.Catagory.addCatagory');
    }

    public function insertCatagory(Request $request) {
        $this->validate($request, [
            'catagory_name' => 'required|max:50',
            'catagory_description' => 'required'
        ]);
        $catagory = new Catagory();
        $catagory->catagory_name = $request->catagory_name;
        $catagory->catagory_description = $request->catagory_description;
        $catagory->publication_status = $request->publication_status;
        $catagory->save();
        return redirect('/addCatagory')->with('message', 'Catagory Successfully Inserted!!');
    }

    public function manageCatagory() {
        $catagories = Catagory::paginate(5);
        return view('Admin.Catagory.manageCatagory', ['catagories' => $catagories]);
    }

    public function unpublishedCatagory($id) {
        Catagory::where('catagory_id', $id)
                ->update(['publication_status' => 0]);
        return redirect('/manageCatagory');
    }

    public function publishedCatagory($id) {
        Catagory::where('catagory_id', $id)
                ->update(['publication_status' => 1]);
        return redirect('/manageCatagory');
    }

    public function deleteCatagory($id) {
        $deleteCatagory = Catagory::where('catagory_id', $id);
        $deleteCatagory->delete();
        return redirect('/manageCatagory')->with('message', 'successfully Deleted!!');
    }
    public function updateCatagory($id){
        $catagoryById=Catagory::where('catagory_id',$id)->first();
       
        return view('Admin.Catagory.editCatagory',['catagoryById'=>$catagoryById]);
        
        
    }
    public function editCatagory(Request $request){
        //dd($request->all());
        $catagoryUpdate =$request->catagory_id;
        $data=array();
        $data['catagory_name']= $request->catagory_name;
        $data['catagory_description'] = $request->catagory_description;
        $data['publication_status'] = $request->publication_status;
        DB::table('catagories')
         ->where('catagory_id',$catagoryUpdate)
        ->update($data);
        return redirect('/manageCatagory')->with('message', 'successfully Updated!!');
       }

}
