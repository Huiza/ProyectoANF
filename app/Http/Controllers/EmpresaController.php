<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmpresaRequest;
use App\Tipo;
use App\Empresa;
use App\Catalogo;
use App\EstadoFinanciero;
use App\DetalleEstadosFinancieros;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rol = DB::select("SELECT RU.role_id FROM users U
            JOIN role_user RU ON U.id = RU.user_id
            WHERE U.id = ?", [Auth::user()->id])[0];
        if($rol->role_id==1){
            $empresas = Empresa::all();
        }
        else{
            $empresas = Empresa::where('id_usuario', Auth::user()->id);
        }
        
        return view('Empresas.lista_empresas',compact('empresas'));
    }
  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = Tipo::all();
        return view('Empresas.crear_empresa',compact('tipos'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresaRequest $request)
    {
        $empresa_registrada=false;
        $empresa = new Empresa;
        $empresa->nombre_empresa = $request->nombre_empresa;
        $empresa->descripcion = $request->descripcion;
        $empresa->tipo_id = $request->tipo_id;
        $empresa->id_usuario = Auth::user()->id;
        $empresa->save();
        return redirect('empresas')->withSuccess('Empresa creada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresa = Empresa::findOrFail($id);
        $catalogo = Catalogo::where('id_empresa', $empresa->id)->get();
        $estados = EstadoFinanciero::where('id_empresa', $empresa->id)->orderBy('fecha_inicio', 'DESC')->get();
        $balances_general = [];
        $estados_resultados = [];
        foreach($estados as $e)
        {
            if($e->id_tipo_estado_financiero == 1)
            {
                $balances_general[] = $e;
            }
            elseif($e->id_tipo_estado_financiero == 2)
            {
                $estados_resultados[] = $e;
            }
        }
        return view('Empresas.ver_empresa', compact('empresa', 'catalogo', 'estados', 'balances_general', 'estados_resultados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa_actualizar = Empresa::findOrFail($id);
        $tipos = Tipo::all();
        return view('Empresas.editar_empresa', compact('empresa_actualizar','tipos'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmpresaRequest $request, $id)
    {

        $empresa_actualizar = Empresa::findOrFail($id);
        $empresa_actualizar->nombre_empresa = $request->nombre_empresa;
        $empresa_actualizar->descripcion = $request->descripcion;
        $empresa_actualizar->tipo_id = $request->tipo_id;
        $empresa_actualizar->save();


        return redirect()->route('ver_empresa', $id)->withSuccess('Empresa actualizada correctamente');
    }

    public function buscar(Request $request)
    {
        $busqueda = $request->get('busqueda');
        $empresas = Empresa::where('nombre_empresa', 'like', '%' .$busqueda. '%')->paginate(10);
        return view('Empresas.lista_empresas', compact('empresas'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->delete();

        return redirect()->route('empresas');
        
    }
}
