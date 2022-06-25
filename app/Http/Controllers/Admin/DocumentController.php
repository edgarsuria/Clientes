<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Document;
use App\Models\Report;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents=Document::all();
        return view('admin.documents.index',compact('documents'));

    }


    public function create()
    {
        $lst_customers=Customer::all()->sortBy('name',SORT_NATURAL | SORT_FLAG_CASE)->pluck('custom_customer','id');
        return view('admin.documents.create',compact('lst_customers'));
    }


    public function store(Request $request)
    {


        $request->validate([
                "name"=>'required|unique:documents',
                'description'=>'required',
                "customer_id"=>'required',
                "document"=>'required|max:2048',
            ]
        );
        $imagen = $request->file("document");
        $nombreimagen=$imagen->getClientOriginalName();
        $ruta = public_path("img/documents/");
        copy($imagen->getRealPath(),$ruta.$nombreimagen);
        $path=$ruta.$nombreimagen;
        $imagenbd=file_get_contents($path);
        $data=base64_encode($imagenbd);

        //$request->merge(['customer_id'=>1]);
        $document=Document::create($request->all());


        $document->update(['document'=>$data]);//se guarda la imagen como base64
        $document->save();
        unlink($path);

        $report=Report::create([
            'user_id'=>auth()->user()->id,
            'description'=>'Creo documento de  cliente '.$request->customer_id,
        ]);

        Alert::success('¡Listo!',"El documento de creo de forma correcta");
        return redirect()->route('admin.documents.index');

    }


    public function show($id)
    {
        //
    }


    public function edit(Document $document)
    {
        $lst_customers=Customer::all()->sortBy('name',SORT_NATURAL | SORT_FLAG_CASE)->pluck('custom_customer','id');
        return view('admin.documents.edit',compact('document','lst_customers'));
    }


    public function update(Document $document, Request $request)
    {


        $request->validate([
            "name"=>'required|unique:documents,name,'.$document->id,
            'description'=>'required',
            "customer_id"=>'required',
            "document"=>'required|max:2048',

        ]);


        $imagen = $request->file("document");
        $nombreimagen=$imagen->getClientOriginalName();
        $ruta = public_path("img/documents/");
        copy($imagen->getRealPath(),$ruta.$nombreimagen);
        $path=$ruta.$nombreimagen;
        $imagenbd=file_get_contents($path);
        $data=base64_encode($imagenbd);

        //$request->merge(['customer_id'=>1]);
        $document->update($request->all());

        $document->update(['document'=>$data]);//se guarda la imagen como base64
        $document->save();
        unlink($path);
        $lst_customers=Customer::all()->sortBy('name',SORT_NATURAL | SORT_FLAG_CASE)->pluck('custom_customer','id');

        $report=Report::create([
            'user_id'=>auth()->user()->id,
            'description'=>'Edito documento de  cliente '.$request->customer_id,
        ]);

        Alert::success('¡Listo!',"El documento de edito de forma correcta");
        return redirect()->route('admin.documents.edit',compact('document','lst_customers'));

    }

    public function destroy(Document $document)
    {
        $name=$document->name;
        $document->delete();
        $report=Report::create([
            'user_id'=>auth()->user()->id,
            'description'=>'Borro documento de  cliente '.$document->customer_id,
        ]);
        Alert::success("¡Listo!","El documento ha sido eliminado");
        return redirect()->route('admin.documents.index');
    }



}
