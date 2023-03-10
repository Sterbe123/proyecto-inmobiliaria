<?php

namespace App\Http\Controllers;

use App\Models\Propiedade;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Foto;
use Illuminate\Http\Request;

/**
 * Class PropiedadeController
 * @package App\Http\Controllers
 */
class PropiedadeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $propiedades = Propiedade::where('user_id', auth()->user()->id)->paginate();

        return view('propiedade.index', compact('propiedades'))
            ->with('i', (request()->input('page', 1) - 1) * $propiedades->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $propiedade = new Propiedade();

        $categorias = Categoria::pluck('categoria', 'id');
        $usuario = User::pluck('id');
        $foto = Foto::pluck('foto', 'id');

        return view('propiedade.create', compact('propiedade', 'categorias', 'foto', 'usuario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate(Propiedade::$rules);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $urlPath = "imagen/fotos/";
            $fileName = $urlPath . time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('foto')->move($urlPath, $fileName);
        } else {
            $fileName = "";
        }

        Foto::create([
            'foto' => $fileName,
        ]);

        $idFoto = Foto::latest('id')->first()->id;
        $request->merge(['foto_id' => $idFoto]);
        $propiedades = Propiedade::create($request->all());

        return redirect()->route('propiedades.index')
            ->with('success', 'La propiedad ha sido creada con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $propiedade = Propiedade::find($id);

        return view('propiedade.show', compact('propiedade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $propiedade = Propiedade::find($id);

        $categorias = Categoria::pluck('categoria', 'id');
        $usuario = User::pluck('name', 'id');
        $foto = Foto::pluck('foto', 'id');

        return view('propiedade.edit', compact('propiedade', 'categorias', 'foto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Propiedade $propiedade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Propiedade $propiedade)
    {
        request()->validate(Propiedade::$rules);

        if ($request->hasFile('foto')) {
            if ($propiedade->fotos->foto != "") {
                unlink($propiedade->fotos->foto);
            }

            $file = $request->file('foto');
            $urlPath = "imagen/fotos/";
            $fileName = $urlPath . time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('foto')->move($urlPath, $fileName);
            $propiedade->fotos->update([
                'foto' => $fileName
            ]);
        }else{
            if ($propiedade->fotos->foto != "") {
                unlink($propiedade->fotos->foto);
            }

            $propiedade->fotos->update([
                'foto' => ""
            ]);
        }

        $propiedade->update($request->all());

        return redirect()->route('propiedades.index')
            ->with('success', 'La propiedad se actualizo con exito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $propiedade = Propiedade::find($id);
        if ($propiedade->fotos->foto != "") {
            unlink($propiedade->fotos->foto);
        }

        $propiedade->fotos->delete();
        $propiedade->delete();

        return redirect()->route('propiedades.index')
            ->with('success', 'Propiedade deleted successfully');
    }
}
