<?php

class URLFormatting{
    public $path = null;

    public function __construct(string $request_url){
        
        if(strlen($request_url) > 1 && !isEmpty(str_replace('/', '', $request_url)))
        {
            //check '/' char at the last position, ex uri: https://yourdomain.com/blabla/
            if(substr($request_url, strlen($request_url) - 1, 1) === '/')
            {
                $request_url = substr($request_url, 0, strlen($request_url) - 1);
            }
            //remove GET mothod data
            if(stripos($request_url, '?') !== false)
            {
                $request_url = substr($request_url, 0, stripos($request_url, '?'));
            }
            //remove the '/' first char
            if(strlen($request_url) > 1 && substr($request_url,0 , 1) === '/')
            {
                $request_url = substr($request_url, 1);
            }
        }
        else if($request_url === '/')
        {
            $request_url = '';
        }
        
        $this->path = $request_url;
    }
}