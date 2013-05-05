<?php

class CFSUploadFile {

    public function fire($job, $data) {
        $cfs = CFS::where('key', $data['key'])->first();

        $s3 = App::make('aws')->get('s3');
        $s3->putObject(array(
            'Bucket' => 'storag',
            'Key' => 'users/' . $cfs->key,
            'SourceFile' => $data['path'],
            'ContentType' => $cfs->mime,
            'ContentDisposition' => 'inline; filename="' . $cfs->name . '"'
        ));

        $job->delete();
    }

}