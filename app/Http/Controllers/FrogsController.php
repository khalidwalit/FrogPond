<?php

namespace App\Http\Controllers;
use App\Models\Pond;

use Illuminate\Http\Request;
use App\Models\Frog;
use App\Http\Controllers\PondsController;


class FrogsController extends Controller
{

    protected $PondsController;
    public function __construct(PondsController $PondsController)
    {
        $this->PondsController = $PondsController;
    }

    public function getAllFrogs() {
      $frogs = Frog::get()->toJson(JSON_PRETTY_PRINT);
      return response($frogs, 200);
    }

    public function getFrog($id) {
      if (Frog::where('id', $id)->exists()) {
        $frog = Frog::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
        return response($frog, 200);
      } else {
        return response()->json([
          "message" => "Frog not found"
        ], 404);
      }
    }

    public function createFrog(Request $request) {
      $frog = new Frog;
      $frog->name = $request->name;
      $frog->gender = $request->gender;
      $frog->date_of_birth = date("Y-m-d", strtotime($request->date_of_birth));
      $frog->date_of_death = is_null($request->date_of_death) ? $request->date_of_death : date("Y-m-d", strtotime($request->date_of_death));
      $frog->pond_number = $request->pond_number;

      if (Pond::where('id', $frog->pond_number)->exists()) {
        
        $respond = $this->PondsController->updateFrogtoPond($request->pond_number, "addFrog");

        if($respond->status() != 500){
          $frog->save();
        }
      } else {
        $respond = ["message" => "Pond not exist", 404];
      }

      return response()->json($respond);
    }

    public function updateFrog(Request $request, $id) {
      if (Frog::where('id', $id)->exists()) {
        $frog = Frog::find($id);

        $frog->name = is_null($request->name) ? $frog->name : $request->name;
        $frog->gender = is_null($request->gender) ? $frog->gender : $request->gender;
        $frog->date_of_birth = is_null($request->date_of_birth) ? $frog->date_of_birth : date("Y-m-d", strtotime($request->date_of_birth));
        $frog->date_of_death = is_null($request->date_of_death) ? $frog->date_of_death : date("Y-m-d", strtotime($request->date_of_death));
        $frog->pond_number = is_null($request->pond_number) ? $frog->pond_number : $request->pond_number;
        $frog->save();

        return response()->json([
          "message" => "records updated successfully"
        ], 200);
      } else {
        return response()->json([
          "message" => "Frog not found"
        ], 404);
      }
    }

    public function deleteFrog ($id) {
      if(Frog::where('id', $id)->exists()) {
        $frog = Frog::find($id);
        echo $frog->pond_number;
        $this->PondsController->updateFrogtoPond($frog->pond_number, "removeFrog");
        $frog->delete();

        return response()->json([
          "message" => "records deleted"
        ], 202);
      } else {
        return response()->json([
          "message" => "Frog not found"
        ], 404);
      }
    }
}
