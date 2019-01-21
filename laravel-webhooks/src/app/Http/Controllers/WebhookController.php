<?php

namespace App\Http\Controllers;

use App\Events\WebhookEvent;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $projectId = $request->get('projectId');
        $eventType = $request->get('dataType');

        event(new WebhookEvent($projectId, $eventType));

        return response()->json([
            'success' => true,
        ]);
    }
}
