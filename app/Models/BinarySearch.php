<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BinarySearch extends Model
{
    public function binarySearch($array, $target, $start = 0, $end){
        $mid = floor(($start + $end)/2);
        if($array[$mid] === $target){
            echo $array[$mid];
            echo '\n';
            echo $mid;
        }
        elseif($array[$mid] > $target){
            echo $mid;
            echo '<br>';
            $this->binarySearch($array, $target, 0, $end = $mid - 1);
        }
        elseif($array[$mid] < $target){
            echo $mid;
            echo '<br>';
            $this->binarySearch($array, $target, $start = $mid + 1, $end);
        }
    }
}
