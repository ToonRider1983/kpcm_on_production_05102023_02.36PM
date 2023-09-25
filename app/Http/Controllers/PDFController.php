<?php

namespace App\Http\Controllers;
use  PDF;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
class PDFController extends Controller
{
    public function generatePDF(Request $request ,$machine_id,$id)
    {

        $result =  DB::table('machines')
        ->select(
            'machines.*',
            'servicedetails.*',
            'services.*',
            'services.service_id AS service_content',
            'services.service_dt AS service_dt',
            'services.service_idx AS service_idx',
            'customers.customer_name1 AS customer_name1',
            'customers.address1 AS address1',
            'companies.company_name AS company_name',
            'companies.company_short_name AS company_short_name',
            'companies.company_name AS company_name'

        )
        ->leftJoin('services', 'machines.id', '=', 'services.machine_id')
        ->leftJoin('servicedetails', 'services.id', '=', 'servicedetails.service_id')
        ->leftJoin('customers', 'machines.customer_id', '=', 'customers.id')
        ->leftJoin('companies', 'machines.service_factory_id', '=', 'companies.id')

        ->where('servicedetails.service_id',$id)
        ->get(); // ระบุคอลัมน์ที่ต้องกา
       
        $dateshow = $result[0];

        $keyValue = $dateshow;
        // dd($keyValue);
        $compressor_type = $keyValue->compressor_type;
        if($compressor_type == '1'){  //oil Flood

            $type_oil = view('pages.dashboards.service.pdf_template_flooded',  ['keyValue' =>  $keyValue])->render();


        } else if($compressor_type == '2'){ //oil Free

            $type_oil = view('pages.dashboards.service.pdf_template_free',  ['keyValue' =>  $keyValue])->render();

        }
        $options = new Options();
        $options->set('chroot', [__DIR__.'/Librairie', __DIR__.'/PICS', __DIR__.'/PHOTOS']);
        $options->set('isHtml5ParserEnabled', true);
       
        $options->set('isPhpEnabled', true); 
        $options->set('isRemoteEnabled', true);
        $options->set('defaultFont', 'Arial');
    
        // ตั้งค่าเพิ่มเติมเพื่อเพิ่มประสิทธิภาพ
        $options->set('isFontSubsettingEnabled', true); // เปิดใช้งานการตัดตัวอักษรที่ไม่ได้ใช้งานใน PDF
        $options->set('isFontSubsettingEnableCaching', true); // แคชการตัดตัวอักษรเพื่อลดเวลาในการแปลง
    
        $dompdf = new Dompdf($options);

        
        $contxt = stream_context_create([
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'user_agent' => 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)',
            ],
            'ssl' => [ 
                'verify_peer' => FALSE, 
                'verify_peer_name' => FALSE,
                'allow_self_signed'=> TRUE,
            ] 
        ]);
        $dompdf->setHttpContext($contxt);
   

        $pdfHtml =  $type_oil ;
        $dompdf->setPaper('A4', 'portrait'); 
        $dompdf->loadHtml($pdfHtml);
        $dompdf->setBasePath('assets/img');
        $dompdf->render();
        $dompdf->stream('test', array("Attachment" => false));
        // แสดงไฟล์ PDF ในรูปแบบ inline บนเว็บเพจ
        return new Response($dompdf->output(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="document.pdf"',
        ]);
    }

    
}

