<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

/**
 * Controller class which handles any operations pertaining to the site-wide modal.
 */
class ModalController extends Controller
{
    /**
     * Loads and returns the error modal to be used if data is not loaded correctly.
     * 
     * @param string  $errorMessage  the error message to display in the view
     * @return view                  the view to display the message in
     */
    private function loadErrorModal ($errorMessage)
    {
        return View::make("partials/modal", [
            "extraClasses" => "w-[40rem] h-40 max-w-sm sm:max-w-xl",
            "title" => "There was a problem",
            "subtitle" => "Attachment Details",
            "buttons" => [
                [
                    'text' => 'Close',
                    'styling' => 'font-bold text-blue-500 hover:text-blue-800 mr-2',
                    'target' => 'modal_close_button'
                ]
            ],
            "content" => View::make("modal/template/no-content-single", [
                "errorMessage" => $errorMessage
            ])
        ]);
    }

    /**
     * Loads and returns the content modal to be inserted into the modal template.
     * 
     * @param request  $request  the AJAX request object
     * @return view              the view to display the request data in
     */
    public function loadModal (Request $request) 
    {
        if (!($request->ajax() && $request->configData && $request->view))
            return $this->loadErrorModal("The request did not contain the required data.");

        // get the data as well as the target view name
        $configData = json_decode($request->configData, true);
        $modalContent = $request->view;

        if ($configData == null || $modalContent == null)
            return $this->loadErrorModal("The request contained null data.");

        return View::make("partials/modal", [
            "extraClasses" => $configData["extraClasses"],
            "title" => $configData["title"],
            "subtitle" => $configData["subtitle"],
            "buttons" => $configData["buttons"],
            "content" => View::make($modalContent, $configData)
        ]);
    }
}
