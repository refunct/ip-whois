<?php

namespace App\Libraries;

class IpWhois
{

    private $ip;
    private $lang;
    private $user_agent;
    private $data = array();

    public function __construct(string $lang = 'en')
    {
        /** @link https://ipwhois.io/documentation */
        $langs = array('en', 'ru', 'de', 'es', 'fr', 'ja');
        if(!in_array($lang, $langs)){
            $lang = 'de';
        }
        $this->user_agent = $_SERVER['HTTP_USER_AGENT'] ?? '';
        $this->ip = $_SERVER['REMOTE_ADDR'] ?? '';
        $this->lang = $lang;
        $this->getDataFromRemote();
        $this->getHost();
        $this->getUserAgent();
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
                $this->data += $output;
                curl_close($ch);
            } catch (\Exception $ex) {
                $this->data['error'] = true;
            }
        }
    }

    private function getHost(): void
    {
        $this->data += array('host' => gethostbyaddr($this->ip));
    }

    private function getUserAgent(): void
    {
        $this->data += array('user_agent' => $this->user_agent);
    }
}
