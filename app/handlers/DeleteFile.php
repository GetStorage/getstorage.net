<?php

class DeleteFile {

    public function fire($job, $data) {
        $object = Object::where('name', $data['name'])->first();

        // Delete from S3
        $s3 = App::make('aws')->get('s3');
        $s3->deleteObject(array(
            'Bucket' => 'storag',
            'Key' => $object->name
        ));

        $job->delete();
    }

}
