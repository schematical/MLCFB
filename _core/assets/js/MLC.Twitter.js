/**
 * Created with JetBrains PhpStorm.
 * User: user1a
 * Date: 4/7/13
 * Time: 4:30 PM
 * To change this template use File | Settings | File Templates.
 */
if(typeof(MLC) == 'undefined'){
    MLC = {};
}
MLC.Twitter = {
    Search:function(mixQuery, funCallback){

        if(typeof(mixQuery) != 'string'){
            var strQuery = '';
            for(strKey in mixQuery){
                strQuery += strKey + '=' + mixQuery[strKey] + '&';
            }
            strQuery = strQuery.substring(0, strQuery.length - 1);
        }else{
            var strQuery = mixQuery;
        }
        if(typeof funCallback != 'undefined'){
            if(typeof(funCallback) == 'string'){
                strQuery += '&callback=' + funCallback;
            }else{
                MLC.Twitter.funCallback = funCallback;
                strQuery += '&callback=MLC.Twitter.funCallback';
            }
        }
        $.ajax(
            {
                url : "https://twitter.com/statuses/user_timeline/mlconsulting",
                dataType : 'jsonp',
                success:strQuery,
                crossDomain : true
            }
        );/*
        var head= document.getElementsByTagName('head')[0];
        var script= document.createElement('script');
        script.type= 'text/javascript';
        script.src= 'http://search.twitter.com/search.json?' + strQuery;
        console.log(script.src);
        head.appendChild(script);*/
    }
}

