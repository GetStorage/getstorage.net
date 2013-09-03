<?php


class ObjectController extends BaseController {

    public function getObject($name) {
        if (!$name) {
            return Redirect::to('/');
        }

        $object = Object::where('name', $name)->first();


        ObjectHit::create(array('object_id' => $object->id, 'ip' => Request::getClientIp(), 'data' => json_encode(Request::server())));

        $file = base_path() . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . $object->name;
        $contents = file_get_contents($file);

        $original = ($object->original != null ? $object->original : $object->name);

        $response = Response::make($contents, 200);
        $response->headers->set('Content-Length', $object->size);
        $response->headers->set('Content-Type', $object->mime);
        $response->headers->set('Content-Disposition', 'inline; filename="' . $original . '"');

        return $response;
    }
}
