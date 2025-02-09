<?php
namespace App\Repositories;
use OpenAI\Laravel\Facades\OpenAI;
use OpenAI\Responses\Completions\CreateResponse;
use Illuminate\Support\Facades\Log;
use App\Interfaces\RekomChatRepositoryInterface;


class RekomChatRepository implements RekomChatRepositoryInterface{
    public function recommendation($req)
    {
        $prompt = "Kamu adalah seorang peternak ikan profesional dengan pengalaman bertahun-tahun dalam budidaya ikan.
                Berikan rekomendasi dalam format berikut:
                1. Suhu: [angka] °C
                2. Jumlah Ikan: [angka] ekor
                3. Kadar Oksigen: [angka] mg/L
                4. pH Air: [angka]
                5. Salinitas: [angka] ppt
                6. Rekomendasi: [text]

                Untuk ikan jenis {$req['fish']}.
                Kolam memiliki ukuran {$req['length']} meter panjang, {$req['width']} meter lebar, dan {$req['height']} meter tinggi.
                Sistem pengelolaan kolam yang digunakan adalah {$req['management']}.";

        $response = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $prompt],
            ],
        ]);
        Log::info('Respons OpenAI:', $response->toArray());
        $generatedText = $response['choices'][0]['message']['content'] ?? 'Tidak ada respons';
        return $generatedText;
    }

    public function chatbot($req)
    {
        $prompt = "Kamu adalah Marivora AI, sebuah asisten AI yang ditugaskan untuk membantu pengguna dalam memulai, mengelola, dan mengembangkan usaha ternak ikan.
        Jawablah pertanyaan pengguna yang berkaitan dengan perikanan dan peternakan ikan secara informatif dan jelas.
        Jika pengguna mengajukan pertanyaan di luar topik perikanan atau peternakan ikan, jawab dengan:
        'Saya Marivora AI, asisten yang khusus membantu dalam bidang perikanan dan peternakan ikan. Saya hanya bisa menjawab pertanyaan terkait topik tersebut.'
        Jika pengguna meminta perkenalan, jawab dengan:
        'Saya Marivora AI, asisten yang ditugaskan untuk membantu dalam bidang perikanan dan peternakan ikan. Saya dapat memberikan informasi terkait cara memulai usaha ternak ikan, manajemen budidaya, hingga strategi pengembangannya.'
        Jawaban untuk pertanyaan pengguna: {$req}";

        return OpenAI::chat()->createStreamed([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $prompt],
            ],
            'stream' => true
        ]);
    }

    public function testChatbot()
    {
        $prompt = "PHP adalah ";

        $response = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $prompt],
            ],
        ]);

        Log::info('Respons OpenAI:', $response->toArray());

        $generatedText = $response['choices'][0]['message']['content'] ?? 'Tidak ada respons';
        return $generatedText;
    }
}
