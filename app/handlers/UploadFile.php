<?php

class UploadFile {
    
    
    public function fire($job, $data) 
    {
        $thing = Thing::where('name', $data['name'])->first();

        // Take file
        $path = base_path().DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.$thing->name;

        // Upload to S3
        $s3 = App::make('aws')->get('s3');
        $s3->putObject(array(
            'Bucket' => 'storag',
            'Key' => $thing->name,
            'SourceFile' => $path,
        ));

        $thing->s3 = true;
        $thing->save();


        $job->delete();
    }


}
