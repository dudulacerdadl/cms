<?php

namespace Cms\Model;

use Exception;

class Env
{
    public function getVariables()
    {
        if (!file_exists(ROOT . '/.env')) {
            throw new Exception("Arquivo '.env' não exite");
        }

        $env = file_get_contents(ROOT . '/.env');

        $variables = explode("\n", $env);
        $return = [];

        foreach ($variables as $value) {
            $aux = explode('=', $value);
            if (isset($aux[1])) {
                $return[$aux[0]] = $aux[1];
            }
        }

        return $return;
    }
}