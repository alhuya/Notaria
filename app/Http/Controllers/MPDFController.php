<?php
namespace Notaria\Http\Controllers;
use Illuminate\Http\Request;
use Mpdf\Mpdf;
use DB;
//Reporte clientes
class MPDFController extends Controller
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
    public function getGenerar(Request $request)
    {
        $accion = $request->get('accion');
        $tipo = $request->get('tipo');
        return $this->pdf($accion,$tipo);
    }
    public function pdf($accion='ver',$tipo='digital')
    {
      
        $dia = date('d');
        $mes =  date('m');
        $ayo =  date('y');  
       
        
        $data['dia'] = $dia;
        $data['mes'] = $mes;
        $data['ayo'] = $ayo;
        $data['tipo'] = $tipo;

        $clientes =DB::table('clientes')
        ->join('municipios', 'clientes.municipio_id', '=', 'municipios.id')
        ->join('estados', 'clientes.estado_id', '=', 'estados.id')
        ->select( 'clientes.*','municipios.municipio','estados.estado')
        ->get(); 


        
  
        if($accion=='html'){
            return view('pdf.generar',$data,compact('clientes'));
        }else{
            $html = view('pdf.generar',$data,compact('clientes'))->render();
        }
        $namefile = 'Reporte_Clientes'.time().'.pdf';
 
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
        if($accion=='ver'){
            $mpdf->Output($namefile,"I");
        }elseif($accion=='descargar'){
            $mpdf->Output($namefile,"D");
        }
    }


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
}
