<?php

namespace App\Http\Controllers;

use App\Models\Rubro;

use Illuminate\Http\Request;

//use Illuminate\Http\Request;

//importar el modelo Rubro (tiene que estar creado primero)

class RubroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rubros= Rubro::Buscar();

        /*echo ("<pre>");
        var_dump($rubros);
        echo ("</pre>");
        exit;*/

        //Aqui se pone el resultado del Store Procedure
        //$rubros= 'todos los rubros se muestran aqui';
        return view( 'rubros.index', compact('rubros') );
        //['rubros'=>$rubros] es equivalente a compact('rubros') 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *//*
    public function store(Request $request)
    {
        //
    }*/

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    // Solo mostrará la vista con el formulario a llenar
    public function crear()
    {
        return view( 'rubros.crear' );
    }

    public function alta(Request $request)
    {
        //Se recuperan los datos ingresados en el formulario para crear un Rubro
        $argumentos= [
                        $request->idRubroPadre,
                        $request->nombreRubro,
                        $request->descripcionRubro,
                        $request->ordenRubro,
                        $request->destacadoRubro,
                        $request->menuRubro,
                        $request->estadoRubro
                    ];

        $respuesta = Rubro::alta($argumentos);

        //var_dump($respuesta->Mensaje); exit;
        if($respuesta->Mensaje == 'OK') {
            /*  Se redirecciona a otra vista (colocando el nombre de la vista)
                y se crea un mensaje de sesión llamado 'creacion' que contendrá la leyenda 'OK' */
            return redirect()->route('rubros.index')->with('creacion', $respuesta->Mensaje);
        } else {
            return redirect()->route('rubros.crear')->with('creacion', $respuesta->Mensaje)->withInput();
        }
        
        //exit;

        //return $respuesta;
        
    }

    public function actualizar($id)
    {
        //  SE RECUPERA EL RUBRO QUE SE DESEA ACTUALIZAR
        $argumento= [intval($id)];
        $array_respuesta= Rubro::Dame($argumento);
        $rubro= $array_respuesta[0];

        return view( 'rubros.actualizar', compact('rubro') );
        //['rubros'=>$rubros] es equivalente a compact('rubros') 
    }






    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *//*
    public function update(Request $request, $id)
    {
        //
    }*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
