<?php

namespace App\Controllers;

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    public function initialize() {
        $uri_lang = $this->dispatcher->getParam("lang");

        if (!isset($uri_lang)) {
            $this->session->destroy();
            if ($this->session->has("lang")) {
                $lang = $this->session->get("lang");
            } else {
                $lang = substr($this->request->getBestLanguage(), 0, 2);
                switch ($lang) {
                    case "uk": break;
                    case "en": break;
                    default: $lang = "en";
                }
                $this->session->set("lang", $lang);
            }

            //$this->response->redirect("/$lang");

        } else {
            if ($this->session->has("lang") && $this->session->get("lang") != $uri_lang) {
                $this->session->set("lang", $uri_lang);
            }
        }
    }
}

