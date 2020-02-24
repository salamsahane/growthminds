<?php

namespace App\Controllers;

use App\Core\Controller;

class prospectController extends Controller{

    public function prospectprofile(?int $prospect_id = null){
        $this->view('prospect-profile', 'Prospect Profile', [
            'prospect_id' => $prospect_id
        ]);
        $this->view->render();
    }

}