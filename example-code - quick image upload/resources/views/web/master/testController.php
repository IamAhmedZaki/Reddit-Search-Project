<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
class PdfController extends Controller
{
    public function generatePDF()
    {
        $pdf = PDF::loadView('pdf.empty');

        // Enable the option to access images in the local file system
        $pdf->getDomPDF()->set_option('isHtml5ParserEnabled', true);
        $pdf->getDomPDF()->set_option('isPhpEnabled', true);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->download('empty.pdf');
    }

    public function submit_form(Request $request)
    {

        $data = [
            "case_image" => $request->case_image,
            "case_option_name" => $request->case_option_name,
            "dial_image" => $request->dial_image,
            "dial_option_name" => $request->dial_option_name,
            "pipes_image" => $request->pipes_image,
            "pipes_option_name" => $request->pipes_option_name,
            "rings_image" => $request->rings_image,
            "rings_option_name" => $request->rings_option_name,
            "strap_image" => $request->strap_image,
            "strap_option_name" => $request->strap_option_name,
            "back_image" => $request->back_image,
            "back_option_name" => $request->back_option_name,
            "hands_image" => $request->hands_image,
            "hands_option_name" => $request->hands_option_name,
            "inner_dial_image" => $request->inner_dial_image,
            "inner_dial_option_name" => $request->inner_dial_option_name,
            "image1" => $request->image1,
            "image2" => $request->image2,
            "image3" => $request->image3,
            "image4" => $request->image4,
            "image5" => $request->image5,
            "image6" => $request->image6,
            "timeValue" => $request->timeValue,

        ];
        // dd($data['case_option_name']);
        $pdf = PDF::loadView('pdf.empty', ['data' => $data]);

        // Enable the option to access images in the local file system
        $pdf->getDomPDF()->set_option('isHtml5ParserEnabled', true);
        $pdf->getDomPDF()->set_option('isPhpEnabled', true);
        $pdf->setPaper('a4', 'portrait');


        $pdfPath = public_path('pdf/watch.pdf');
        $pdf->save($pdfPath);

        $details = [
            'email' => $request->email,
            'title' => 'JACOB&CO Watch Configurator',
            'first_name' => $request->first_name,
            'last_name' => $request->last_name

        ];
        view()->share('details', $details);
        Mail::send('mail', $details, function ($message) use ($details, $pdfPath) {
            $message->to($details['email'])
                ->subject($details['title'])
                ->attach($pdfPath, ['as' => 'watch.pdf', 'mime' => 'application/pdf']);
        });
        unlink($pdfPath);
        return "email send";
        // return $pdf->download('empty.pdf');

    }

        // $data = [
        //     "case_image" => $request->case_image,
        //     "case_option_name" => $request->case_option_name,
        //     "dial_image" => $request->dial_image,
        //     "dial_option_name" => $request->dial_option_name,
        //     "pipes_image" => $request->pipes_image,
        //     "pipes_option_name" => $request->pipes_option_name,
        //     "rings_image" => $request->rings_image,
        //     "rings_option_name" => $request->rings_option_name,
        //     "strap_image" => $request->strap_image,
        //     "strap_option_name" => $request->strap_option_name,
        //     "back_image" => $request->back_image,
        //     "back_option_name" => $request->back_option_name,
        //     "hands_image" => $request->hands_image,
        //     "hands_option_name" => $request->hands_option_name,
        //     "inner_dial_image" => $request->inner_dial_image,
        //     "inner_dial_option_name" => $request->inner_dial_option_name,
        //     'piston_image' => $request->piston_image,
        //     'piston_option_name' => $request->piston_option_name,
        //     "image1" => $request->image1,
        //     "image2" => $request->image2,
        //     "image3" => $request->image3,
        //     "image4" => $request->image4,
        //     "image5" => $request->image5,
        //     "image6" => $request->image6,
        //     "timeValue" => $request->timeValue,

        // ];
        // dd($data['case_option_name']);
        
