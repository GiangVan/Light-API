<?php

class LayoutController{
    public function page1(){
        callView('DevModule', 'page1');
    }
    public function page2(){
        callView('DevModule', 'page2');
    }
}