<?php

namespace App\Http\Controllers;
use App\Models\Pond;

use Illuminate\Http\Request;

use App\Http\Controllers\FrogsController;

class PondsController extends Controller
{

    protected $FrogsController;
    public function __construct(FrogsController $FrogsController)
    {
        $this->FrogsController = $FrogsController;
    }

    public function getAllPonds() {
        $ponds = Pond::get()->toJson(JSON_PRETTY_PRINT);
        return response($ponds, 200);
      }
  
      public function getPond($id) {
        if (Pond::where('id', $id)->exists()) {
          $pond = Pond::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
          return response($pond, 200);
        } else {
          return response()->json([
            "message" => "Pond not found"
          ], 404);
        }
      }
  
      public function createPond(Request $request) {
        $pond = new Pond;
        $pond->pond_name = $request->pond_name;
        $pond->capacity = $request->capacity;
        $pond->current_size = is_null($request->current_size) ? null : $request->current_size;
        echo($pond->current_size);
  
        $pond->save();
  
        return response()->json([
          "message" => "Frog record created"
        ], 201);
      }
  
      public function updatePond(Request $request, $id) {
          echo $request;
        if (Pond::where('id', $id)->exists()) {
          $pond = Pond::find($id);
  
          echo($request->pond_name);
  
          $pond->pond_name = is_null($request->pond_name) ? $pond->pond_name : $request->pond_name;
          $pond->capacity = is_null($request->capacity) ? $pond->capacity : $request->capacity;
          $pond->current_size = is_null($request->current_size) ? $pond->current_size : $request->current_size;
          $pond->save();
  
          return response()->json([
            "message" => "records updated successfully"
          ], 200);
        } else {
          return response()->json([
            "message" => "Pond not found"
          ], 404);
        }
      }
  
      public function deletePond ($id) {
        if(Pond::where('id', $id)->exists()) {
          $pond = Pond::find($id);
          
          $pond->delete();
  
          return response()->json([
            "message" => "records deleted"
          ], 202);
        } else {
          return response()->json([
            "message" => "Pond not found"
          ], 404);
        }
      }

      public function updateFrogtoPond($id, $operation) {
      if (Pond::where('id', $id)->exists()) {
        $pond = Pond::find($id);
        if($operation == "addFrog"){ 
            $pond->current_size += 1; 
        } else if ($operation == "removeFrog"){ 
            $pond->current_size -= 1; 
        }
        

        if($pond->current_size > $pond->capacity )
        {
            return response()->json([
                "message" => "Maximum capacity"
              ], 500);
        }
        $pond->save();

        return response()->json([
          "message" => "records updated successfully"
        ], 200);
      } else {
        return response()->json([
          "message" => "Pond not found"
        ], 404);
      }
    }
}
