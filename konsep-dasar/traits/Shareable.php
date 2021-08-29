<?php

trait Shareable
{
    public function share(){
        echo "Sharing {$this->content()} \n";
    }
}
