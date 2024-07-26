<?php

namespace App\Services;

use OpenAI;


class OpenAIService
{
    protected $client;

    public function __construct()
    {
        $this->client = OpenAI::client(env('OPENAI_SECRET_KEY'));
    }

    public function detectDocumentType($filePath)
    {
        // Lee el contenido del archivo
        $fileContent = file_get_contents($filePath);

        // Configura el prompt para la API de OpenAI
        $prompt = "Detecta el tipo de documento basado en el siguiente contenido:\n\n$fileContent";

        // Realiza la solicitud a OpenAI
        $response = $this->client->completions()->create([
            'model' => 'text-davinci-003',
            'prompt' => $prompt,
            'max_tokens' => 100,
        ]);

        // Supongamos que la IA devuelve un JSON con los detalles del tipo de documento
        $documentTypeDetails = json_decode($response['choices'][0]['text'], true);

        return $documentTypeDetails;
    }
}
