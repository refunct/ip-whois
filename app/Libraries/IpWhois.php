<?php

namespace App\Libraries;

class IpWhois
{

    private $ip;
    private $lang;
    private $data;

    public function __construct(string $lang = 'en')
    {
        /** @link https://ipwhois.io/documentation */
        $langs = array('en', 'ru', 'de', 'es', 'fr', 'ja');
        if(!in_array($lang, $langs)){
            $lang = 'de';
        }
        $this->lang = $lang;
        $this->ip = $_SERVER['REMOTE_ADDR'];
        $this->getDataFromRemote();
    }

    public function getIp(): string
    {
        return $this->ip ?? '';
    }

    public function getData(): array
    {
        return $this->data ?? [];
    }

    private function getDataFromRemote(): void
    {
        if (empty($this->data)) {
            try {
                $ch = curl_init("http://free.ipwhois.io/json/" . $this->ip.'?lang='.$this->lang);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $output = curl_exec($ch);
                $output = json_decode($output, true);
                $this->data = $output;
                curl_close($ch);
            } catch (\Exception $ex) {
                $this->data['error'] = true;
            }
        }
    }
}
