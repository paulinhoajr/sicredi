<?php

namespace Paulinhoajr\Sicredi\testes;

use Paulinhoajr\Sicredi\Hearth;

try {
    $hearth = new Hearth();

    echo $hearth->verifica();

}catch (\Exception $e){
    echo $e->getMessage();
}