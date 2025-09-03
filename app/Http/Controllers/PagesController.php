<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI;

 // API KEY
 define("API_KEY","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");


class PagesController extends Controller
{
   
   // Pagina de Index
   public function index(Request $request) {
        $respuestas = [];
       
        return view('pages.index',['respuestas'=>$respuestas]);
    }

    // Realizar consulta texto
    public function consultar(Request $request) {

        $respuestas = [];
        // Conectar cliente Open AI
        try {
            $client = OpenAI::client(API_KEY);
        } 
        catch (Exception $e) {
            $response = "Ha ocurrido un error:\n {$e}";
        }

        $prompt = $request->input('prompt_text');

        try {
            $response = $client->responses()->create([
                'model' => 'gpt-4o',
                'input' => $prompt,
            ]);
            $respuestas[] = $response->outputText;
    
        } catch (Exception $e) {
            $respuestas[] = "Ha ocurrido un error.";
        }

        return view('pages.index',['respuestas'=>$respuestas]);
    }

    // Pagina para imagenes

    public function imagenConsultar(Request $request) {
        $imagenResponse = null;
        return view('pages.imagen',['imagenGenerada' => $imagenResponse]);
    }

    public function imagenGenerate(Request $request) {

        $apiKey = API_KEY;

        // Set the DALL-E API endpoint
        $apiEndpoint = "https://api.openai.com/v1/images/generations";

        // Prepare the data for the API request
        $data = [
            "prompt" => $request->input("prompt_text"),
            "model" => "dall-e-2", 
            "n" => 1, 
        ];

        // Initialize cURL session
        $ch = curl_init($apiEndpoint);

        // Set cURL options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Content-Type: application/json",
        "Authorization: Bearer " . $apiKey,
        ]);

        // Execute the cURL request
        $response = curl_exec($ch);

        // Close cURL session
        curl_close($ch);

        // Decode the JSON response
        $responseData = json_decode($response, true);

        // Get the generated image URL
        $imageUrl = $responseData["data"][0]["url"];

        return view('pages.imagen',['imagenGenerada' => $imageUrl]);
    }
}
