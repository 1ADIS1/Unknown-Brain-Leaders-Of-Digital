<?php
namespace Tygh\Addons;
use Tygh\Http;

class Speechpro {
    private $_url = 'https://cloud.speechpro.com/';
    private $_domain_id = '4989';
    private $_username = 'skater4@yandex.ru';
    private $_password = 'Uc665G$gLr';
    private $_session_id;

    public function __construct()
    {
        $this->_setSession();
    }

    private function _setSession()
    {
        $url = $this->_url . 'vksession/rest/session';
        $data = [
            'domain_id' => $this->_domain_id,
            'username' => $this->_username,
            'password' => $this->_password
        ];
        $extra = [
            'headers' => [
                'Content-type: application/json'
            ]
        ];
        $res = json_decode(Http::post($url, json_encode($data), $extra), true);
        $this->_session_id = $res['session_id'];
    }

    public function processAudioFiles($type = 'simple')
    {
        $text = '';
        $url = $this->_url . 'vkasr/rest/v2/recognizer/' . $type;
        $files = scandir(AUDIO_DIR);
        unset($files[0]);
        unset($files[1]);
        foreach ($files as $file) {
            $data = [
                'model_id' => 'FarFieldRus10:offline',
                'audio' => [
                    'data' => base64_encode(file_get_contents(AUDIO_DIR . $file)),
                    'mime' => 'WAV'
                ],
                'recognition_config' => [
                    'additional_words' => [
                        'string'
                    ],
                    'vocabulary_ids' => [
                        'string'
                    ]
                ]
            ];
            $extra = [
                'headers' => [
                    'Content-type: application/json',
                    'X-Session-ID: ' . $this->_session_id
                ]
            ];
            $res = json_decode(Http::put($url, json_encode($data), $extra), true);
            if ($file !== reset ($files)) {
                $text .= ' ';
            }
            $text .= $res['text'];
            unlink(AUDIO_DIR . $file);
        }

        return $text;
    }
}