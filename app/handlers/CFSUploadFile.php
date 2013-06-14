<?php

use CFS;

class CFSUploadFile {

    public function fire($job, $data) {
        $cfs = CFS\File::where('id', $data['id'])->first();

        $s3 = App::make('aws')->get('s3');
        $s3->putObject(array(
            'Bucket' => 'storag',
            'Key' => 'users/' . $cfs->fullpath(),
            'SourceFile' => $data['path'],
            'ContentType' => $cfs->mime,
            'ContentDisposition' => 'inline; filename="' . $cfs->name . '"'
        ));

        $job->delete();
    }

}