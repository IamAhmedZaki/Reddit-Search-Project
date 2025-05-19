<?php

namespace App\Http\Controllers;

use App\Models\Font;
use Illuminate\Http\Request;

class FontController extends Controller
{
    public function uploadFont(Request $request)
    {
        // dd("ss");
 
        // Validate that the file is uploaded
        // $request->validate([
        //     'font_file' => 'required|mimes:ttf,otf,woff,woff2|max:2048',
        // ]);

        if ($request->hasFile('font_file')) {
            $fontFile = $request->file('font_file');
            $filename = $fontFile->getClientOriginalName();
            $fontName = pathinfo($filename, PATHINFO_FILENAME);

            // Store the font file in the root public folder
            $destinationPath = public_path("upload-font");
            $fontFile->move($destinationPath, $filename);
            $font = new Font();
            $font->user_id = auth()->id();
            $font->font_name = $fontName;
            $font->font_path = 'upload-font/' . $filename; 
            $font->save();
            $fonts =  Font::where('user_id',auth()->id())->get();
              return ["status" => true,"fonts"=> $fonts];
        }
   
        return response()->json(['message' => 'No file uploaded'], 400);
    }
    public function uploadFont2(Request $request)
    {
      

        if ($request->hasFile('font_file')) {
            $fontFile = $request->file('font_file');
            $filename = $fontFile->getClientOriginalName();
            $fontName = pathinfo($filename, PATHINFO_FILENAME);

            // Store the font file in the root public folder
            $destinationPath = public_path("upload-font");
            $fontFile->move($destinationPath, $filename);
            $font = new Font();
            $font->user_id = auth()->id();
            $font->font_name = $request->font_name;
            $font->font_path = 'upload-font/' . $filename; 
            $font->save();
            $fonts =  Font::where('user_id',auth()->id())->get();
             return redirect()->route('fonts');
        }
   
        return response()->json(['message' => 'No file uploaded'], 400);
    }
    public function updateFont2(Request $request)
    {
      

        if ($request->hasFile('font_file')) {
            $fontFile = $request->file('font_file');
            $filename = $fontFile->getClientOriginalName();
            $fontName = pathinfo($filename, PATHINFO_FILENAME);

            // Store the font file in the root public folder
            $destinationPath = public_path("upload-font");
            $fontFile->move($destinationPath, $filename);
            $font =  Font::find($request->id);
            $font->user_id = auth()->id();
            $font->font_name = $request->font_name;
            $font->font_path = 'upload-font/' . $filename; 
            $font->save();
            $fonts =  Font::where('user_id',auth()->id())->get();
        } else {
            
    
            $font =  Font::find($request->id);
            $font->user_id = auth()->id();
            $font->font_name = $request->font_name;
      
            $font->save();
        
        }
   
        return redirect()->route('fonts');
    }

    public function fonts() {

        $fonts = Font::orderBy('id', 'desc')->get();

        return view('admin.design.fonts.index',get_defined_vars());
    }
    public function add_font() {

        return view('admin.design.fonts.add_font',get_defined_vars());
    }
    public function edit($id) {
        $font = Font::find($id);
        return view('admin.design.fonts.edit-font',get_defined_vars());
    }
    public function delete($id) {
        $font = Font::find($id)->delete();
        return redirect()->route('fonts');

    }
}
