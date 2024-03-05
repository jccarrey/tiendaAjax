<?php

namespace App\Data;

use App\models\Producto;
class Chart
{
    private $chart = [];

    function add(Producto $producto)
    {
        if (isset($this->chart[$producto->code])) {
            $this->chart[$producto->code][1] =
                $this->chart[$producto->code][1] + 1;
        } else {
            $this->chart[$producto->code][0] = $producto;

            $this->chart[$producto->code][1] = 1;
        }

        return $this->chart[$producto->code][1];
    }
    
    
    function substract($code)
    {
        if (isset($this->chart[$code])) {
            if ($this->chart[$code][1] != 1) {
                $this->chart[$code][1] = $this->chart[$code][1] - 1;
            } else {
                $this->empty($code);
            }

            return $this->chart[$code][1];
        }
        return false;
    }
    
    
    function empty($code)
    {
        if (isset($this->chart[$code])) {
            unset($this->chart[$code]);
            return true;
        }
        return false;
    }
    
    
    function emptyChart()
    {
        unset($this->chart);
    }
    
    
    function get()
    {
        return $this->chart;
    }
}
