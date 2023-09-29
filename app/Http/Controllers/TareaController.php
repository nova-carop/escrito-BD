<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tarea;
use App\Models\tareaCategoria;
use App\Models\Usuario;
use App\Models\Revision;

class TareaController extends Controller
{
 
    public function InsertarTareaY2Categorias(Request $request, $escrita, $oral){

        try {

            DB::raw('LOCK TABLE tarea READ');
            DB::raw('LOCK TABLE tarea_categoria READ');
            DB::beginTransaction();
    
            $categoria = new tareaCategoria();
            $categoria->tarea_id = $escrita;
            $categoria->save();
    
           
            $categoria = new tareaCategoria();
            $categoria->tarea_id = $oral;
            $categoria->save();
    
           
            DB::statement('UNLOCK TABLES');
    
            DB::commit();
    
            return response()->json(['mensaje' => 'Tarea con 2 categorias creada con exito'], 200);
        } catch (\Exception $e) {
            DB::rollback();
    
            return response()->json(['mensaje' => 'Tarea con 2 categorias fallo'], 500);
        }
    }


    public function InsertarTareaConRevision(Request $request,$revisionId){

        try {

            DB::raw('LOCK TABLE tarea WRITE');
            DB::raw('LOCK TABLE revision READ');
            DB::beginTransaction();
    
            $tarea = new tarea();
            $tarea->revision_id = $revisionId;
            $tarea->detalle = $request->input('detalle');
            $tarea->save();
    
           
            DB::statement('UNLOCK TABLES');
    
            DB::commit();
    
            return response()->json(['mensaje' => 'Tarea con revision creada con exito'], 200);
        } catch (\Exception $e) {
            DB::rollback();
    
            return response()->json(['mensaje' => 'Tarea con revision fallo'], 500);
        }
    }


}