        public function submit_form2(Request $request)
        {
            $data = [];
        
            // Store images in the inventory and optimize
            foreach ($request->all() as $key => $base64Image) {
                if (str_starts_with($key, 'image')) {
                    $optimizedBase64 = $this->optimizeAndEncodeImage($base64Image);
                    $data[$key] = $optimizedBase64;
                } else {
                    $data[$key] = $base64Image; // For non-image data
                }
            }
            
            // Generate PDF
            $pdf = PDF::loadView('pdf.empty2', ['data' => $data]);
            $pdf->getDomPDF()->set_option('isHtml5ParserEnabled', true);
            $pdf->getDomPDF()->set_option('isPhpEnabled', true);
            $pdf->setPaper('a4', 'portrait');
            // Save PDF to a file
            $pdfPath = public_path('pdf/configuration.pdf');
            $pdf->save($pdfPath);
            // Get the necessary details from the form
            $firstName = $request->first_name;
            $lastName = $request->last_name;
            $email = $request->email;
            $phone_number = $request->phone_number;
            // dd($firstName,$lastName,$email,$phone_number);
            // Monday.com API Token and URL
            $apiToken = 'eyJhbGciOiJIUzI1NiJ9.eyJ0aWQiOjQ1MjMwODYzOSwiYWFpIjoxMSwidWlkIjoxNzM0Njc0NCwiaWFkIjoiMjAyNC0xMi0zMFQxODowMzo0My4xODhaIiwicGVyIjoibWU6d3JpdGUiLCJhY3RpZCI6NzI3NDU0OCwicmduIjoidXNlMSJ9.TjSlCUIsGw0L1Zp8NA9ds4vvDr7CR_8Op96OZdd-G7g'; // Replace with your actual API token
            try {
                // Step 1: Create a new item (task) in Monday.com
                $itemName = "Task for {$firstName} {$lastName}";
                $response = Http::withToken($apiToken)->post('https://api.monday.com/v2', [
                    'query' => 'mutation ($boardId: ID!, $itemName: String!, $columnValues: JSON!) {
                        create_item (board_id: $boardId, item_name: $itemName, column_values: $columnValues) {
                            id
                        }
                    }',
                    'variables' => [
                        'boardId' => "8130117828", // Note: This should be a string, not an integer
                        'itemName' => $itemName,
                        // 'columnValues' => json_encode([
                        //     'text' => $email,
                        //     'first_name' => $firstName,
                        //     'last_name' => $lastName,
                        // ]),
                        
                          'columnValues' => json_encode([
                                'text_mkm8d3kq' => $firstName,    // First Name
                                'text_mkm898pf' => $lastName,     // Last Name
                                'text_mkm8f23h' => $email,        // Email
                                'text_mkm8h86q' => $phone_number, // Phone
                            ]),
                    ],
                ]);
                $result = $response->json();
                if (!isset($result['data']['create_item']['id'])) {
                 
                }
                $itemId = $result['data']['create_item']['id'];
                $uploadResponse = Http::withToken($apiToken)
                    ->attach('file', file_get_contents($pdfPath), 'watch.pdf') // Attach the generated PDF
                    ->post('https://api.monday.com/v2/file', [
                        'query' => 'mutation($file: File!) { add_file_to_column (item_id: ' . $itemId . ', column_id: "files_mkkq86wn", file: $file) { id } }',
                        'map' => '{"file": "variables.file"}',
                    ]);
                $uploadResult = $uploadResponse->json();
                
            } catch (\Exception $e) {
           
            }
       
            $details = [
                'email' => $request->email,
                'title' => 'Bugatti Tourbollon configurator',
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                
    
            ];
            view()->share('details', $details);
            Mail::send('mail', $details, function ($message) use ($details, $pdfPath) {
                $message->to($details['email'])
                    ->subject($details['title'])
                    ->attach($pdfPath, ['as' => 'bugatti-tourbillon-configuration.pdf', 'mime' => 'application/pdf']);
            });
            unlink($pdfPath);
             return ["status" => "true", "pdf" => base64_encode($pdf->output())];
            return "email send";
        }
        

    public function download_pdf(Request $request)
    {
        $data = [];

        // Store images in the inventory and optimize
        foreach ($request->all() as $key => $base64Image) {
            if (str_starts_with($key, 'image')) {
                $optimizedBase64 = $this->optimizeAndEncodeImage($base64Image);
                $data[$key] = $optimizedBase64;
            } else {
                $data[$key] = $base64Image; // For non-image data
            }
        }
        $pdf = PDF::loadView('pdf.empty2', ['data' => $data]);
        // No need to enable options or set paper size for this example
        return ["status" => "true", "pdf" => base64_encode($pdf->output())];
    }

    private function optimizeAndEncodeImage($base64Image)
    {
        // Decode base64 to image
        $decodedImage = base64_decode($base64Image);
        // Create temporary file path
        $tempImagePath = tempnam(sys_get_temp_dir(), 'optimized_image_');
        // Save the decoded image to a temporary file
        file_put_contents($tempImagePath, $decodedImage);
        // Optimize the image using Intervention Image
        $optimizedImage = Image::make($tempImagePath);
        $optimizedImage->encode('jpg', 60); // Adjust quality as needed
        // Encode the optimized image back to base64
        $optimizedBase64 = base64_encode($optimizedImage->encode());
        // Remove the temporary file
        File::delete($tempImagePath);

        return $optimizedBase64;
    }
}
