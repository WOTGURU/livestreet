var ls = ls || {};

ls.ajaxload =( function ($) {
    this.isBusy = false;
    this.bAutoload = false;
    this.bNoLoadMore = false;
    this.iNextPage = 2;
    this.sPageHash = '';
    this.sPageParam = '';
	this.sPageSpecial = '';
    
    this.setNextPage=function(id){
        this.iNextPage=id;
    }
    this.setPageHash=function(hash){
        this.sPageHash=hash;
    }
    this.setPageParam=function(param){
        this.sPageParam=param;
    }
	this.setPageSpecial=function(url){
        this.sPageSpecial=url;
    }
    this.setAutoLoad=function(b){
        this.bAutoload=b;
    }
    
    this.getMore = function (type) {
        if (this.isBusy || this.bNoLoadMore) {
            return;
        }
        if (!this.iNextPage || !this.sPageHash) return;
        $('#ajaxloading').css('display','block');
        var param ='';
        if(this.sPageParam){
           param='?param='+this.sPageParam;
        }
		var suburl ='';
        if(this.sPageSpecial){
           suburl='/'+this.sPageSpecial;
        }
        this.isBusy = true;
        ls.ajax(aRouter['ajax']+'ajaxload'+type+suburl+'/'+param, {'ipage':this.iNextPage,'sFilter':this.sPageHash}, function(data) {
            if (data.bStateError) {
                ls.msg.error(data.sMsgTitle,data.sMsg);
            } else {
                if(data.iCount==0) {
                    if(this.bAutoload){
                        $('#ajaxload_more').css({'display':'none'});
                    }
                    //$('#ajaxload_more').html('that's all');
                    this.bNoLoadMore = true;
                    
                } else {
					
                    if(type!='people' && type!='blogs' && type!='comments'){
                        $('#postcontent').before(data.sText);
                    } 
                    if(type=='people'){
                        $('.table-users tbody').append(data.sText);
                    }
                    if(type=='blogs'){
                        $('.table-blogs tbody').append(data.sText);
                    }
                    if(type=='comments'){
                        $('.comments').append(data.sText);
                    }
                    this.setNextPage(this.iNextPage+1);
                }
            }
            
            //if(!this.bNoLoadMore){
                $('#ajaxloading').css('display','none');
            //}
            this.isBusy = false;
            if(this.bAutoload && ($(document).height() - $(window).height() <= $(window).scrollTop() + 200)){
                ls.ajaxload.getMore(type);
            }
			//fix share buttons
			this.YaShareReInit();
        }.bind(this));
    }

	this.YaShareReInit = function() {
		var g=$('.yashare-auto-init'),c=0,e=g.length,b,d,f,a;
		for(;c<e;c++){
			b=g[c];
			d=b.getAttribute("data-yashareQuickServices");
			f=b.getAttribute("data-yasharePopupServices");
			if(typeof d==="string"){
				d=d.split(",")
			}else{
				d=null
			}
			a={
				element:b,
				l10n:b.getAttribute("data-yashareL10n"),
				link:b.getAttribute("data-yashareLink"),
				title:b.getAttribute("data-yashareTitle"),
				elementStyle:{
					type:b.getAttribute("data-yashareType"),
					quickServices:d
				}
			};
			if(f&&typeof f==="string"){
				f=f.split(",");
				a.popupStyle={
					blocks:f
				}
			}
			new Ya.share(a);
		}
	};
    
   
    return this;
}).call(ls.ajaxload || {},jQuery);