<?php

/*
 *
 */

class PluginEmpblogping_ModuleEmpping extends Module {

    /**
     * Метод инициализации модуля
     * 
     * @return void
     */
    function Init() {
    }

    /**
     * Send a POST requst using cURL
     *
     * @param string $sUrl to request
     * @param array $sPost values to send
     * @param array $aCustomOptions for cURL
     * @return string
     */
    private function curl_post($sUrl, $sPost = null, array $aCustomOptions = array()) {
        $aDefaultOptions = array(
            CURLOPT_URL => $sUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 4,
            CURLOPT_POSTFIELDS => $sPost
        );

        $ch = curl_init();
        curl_setopt_array($ch, ($aCustomOptions + $aDefaultOptions));

        if (!$sResponse = curl_exec($ch)) {
            trigger_error(curl_error($ch));
        }
        curl_close($ch);

        return $sResponse;
    }

    /**
     * Send a GET requst using cURL
     *
     * @param string $sUrl to request
     * @param array $sGet values to send
     * @param array $aCustomOptions for cURL
     * @return string
     */
    private function curl_get($sUrl, array $sGet = null, array $aCustomOptions = array()) {
        $aDefaultOptions = array(
            CURLOPT_URL => $sUrl . (strpos($sUrl, '?') === false ? '?' : '') . http_build_query($sGet),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 4
        );

        $ch = curl_init();
        curl_setopt_array($ch, ($aCustomOptions + $aDefaultOptions));
        
        if (!$sResponse = curl_exec($ch)) {
            trigger_error(curl_error($ch));
        }
        curl_close($ch);

        return $sResponse;
    }

    /**
     * Отправка POST запроса по протоколу Weblogs.Ping
     *
     * @param string $sPingUrl адрес по которому отправляется пинг
     * @param string $sBlogName название блога
     * @param string $sBlogRssUrl url на rss ленту блога
     * @return bool
     */
    protected function pingWeblogs($sPingUrl, $sBlogName, $sBlogRssUrl) {
        $sRequest = '<?xml version="1.0" encoding="utf-8"?>
<methodCall>
    <methodName>weblogUpdates.ping</methodName>
    <params>
        <param>
            <value>' . $sBlogName . '</value>
        </param>
        <param>
            <value>' . $sBlogRssUrl . '</value>
        </param>
    </params>
</methodCall>';

        $sResponse = $this->curl_post($sPingUrl, $sRequest);
        
        return (bool) strpos($sResponse, '<error>0</error>');
    }

    /**
     * Отдает линк на rss блога в котором опубликован топик
     *
     * @param ModuleTopic_EntityTopic $oTopic
     * @return string
     */
    protected function getRssUrl($oTopic) {
        if ($oTopic->getBlog()->getType() == 'personal') {
            return Router::GetPath('rss') . 'personal_blog/' . $oTopic->getBlog()->getOwner()->getLogin() . '/';
        } else {
            return Router::GetPath('rss') . 'blog/' . $oTopic->getBlog()->getUrl();
        }
    }

    /**
     * Отправка пингу к сервису Яндекс Блоги
     *
     * @param ModuleTopic_EntityTopic $oTopic
     * @return bool
     */
    public function makeYandexPing($oTopic) {
        $sPingUrl = Config::Get("empblogping.yandex.url");
        $sBlogName = $oTopic->getBlog()->getTitle();
        $sBlogRssUrl = $this->getRssUrl($oTopic);

        return $this->pingWeblogs($sPingUrl, $sBlogName, $sBlogRssUrl);
    }

    /**
     * Отправка пингу к сервису Google Blog Search
     *
     * @param ModuleTopic_EntityTopic $oTopic
     * @return bool
     */
    public function makeGooglePing($oTopic) {
        $sPingUrl = Config::Get("empblogping.google.url");
        $sBlogName = $oTopic->getBlog()->getTitle();
        $sBlogRssUrl = $this->getRssUrl($oTopic);

        return $this->pingWeblogs($sPingUrl, $sBlogName, $sBlogRssUrl);

//        $sTopicUrl = $oTopic->getUrl();
//        $sPingUrl = Config::Get("empblogping.google.url");
//
//        return $this->curl_get($sPingUrl, array("url" => $sTopicUrl));
    }

}