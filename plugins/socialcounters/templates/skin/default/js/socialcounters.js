if (typeof oSocialCounter == 'undefined') {
    /**
     * Класс социальных счетчиков
     * @constructor
     */
    function TSocialCounter() {
        /**
         * Переменные
         */
        var sUrlCurrent = window.location.href.replace(window.location.hash, '');
        var oVk = {
            sName: 'vk',
            sShareUrl: 'http://vk.com/share.php?url='+sUrlCurrent,
            bClick: false,
            sButtonId: '.socialcounters a[href="#vk"]',
            oWindow: {}
        };
        var oFacebook = {
            sName: 'facebook',
            sShareUrl: 'http://www.facebook.com/sharer.php?s=100&p[url]='+sUrlCurrent,
            bClick: false,
            sButtonId: '.socialcounters a[href="#facebook"]',
            oWindow: {}
        };
        var oTwitter = {
            sName: 'twitter',
            sShareUrl: 'https://twitter.com/share?url='+sUrlCurrent,
            bClick: false,
            sButtonId: '.socialcounters a[href="#twitter"]',
            oWindow: {}
        };
        var oYa = {
            sName: 'ya',
            sShareUrl: 'http://wow.ya.ru/posts_share_link.xml?url='+sUrlCurrent,
            bClick: false,
            sButtonId: '.socialcounters a[href="#ya"]',
            oWindow: {}
        };
        var oGooglePlus = {
            sName: 'gp',
            sShareUrl: 'https://plus.google.com/share?url='+sUrlCurrent,
            bClick: false,
            sButtonId: '.socialcounters a[href="#gp"]',
            oWindow: {}
        };
        var oWindowParams = {
            iWidth: 700,
            iHeight: 400,
            iLeft: (screen.width-700)/2,
            iTop: (screen.height-400)/2
        };
        var oWindowCurrent = {};

        /**
         * Инициализация
         * @constructor
         */
        function Init(){
            $(function(){
                /**
                 * Расшариваем в VK
                 */
                $(oVk.sButtonId).unbind('click.Vk').bind('click.Vk', function(){
                    if (oVk.bClick == false) {
                        OpenWindow(oVk);
                        StartCheckingClose(oVk);
                        oVk.bClick = true;
                    }
                    return false;
                });
                /**
                 * Расшариваем в Facebook
                 */
                $(oFacebook.sButtonId).unbind('click.Facebook').bind('click.Facebook', function(){
                    if (oFacebook.bClick == false) {
                        OpenWindow(oFacebook);
                        StartCheckingClose(oFacebook);
                        oFacebook.bClick = true;
                    }
                    return false;
                });
                /**
                 * Расшариваем в Twitter
                 */
                $(oTwitter.sButtonId).unbind('click.Facebook').bind('click.Facebook', function(){
                    if (oTwitter.bClick == false) {
                        OpenWindow(oTwitter);
                        StartCheckingClose(oTwitter);
                        oTwitter.bClick = true;
                    }
                    return false;
                });
                /**
                 * Расшариваем в Ya
                 */
                $(oYa.sButtonId).unbind('click.Ya').bind('click.Ya', function(){
                    if (oYa.bClick == false) {
                        OpenWindow(oYa);
                        StartCheckingClose(oYa);
                        oYa.bClick = true;
                    }
                    return false;
                });
                /**
                 * Расшариваем в Gp
                 */
                $(oGooglePlus.sButtonId).unbind('click.Gp').bind('click.Gp', function(){
                    if (oGooglePlus.bClick == false) {
                        OpenWindow(oGooglePlus);
                        StartCheckingClose(oGooglePlus);
	                    oGooglePlus.bClick = true;
                    }
                    return false;
                });
                var title = $('title').html();
                var description = $('meta[name=description]').attr('content');
                oVk.sShareUrl = oVk.sShareUrl+'&title='+title+'&description='+description;
                oFacebook.sShareUrl = oFacebook.sShareUrl+'&p[title]='+title+'&p[description]='+description;
                oTwitter.sShareUrl = oTwitter.sShareUrl+'&text='+title;
                oYa.sShareUrl = oYa.sShareUrl+'&title='+title+'&body='+description;
                oGooglePlus.sShareUrl = oGooglePlus.sShareUrl;
                ReCount(oVk);
                ReCount(oFacebook);
                ReCount(oTwitter);
                ReCount(oYa);
	            /**
	             * Получаем значение GooglePlus
	             */
	            ls.ajax('/social_counters_ajax/google_plus_count/', {sUrl: sUrlCurrent}, function(aData){
		            $(oGooglePlus.sButtonId).find('span').html(aData.iCount);
	            });
            });
        };

        /**
         * Открываем окно
         */
        function OpenWindow(oObject){
            oObject.oWindow = window.open(oObject.sShareUrl,'displayWindow', 'width='+oWindowParams.iWidth+',height='+oWindowParams.iHeight+',left='+oWindowParams.iLeft+',top='+oWindowParams.iTop+',location=no, directories=no,status=no,toolbar=no,menubar=no');
        };

        /**
         * Запускаем проверку на закрытие шаринг-окна
         */
        function StartCheckingClose(oObject){
            var oInterval = window.setInterval(function(){
                if(oObject.oWindow.closed == true) {
                    clearInterval(oInterval);
                    ReCount(oObject);
                }
            }, 500);
        }

        /**
         * Пересчитываем количество лайков
         * @constructor
         */
        function ReCount(oObject){
            switch (oObject.sName) {
                case 'vk':
                    if (typeof VK == 'undefined') VK = {};
                    if (typeof VK.Share == 'undefined') VK.Share = {};
                    VK.Share.count = function(iIndex, iCount){
                        var iCountCur = parseInt($(oVk.sButtonId).find('span').html(), 10);
                        $(oVk.sButtonId).find('span').html(iCount);
                        if (oVk.bClick && iCountCur != iCount) {
                            $(oVk.sButtonId).addClass('disabled');
                        } else {
                            oVk.bClick = false;
                        }
                    };
                    $.getJSON('http://vk.com/share.php?act=count&index=1&url='+sUrlCurrent+'&format=json&callback=?');
                    break;
                case 'facebook':
                    $.getJSON('http://api.facebook.com/restserver.php?method=links.getStats&callback=?&urls='+sUrlCurrent+'&format=json', function(aData) {
                        var iCountCur = parseInt($(oFacebook.sButtonId).find('span').html(), 10);
                        $(oFacebook.sButtonId).find('span').html(aData[0].share_count);
                        if (oFacebook.bClick && iCountCur != parseInt(aData[0].share_count, 10)) {
                            $(oFacebook.sButtonId).addClass('disabled');
                        } else {
                            oFacebook.bClick = false;
                        }
                    });
                    break;
                case 'twitter':
                    $.getJSON('http://urls.api.twitter.com/1/urls/count.json?url='+sUrlCurrent+'&callback=?', function(aData) {
                        var iCountCur = parseInt($(oTwitter.sButtonId).find('span').html(), 10);
                        $(oTwitter.sButtonId).find('span').html(aData.count);
                        if (oTwitter.bClick && iCountCur != parseInt(aData.count, 10)) {
                            $(oTwitter.sButtonId).addClass('disabled');
                        } else {
                            oTwitter.bClick = false;
                        }
                    });
                    break;
                case 'ya':
                    if (typeof Ya == 'undefined') Ya = {};
                    if (typeof Ya.Share == 'undefined') Ya.Share = {};
                    Ya.Share.showCounter = function(iCount){
                        var iCountCur = parseInt($(oYa.sButtonId).find('span').html(), 10);
                        $(oYa.sButtonId).find('span').html(iCount);
                        if (oYa.bClick && iCountCur != parseInt(iCount, 10)) {
                            $(oYa.sButtonId).addClass('disabled');
                        } else {
                            oYa.bClick = false;
                        }
                    }
                    $.getJSON('http://wow.ya.ru/ajax/share-counter.xml?url='+sUrlCurrent+'&callback=?');
                    break;
                case 'gp':
	                /**
	                 * Поскольку значение GP увеличивается с задержкой
	                 * Увеличиваем на 1 после закрытия окна
	                 */
	                $(oGooglePlus.sButtonId).find('span').html(parseInt($(oGooglePlus.sButtonId).find('span').html(), 10)+1);
                    break;
                default:
                    // ничего не делаем
            }
        }

        this.Init = Init;
    }
}

if (typeof log != 'function') {
    function log(a){ console.log(a); }
}