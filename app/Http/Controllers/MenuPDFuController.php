<?php
namespace Notaria\Http\Controllers;
use Illuminate\Http\Request;
use Mpdf\Mpdf;
use DB;
//pdf categorias fucniones segun el puesto
class MenuPDFuController extends Controller
{  
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        return view('pdf.index');
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
     */
    public function store(Request $request)
    {
        //
    }
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
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
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
    public function getGenerar(Request $request,$id)
    {
        $accion = $request->get('accion');
        $tipo = $request->get('tipo');
        return $this->pdf($accion,$tipo,$id);
    }
    public function pdf($accion='ver',$tipo='digital',$id)
    {
        $ruc = "10072486893";
        $numero = "00000412";
        $nombres = "DAVID OLIVARES PEÑA";
        $dia = date('d');
        $mes =  date('m');
        $ayo =  date('y');
        $direccion = "Lima Perú";
        $dni = "23918745";
        $total = 0;
        
        $articulos = [
            [
                "cantidad" => 3,
                "descripcion" => "COCINA A GAS",
                "precio" => 400.00,
                "importe" => 1200,
            ],
            [
                "cantidad" => 1,
                "descripcion" => "PLANCHA",
                "precio" => 85.00,
                "importe" => 85.00,
            ],
        ];
        foreach ($articulos as $key => $value) {
            $total += $value["importe"];
            $articulos[$key]["precio"] = number_format($value["precio"],2,'.',' ');;
            $articulos[$key]["importe"] = number_format($value["importe"],2,'.',' ');;
 
        }
        $total = number_format($total,2,'.',' ');
 
        $data['ruc'] = $ruc;
        $data['numero'] = $numero;
        $data['nombres'] = $nombres;
        $data['dia'] = $dia;
        $data['mes'] = $mes;
        $data['ayo'] = $ayo;
        $data['direccion'] = $direccion;
        $data['dni'] = $dni;
        $data['articulos'] = $articulos; 
        $data['total'] = $total;
        $data['tipo'] = $tipo;

        $usuarios= DB::table('users')
        -> where('users.id', '=', $id)
        ->select('users.*')
        ->get();
 
        $puesto;

        foreach($usuarios as $usuario){
            $puesto = $usuario->puesto_id;
        }

       $valores =  DB::table('menu')
       ->Join('categorias_funciones', 'menu.categoria_funcion_id', '=', 'categorias_funciones.id')
       ->Join('funciones', 'menu.funcion_id', '=', 'funciones.funcion_id')
       ->where('menu.puesto_id', '=', $puesto)
       ->select('menu.*', 'categorias_funciones.nombre','funciones.nombre_funcion')
       ->get();
    
  
        if($accion=='html'){
            return view('pdf.menu_pdf',$data,compact('valores','usuarios'));
        }else{
            $html = view('pdf.menu_pdf',$data,compact('valores','usuarios'))->render();
        }
        $namefile = 'Usuarios_'.time().'.pdf';
 
        $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];
 
        $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata']; 
        $mpdf = new Mpdf([
            'fontDir' => array_merge($fontDirs, [
                public_path() . '/fonts',
            ]),
            'fontdata' => $fontData + [
                'arial' => [
                    'R' => 'arial.ttf',
                    'B' => 'arialbd.ttf',
                ],
            ],
            'default_font' => 'arial',
            // "format" => "A4", 
            "format" => [264.8,188.9],
        ]);
        // $mpdf->SetTopMargin(5);
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->WriteHTML($html);
        // dd($mpdf);
        
            $mpdf->Output($namefile,"I");
       
    }
}